@extends('layouts.app')

@section('content')
    <div id="app">
        <v-app app>
            <v-container>
                <edit-proyect-component
                    :project="{{json_encode($project)}}"
                    :devs="{{json_encode($devs)}}"
                    :leads="{{json_encode($leads)}}"
                    :users="{{json_encode($users)}}"
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
