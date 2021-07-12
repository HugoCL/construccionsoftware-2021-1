<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Integrante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class equipoController extends Controller
{
  /**
   *
   * @return
   */
    public function index($id_proyecto)
    {
        return Integrante::find($id_proyecto);
    }

    public function edit($id_proyecto)
    {
      $integrantes = Integrante::find($id_proyecto);
      return view('ProyectCardComponent')->with($integrantes);
    }

    public function create(){
      return view::make('ProyectCardComponent.create');
    }

    public function update($id_proyecto, $integrantes)
    {
        //borro todo lo anterior
        Integrante::destroy($id_proyecto);

        for($i=0; i<count($integrantes); $i++){
          $add_item= new Integrante();
          $add_item->id_proyecto= $id_proyecto;
          $add_item->id_user= $integrantes[i];
          $add_item->save();
          //maxi te va a tirar un error si no se quita la columna 'id_equipo' de la tabla 'integrantes'
          //recuerda que la dejamos como clave foranea
          //retornen el view si tienen una vista para editarlo
        }
        return Integrante::find($id_proyecto);
    }

    public function destroy($id_proyecto)
    {
      return Integrante::destroy($id_proyecto);
    }

    public function store($id_proyecto, $integrantes)
    {
      //borro todo lo anterior
      Integrante::destroy($id_proyecto);

      for($i=0; i<count($integrantes); $i++){
        $add_item= new Integrante();
        $add_item->id_proyecto= $id_proyecto;
        $add_item->id_user= $integrantes[i];
        $add_item->save();
        //maxi te va a tirar un error si no se quita la columna 'id_equipo' de la tabla 'integrantes'
        //recuerda que la dejamos como clave foranea
      }
      return Integrante::find($id_proyecto);
    }
}
