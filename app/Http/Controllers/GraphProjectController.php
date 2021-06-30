<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $GraphProject->estado_proyecto= $request-> estado_proyecto;
        $GraphProject->estado_tarea= $request-> estado_tarea;

        $GraphProject>save();

        return $GraphProject;
    }
    public function dates($GraphProject)
    {
        $tareas_totales = DB::table('Tarea')->count();
        $tareas_hechas =DB::TABLE('select * from Tarea where estado = :estado', ['estado' => 'hecho'])->count();
        $tareas_pendientes =DB::TABLE('select * from Tarea where estado = :estado', ['estado' => 'pendiente'])->count();
        $tareas_no_hechas =DB::TABLE('select * from Tarea where estado = :estado', ['estado' => 'no hecho'])->count();

        return [$tareas_totales, $tareas_hechas, $tareas_pendientes, $tareas_no_hechas];
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
