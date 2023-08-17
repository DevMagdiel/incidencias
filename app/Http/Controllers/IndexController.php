<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except('index');
    }
    public function index (){
        
        if(auth()->user()){
            switch (auth()->user()->tipo_usuario_id) {
                case 1:
                    return redirect()->route('super.equiposAsignados');
                    break;
                case 2:
                    return redirect()->route('adm.equiposAsignados');
                    break;
                case 3:
                    return redirect()->route('general.equiposAsignados');
                    break;
            }
        }

        return view ('index');

    }

    public function baseDatos(){
        return view('super.baseDatos');
    }
}
