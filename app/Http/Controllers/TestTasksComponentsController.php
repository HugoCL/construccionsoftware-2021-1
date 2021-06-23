<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestTasksComponentsController extends Controller
{
    public function index(){
      return view('testTasksComponents');
    }
}
