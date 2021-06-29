<?php

namespace App\Http\Controllers;

use App\Models\Graph_data;
use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Nota;

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
        return projectTasks();
        /*$authUserID = auth()->user()->getAuthIdentifier();
        $notas = Nota::where('Authentication User ID: ', $authUserID)->paginate(5);
        return view('notas.lista',compact('notas'));*/

        //$projectIDs = DB::table('usuarios')->whereIn('correo', $idDevs)->get(); //whereIn coleccion completa

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
        $graphData->id = $request->id;

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
     * This function is returning the user projects
     *
     * @param $id_user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|null
     */
    public function userProjects($id_user)
    {
        $userList = Usuario::all(); //Getting all users
        $searchedUser = null; //Declaring searched user variable

        //For each user
        foreach ($userList as $user)
        {
            if($user->id == $id_user)//If user ID is equals to searched user ID.
                $searchedUser = $user;
        }

        if($searchedUser!=null)
            return $searchedUser->leadProject(); //Returning user project
        else
            return null;
    }


    /**
     * This function is returning all project's task
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function projectTasks()
    {
        //$project = Proyecto::find($id_project); //<- Eloquent
        $projectIDs = Proyecto::query()->select(['id']);
        return Tarea::query()->select(['*'])->whereIn('id_project', $projectIDs)->get();


        /*$tasks = Tarea::all();
        $taskIDs = $tasks->getQueueableIds();

        $projectList = Proyecto::all();
        $searchedProject = null;

        foreach ($projectList as $project)
        {
            if($project->id == $id_project)
                $searchedProject = $project;
        }

        $userList = $searchedProject->leadBy();
        for($i = 0; i < $taskIDs.count(); $i++)
        {
            //for(recorrer las tareas de un proyecto)
            //if($taskIDs[$i] == ) si la id de las tareas de un proyecto
            //
        }*/
    }

    public function taskUsers($id_task)
    {
        $tasks = Tarea::all();

        foreach ($tasks as $task)
        {
            //if($task->id == $id_task)


        }
    }
}
