<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Equipo;
use App\Models\EstatusEquipo;
use App\Models\Linea;
use App\Models\User;
use Illuminate\Http\Request;

class EquipoController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $data=Equipo::orderByDesc('id')->get();
        //dd($data);
        //dd($cargos);
        return view ('super.baseEquipos', [
            'data' => $data,
        ]);
    }

    public function create(){
        $responsable=User::all('id','clave','name','apellidos');
        $estatus=EstatusEquipo::all();
        $linea=Linea::all();
        $distrito=Distrito::all();
        return view ('super.baseEquiposCreate',[
            'responsable' => $responsable,
            'estatus' => $estatus,
            'linea' => $linea,
            'distrito' => $distrito,
        ]);
    }
    
    public function edit(Equipo $equipo){
        $responsable=User::all('id','clave','name','apellidos');
        $estatus=EstatusEquipo::all();
        $linea=Linea::all();
        $distrito=Distrito::all();
        return view ('super.baseEquiposEdit',[
            'data'=>$equipo,
            'responsable' => $responsable,
            'estatus' => $estatus,
            'linea' => $linea,
            'distrito' => $distrito,
        ]);
    }

    public function update(Request $request, Equipo $equipo){
        $request->validate([
            'codigo'=>['required'],
            'descripcion'=>['required'],
            'serie'=>['required'],
            'valor'=>['required'],
            'comentario'=>['required'],
            'fecha'=>['required'],
            'estatus'=>['required'],
            'responsable'=>['required'],
            'linea'=>['required'],
            'distrito'=>['required'],
        ]);
        $equipo->update($request->all());

        return redirect()->route('super.baseEquipos')->with('delete1','REGISTRO ACTUALIZADO');
    }


    public function store(Request $request){
        
        $this->validate($request,[
            'codigo'=>['required'],
            'descripcion'=>['required'],
            'serie'=>['required'],
            'valor'=>['required'],
            'comentario'=>['required'],
            'fecha'=>['required'],
            'estatus'=>['required'],
            'linea'=>['required'],
            'distrito'=>['required'],
        ]);
        Equipo::create([
            'codigo'=>$request->codigo,
            'descripcion'=>$request->descripcion,
            'serie'=>$request->serie,
            'valor'=>$request->valor,
            'comentario'=>$request->comentario,
            'fecha_asignacion'=>$request->fecha,
            'responsable_id'=>$request->responsable,
            'linea_id'=>$request->linea,
            'estatus_id'=>$request->estatus,
            'distrito_id'=>$request->distrito,
        ]);

        return redirect()->route('super.baseEquipos')->with('delete1','REGISTRO EXITOSO');

    }





    public function destroy(Equipo $equipo){
        if(auth()->user()->tipo_usuario_id === 1){
            $equipo->delete();
            return redirect()->route('super.baseEquipos')->with('delete1', 'EL REGISTRO SE HA ELIMINADO CORRECTAMENTE');
        }
        return back()->with('delete0', 'NO FUE POSIBLE ELIMINAR EL REGISTRO');
    } 


    public function equiposAsignados(){
        if(auth()->user()){
            $data=auth()->user()->equipos;
            //$data=auth()->user()->equipos()->orderByDesc('id')->get();
            switch (auth()->user()->tipo_usuario_id) {
                case 1:
                    return view('super.equiposAsignados',['data' => $data]);
                    break;
                case 2:
                    return view('adm.equiposAsignados',['data' => $data]);
                    break;
                case 3:
                    return view('general.equiposAsignados',['data' => $data]);
                    break;
            }
        }
        
    }
}
