<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Integrant;
use App\Models\Integrante;
use App\Models\Task;
use Illuminate\Http\Request;

class equipoController extends Controller
{
    public function index()
    {
        //$integr= Task::find($id);
        return Integrante::all();
    }

    public function show(Integrante $integrante)
    {
        return $integrante;
    }

    public function edit($id)
    {
        //$task = Task::find($id);
        $integrantes= Integrante::where('id_proyecto','=',$id);//.andAnyOtherArgs('id_equipo','=',$id);
        return view('AddProyectComponent')->with($integrantes);
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
