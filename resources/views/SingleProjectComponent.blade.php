@extends('layouts.app')

@section('content')
    <div id="app">
        <v-app app>
            <v-container>
                <edit-proyect-component
                    :project="{{json_encode($project)}}"
                >
                </edit-proyect-component>
            </v-container>
            <v-container>
                <graph-component>
                
                </graph-component>
            </v-container>
        </v-app>
    </div>

@endsection
<script>
    import EditProyectComponent from "../js/components/EditProyectComponent";
    import GraphsComponent from "../js/components/GraphsComponent"
    export default {
        components: {EditProyectComponent,GraphsComponent}
    }
</script>
