<?php


namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsersTableController extends Controller
{
    /**
     * Este es el controlador correcto para la lista de usuarios.
     * Su Modelo es: /app/http/Models/Usuario
     * Su Vue es: /resources/js/components/userTableComponent.vue
     * Migrate es: /database/migrations/2021_06_20_231046_create_usuarios_table.php
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $usuarios = Usuario::all();
        //echo $usuarios;
        return view('UserTable', compact('usuarios'));
    }

    public function store(Request $request){
        $usuario = new Usuario();
        $usuario->correo = $request->email;
        $usuario->nombre = $request->name;
        $usuario->save();

        return $usuario;
    }

    public function update(Request $request, $id){
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->name;
        $usuario->correo = $request->email;
        $usuario->save();
        return $usuario;
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
    }
}
