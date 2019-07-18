@extends('layouts.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registro de usuarios CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('usuario.create') }}"> Nuevo usuario</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Contraseña</th>
            
        </tr>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->apellidos }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->password }}</td>
            <td>
                <form action="{{ route('usuario.destroy',$usuario->id) }}" method="POST">
   
                    
    
                    <a class="btn btn-primary" href="{{ route('usuario.edit',$usuario->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</a>


    {!! $usuarios->links() !!}
      
@endsection