<?php

namespace App\Http\Controllers;
use App\Models\Integrante;
use Illuminate\Http\Request;

class IntegrantesController extends Controller
{

    public function index()
    {
        return Integrante::all();
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        $integrante = new Integrante();
        $integrante->id_equipo = $request->id_equipo;
        $integrante->id_proyecto = $request->id_equipo;
        $integrante->id_user = $request->id_equipo;
        $integrante->save();

        return $integrante;
    }
}
