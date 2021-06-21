<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newProyectController extends Controller
{
    public function index(){
      return view('newProyectComponent');
    }
}
