<?php

namespace App\Http\Controllers;

use App\Models\cards_volere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class VolereCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  cards_volere::get();
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
        $cardVolere = new cards_volere();
        $cardVolere->id = $request->id;
        $cardVolere->rurs= $request->rurs;
        $cardVolere->number = $request->number;
        $cardVolere->name = $request->name;
        $cardVolere->desc = $request->desc;
        $cardVolere->type = $request->type;
        $cardVolere->state = $request->state;
        $cardVolere->priority = $request->priority;
        $cardVolere->stability = $request->stability;
        $cardVolere->measure = $request->measure;
        $cardVolere->scale = $request->scale;
        $cardVolere->date = $request->date;
        $cardVolere->time = $request->time;
        $cardVolere->increment = $request->increment;
        $cardVolere->save();

        return $cardVolere;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cards_volere $cardVolere
     * @return \Illuminate\Http\Response
     */
    public function show(cards_volere $cardVolere)
    {
        //
        return $cardVolere;
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
        //
        $cardVolere = cards_volere::find($id);
        $cardVolere->id = $request->id;
        $cardVolere->rurs= $request->rurs;
        $cardVolere->number = $request->number;
        $cardVolere->name = $request->name;
        $cardVolere->desc = $request->desc;
        $cardVolere->type = $request->type;
        $cardVolere->state = $request->state;
        $cardVolere->priority = $request->priority;
        $cardVolere->stability = $request->stability;
        $cardVolere->measure = $request->measure;
        $cardVolere->scale = $request->scale;
        $cardVolere->date = $request->date;
        $cardVolere->time = $request->time;
        $cardVolere->increment = $request->increment;
        $cardVolere->save();

        return $cardVolere;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cardVolere = cards_volere::find($id);
        $cardVolere->delete();
    }
}
