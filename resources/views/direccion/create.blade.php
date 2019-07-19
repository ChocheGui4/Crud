@extends('layouts.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar dirección</h2>
        </div>
        
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>cuidado!</strong> Hay algún problema con tus datos<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('direccion.store') }}" method="POST">
    @csrf
        
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Calle:</strong>
                <input type="text" name="calle" class="form-control" placeholder="Abasolo">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Número:</strong>
                <input type="text" name="numero" class="form-control" placeholder="4">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Colonia:</strong>
                <input type="text" name="colonia" class="form-control" placeholder="Ixtacuixtla">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Delegación:</strong>
                <input type="text" name="delegacion" class="form-control" placeholder="Benito Juárez">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong hidden="true" >Número de usuario:</strong>
                <input type="text" name="usuarios_id" hidden="true" value="{{ Session::get('id') }}" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </div>
   
</form>
@endsection