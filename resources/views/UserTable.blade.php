@extends('layouts.theme')

@section('content')
    <div id="app">
        <v-app app>
            <v-container>
                <lista-usuarios
                    :users="{{json_encode($usuarios)}}"></lista-usuarios>
            </v-container>
        </v-app>
    </div>

@endsection
