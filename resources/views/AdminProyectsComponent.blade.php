@extends('layouts.theme')

@section('content')
    <div id="app">
    <v-app app>
        <v-container>
            <admin-proyects
                :projects="{{json_encode($projects)}}"></admin-proyects>
        </v-container>
    </v-app>
    </div>

@endsection
