<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class EditProyectController extends Controller
{
    public function index($id)
    {
        //
        $proyecto = Proyecto::find($id);
        //se envia el proyecto a una vista que muestre el proyecto
        return view('EditProyectComponent', compact('proyecto'));
    }
}
