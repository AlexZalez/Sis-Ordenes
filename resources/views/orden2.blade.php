@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
      <div class="row">
        <div class="col "></div>
          <div class="col-8 ">
            <div class="card">
              <h4 class="card-header text-center p-2">Crear Equipo</h4>
              <div class="card-body">
                <form action="/equipo/create" method="post">
                  @csrf
                <div class="row">
                  <div class="col-12">
                    <!-- Agrega Equipo -->
                      <div class="form-row @error('cliente_id') is-invalid @enderror"> {{-- Fila Cliente --}}
                        <div class="col-2">
                          <a class="btn btn-dark btn-md mt-3" href="/seleccionar"><small>Seleccionar Cliente</small></a>
                        </div>
                        <div class="col-3"> {{-- columna --}}
                          <div class="form-group">
                              <small class="form-text text-muted">Nombre</small>
                              <input readonly @if($cliente) value="{{ $cliente->nombre}}"@endif value="{{ old('nombre') }}" name='nombre' type="text" class="form-control form-control-sm " >
                          </div>
                        </div>
                        <div class="col-2"> {{-- columna --}}
                          <div class="form-group">
                            <small id="" class="form-text text-muted">Cedula</small>
                            <input readonly @if($cliente) value="{{ $cliente->cedula}}"@endif value="{{ old('cedula') }}" name="cedula" type="text" class="form-control form-control-sm ">
                          </div>
                        </div>
                        <div class="col-2"> {{-- columna --}}
                          <small id="" class="form-text text-muted">Telefono</small>
                          <div class="input-group mb-2">
                            <input readonly @if($cliente) value="{{ $cliente->telefono}}"@endif value="{{ old('telefono') }}" name="telefono" type="text" class="form-control-sm ml-1 rounded form-control ">
                          </div>
                        </div>                      
                      </div>
                      
                      <div class="card card-body bg-light border border-dark">
                        <div class="form-row mt-2"> 
                          <div class="col-4 ">
                            <small id="" class="form-text h6">Tipo de Equipo:</small>
                            <input type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" placeholder="PC, Modem, Impresora" value="{{ old('tipo') }}">
                            @error('tipo')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                          </div>
                          <div class="col-4 ">
                            <small id="" class="form-text h6">Marca de Equipo:</small>
                            <input type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" placeholder="Dell, HP, Sony" value="{{ old('marca') }}">
                            @error('marca')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                          </div>
                          <div class="col-4 " >
                            <small id="" class="form-text h6">Modelo de Equipo:</small>
                            <input type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" placeholder="" value="{{ old('modelo') }}">
                            @error('modelo')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                          </div>
                        </div>  
                        <div class="form-row">
                          <div class="col-6 mt-3">
                            <small id="" class="form-text h6">Diagnostico Inicial:</small>
                              <textarea class="form-control rounded @error('diagnostico_i') is-invalid @enderror" name="diagnostico_i" placeholder="fallas presentadas" cols="46" rows="3">{{ old('diagnostico_i') }}</textarea>
                              @error('diagnostico_i')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror                              
                          </div>
                        </div>
                      </div>
                      
                      <input type="number" name="cliente_id" @if($cliente) value="{{ $cliente->id}}"@endif value="{{ old('cliente_id') }}" hidden>
                      <input type="submit" value="Enviar" class="btn mt-4 btn-success float-right">
                    </form>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        <div class="col ">

      </div>
    </div>
</div>
@endsection