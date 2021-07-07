<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class SprintContainerController extends Controller
{
    public function index()
    {
        return view('SprintContainerComponent');
    }
}
