@extends('layouts.app')

@section('content')

    <div class="container mt-5 overflow-hidden ">
        
        
        <div class="row justify-content-start">
           
            
            <form action="{{ route('buscar') }}" method="post">
                @csrf
                <div class="input-group mb-3 ">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                    <input id="input1" name="criterio" type="text" class="form-control" placeholder="" >
                    <div class="input-group-prepend ml-1">
                      <div class="btn btn-secondary rounded-left" >Desde</div>
                    </div>
                    <input disabled name="desde" type="date" class="form-control" placeholder="" id="desde" >
                    <div class="input-group-prepend ml-1">
                      <div class="btn btn-secondary rounded-left" >Hasta</div>
                    </div>
                    <input disabled name="hasta" type="date" class="form-control" placeholder="" id="hasta">
                    <div class="custom-control custom-switch ml-1 mt-1">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1" name="porFecha" >
                      <label class="custom-control-label" for="customSwitch1">Filtrar por Fechas</label>
                    </div>
                </div>
            </form>
        </div>


    </div>



        <div class="row justify-content-center">
            <div class="col-10">
                <div class="table-responsive" style="height: 400px;">

                    <table class="table table-striped table-sm" >
                        <thead class="thead-dark sticky-top">
                            <tr>
                            
                              <th scope="col">Nombre</th>
                              <th scope="col">Cedula</th>
                              <th scope="col">Telefono</th>
                              <th scope="col">Tipo</th>
                              <th scope="col">Marca</th>
                              <th scope="col">Modelo</th>
                              <th scope="col">Recibido</th>
                              <th scope="col">Estado</th>
                              <th scope="col">Tecnico</th>
                              <th scope="col" class="@if (Auth::user()->roles == 1) text-center @endif">Info</th>

                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach($orden as $ordenes)
                            <tr>
                                
                                <td>{{ $ordenes->clientes->nombre }}</td>
                                <td>{{ $ordenes->clientes->cedula }}</td>
                                <td>{{ $ordenes->clientes->telefono }}</td>
                                <td>{{ $ordenes->tipo}}</td>
                                <td>{{ $ordenes->marca}}</td>
                                <td>{{ $ordenes->modelo}}</td>                            
                                <td>{{ $ordenes->created_at}}</td>                            
                                <td>{{ $ordenes->estado}}</td>                            
                                <td>{{$ordenes->tecnico->name}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col @if (Auth::user()->roles == 1) px-0 @endif">
                                            <a href="/cliente/{{ $ordenes->id }}"  class="btn btn-primary btn-sm text-bolder">+</a>
                                        </div>
                                        @if (Auth::user()->roles == 1)
                                            <div class="col px-0">
                                                <form action='/cliente/{{$ordenes->id}}/eliminar' method='GET'>
                                                    
                                                    <button type="submit"  class="btn btn-danger btn-sm text-bolder ">x</button>
                                                </form>
                                            </div>
                                            <div class="col pl-0">
                                                <a href="/cliente/{{ $ordenes->id }}/edit"  class="btn btn-success btn-sm text-bolder ml-1">editar</a>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    
                                        
                                        
                                        
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
    </div>

    <script>
        const checkbox = document.getElementById('customSwitch1')
        const input1 = document.getElementById('input1')
        const desde = document.getElementById('desde')
        const hasta = document.getElementById('hasta')

        checkbox.addEventListener('change', (event) => {
        if (event.currentTarget.checked) {
            input1.disabled = true;
            desde.disabled = false;
            hasta.disabled = false;
        } else {
            input1.disabled = false;
            desde.disabled = true;
            hasta.disabled = true;
        }
        })
    </script>


@endsection