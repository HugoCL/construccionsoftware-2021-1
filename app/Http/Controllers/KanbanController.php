<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use App\Models\kanban;
use Illuminate\Http\Request;

class KanbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareasBacklog = Backlog::all();
        return view ('KanbanComponent'); 
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
        $nuevaTarea = new Backlog();
        $nuevaTarea->nombre = $request->nombre;
        $nuevaTarea->id_proyecto = $request->id_proyecto;
        $nuevaTarea->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kanban  $kanban
     * @return \Illuminate\Http\Response
     */
    public function show(kanban $kanban)
    {
        return $kanban;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kanban  $kanban
     * @return \Illuminate\Http\Response
     */
    public function edit(kanban $kanban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kanban  $kanban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarea = Backlog::find($id);
        $tarea->nombre = $request->nombre;
        $tarea->id_proyecto = $request->id_proyecto;

        $tarea ->save();
        return $tarea;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kanban  $kanban
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tareaBacklog = Backlog::find($id);
        $tareaBacklog->delete();
    }
}
