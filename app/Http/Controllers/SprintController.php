<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Compound;

/**
 * Class SprintController
 *
 * @package App\Http\Controllers
 *
 * Este controlador se creo para realizar las acciones de un sprint,
 * por ahora no se sabe si en realidad es necesaria, ya que como no eran conocidos
 * el envio de variable mediante las vistas blade.php , por lo mismo se modifico la estructura de los metodos: index y show
 * por ahora se continua trabajando con SprintContainerController
 */
class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idProyecto)
    {
        //
        $sprints = DB::table('sprints')->where('id_proyecto', $idProyecto)->get()->all();
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
    public function show($idProyecto, $idSprint)
    {
        //


        //Aqui es probable que se deba cambiar tareas por tasks
        $tareas = DB::table('tareas')->where('id_proyecto', $idProyecto);
        $tareas = $tareas->select('*')->where('id_sprint', $idSprint)->get();

        return $tareas;

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
