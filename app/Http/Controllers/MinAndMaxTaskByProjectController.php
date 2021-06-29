<?php

namespace App\Http\Controllers;

use App\Models\MinAndMaxTasksByProject;
use App\Models\Proyecto;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinAndMaxTaskByProjectController extends Controller
{

    public $isFewerTasks = false;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->isFewerTasks == false)
            return moreTasksByProject();
        else
            return lessTasksByProject();
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
        $taskByProject = new MinAndMaxTasksByProject();
        $taskByProject->id = $request->id;
        $taskByProject->save();
        return $taskByProject;
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
     * This function is returning the project with more task ID
     *
     * @return mixed
     */
    public function moreTasksByProject()
    {
        $projectIDs = Proyecto::query()->select(['id']);
        $projectTasks = Tarea::query()->select(['*'])->whereIn('id_project', $projectIDs)->get();
        return $projectTasks->max('id');

        //return $projectTasks->where('id', DB::raw("(select max('id') from project tasks)"))->get();
        /*return Proyecto::query()->select(['*'])->whereIn('id', function ($query){
            $query->selectRaw('max(id)')->from('minAndMaxTaskByProject')->groupBy('id');
        })->toSql();*/
    }

    /**
     * This function is returning the project with less task ID
     *
     * @return mixed
     */
    public function lessTasksByProject()
    {
        $projectIDs = Proyecto::query()->select(['id']);
        $projectTasks = Tarea::query()->select(['*'])->whereIn('id_project', $projectIDs)->get();
        return $projectTasks->min('id');
    }

}
