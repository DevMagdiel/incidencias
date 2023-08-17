<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\EstatusReporte;
use App\Models\Reporte;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $data=Reporte::orderByDesc('id')->get();
        return view ('super.baseReportes', [
            'data' => $data,
        ]);
    }

    public function reportesLevantados (){
        if(auth()->user()){
            $data=auth()->user()->reportes;
            switch (auth()->user()->tipo_usuario_id) {
                case 1:
                    return view('super.reportesLevantados',['data' => $data]);
                    break;
                case 2:
                    return view('adm.reportesLevantados',['data' => $data]);
                    break;
                case 3:
                    return view('general.reportesLevantados',['data' => $data]);
                    break;
            }
        }
        
    }

    public function show(Reporte $reporte){
        if(auth()->user()){
            switch (auth()->user()->tipo_usuario_id) {
                case 1:
                    return view("super.reporteIndividual",[
                        "data" => $reporte,
                    ]);
                    break;
                case 2:
                    return view("adm.reporteIndividual",[
                        "data" => $reporte,
                    ]);
                    break;
                case 3:
                    return view("general.reporteIndividual",[
                        "data" => $reporte,
                    ]);
                    break;
            }
        }
    }

    public function revision(Reporte $reporte){
        if(auth()->user()){
            $responsable=User::where('tipo_usuario_id','<', 3)->get();
            switch (auth()->user()->id) {
                case 1:
                    return view("super.reportesNuevosRevision",[
                        "data" => $reporte,
                        "responsable" => $responsable,
                    ]);
                    break;
                case 2:
                    return redirect()->route('adm.equiposAsignados');
                    break;
                case 3:
                    return redirect()->route('general.equiposAsignados');
                    break;
            }
        }
    }

    public function showAsignacion(Reporte $reporte){
        if(auth()->user()){
            switch (auth()->user()->id) {
                case 1:
                    return view("super.misIncidenciasRevision",[
                        "data" => $reporte,
                    ]);
                    break;
                case 2:
                    return view("adm.misIncidenciasRevision",[
                        "data" => $reporte,
                    ]);
                    break;
                case 3:
                    return redirect()->route('general.equiposAsignados');
                    break;
            }
        }
    }

    public function editarAsignacion(Request $request, Reporte $reporte){
        $this->validate($request,[
            'comentario_solucion'=>['required'],
        ]);
        date_default_timezone_set('America/Mexico_City');
        $fecha=Carbon::now()->format('Y-m-d');
        $reporte->update([
            'estatus_id'=>3,
            'fecha_solucion'=>$fecha,
            'comentario_solucion'=>$request->comentario_solucion,
            'evidencia_solucion'=>$request->evidencia_problema,
        ]);
        switch (auth()->user()->tipo_usuario_id) {
            case 1:
                return redirect()->route('super.misIncidencias')->with('delete1','SOLUCION ENVIADA');
            case 2:
                return redirect()->route('adm.misIncidencias')->with('delete1','SOLUCION ENVIADA');
        }
    }

    public function editarRevision(Request $request, Reporte $reporte){
        $this->validate($request,[
            'encargado'=>['required'],
            'fecha_estimada'=>['required'],
        ]);
        $reporte->update([
            'estatus_id'=>2,
            'encargado_id'=>$request->encargado,
            'fecha_estimada'=>$request->fecha_estimada,
        ]);

        return redirect()->route('super.reportesNuevos')->with('delete1','REVISION ENVIADA');
    }


    public function misIncidencias (){
        if(auth()->user()){
            $data=auth()->user()->reporteEncargado;
            switch (auth()->user()->tipo_usuario_id) {
                case 1:
                    return view('super.misIncidencias',['data' => $data]);
                    break;
                case 2:
                    return view('adm.misIncidencias',['data' => $data]);
                    break;
            }
        }
        
    }
    public function reportesNuevos (){
        if(auth()->user()){
            if(auth()->user()->tipo_usuario_id==1){
                $data=Reporte::where('encargado_id',null)->orderByDesc('id')->get();
                return view('super.reportesNuevos',['data' => $data]);
            }
        }
        
    }
    public function incidenciasTotales (){
        if(auth()->user()){
            if(auth()->user()->tipo_usuario_id==1){
                $data=Reporte::orderByDesc('id')->get();
                return view('super.incidenciasTotales',['data' => $data]);
            }
        }
        
    }

    public function create(){
        $responsable=User::where('tipo_usuario_id', '<', 3)->get();
        $equipo=Equipo::all();
        $estatus=EstatusReporte::all();
        return view ('super.baseReportesCreate',[
            'responsable' => $responsable,
            'estatus' => $estatus,
            'equipo' => $equipo,
        ]);
    }
    public function levantarReporte(){
        if(auth()->user()){
            $equipo=auth()->user()->equipos;
            switch (auth()->user()->tipo_usuario_id) {
                case 1:
                    return view ('super.levantarReporte',[
                        'equipo' => $equipo,
                    ]);
                    break;
                case 2:
                    return view ('adm.levantarReporte',[
                        'equipo' => $equipo,
                    ]);
                    break;
                case 3:
                    return view ('general.levantarReporte',[
                        'equipo' => $equipo,
                    ]);
                    break;
            }
        }   
    }
    
    public function edit(Reporte $reporte){
        $responsable=User::where('tipo_usuario_id','<', 3)->get();
        $equipo=Equipo::all();
        $estatus=EstatusReporte::all();
        return view ('super.baseReportesEdit',[
            'data'=>$reporte,
            'responsable' => $responsable,
            'estatus' => $estatus,
            'equipo' => $equipo,
        ]);
    }

    public function update(Request $request, Reporte $reporte){
        $this->validate($request,[
            'equipo'=>['required'],
            'estatus'=>['required'],
            'encargado'=>['required'],
            'titulo'=>['required'],
            'comentario'=>['required'],
            'fecha_inicial'=>['required'],
            'fecha_estimada'=>['required'],
        ]);
        $responsable=Equipo::find($request->equipo)->responsable_id;
        $reporte->update([
            'equipo_id'=>$request->equipo,
            'responsable_id'=>$responsable,
            'estatus_id'=>$request->estatus,
            'encargado_id'=>$request->encargado,
            'titulo'=>$request->titulo,
            'comentario'=>$request->comentario,
            'fecha_inicial'=>$request->fecha_inicial,
            'fecha_estimada'=>$request->fecha_estimada,
            'fecha_solucion'=>$request->fecha_solucion,
        ]);

        return redirect()->route('super.baseReportes')->with('delete1','REGISTRO ACTUALIZADO');
    }


    public function store(Request $request){
        
        $this->validate($request,[
            'equipo'=>['required'],
            'estatus'=>['required'],
            'encargado'=>['required'],
            'titulo'=>['required'],
            'comentario'=>['required'],
            'fecha_inicial'=>['required'],
            'fecha_estimada'=>['required'],
        ]);
        $responsable=Equipo::find($request->equipo)->responsable_id;
        
        Reporte::create([
            'equipo_id'=>$request->equipo,
            'responsable_id'=>$responsable,
            'estatus_id'=>$request->estatus,
            'encargado_id'=>$request->encargado,
            'titulo'=>$request->titulo,
            'comentario'=>$request->comentario,
            'fecha_inicial'=>$request->fecha_inicial,
            'fecha_estimada'=>$request->fecha_estimada,
            'fecha_solucion'=>$request->fecha_solucion,
        ]);

        return redirect()->route('super.baseReportes')->with('delete1','REGISTRO EXITOSO');

    }
    public function guardarReporte(Request $request){
        
        $this->validate($request,[
            'equipo'=>['required'],
            'titulo'=>['required'],
            'comentario'=>['required'],
        ]);
        date_default_timezone_set('America/Mexico_City');
        $fecha=Carbon::now()->format('Y-m-d');
        $responsable=auth()->user()->id;
        Reporte::create([
            'equipo_id'=>$request->equipo,
            'responsable_id'=>$responsable,
            'estatus_id'=>1,
            'titulo'=>$request->titulo,
            'comentario'=>$request->comentario,
            'fecha_inicial'=>$fecha,
            'evidencia_problema'=>$request->evidencia_problema,
            
        ]);

        switch (auth()->user()->tipo_usuario_id) {
            case 1:
                return redirect()->route('super.reportesLevantados')->with('delete1','REGISTRO EXITOSO');
                break;
            case 2:
                return redirect()->route('adm.reportesLevantados')->with('delete1','REGISTRO EXITOSO');
                break;
            case 3:
                return redirect()->route('general.reportesLevantados')->with('delete1','REGISTRO EXITOSO');
                break;
        }

        
    }

    public function destroy(Reporte $reporte){
        if(auth()->user()->tipo_usuario_id === 1){
            $reporte->delete();
            return redirect()->route('super.baseReportes')->with('delete1', 'EL REGISTRO SE HA ELIMINADO CORRECTAMENTE');
        }
        return back()->with('delete0', 'NO FUE POSIBLE ELIMINAR EL REGISTRO');
    } 
}
