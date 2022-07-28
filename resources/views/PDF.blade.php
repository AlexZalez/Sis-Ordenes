<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="{{asset('css/PDF.css')}}">
    <style>
        @page {
            margin-left: 0.4cm;
            margin-right: 0.4cm;
        }
    </style>
</head>
<body>

    

    <table>
        <tr>
            <td class="col-12">
                <table>
                    <tr>
                        <td class="col" style="width: auto"><img src="{{asset('img/logo.png')}}" alt="LOGO" style="width: 100px"></td>
                        <td style="padding-top: 30px;padding-left: 3px;">
                            <div >
                                <div style="font-size: 22px;font-weight: bold;">Orden Servicio Tecnico</div>
                                <div style="font-size: 12px;">
                                    <span class="bold">Rif.:</span>J-412393081 <br>
                                    <span class="bold">TELEFONOS:</span> 0424-3148739 0244-3868544 <br>
                                    <span class="bold">Dirección:</span> Calle Comercio Oeste N° 35 Local 1 <br>
                                    Sector Centro, Villa De Cura Edo. Aragua
                                </div>
                            </div>
                        </td>
                    </tr>                    
                </table>
                <div class="tecno-lineas">
                    <span class="bold-1">TECNO</span><span class="bold-1" style="color: green">SOLUCIONES</span>&nbsp;<span class="bold-1">C.A.</span>
                </div>
                <table class="tborder" style="font-size: 12px; margin-top: 10px;font-family: Arial, Helvetica, sans-serif;">
                    <tr>
                        <td class="col-3" id="center-b"><span class="bold">Orden N</span></td>
                        <td class="col-10" id="center-b"><span class="bold">Fecha y Hora de Recepcion</span></td>
                        <td class="col-3" id="center-b"><span class="bold">Tecnico</span></td>
                    </tr>
                    <tr>
                        <td class="col-2" id="center-b" style="padding: 5px">{{$equipo[0]->id}}</td>
                        <td class="col-10" id="center-b" style="padding: 5px">{{$equipo[0]->created_at}}</td>
                        <td class="col-2" id="center-b" style="padding: 5px">{{$equipo[0]->tecnico->name}}</td>
                    </tr>
                </table>

                <table class="tborder" style="font-size: 12px; margin-top: 4px;font-family: Arial, Helvetica, sans-serif;">
                    <tr>
                      <td class="tborder" id="center"><span class="bold">Datos del Cliente</span></td>
                      <td class="tborder" id="center"><span class="bold">Datos del Equipo</span></td>  
                    </tr>
                    <tr>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Nombre:</span>{{$equipo[0]->clientes->nombre}}</div></td>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Tipo:</span>{{$equipo[0]->tipo}}</div></td>  
                    </tr>
                    <tr>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">C.I.:</span>{{$equipo[0]->clientes->cedula}}</div></td>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Marca:</span>{{$equipo[0]->marca}}</div></td>  
                    </tr>
                    <tr>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Telefono:</span>{{$equipo[0]->clientes->telefono}}</div></td>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Modelo:</span> {{$equipo[0]->modelo}}</div></td>  
                    </tr>
                    <tr>
                      <td id="tborder" class="campos" style="height: 80px;"><div style="float: left"><span class="bold">Diagnostico:</span>{{$equipo[0]->diagnostico_i}} </div></td>
                      <td id="tborder" class="campos" style="height: 80px;"><div style="float: left"><span class="bold">Firma del Cliente:</span> </div></td>  
                    </tr>
                    
                    
                </table>
                <table>
                    <tr>
                        <td style="font-size: 10px;">
                            >&nbsp;La Empresa no se hace responsable de equipos dejados despues de 30 dias <br>
                            >&nbsp;La Empresa no se hace responsable por manipulaciones previas del Equipo <br>
                            >&nbsp;Pasados los 7 dias se realizara un reajuste del precio <br>
                            >&nbsp;La Empresa no se hace responsable por perdida de informacion por fallas <br> de componentes o virus
                        </td>
                    </tr>
                </table>
                
                
                
            </td>
            {{-- Espacio entre ordenes --}}<td class="col">&nbsp;</td>
            {{-- Segunda Orden --}}
            <td class="col-12">
                <table>
                    <tr>
                        <td class="col" style="width: auto"><img src="{{asset('img/logo.png')}}" alt="LOGO" style="width: 100px"></td>
                        <td style="padding-top: 30px;padding-left: 3px;">
                            <div >
                                <div style="font-size: 22px;font-weight: bold;">Orden Servicio Tecnico</div>
                                <div style="font-size: 12px;">
                                    <span class="bold">Rif.:</span>J-412393081 <br>
                                    <span class="bold">TELEFONOS:</span> 0424-3148739 0244-3868544 <br>
                                    <span class="bold">Dirección:</span> Calle Comercio Oeste N° 35 Local 1 <br>
                                    Sector Centro, Villa De Cura Edo. Aragua
                                </div>
                            </div>
                        </td>
                    </tr>                    
                </table>
                <div class="tecno-lineas">
                    <span class="bold-1">TECNO</span><span class="bold-1" style="color: green">SOLUCIONES</span>&nbsp;<span class="bold-1">C.A.</span>
                </div>
                <table class="tborder" style="font-size: 12px; margin-top: 10px;font-family: Arial, Helvetica, sans-serif;">
                    <tr>
                        <td class="col-3" id="center-b"><span class="bold">Orden N</span></td>
                        <td class="col-10" id="center-b"><span class="bold">Fecha y Hora de Recepcion</span></td>
                        <td class="col-3" id="center-b"><span class="bold">Tecnico</span></td>
                    </tr>
                    <tr>
                        <td class="col-2" id="center-b" style="padding: 5px">{{$equipo[0]->id}}</td>
                        <td class="col-10" id="center-b" style="padding: 5px">{{$equipo[0]->created_at}}</td>
                        <td class="col-2" id="center-b" style="padding: 5px">{{$equipo[0]->tecnico->name}}</td>
                    </tr>
                </table>

                <table class="tborder" style="font-size: 12px; margin-top: 4px;font-family: Arial, Helvetica, sans-serif;">
                    <tr>
                      <td class="tborder" id="center"><span class="bold">Datos del Cliente</span></td>
                      <td class="tborder" id="center"><span class="bold">Datos del Equipo</span></td>  
                    </tr>
                    <tr>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Nombre:</span>{{$equipo[0]->clientes->nombre}}</div></td>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Tipo:</span>{{$equipo[0]->tipo}}</div></td>  
                    </tr>
                    <tr>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">C.I.:</span>{{$equipo[0]->clientes->cedula}}</div></td>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Marca:</span>{{$equipo[0]->marca}}</div></td>  
                    </tr>
                    <tr>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Telefono:</span>{{$equipo[0]->clientes->telefono}}</div></td>
                      <td id="tborder" class="campos" style="height: 30px;"><div style="float: left"><span class="bold">Modelo:</span> {{$equipo[0]->modelo}}</div></td>  
                    </tr>
                    <tr>
                      <td id="tborder" class="campos" style="height: 80px;"><div style="float: left"><span class="bold">Diagnostico:</span>{{$equipo[0]->diagnostico_i}} </div></td>
                      <td id="tborder" class="campos" style="height: 80px;"><div style="float: left"><span class="bold">Firma del Cliente:</span> </div></td>  
                    </tr>
                    
                    
                </table>
                <table>
                    <tr>
                        <td style="font-size: 10px;">
                            >&nbsp;La Empresa no se hace responsable de equipos dejados despues de 30 dias <br>
                            >&nbsp;La Empresa no se hace responsable por manipulaciones previas del Equipo <br>
                            >&nbsp;Pasados los 7 dias se realizara un reajuste del precio <br>
                            >&nbsp;La Empresa no se hace responsable por perdida de informacion por fallas <br> de componentes o virus
                        </td>
                    </tr>
                </table>
                
                
                
            </td>
        </tr>
    </table>


    
</body>
</html>