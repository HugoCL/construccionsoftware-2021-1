<?php

namespace App\Http\Controllers;

use App\Models\Integrant;
use App\Models\Participate;
use App\Models\User;
use App\Models\Usuario;
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
        $integrant = new Participate();
        $integrant->id_user = $request->id_user;
        $integrant->id_project = $request->id_project;
        $integrant->rol = $request->rol;
        $integrant->save();

        return $integrant;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id from user
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
     * @param  int  $id from usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $participate = Participate::query()->where('id_user',$request->userEmail)
            ->where('id_project', $id)
            ->update(['rol' => $request->rol]);

        return $participate;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $integrant = Participate::query()->where('id_user',$id)
            ->where('id_project', $request->id_project)
            ->delete();
        //$integrant->delete();

        return $integrant;
    }
}
