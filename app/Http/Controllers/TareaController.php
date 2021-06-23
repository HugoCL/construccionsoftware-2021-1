<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Tarea
     */
    public function store(Request $request)
    {
        $tarea = new Tarea();
        $tarea->id = $request->id_tarea;
        $tarea->id_proyecto = $request->id_proy;
        $tarea->estado = $request->status;
        $tarea->descripcion = $request->description;
        $tarea->save();

        return $tarea;
    }

    /**
     * Display the specified resource.
     *
     * @param Tarea $tarea
     * @return void
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tarea $tarea
     * @return void
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tarea $tarea
     * @return void
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tarea $tarea
     * @return void
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
