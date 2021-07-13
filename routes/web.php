<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('administrar-proyectos/nuevo', 'App\Http\Controllers\newProyectController');
Route::resource('administrar-proyectos/integrantes', 'App\Http\Controllers\IntegrantsControllerController');
Route::resource('/administrar-proyectos/tareaNueva', 'App\Http\Controllers\TareaController');
Route::resource('administrar-proyectos', 'App\Http\Controllers\AdminProyectsController');
Route::resource('lista-usuarios', 'App\Http\Controllers\UsersTableController');
Route::resource('/task', 'App\Http\Controllers\TaskController');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::put('/taskPut', [App\Http\Controllers\EditTaskController::class,'update']);
Route::get('testtaskscomponents', [TestTasksComponentsController::class, 'index']);
Route::resource('/user', 'App\Http\Controllers\UsuarioController');
Route::resource('/kanban', 'App\Http\Controllers\KanbanController');
Route::resource('/graph', 'App\Http\Controllers\GraphDataController');
Route::resource('/minAndMaxTaskByProject', 'App\Http\Controllers\MinAndMaxTaskByProjectController');
Route::resource('/sprint', 'App\Http\Controllers\SprintController');
Route::resource('/graph-project', 'App\Http\Controllers\GraphProjectController');
Route::resource('/card-volere', 'App\Http\Controllers\VolereCardController');
Route::resource('/sprint-container', 'App\Http\Controllers\SprintContainerController');

Route::resource('/backlog', 'App\Http\Controllers\BacklogController');
Route::resource('/integrantes', 'App\Http\Controllers\IntegrantesController');
///
Route::resource('/equipo', 'App\Http\Controllers\equipoController');
//Route::resource('/equipos', 'App\Http\Controllers\equiposController');
//Para probar el creador de tareas
