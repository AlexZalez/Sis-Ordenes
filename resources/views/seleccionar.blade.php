@extends('layouts.app')

@section('content')

    <div class="container mt-3 ">

        <div class="row ml- justify-content-start">
            <div class="col-2"></div>
            <div class="col-3">
                <form action="{{ route('buscarSel') }}" method="post">
                    @csrf
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                        <input name="criterio" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    </div>
                </form>
            </div><div class="col-7"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <form action="/equipo" method="post">
                    @csrf
                    <div class="table-responsive" style="height: 400px;">
                        <table class="table table-hover" >
                            <thead class="thead-dark sticky-top">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Numero</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orden as $ordenes)
                                <tr>
                                    
                                    <td>                                    
                                            <input type="radio" class="" name="id" value="{{ $ordenes->id }}">  
                                    </td>
                                    <td>{{ $ordenes->nombre }}</td>
                                    <td>{{ $ordenes->cedula }}</td>
                                    <td>{{ $ordenes->telefono }}</td>
                                </tr>                          
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-end">
                        @error('id') 
                        <strong class="text-danger mr-2 mt-2">Debes seleccionar un cliente!</strong>
                        @enderror
                        <button type="submit" class="btn btn-primary float-right">Enviar</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
 
      
      
      

@endsection