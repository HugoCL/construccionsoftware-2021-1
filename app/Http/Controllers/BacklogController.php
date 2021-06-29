<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class BacklogController extends Controller
{
    public function index()
    {
        $tareas = Models\Backlog::all();
        /**
         * Este metodo deberia mostrar la lista de las tareas del backlog
         */
        return view('backlog', compact('tareas'));

    }
}
