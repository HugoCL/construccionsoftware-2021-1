<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas_totales = DB::table('Tarea')->count();
        $tareas_hechas = DB::table('Tarea')->where('estado', '=', 'hecho')->count();
        $tareas_pendientes = DB::table('Tarea')->where('estado', '=', 'pendiente')->count();
        $tareas_no_hechas = DB::table('Tarea')->where('estado', '=', 'no-hecho')->count();

        return [$tareas_totales, $tareas_hechas, $tareas_pendientes, $tareas_no_hechas];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $GraphProject = new GraphProject();
        $GraphProject->id = $request->id_GraphProject;
        $GraphProject->id_proyecto = $request->id_proyecto;
        $GraphProject->id_tarea = $request->id_tarea;


        $GraphProject>save();

        return $GraphProject;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
