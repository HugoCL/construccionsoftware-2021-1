<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SprintContainerController extends Controller
{
    public function index()
    {
        return view('SprintContainerComponent');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Este metodo recibe la id de un proyecto, al ingresar a un proyecto y presionar el boton para ver iteración,
     * se procede a mostrar el SprintContainerComponent que estoy usando como kanban por ahora. A la vista del
     * "kanban" se le envia la id del proyecto, un arreglo de sprints y un arreglo de arreglos de tareas, la idea es reemplazar el index con este
     * metodo
     *
     */
    public function show($id)
    {
        //

        $sprints = DB::table('sprints')->where('id_proyecto', $id)->get();
        $tasks = [];

        foreach ($sprints as $sprint){
            //Aqui es probable que se deba cambiar tareas por tasks, la tabla tasks
            array_push($tasks, DB::table('tasks')->where('id_proyecto', $id)->where('id_sprint',$sprint->id)->get());
        }


        return view('SprintContainerComponent', compact('id', 'sprints','tasks'));

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
