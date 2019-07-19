<?php
#hh
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
        /*$usuarios = DB::table('usuarios')
        ->join('direccions','usuarios.id', '=','direccions.usuarios_id')
        ->select()
        ->get();*/
        
        
        $usuarios= Usuarios::orderBy('id','ASC')->paginate(5);
        return view('usuario.index', compact('usuarios'))
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
        
        $ided= Usuarios::latest('id')->first();
        $r=$ided->id;
        
        return redirect()->route('direccion.create')
                        ->with('success','Usuario creado.')
                        ->with('id',$r);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuarios::find($id);
        $res=Direccion::where("usuarios_id","=",$id)->get();
        return view('usuario.show', compact('usuario','res'));
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
        $res=Direccion::where("usuarios_id","=",$id)->get();
        
        //dd($usuario);

        /*$usuario = DB::table('usuarios')
        ->join('direccions','usuarios.id', '=','direccions.usuarios_id')
        ->select()
        ->where('usuarios_id', $id);
        dd($usuario);*/
        return view('usuario.edit', compact('usuario','res'));
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
        $usuario->password = $request->get('password');
        $usuario->save();


        return redirect()->route('direccion.edit',$id)
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
        //$direccion=Direccion::find(11);
        $res=Direccion::where("usuarios_id","=",$id);
        $res->delete();
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return redirect()->route('usuario.index')
                        ->with('success','Usuario eliminado.');
    }
}
