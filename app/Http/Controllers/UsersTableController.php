<?php


namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsersTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $usuarios = Usuario::all();
        return view('UsersTableComponent', compact('usuarios'));
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
