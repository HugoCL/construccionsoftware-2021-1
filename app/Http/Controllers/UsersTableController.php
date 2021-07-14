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
    public function index(Request $request)
    {
      $users =  Usuario::all();
      return view('UsersTableComponent',compact('users'));
    }

    public function store(Request $request){
        $usuario = new Usuario();
        $usuario->correo = $request->correo;
        $usuario->nombre = $request->nombre;
        $usuario->save();

        return $usuario;
    }

    public function update(Request $request, $id){
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->save();
        return $usuario;
    }

    public function destroy($id)
    {
        print($id);
        $usuario = Usuario::find($id);
        $usuario->delete();
    }
}
