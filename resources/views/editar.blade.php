@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
  
  <div class="row">
    <div class="col"></div>
    <div class="col-6">
      <div class="card-header bg-success">
        <span class="font-weight-bold">Editar Cliente y Equipo</span>
      </div>
      <div class="card card-body bg-dark text-white rounded-bottom">
        <form action="/cliente/editar/actualizar" method="post">
          @csrf
          <div class="form-row">
            <div class="col-4">
              <label for="">Nombre:</label>
              <input value="@if($orden->clientes->nombre){{$orden->clientes->nombre}} @else{{ old('nombre')}}@endif"  type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Fulanito" name="nombre" >                  
              @error('nombre')<small id="emailHelp" class="form-text text-muted">{{ $message }}</small>@enderror
            </div>
            <div class="col-3">
              <label for="">Cedula:</label>
              <input value="@if($orden) {{$orden->clientes->cedula}} @else{{ old('cedula')}}@endif" type="text" class="form-control @error('cedula') is-invalid @enderror" placeholder="12.345.678" name="cedula">                  
              @error('cedula')<small id="emailHelp" class="form-text text-muted">{{ $message }}</small>@enderror
            </div>
            <div class="col-3 ">
              <label for="">Telefono:</label>
              <input value="@if($orden) {{$orden->clientes->telefono}} @else{{ old('telefono') }}@endif" type="text" class="form-control rounded-left @error('telefono') is-invalid @enderror" placeholder="04241234567" name="telefono">
              @error('telefono')<small id="emailHelp" class="form-text text-muted">{{ $message }}</small>@enderror
            </div>
          </div>
          <div class="form-row mt-2"> {{-- Fila Equipo --}}
            <div class="col-4 ">
              <small id="" class="form-text h6">Tipo de Equipo:</small>
              <input type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" placeholder="PC, Modem, Impresora" value="@if($orden){{$orden->tipo}} @else{{ old('tipo') }}@endif">
              @error('tipo')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
            </div>
            <div class="col-4 ">
              <small id="" class="form-text h6">Marca de Equipo:</small>
              <input type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" placeholder="Dell, HP, Sony" value="@if($orden) {{$orden->marca}} @else{{ old('marca') }}@endif">
              @error('marca')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
            </div>
            <div class="col-4 " >
              <small id="" class="form-text h6">Modelo de Equipo:</small>
              <input type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" placeholder="" value="@if($orden) {{$orden->modelo}} @else{{ old('modelo') }}@endif">
              @error('modelo')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
            </div>
          </div>  
          <div class="form-row">
            <div class="col-6 mt-3">
              <small id="" class="form-text h6">Diagnostico Inicial:</small>
                <textarea class="form-control rounded @error('diagnostico_i') is-invalid @enderror" name="diagnostico_i" placeholder="fallas presentadas" cols="46" rows="3">@if($orden) {{$orden->diagnostico_i}} @else{{ old('diagnostico_i') }}@endif</textarea>
                @error('diagnostico_i')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror                              
            </div>
            <div class="col-6 mt-3">
              <small id="" class="form-text h6">Diagnostico Proceso:</small>
                <textarea class="form-control rounded @error('diagnostico_p') is-invalid @enderror" name="diagnostico_p" placeholder="fallas presentadas" cols="46" rows="3">@if($orden) {{$orden->diagnostico_p}} @else{{ old('diagnostico_i') }}@endif</textarea>
                @error('diagnostico_p')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror                              
            </div>
          </div>
          <div class="form-row">
            <div class="col-6 mt-3">
              <small id="" class="form-text h6">Diagnostico de Entrega:</small>
                <textarea class="form-control rounded @error('diagnostico_f') is-invalid @enderror" name="diagnostico_f" placeholder="fallas presentadas" cols="46" rows="3">@if($orden) {{$orden->diagnostico_f}} @else{{ old('diagnostico_i') }}@endif</textarea>
                @error('diagnostico_f')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror                              
            </div>
            <div class="col-6 mt-3">
              <div class="form-group">
                <label for="">Estado:</label>
                <select class="form-control" name="estado">
                  <option @if($orden->estado == 'pendiente' ) selected  @endif value="pendiente">Pendiente</option>
                  <option @if($orden->estado == 'proceso') selected  @endif value="proceso">En Proceso</option>
                  <option @if($orden->estado == 'terminado') selected  @endif value="terminado">Terminado</option>
                </select>
              </div>
            </div>
          </div>
          <input hidden type="text" name="id_equipo" value="{{$orden->id}}">
          <input hidden type="text" name="id_cliente" value="{{$orden->clientes->id}}">
          <input type="submit" value="Enviar" class="btn mt-4 btn-success float-right">
          
        </form>
      </div>
        
    </div>{{-- Row de Editar Usuario --}}

    <div class="col">
      {{-- <div class="card card-body">
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
      </div> --}}
    </div>

    <div class="col-12">
      
    </div>

  </div>
  
    
  </div>
</div>
@endsection