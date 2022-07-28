@extends('layouts.app')

@section('content')

    <div class="container mt-1  overflow-hidden ">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <form action="/cliente/actualizar" method="post" class="">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="row text-dark">
                            <div class="col-6">
                                <div class="form-group">
                                    <h4 class="m-0">Equipo</h4>
                                <ul class="list-group list-group-horizontal border-bottom-0 p-0">
                                    
                                    <li class="list-group-item ">Estado.: <span class="font-weight-bolder">{{' '.ucfirst($orden->estado)}}</span>
                                        <select class="custom-select" name="estado" id="" onchange="carg(this);">
                                            @switch($orden->estado)
                                                @case('pendiente')
                                                    <option selected >Cambiar...</option>
                                                    <option value="proceso">En proceso</option>
                                                    <option value="terminado">Entregado</option>                                                    
                                                    @break
                                                @case('proceso')
                                                    <option selected >Cambiar...</option>
                                                    <option value="terminado">Entregado</option>
                                                    @break
                                                @case('terminado')
                                                    <option selected >---</option>
                                                    @break
                                                @default
                                            @endswitch

                                        </select>
                                    </li>

                                    <li class="list-group-item">Recibido.:<small>{{' '.$orden->created_at}}</small></li>
                                </ul>
                                <ul class="list-group list-group border-top-0">
                                    <li class="list-group-item py-1">Tipo.:{{' '.$orden->tipo}}</li>
                                    <li class="list-group-item py-1">Marca.:{{' '.$orden->marca}}</li>
                                    <li class="list-group-item py-1">Modelo.:{{' '.$orden->modelo}}</li>
                                </ul>
                                </div>
                                
                                    <button type="button" onclick="Diagnostico(this)" class="btn btn-primary font-weight-bold">Diagnostico</button>
                                    <button type="button" onclick="Proceso(this)" class="btn btn-primary font-weight-bold">Proceso</button>
                                    <button type="button" onclick="Entregado(this)" class="btn btn-primary font-weight-bold">Entregado</button>
                                    <textarea   disabled id="diag" style="resize: none;" class="form-control mt-2" cols="10" rows="4">{{' '.$orden->diagnostico_i}}</textarea>
                                
                                
                            </div>
                            <div class="col-6">
                                
                                <h4 class="m-0">Cliente</h4>
                                <ul class="list-group list-group ">
                                    <li class="list-group-item">Nombre.:{{' '.$orden->clientes->nombre}}</li>
                                    <li class="list-group-item">Cedula.:{{' '.$orden->clientes->cedula}}</li>
                                    <li class="list-group-item mb-4">Telefono.:{{' '.$orden->clientes->telefono}}</li>
                                
                                </ul>
                                <div>
                                    <p id="diagnosticotext" class=""></p>
                                    <textarea hidden name="texto" id="entregado" disabled style="resize: none;" class="form-control" cols="10" rows="4"></textarea>
                                    <input id="tipo" type="number" name="tipo" hidden>
                                    <input type="number" name="id" value="{{ $orden->id }}" hidden>
                                </div>
                            </div>
                        
                        </div>{{-- row --}}
                        <div class="mt-3 pt-3 border-top">
                            <div class="float-right">
                                <div class="row">
                                    <div class="col pr-0">
                                        <a href="/cliente/{{ $orden->id }}/PDF" target="_blank" class="card-link btn btn-light">Imprimir</a>
                                    </div>
                                    <div class="col">
                                        
                                            @csrf
                                            <button id="enviar" disabled type="submit" class="card-link btn btn-light ml-0">Actualizar</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>{{-- Card --}}
            </form>
            </div>{{-- col --}}
            
            
            <div class="col"></div>
        </div>{{-- row --}}
    </div>{{-- Container --}}

    <script>
        var tipo = document.getElementById('tipo');
        var entregado = document.getElementById('entregado');
        var enviar = document.getElementById('enviar');
        var diagnosticotext = document.getElementById('diagnosticotext');

        function carg(elemento) {
        
          d = elemento.value;
        
          switch (d) {
            case "proceso":
              diagnosticotext.innerHTML = 'Diagnostico de Proceso';
              diagnosticotext.className = 'font-weight-bold h5 mt-4 pt-1';
              entregado.hidden = false; 
              entregado.required = true; 
              entregado.disabled = false;
              entregado.value = '';
              tipo.value = 1;
              enviar.disabled = false;
              console.log('proceso preparado'); 
              break;
            case "terminado":
              diagnosticotext.innerHTML = 'Reporte de Entrega';
              diagnosticotext.className = 'font-weight-bold h5 mt-4 pt-1';
              entregado.hidden = false; 
              entregado.required = true; 
              entregado.disabled = false;
              entregado.value = '';
              tipo.value = 2;
              enviar.disabled = false;
              console.log('entregado preparado');
              break;
        
            default:
              diagnosticotext.innerHTML = '';
              diagnosticotext.className = '';
              entregado.hidden = true; 
              entregado.required = false;
              entregado.disabled = true;
              enviar.disabled = true;
              console.log(d+' defecto');
              break;
          }

        }


        var diag = document.getElementById('diag');

        function Diagnostico(elemento) {
            diag.value = "{{ $orden->diagnostico_i}}";
        }
        function Proceso(elemento) {
            diag.value = "{{ $orden->diagnostico_p}}";
        }
        function Entregado(elemento) {
            diag.value = "{{ $orden->diagnostico_f}}";
        }
        
    </script>

@endsection