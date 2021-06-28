<template>
    <v-card
        class="mx-auto"
        outlined
    >
        <v-list-item
            class="btn text-left"
            v-bind:href="'/administrar-proyectos/'+proyectData.id"
            v-on:click="getProject(proyectData.id)"
        >
            <v-list-item-content>
                <div class="text-overline mb-1">
                    <v-list-item-title class="text-h6 mb-1" >
                        <a  > {{proyectData.nombre}} </a>
                    </v-list-item-title>

                </div>
                <v-list-item-subtitle>
                    <v-row >
                        ID: {{proyectData.id}}
                    </v-row>
                </v-list-item-subtitle>
                <v-list-item-content>

                    <v-row >
                        <v-col cols="3">
                            Fecha Inicio: {{proyectData.fechaInicio}}
                        </v-col>
                        <v-col cols="3">
                            Fecha Termino: {{proyectData.fechaTermino}}
                        </v-col >
                        <v-col cols="3">
                            ID: {{proyectData.id}}
                        </v-col >
                    </v-row>

                </v-list-item-content>
                <v-list-item-content cols="12">
                    <div>
                        {{proyectData.descripcion}}
                    </div>
                </v-list-item-content>
                <v-list-item-subtitle>

                </v-list-item-subtitle>
            </v-list-item-content>

        </v-list-item>
        <v-card-actions style="float:right" >


                        <v-btn class="ma-2 btn-danger" color="red" v-on:click="deleteProject(proyectData.id)">
                            Eliminar
                            <v-icon right>mdi-delete</v-icon>
                        </v-btn>


        </v-card-actions>


    </v-card>
</template>

<script>
import EditProyectComponent from "./EditProyectComponent";
export default {
    components: {EditProyectComponent},
    data(){
        return{

        }
    },
    methods:{
        getProject: function (id){
            axios.get('/administrar-proyectos/'+id);
        },

        deleteProject: function (id){
            axios.delete('/administrar-proyectos/'+id);
            window.location.href="administrar-proyectos";
            window.location.href="administrar-proyectos";

        },

    },
    props:{
       proyectData: null
    }

}
</script>
<style scoped>

</style>
