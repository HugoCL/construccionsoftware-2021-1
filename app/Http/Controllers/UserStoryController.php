<?php

namespace App\Http\Controllers;

use App\Models\UserStory;
use Illuminate\Http\Request;

class UserStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cardsHU = UserStory::query()->select()->where('id_project', $request->id_project)->get();
        return $cardsHU;
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
        $cardUserStory = new UserStory();
        $cardUserStory->id_project = $request->id_project;
        $cardUserStory->code = $request->code;
        $cardUserStory->name = $request->name;
        $cardUserStory->owner = $request->owner;
        $cardUserStory->action = $request->action;
        $cardUserStory->result = $request->result;
        $cardUserStory->save();

        return $cardUserStory;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserStory $cardUserStory)
    {
        //
        return $cardUserStory;
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
        $cardUserStory = UserStory::find($id);
        $cardUserStory->code = $request->code;
        $cardUserStory->name = $request->name;
        $cardUserStory->owner = $request->owner;
        $cardUserStory->action = $request->action;
        $cardUserStory->result = $request->result;
        $cardUserStory->save();

        return $cardUserStory;
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
        $cardUserStory = UserStory::find($id);
        $cardUserStory->delete();
        ;
    }
}
