<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class equipoController extends Controller
{

    public function index()
    {
        return Equipo::all();
    }
    public function store(Request $request)
    {
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->id_project = $request->id_project;
        $equipo->save();

        return $equipo;
    }


    public function update(Request $request, $id)
    {
        //
        $equipo = Equipo::find($id);
        $equipo->nombre = $request->nombre;
        $equipo->id_project = $request->id_project;
        $equipo->save();

        return $equipo;
    }
}
