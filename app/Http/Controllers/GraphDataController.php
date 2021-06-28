<?php

namespace App\Http\Controllers;

use App\Models\Graph_data;
use App\Models\Proyecto;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class GraphDataController extends Controller
{
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

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
        $graphData = new Graph_data();
        $graphData->id = $request->id_graphData;

        $graphData->save();
        return $graphData;
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

    /**
     * This function is returning the specific project by one user
     *
     * @param $id_user
     * @param $id_project
     * @return mixed|null
     */
    public function userProject($id_user, $id_project)
    {
        $user = Usuario::find($id_user); //<- Eloquent
        $userProjectList = $user->leadProject(); //obtiene los proyectos que dirije el usuario
        foreach($userProjectList as $project)
        {
            if($project->id == $id_project)
                return $project;
            else
                return null;
        }
    }

    public function projectTasks($id_project)
    {
        $project = Proyecto::find($id_project); //<- Eloquent
        //return $project->getTasks(); <-- retornar todas las tareas de un proyecto
    }

    public function taskUsers($id_task)
    {

    }
}
