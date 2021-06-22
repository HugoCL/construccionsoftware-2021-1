<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\newProyectController;

use App\Http\Controllers\TestTasksComponentsController;

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::resource('editar-proyecto', 'App\Http\Controllers\newProyectController');
Route::resource('administrar-proyectos', 'App\Http\Controllers\AdminProyectsController');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/proyects', [newProyectController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Para probar el creador de tareas

Route::get('testtaskscomponents', [TestTasksComponentsController::class, 'index']);
