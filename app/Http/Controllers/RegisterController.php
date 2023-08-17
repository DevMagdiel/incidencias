<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Linea;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index (){
        $cargos=Cargo::all();
        $lineas=Linea::all();
        $tipoUsuarios=TipoUsuario::all();
        return view ('auth.register',[
            'cargos' => $cargos,
            'lineas' => $lineas,
            'tipoUsuarios' => $tipoUsuarios,
        ]);
    }

    public function store(Request $request){
        
        //V A L I D A C I O N
        $this->validate($request,[
            'clave'=>['required','unique:users'],
            'name'=>['required'],
            'apellidos'=>[''],
            'telefono'=>[''],
            'edad'=>[''],
            'cargo'=>['required'],
            'linea'=>['required'],
            'tipoUser'=>['required'],
            'email'=>['email'],
            'password'=>['required','confirmed'],
            
        ]);

        User::create([
            'name'=>$request->name,
            'clave'=>$request->clave,
            'apellidos'=>$request->apellidos,
            'telefono'=>$request->telefono,
            'email'=>$request->email,
            'password'=>$request->password,
            'cargo_id'=>$request->cargo,
            'linea_id'=>$request->linea,
            'tipo_usuario_id'=>$request->tipoUser,
        ]);

        return redirect()->route('super.baseDatos');
    }
}
