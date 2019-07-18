@extends('layouts.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.7 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('usuario.create') }}"> Create New Product</a>
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
   
                    <a class="btn btn-info" href="{{ route('usuario.show',$usuario->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('usuario.edit',$usuario->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $usuarios->links() !!}
      
@endsection