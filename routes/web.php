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

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::resource('/proyects', 'App\Http\Controllers\newProyectController');

Route::resource('/user', 'App\Http\Controllers\UsuarioController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/proyects', [newProyectController::class, 'index']);
