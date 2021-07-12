<?php

namespace App\Http\Controllers;


use App\Models\Equipo;
use App\Models\Integrante;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntegrantesController extends Controller
{
    public function index()
    {
       //$integrantes_equipo = DB::table('integrantes')->whereIn('id_proyecto', $id_proyecto)->get();
        //Integrante::all();
       return Integrante::get();
    }

    public function show(Integrante $equipo)
    {
        //
        return $equipo;
    }

    public function store(Request $request)
    {
        $integrante = new Integrante();
        $integrante->id_equipo = $request->id_equipo;
        $integrante->id_proyecto = $request->id_proyecto;
        $integrante->id_user = $request->id_user;
        $integrante->rol = $request->rol;
        $integrante->save();

        return $integrante;
    }
}
