<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\task_aux;
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
        $task = new task_aux();
        return view('create.taskk',compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Tarea
     */
    public function store(Request $request)
    {
        $task  = new task_aux();
        $task ->id = $request->id;
        $task ->id_proyecto = $request->id_pro;
        $task ->descripcion = $request->desc;
        $task ->save();

        return $task ;
    }

    /**
     * Display the specified resource.
     * @param int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        //
        $task = task_aux::find($id);
        return view('show.taskk', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //
        $task = task_aux::find($id);
        return view('taskk.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        //
        $task = task_aux::find($id);
        $task->id = $request->id;
        $task ->id_proyecto = $request->id_pro;
        $task ->descripcion = $request->desc;
        $task ->save();

        return $task ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        //
        $task  = task_aux::find($id);
        return view('taskk.destroy', compact('task'));
    }
}
