<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('worksComponents');
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
        $integrante = new Integrante();
        $integrante->id_equipo = $request->id_equipo;
        $integrante->id_proyecto = $request->id_proyecto;
        $integrante->id_user = $request->id_user;
        $integrante->rol = $request->rol;
        $integrante->save();
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
        $project = Proyecto::find($id);
        //Aqui es necesario crear el metodo usuarios en el models
        //el cual retorna $this->belongsToMany('App\Usuario');
        $users = Proyecto::usuarios();

        //retorna la vista con las variables necesarias de integrantes del proyecto
        //return view('worksComponents', compact('project', 'users'));
        //se comenta para evitar errores

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
        /**
         * Aqui se debe modificar el metodo para recibir  los parametros necesarios para eliminar,
         * ya que es necesario eliminar la relacion integrante la cual tiene 3 referencias y es dificil encontrar la fila
         * buscada con un solo dato.
         */


    }
}
