<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $cargos=Cargo::all();
        //dd($cargos);
        return view ('super.baseCargos', [
            'cargos' => $cargos,
        ]);
    }

    public function create(){
        return view ('super.baseCargosCreate');
    }
    
    public function edit(Cargo $cargo){
        return view ('super.baseCargosEdit',['cargo'=>$cargo]);
    }

    public function update(Request $request, Cargo $cargo){
        $request->validate([
            'nombre' => 'required',
        ]);
        $cargo->update($request->all());

        return redirect()->route('super.baseCargos')->with('delete1','REGISTRO ACTUALIZADO');
    }


    public function store(Request $request){
        $this->validate($request,[
            'nombre'=>['required'],
        ]);

        Cargo::create([
            'nombre'=>$request->nombre,
        ]);

        return redirect()->route('super.baseCargos')->with('delete1','REGISTRO EXITOSO');

    }


    public function destroy(Cargo $cargo){
        if(auth()->user()->tipo_usuario_id === 1){
            $cargo->delete();
            return redirect()->route('super.baseCargos')->with('delete1', 'EL REGISTRO SE HA ELIMINADO CORRECTAMENTE');
        }
        return back()->with('delete0', 'NO FUE POSIBLE ELIMINAR EL REGISTRO');
    }
}
