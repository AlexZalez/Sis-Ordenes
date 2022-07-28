<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Equipo;
use App\Http\Requests\ValidacionCliente;
use App\Http\Requests\ValidacionEquipo;
use App\Http\Requests\ValidacionEdit;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Cliente::all();
        $equipo = Equipo::with('clientes')->with('tecnico')->get()/* Equipo::all() */;
        

        
        return view('ver')
        ->with('orden', $equipo);    
    }

    public function indexBuscar(Request $request){

        //return $request;
        //return Carbon::now()->toDateTimeString();
        $criterio = $request->criterio;
        
        if ($request->desde == null ) {
            $desde = '2022-01-01';
        }else {
            $desde = $request->desde;
        }

        if ($request->hasta == null ) {
            $hasta = now();
        }else {
            $hasta = $request->hasta;
        }

        

        $porFecha = $request->porFecha;
        

        
        if ($porFecha == 'on') {
            $equipo = Equipo::whereDate('created_at', '>=', $desde)
                ->whereDate('created_at', '<=', $hasta)
                ->with('tecnico')
                ->orderBy('created_at','DESC')
                ->get();
        }else {
            
            $equipo = Equipo::where('tipo', 'like', '%'.$request->criterio.'%')
            ->orWhere('marca', 'like', '%'.$request->criterio.'%')
            ->orWhere('modelo', 'like', '%'.$request->criterio.'%')
            ->orWhere('estado', 'like', '%'.$request->criterio.'%')
            ->orWhereHas('clientes', function (Builder $query) use ($criterio) {$query->where('nombre', 'like', '%'.$criterio.'%');})
            ->orWhereHas('clientes', function (Builder $query) use ($criterio) {$query->where('cedula', 'like', '%'.$criterio.'%');})
            ->orWhereHas('clientes', function (Builder $query) use ($criterio) {$query->where('telefono', 'like', '%'.$criterio.'%');})
            ->orWhereHas('tecnico', function (Builder $query) use ($criterio) {$query->where('name', 'like', '%'.$criterio.'%');})
            //->with('tecnico')
            ->orderBy('created_at','DESC')
            ->get();
           //return $equipo;
            
        }        
        
        return view('ver')
        ->with('orden', $equipo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dato = Cliente::all();
        
        return view('orden')->with('datos', $dato)->with('selecciona', false);   
    }


    public function createEquipo()
    {
        
        return view('orden2')->with('cliente', $dato = false);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionCliente $request)
    {
        $datos = Cliente::all();
        $dato = new Cliente;
        
        foreach ($datos as $clave => $valor) {
            if ($request->cedula == $valor->cedula) {
                return view('orden')->with('selecciona', true);
            }
        }  
                
        $celular = $request->prefijo.$request->telefono;
        $dato->nombre = $request->nombre;
        $dato->cedula = $request->cedula;
        $dato->telefono = $celular; 
        $dato->save();
        
        $datox = Cliente::all();
        foreach ($datox as $clave => $valor) {
            if ($request->cedula == $valor->cedula) {
                return  view('orden2')
                ->with('cliente', $valor);
            }
        } 
        
        /* return view('orden2')->with('cliente', $request); */
    }

    public function seleccionar(){
        $datos = Cliente::all();

        return  view('seleccionar')->with('orden', $datos);
    }

    public function selectCliente(Request $request){
        
        $validatedData = $request->validate([
            'id' => 'required|numeric',
        ]);

        $datos = Cliente::all();
        foreach ($datos as $clave => $valor) {
            if ($request->id == $valor->id) {
                return view('orden2')
                ->with('cliente', $valor);
            }
        } 

        return view('orden2');
    }

    public function seleccionarBuscar(Request $request){

        

        $cliente = Cliente::where('nombre', 'like', '%'.$request->criterio.'%')
        ->orWhere('cedula', 'like', '%'.$request->criterio.'%')
        ->orWhere('telefono', 'like', '%'.$request->criterio.'%')
        ->get();

        return  view('seleccionar')->with('orden', $cliente);

    }

    public function store2(ValidacionEquipo $request){
        
        
        $dato = new Equipo;

        $dato->tipo = $request->tipo;
        $dato->marca = $request->marca;
        $dato->modelo = $request->modelo;
        $dato->diagnostico_i = $request->diagnostico_i;
        $dato->estado = 'pendiente';
        $dato->clientes_id = $request->cliente_id;
        $dato->users_id = Auth::user()->id;
        $dato->save();
        
        return redirect('/cliente');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::where('id', '=', $id)
        ->with('clientes')->get(); 

        return view('verUna')->with('orden', $equipo[0]);
    }

    public function PDF($id)
    {
        $equipo = Equipo::where('id', '=', $id)
        ->with('clientes')->with('tecnico')->get(); 
        
        
        $pdf = PDF::loadView('PDF', compact('equipo'));
        return $pdf->stream();
    }

    public function actualizar(Request $request)
    {
        $fecha = Carbon::now()->toDateTimeString();
        $equipo = Equipo::find($request->id);

        $equipo->estado = $request->estado;
        switch ($request->tipo) {
            case '1':

                $equipo->fecha_p = $fecha;
                $equipo->diagnostico_p = $request->texto;
                break;
            case '2':

                $equipo->fecha_f = $fecha;
                $equipo->diagnostico_f = $request->texto;
                break;
            
            default:
                abort(403, 'Error Inesperado');
                break;
        }
        $equipo->save();
        
        
        return redirect('/cliente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::where('id',$id)->with('clientes')->with('tecnico')->get() ;

        //return $equipo[0]->clientes;

       return view('editar')->with('orden', $equipo[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionEdit $request)
    {
        //return $request;

        

        $equipo = Equipo::where('id', $request->id_equipo)->get();
        //return $equipo;

        $cliente = Cliente::where('id', $request->id_cliente)->get();
        //return $cliente[0]->nombre;

        if ($request->nombre != $cliente[0]->nombre  || $request->telefono != $cliente[0]->telefono || $request->cedula != $cliente[0]->cedula) {
            $ClienteG = Cliente::find($request->id_cliente);
            
            $ClienteG->nombre = $request->nombre;
            $ClienteG->telefono = $request->telefono;
            $ClienteG->cedula = $request->cedula;

            $ClienteG->save();
        }

        if ($request->tipo != $equipo[0]->tipo || 
            $request->marca != $equipo[0]->marca || 
            $request->modelo != $equipo[0]->modelo ||
            $request->estado != $equipo[0]->estado ||
            $request->diagnostico_i != $equipo[0]->diagnostico_i || 
            $request->diagnostico_p != $equipo[0]->diagnostico_p || 
            $request->diagnostico_f != $equipo[0]->diagnostico_f ) {
            
            $EquipoG = Equipo::find($request->id_equipo);
            

            $EquipoG->tipo = $request->tipo;
            $EquipoG->marca = $request->marca;
            $EquipoG->modelo = $request->modelo;
            $EquipoG->estado = $request->estado;
            $EquipoG->diagnostico_i = $request->diagnostico_i;
            $EquipoG->diagnostico_p = $request->diagnostico_p;
            $EquipoG->diagnostico_f = $request->diagnostico_f;

            $EquipoG->save();

        }
        
        //return 'no cambiar';
        return redirect('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        
        $equipo->delete();

        return redirect('/cliente');
    }
}
