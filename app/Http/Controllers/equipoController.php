<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Integrante;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class equipoController extends Controller
{
    public function index()
    {
        return Equipo::all();
    }

    public function edit($id)
    {
        $equipo = Equipo::find($id);
        return view('AddProyectComponent')->with($equipo);
    }

    public function update(Request $request, $id, $integrantes)
    {
        //
        $equipo = Equipo::find($id);
        $equipo->integrantes = $integrantes;
        $equipo->nombre = $request->nombre;
        $equipo->id_project = $request->id_project;
        $equipo->save();

        return $equipo;
    }

    public function destroy($id)
    {
        if ($id== auth()->id()) {
            $equipo = Equipo::find($id);
            $equipo->delete();
        } else {
            return view('home');
        }
    }

    public function store(Request $request)
    {
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->id_project = $request->id_project;
        $equipo->save();

        return $equipo;
    }
}
