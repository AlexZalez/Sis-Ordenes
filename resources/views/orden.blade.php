@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
      <div class="row">
        <div class="col "></div>
          <div class="col-8 ">
            <div class="card">
              <h4 class="card-header text-center p-2">Crear Cliente</h4>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <!-- Agrega Cliente -->
                    <form action="/cliente" method="post">
                      @csrf
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="">Nombre:</label>
                                  <input value="{{ old('nombre')}}"  type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Fulanito" name="nombre" >                  
                                  @error('nombre')<small id="emailHelp" class="form-text text-muted">{{ $message }}</small>@enderror
                              </div>
                          </div>
                          <div class="col-6">
                            @if($selecciona) 
                              <div class="alert alert-primary" role="alert">
                                <h5 class="alert-heading text-center">Cedula ya registrada</h5>
                                <a class="btn btn-dark btn-sm" href="/seleccionar">Seleccionar Cliente</a>
                                <p class="mb-0"></p>
                              </div>
                            @endif
                          </div>
                      </div>   
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="">Cedula:</label>
                            <input value="{{ old('cedula')}}" type="text" class="form-control @error('cedula') is-invalid @enderror" placeholder="12.345.678" name="cedula">                  
                            @error('cedula')<small id="emailHelp" class="form-text text-muted">{{ $message }}</small>@enderror
                          </div>
                        </div>
                        <div class="col-6">
                          
                        </div>
                      </div>  
                      <div class="row">
                          <div class="col-2">
                              <label for="inputState">Telefono</label>
                              <select name="prefijo" class="form-control @error('prefijo') is-invalid @enderror">
                                @if(old('prefijo')) <option selected value="{{ old('prefijo') }}"> {{ old('prefijo') }}</option> @else <option selected value="">Elegir</option> @endif
                                  <option value="0424">0424</option>
                                  <option value="0412">0412</option>
                                  <option value="0416">0416</option>
                                  <option value="0426">0426</option>
                                  <option value="0414">0414</option>
                                  <option value="0244">0244</option>
                              </select>
                              @error('prefijo')<small id="emailHelp" class="form-text text-muted">{{ $message }}</small>@enderror
                          </div>
                          <div class="col-4">
                              <label for="">&nbsp;</label>
                              <input value="{{ old('telefono') }}" type="text" class="form-control @error('telefono') is-invalid @enderror" placeholder="123-45-67" name="telefono">
                              @error('telefono')<small id="emailHelp" class="form-text text-muted">{{ $message }}</small>@enderror
                          </div>
                          <div class="col-6">
                           
                          </div>
                      </div>
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