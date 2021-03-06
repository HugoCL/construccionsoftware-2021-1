<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * Recordar que esta es una relacion, el modelo 'user', es el usuario como tal
     * @return \Illuminate\Database\Eloquent\Collection|Usuario[]
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(array $data)
    {
        $usuario= Usuario::create([
            'nombre' => $data['name'],
            'correo' => $data['email']]);
        $usuario->save();
        return $usuario;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Usuario
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->correo = $request->email;
        $usuario->nombre = $request->name;
        $usuario->save();

        return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return View::make('usuario.mostrar')->with('user', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return View::make('usuario.editar')->with('user', $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->name;
        $usuario->correo = $request->email;
        $usuario->save();
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
    }
}
