<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $data=TipoUsuario::all();
        return view ('super.baseTiposUsuarios', [
            'data' => $data,
        ]);
    }

    public function create(){
        return view ('super.baseTiposUsuariosCreate');
    }
    
    public function edit(TipoUsuario $tipoUsuario){
        return view ('super.baseTiposUsuariosEdit',['data'=>$tipoUsuario]);
    }

    public function update(Request $request, TipoUsuario $tipoUsuario){
        $request->validate([
            'nombre' => 'required',
        ]);
        $tipoUsuario->update($request->all());

        return redirect()->route('super.baseTiposUsuarios')->with('delete1','REGISTRO ACTUALIZADO');
    }


    public function store(Request $request){
        $this->validate($request,[
            'nombre'=>['required'],
        ]);

        TipoUsuario::create([
            'nombre'=>$request->nombre,
        ]);

        return redirect()->route('super.baseTiposUsuarios')->with('delete1','REGISTRO EXITOSO');

    }

    public function destroy(TipoUsuario $tipoUsuario){
        if(auth()->user()->tipo_usuario_id === 1){
            $tipoUsuario->delete();
            return redirect()->route('super.baseTiposUsuarios')->with('delete1', 'EL REGISTRO SE HA ELIMINADO CORRECTAMENTE');
        }
        return back()->with('delete0', 'NO FUE POSIBLE ELIMINAR EL REGISTRO');
    } 
}
