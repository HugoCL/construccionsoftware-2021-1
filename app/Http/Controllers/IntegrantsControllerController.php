<?php

namespace App\Http\Controllers;

use App\Models\Integrant;
use Illuminate\Http\Request;

class IntegrantsControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('IntegrantsController');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $integrant = new Integrant([
            'id_proyect' => $request->input('id_proyect'),
            'id_user' => $request->input('id_user'),
            'rol' => $request->input('rol'),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
        ]);
        $integrant->save();

        return response()->json('Integrant created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //participates
        $participate = Participate::query()->select('rol')->where('id_user',$id)
            ->where('id_project', $request->id_project)
            ->first();

        $user = Usuario::query()->select(['correo','nombre'])
            ->where('correo',$id)
            ->first();
        $rol = $participate-> rol;
        $userEmail = $user-> correo;
        $userName = $user->nombre;

        return compact(['rol', 'userEmail', 'userName']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $integrant = Integrant::find($id);
        $integrant->update($request->all());

        return response()->json('Integrant updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $integrant = Integrant::find($id);
        $integrant->delete();

        return response()->json('Integrant deleted!');
    }
}
