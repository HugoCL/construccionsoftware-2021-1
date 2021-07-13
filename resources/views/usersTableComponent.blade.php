@extends('layouts.app')

@section('content')
  <v-container>
    <users-table-component :users="{{json_encode($users)}}"></users-table-component>
  </v-container>
@endsection
