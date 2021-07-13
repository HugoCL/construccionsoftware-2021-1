@extends('layouts.theme')

@section('content')

    <sprint-container id="app"
                      :project_id="{{json_encode($id)}}"
                      :sprints="{{json_encode($sprints)}}"
                      :tasks="{{json_encode($tasks)}}"
    >
    </sprint-container>

@endsection
