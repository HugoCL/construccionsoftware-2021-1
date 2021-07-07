<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Participate;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class newProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        /**
         * Este metodo deberia mostrar la lista de los proyectos
         */
        return view('newProyectComponent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        /**
         * Este metodo deberia llamar a la vista de creacion de un proyecto, quizas no sea necesario
         * el envio de $proyecto a la vista
         */

        $proyecto = new Proyecto();
        return view('create.proyect', compact('proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     * Recordar que la columna id de la tabla proyecto es auto incremental
     * no hay que darle ese campo.
     * @param Request $request
     * @return Proyecto
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->name;
        $proyecto->descripcion = $request->description;
        $proyecto->fechaInicio = $request->dates[0];
        $proyecto->fechaTermino = $request->dates[1];
        $proyecto->save();

        $bosses = ($request->bosses);

        for ($i=0; $i < count($bosses); $i++) {
            $lead = new Lead();
            $lead->id_project = $proyecto->id;
            $lead->id_user = $bosses[$i];
            $lead->save();
        }

        $workers = ($request->workers);

        for ($i=0; $i < count($workers); $i++) {
            $work = new Participate();
            $work->id_project = $proyecto->id;
            $work->rol = "developer";
            $work->id_user = $workers[$i];
            $work->save();
        }
        return $proyecto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Este metodo muestra una vista de los detalles de un proyecto
     */
    public function show($id)
    {
        //
        $proyecto = Proyecto::find($id);
        //se envia el proyecto a una vista que muestre el proyecto
        return view('show.proyect', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //
        $proyecto = Proyecto::find($id);

        /**
         * Aqui se llama una vista para editar los datos y desde ahi se deberia llamar al
         * metodo update
         */

        return view('proyect.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $proyecto = Proyecto::find($id);
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->description;
        $proyecto->fechaInicio = $request->dates[0];
        $proyecto->fechaTermino = $request->dates[1];
        $proyecto->save();

        return $proyecto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
    }
}
