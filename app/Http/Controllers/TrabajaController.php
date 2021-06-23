<?php

namespace App\Http\Controllers;

use App\Models\Trabaja;
use Illuminate\Http\Request;

class TrabajaController extends Controller
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
        $trabaja = new Trabaja();
        $trabaja->id_proyecto=$request->id_proyecto;
        $trabaja->id_tarea=$request->id_tarea;
        $trabaja->id_usuario=$request->id_usuario;
        $trabaja->duracion=$request->duracion;
        $trabaja->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabaja  $trabaja
     * @return \Illuminate\Http\Response
     */
    public function show(Trabaja $trabaja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabaja  $trabaja
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabaja $trabaja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabaja  $trabaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabaja $trabaja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabaja  $trabaja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabaja $trabaja)
    {
        //
    }
}
