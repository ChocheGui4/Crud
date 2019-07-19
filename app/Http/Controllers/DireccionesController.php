<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccion;
use DB;
class DireccionesController extends Controller
{
    public function index()
    {
        $direccion= Direccion::orderBy('id','ASC')->paginate(5);
        return view('direccion.index', compact('direccion'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('direccion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'calle' => 'required',
            'numero' => 'required',
            'colonia' => 'required',
            'delegacion' => 'required',
            'usuarios_id' => 'required',
        ]);
  
        Direccion::create($request->all());
   
        return redirect()->route('usuario.index')
                        ->with('success','Usuario creado con éxito.');
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
        
        $direccion=Direccion::where("usuarios_id","=",$id)->get();

        /*$res = DB::table('usuarios')
        ->join('direccions','usuarios.id', '=','direccions.usuarios_id')
        ->select()->where('usuarios_id',$id)->get();*/
        
        

        return view('direccion.edit', compact('direccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'calle' => 'required',
            'numero' => 'required',
            'colonia' => 'required',
            'delegacion' => 'required',
            'usuarios_id' => 'required'
        ]);
        $direccion = Direccion::find($id);
        $direccion->calle = $request->get('calle');
        $direccion->numero = $request->get('numero');
        $direccion->colonia = $request->get('colonia');
        $direccion->delegacion = $request->get('delegacion');
        $direccion->usuarios_id = $request->get('usuarios_id');
        $direccion->save();

        
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
        
    }
}
