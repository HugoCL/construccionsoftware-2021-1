<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use App\Models\Tarea;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Compound;

class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sprints = Sprint::all();
        return $sprints;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sprint = new Sprint();
        return view('createSprint', compact('sprint'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sprint = new Sprint();
        $sprint->id_proyecto = $request->id_proyecto;
        $sprint->fechaInicio = $request->fechaInicio;
        $sprint->fechaTermino = $request->fechaTermino;
        $sprint->save();
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
        $sprint = Sprint::find($id);
        //$tasks = Tarea::query()->select('*')->where('id_sprint', $id);
        //return view('SprintComponent', compact('sprint','tasks'));
        return $sprint;

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

        $sprint = Sprint::find($id);
        $sprint->fechaInicio = $request->fechaInicio;
        $sprint->fechaTermino = $request->fechaTermino;
        $sprint->save();


        return $sprint;
        //return view('vistaSprints');
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

        $sprint = Sprint::find($id);
        $sprint->delete();

    }
}