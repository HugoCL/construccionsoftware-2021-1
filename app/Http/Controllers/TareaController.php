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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        return view('TaskComponent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $tarea = new Tarea();
        return view('create.task', compact('tarea'));
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
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        //
        $tarea = Tarea::find($id);
        return view('show.task', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return  \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //
        $tarea = Tarea::find($id);
        return view('task.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
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
     * @param  int  $id
     * @return void
     */
    public function destroy(Tarea $id)
    {
        //
    }
}
