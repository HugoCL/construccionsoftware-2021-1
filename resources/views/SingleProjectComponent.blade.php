@extends('layouts.theme')

@section('content')
    <div id="app">
        <v-app app>
            <v-container>
                <edit-proyect-component
                    :project="{{json_encode($project)}}"
                    :users="{{json_encode($users)}}"
                    :devs="{{json_encode($devs)}}"
                    :leads="{{json_encode($leads)}}"
                    :participates="{{json_encode($participates)}}"
                >
                </edit-proyect-component>
            </v-container>
        </v-app>
    </div>

@endsection
<script>
    import EditProyectComponent from "../js/components/EditProyectComponent";
    export default {
        components: {EditProyectComponent}
    }
</script>
