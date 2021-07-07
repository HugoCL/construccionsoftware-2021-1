<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Integrante;
use Illuminate\Http\Request;

class equipoController extends Controller
{
    public function edit($id){
        $equipo = Equipo::find($id);
        $integrantes= Integrante::where('id_proyecto','=',$equipo->id_proyect).andAnyOtherArgs('id_equipo','=',$id);
        return view('AddProyectComponent')->with($equipo,$integrantes);
    }
}
