@extends('layouts.app')

@section('content')
    <div id="app">
        <v-app app>
            <v-container>
                <users-table-component></users-table-component>
            </v-container>
        </v-app>
    </div>
@endsection
<script>
    import UsersTableComponent from "../js/components/UsersTableComponent";
    export default {
        components: {UsersTableComponent}
    }
</script>
