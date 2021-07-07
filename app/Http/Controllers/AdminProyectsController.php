<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Participate;
use App\Models\Proyecto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AdminProyectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $projects = Proyecto::all();
        return view('AdminProyectsComponent', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        $project = Proyecto::find($id);
        $idDevs = Participate::query()->select(['id_user'])->where('id_project', $id)->get();
        $idLeads = Lead::query()->select(['id_user'])->where('id_project', $id)->get();
        $idParticipates = Participate::query()->select(['id_user'])->where('id_project', $id)->get();

        $users = Usuario::all();

        $devs = DB::table('usuarios')->whereIn('correo', $idDevs)->get();
        $leads = DB::table('usuarios')->whereIn('correo', $idLeads)->get();

        $participates = DB::table('participates')->whereIn('id_user', $idParticipates)->get();

        return view('SingleProjectComponent', compact('project', 'devs', 'leads', 'users','participates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function edit($id)
    {
        //
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
        $proyecto = Proyecto::find($id);
        $proyecto->nombre = $request->name;
        $proyecto->descripcion = $request->description;
        $proyecto->fechaInicio = $request->dates[0];
        $proyecto->fechaTermino = $request->dates[1];
        $proyecto->save();

        return $proyecto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->delete();
    }
}
