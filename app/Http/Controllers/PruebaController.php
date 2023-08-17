<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Reporte;
use App\Models\User;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','test']);
    }

    public function index (){
        
        
        dd(User::find(3)->reportes);



        return view ('general.equiposAsignados');
    }
}
