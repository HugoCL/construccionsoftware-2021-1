<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View vista de todos los usuarios
     */
    public function index()
    {
        $users = User::all();
        return View::make('users.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     * Solo mostrara el usuario pedido.
     * @param  int  $id
     * @return User
     */
    public function show($id)
    {
        $user = User::find($id);
        return View::make('users.show')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     * Intentara actualizar las columnas name e email de user.
     * solo si el usuario es el mismo que logeo, de lo contrario lo devolvera a home.
     * @param Request $request
     * @param  int  $id
     * @return User retorna el user solo si se confirma
     */
    public function edit($id) {
        $user = User::find($id);
        return View::make('users.save')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     * Intentara actualizar las columnas name e email de user.
     * solo si el usuario es el mismo que logeo, de lo contrario lo devolvera a home.
     * @param Request $request
     * @param  int  $id
     * @return User retorna el user solo si se confirma
     */
    public function update($id)
    {
        if($id== auth()->id()){
            $user = User::find($id);
            $user->name = User::get('name');
            $user->email = User::get('email');
            $user->save();
            return $user;
        }else{
            return view ('home');
        }

    }

    /**
     * Remove the specified resource from storage.
     * destruye el user solo si es el mismo que logeo
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        if($id== auth()->id()){
            $user = User::find($id);
            $user->delete();
        }else{
            return view ('home');
        }

    }
}
