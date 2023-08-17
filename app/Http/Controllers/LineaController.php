<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $data=Linea::all();
        //dd($data);
        //dd($cargos);
        return view ('super.baseLineas', [
            'data' => $data,
        ]);
    }

    public function create(){
        return view ('super.baseLineasCreate');
    }
    
    public function edit(Linea $linea){
        return view ('super.baseLineasEdit',['data'=>$linea]);
    }

    public function update(Request $request, Linea $linea){
        $request->validate([
            'nombre' => 'required',
        ]);
        $linea->update($request->all());

        return redirect()->route('super.baseLineas')->with('delete1','REGISTRO ACTUALIZADO');
    }


    public function store(Request $request){
        $this->validate($request,[
            'nombre'=>['required'],
        ]);

        Linea::create([
            'nombre'=>$request->nombre,
        ]);

        return redirect()->route('super.baseLineas')->with('delete1','REGISTRO EXITOSO');

    }

    public function destroy(Linea $linea){
        if(auth()->user()->tipo_usuario_id === 1){
            $linea->delete();
            return redirect()->route('super.baseLineas')->with('delete1', 'EL REGISTRO SE HA ELIMINADO CORRECTAMENTE');
        }
        return back()->with('delete0', 'NO FUE POSIBLE ELIMINAR EL REGISTRO');
    } 
}
