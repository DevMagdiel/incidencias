<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'clave'=>['required',],
            'password'=>['required',],
        ]);

        if(!auth()->attempt($request->only('clave','password'))){
            return back()->with('mensaje','Credenciales incorrectas');
        }
        
        

        switch (auth()->user()->tipo_usuario_id) {
            case 1:
                return redirect()->route('super.misIncidencias');
                break;
            case 2:
                return redirect()->route('adm.misIncidencias');
                break;
            case 3:
                return redirect()->route('general.equiposAsignados');
                break;
        }
        return redirect()->route('index');

    }
}
