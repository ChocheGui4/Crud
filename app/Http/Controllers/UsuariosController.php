<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Usuarios;
use App\Direccion;
use App\Http\Requests\CrearReglas;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultados = DB::table('usuarios')
        ->join('direccions','direccions.id', '=','usuarios.direccion_id')
        ->select('usuarios.name','usuarios.apellidos','usuarios.email','usuarios.password','direccions.calle')
        ->get();
        $res=json_encode($resultados);
        //dd($res);

        
        
        $usuarios= Usuarios::orderBy('id','ASC')->paginate(5);
        return view('usuario.index', compact('usuarios','res'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearReglas $request)
    {
        $request->validate([
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
  
        Usuarios::create($request->all());
   
        return redirect()->route('usuario.index')
                        ->with('success','Usuario creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuarios::find($id);

        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrearReglas $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);


        $usuario = Usuarios::find($id);
        $usuario->name = $request->get('name');
        $usuario->apellidos = $request->get('apellidos');
        $usuario->email = $request->get('email');
        $usuario->email = $request->get('password');
        $usuario->save();

        return redirect()->route('usuario.index')
                        ->with('success','Usuario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return redirect()->route('usuario.index')
                        ->with('success','Usuario eliminado.');
    }
}
