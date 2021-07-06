<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class equipoController extends Controller
{
    public function edit($id){
        $equipo = Equipo::find($id);
        return view('AddProyectComponent')->with($equipo);
    }
}
