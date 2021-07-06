<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Integrante;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class equipoController extends Controller
{

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
}
