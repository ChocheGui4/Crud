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
            Editar dirección
          </h2>    
        </div>
      </div>
      <div class="col-4">
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

    @foreach ($direccion as $dir)

      <form method="post" action="{{ route('direccion.update', $dir->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Calle:</label>
          <input type="text" class="form-control" name="calle" value={{ $dir->calle }} />
        </div>
        <div class="form-group">
          <label for="price">Número :</label>
          <input type="text" class="form-control" name="numero" value={{ $dir->numero }} />
        </div>
        <div class="form-group">
          <label for="quantity">Colonia:</label>
          <input type="text" class="form-control" name="colonia" value={{ $dir->colonia }} />
        </div>
        <div class="form-group">
          <label for="quantity">Delegación:</label>
          <input type="text" class="form-control" name="delegacion" value={{ $dir->delegacion }} />
        </div>
        <div class="form-group">
          <label for="quantity" hidden="true" >id de usuario:</label>
          <input type="text" class="form-control" hidden="true" name="usuarios_id" value={{ $dir->usuarios_id }} />
        </div>
            <div class="pull-left">
            <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
         
      </form>
      @endforeach
  </div>
</div>
@endsection