<?php

namespace App\Http\Controllers;

use App\Models\Participate;
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
        $tareas_totales = DB::table('tareas')->count();
        $tareas_hechas = DB::table('tareas')->where('estado', '=', 'hecho')->count();
        $tareas_pendientes = DB::table('tareas')->where('estado', '=', 'pendiente')->count();
        $tareas_no_hechas = DB::table('tareas')->where('estado', '=', 'no-hecho')->count();

        //return [$tareas_totales, $tareas_hechas, $tareas_pendientes, $tareas_no_hechas];
        return response()->json([
            'tareasTotales' => $tareas_totales,
            'tareasHechas' => $tareas_hechas
        ]);
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
        $tareas = DB::table('tareas')->where('id_proyecto', '=', $id);
        $sprints = DB::table('sprints')->where('id_proyecto', '=', $id)->get();

        $tareasTotales = $tareas->count();
        $tareasHechas = $tareas->where('estado', '=', 'hecho')->count();
        $tareasPorSprint = [];

        //Quizas se cambia el nombre de la columna
        foreach ($sprints as $sprint) {
            array_push($tareasPorSprint, $tareas->where('nombre_sprint', '=', $sprint->nombre_sprint)->count());
        }

        $idParticipates = Participate::query()->select('id_user')->where('id_project',$id)->get();

        //Quizas es necesario un for para conseguir los desarrolladores de un proyecto
        $devs = DB::table('usuarios')->whereIn('correo', $idParticipates)->get();


        $usuario_tareas = [];
        //falta la relacion de tareas y usuario de un proyecto

        return response()->json([
            'tareasTotales' => $tareasTotales,
            'tareasHechas' => $tareasHechas,
            'tareasPorSprint' => $tareasPorSprint,
            'usuarios' => $devs ]);
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
