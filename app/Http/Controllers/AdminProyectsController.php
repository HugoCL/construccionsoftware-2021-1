<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProyectsController extends Controller
{
    public function index(){
      return view('AdminProyectsComponent');
    }

    //public function  getProyects(){
      //  $proyectos = DB::select('SELECT * FROM PROYECTOS');

        //return proyectos;
    //}
}
