<?php

namespace App\Http\Controllers;

use App\Models\kanban;
use Illuminate\Http\Request;

class KanbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kanban');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kanban  $kanban
     * @return \Illuminate\Http\Response
     */
    public function show(kanban $kanban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kanban  $kanban
     * @return \Illuminate\Http\Response
     */
    public function edit(kanban $kanban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kanban  $kanban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kanban $kanban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kanban  $kanban
     * @return \Illuminate\Http\Response
     */
    public function destroy(kanban $kanban)
    {
        //
    }
}