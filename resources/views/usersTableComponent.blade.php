@extends('layouts.theme')

@section('content')
    <div id="app">
        <v-app app>
            <v-container>
                <users-table-component :users="{{json_encode($users)}}"></users-table-component>
            </v-container>
        </v-app>
    </div>
@endsection
