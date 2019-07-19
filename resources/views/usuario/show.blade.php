@extends('layouts.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    
    <div class="row" >
      <div class="col-4">
        <div class="pull-left">
          <h2>
            Mostrar datos del usuario
          </h2>    
        </div>
      </div>
      <div class="col-4">
        <div class="pull-right">
          <a class="btn btn-danger" href="{{ route('usuario.index') }}"> Back</a>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    @foreach ($res as $r)
      
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input disabled="true" type="text" class="form-control" name="name" value={{ $usuario->name }} />
        </div>
        <div class="form-group">
          <label for="price">Apellidos :</label>
          <input disabled="true" type="text" class="form-control" name="apellidos" value={{ $usuario->apellidos }} />
        </div>
        <div class="form-group">
          <label for="quantity">Correo:</label>
          <input disabled="true" type="text" class="form-control" name="email" value={{ $usuario->email }} />
        </div>
        <div class="form-group">
          <label for="quantity">Contraseña:</label>
          <input disabled="true" type="text" class="form-control" name="password" value={{ $usuario->password }} />
        </div>
        <div class="form-group">
          <label for="quantity">Calle:</label>
          <input disabled="true" type="text" class="form-control" name="password" value={{ $r->calle }} />
        </div>
        <div class="form-group">
          <label for="quantity">Número:</label>
          <input disabled="true" type="text" class="form-control" name="password" value={{ $r->numero }} />
        </div>
        <div class="form-group">
          <label for="quantity">Colonia:</label>
          <input disabled="true" type="text" class="form-control" name="password" value={{ $r->colonia }} />
        </div>
        <div class="form-group">
          <label for="quantity">Delegación:</label>
          <input disabled="true" type="text" class="form-control" name="password" value={{ $r->delegacion }} />
        </div>
            
         
      
      @endforeach
  </div>
</div>
@endsection