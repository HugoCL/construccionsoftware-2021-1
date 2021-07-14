<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Task::get();
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
        //
        $task = new Task();
        //$task->id = $request->id;
        $task->id_proyecto = $request->id_pro;
        $task->name = $request->name;
        $task->desc = $request->desc;
        $task->date = $request->date;
        $task->members = $request->members;
        $task->estado =  $request->estado;

        $sprints = DB::table('sprints')->where('id_proyecto', '=', $task->id_proyecto)->get();

        if (count($sprints) != 0){
            // Use the collection, to get the first item use $users->first().
            // Use the model if you used ->first();
            $sprint = $sprints->first();
            $task->id_sprint = $sprint->id;
        }

        $task ->save();




        return $task ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::find($id);
        $task->name = $request->name;
        $task->desc = $request->desc;
        $task->date = $request->date;
        $task->members = $request->members;
        $task->estado =  $request->estado;
        $task ->save();
        return $task ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::find($id);
        $task->delete();
    }
}
