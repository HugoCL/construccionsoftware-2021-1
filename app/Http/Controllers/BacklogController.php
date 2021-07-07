<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class BacklogController extends Controller
{
    public function index()
    {
        $tareasBacklog = Models\Backlog::all();
        /**
         * Este metodo deberia mostrar la lista de las tareas del backlog
         */
        return view('backlog', compact('tareasBacklog'));

    }

    public function crearTarea() {

        return view('creartarea');
    }

    public function eliminarTarea() {

    }

    public function edit($id) {
        //Buscamos el registro que coincide con el id
        $tarea = Models\Backlog::findOrFail($id);

        return view('editbacklog', compact('tarea'));
    }

    public function update(Request $request, $id) {
        //Recibo los datos de la nueva tarea editada
        $nuevaTarea = request()->except(['_token','_method']);
        //la actualizo con los nuevos datos
        Models\Backlog::where('id','=',$id)->update($nuevaTarea);
        //busco nuevamente la tarea por la id dada y retorno esa vista
        $tarea = Models\Backlog::findOrFail($id);
        return view('editbacklog', compact('tarea'));
    }

    public function store(Request $request) {
        //recoger los datos de la tarea en el front
        $nuevaTarea = request()->except('_token');
        //y lo insertamos en la base de datos a traves del modelo Backlog.php
        Models\Backlog::insert($nuevaTarea);
        //Luego, retornamos los datos recogidos en un json
;       return response()->json($nuevaTarea);
    }

    public function destroy($id) {
        //Recibimos la id de la tarea del backlog a borrar
        Models\Backlog::destroy($id);
        return redirect('backlog');
    }
}
