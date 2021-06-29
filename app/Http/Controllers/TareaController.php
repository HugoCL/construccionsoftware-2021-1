<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
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
    public function show($id)
    {
        //
        $tarea = Tarea::find($id);
        return view('show.tarea', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tarea $tarea
     * @return void
     */
    public function edit($id)
    {
        //
        $tarea = Tarea::find($id);
        return view('proyect.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tarea $tarea
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
        $tarea = Tarea::find($id);;
        $tarea->id = $request->id_tarea;
        $tarea->id_proyecto = $request->id_proy;
        $tarea->estado = $request->status;
        $tarea->descripcion = $request->description;
        $tarea->save();

        return $tarea;
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
