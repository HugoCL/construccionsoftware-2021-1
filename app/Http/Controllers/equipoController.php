<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Integrante;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class equipoController extends Controller
{
    public function edit($id){
        $equipo = Equipo::find($id);
        return view('AddProyectComponent')->with($equipo);
    }
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
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
}
