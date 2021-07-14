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
                    :voleres="{{json_encode($cards)}}"
                    :userstories="{{json_encode($cardsHU)}}"
                >
                </edit-proyect-component>
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
