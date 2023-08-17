<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $data=Distrito::all();
        return view ('super.baseDistritos', [
            'data' => $data,
        ]);
    }

    public function create(){
        return view ('super.baseDistritosCreate');
    }
    
    public function edit(Distrito $distrito){
        return view ('super.baseDistritosEdit',['data'=>$distrito]);
    }

    public function update(Request $request, Distrito $distrito){
        $request->validate([
            'distrito' => 'required',
        ]);
        $distrito->update($request->all());

        return redirect()->route('super.baseDistritos')->with('delete1','REGISTRO ACTUALIZADO');
    }


    public function store(Request $request){
        $this->validate($request,[
            'distrito'=>['required'],
        ]);

        Distrito::create([
            'distrito'=>$request->distrito,
        ]);

        return redirect()->route('super.baseDistritos')->with('delete1','REGISTRO EXITOSO');

    }

    public function destroy(Distrito $distrito){
        if(auth()->user()->tipo_usuario_id === 1){
            $distrito->delete();
            return redirect()->route('super.baseDistritos')->with('delete1', 'EL REGISTRO SE HA ELIMINADO CORRECTAMENTE');
        }
        return back()->with('delete0', 'NO FUE POSIBLE ELIMINAR EL REGISTRO');
    } 

}
