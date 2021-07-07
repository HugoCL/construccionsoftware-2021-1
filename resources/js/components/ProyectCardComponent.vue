<template>
    <v-card
        class="mx-0 px-0 mb-4"
        outlined
    >
        <v-list-item
            class="btn text-left mx-0"
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
            <v-btn class="ma-2 btn-danger white--text" color="error" v-on:click="dialogAlert=true">
                Eliminar
                <v-icon right>mdi-delete</v-icon>
                <v-dialog v-model="dialogAlert" max-width="40%">
                    <v-card>
                        <v-card-title class="text-h6 text-c">Seguro que desea borrar el proyecto?</v-card-title>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="secondary" class="btn-danger white--text" @click="dialogAlert=false">Cancelar</v-btn>
                            <v-btn color="red" class="btn-danger white--text" @click="deleteProject(proyectData.id)">Confirmar</v-btn>
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
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
            dialogAlert:false
        }
    },
    methods:{
        getProject: function (id){
            axios.get('/administrar-proyectos/'+id);
        },

        deleteProject: function (id){
            axios.delete('/administrar-proyectos/'+id);
            this.$emit('delete', id);
            this.dialogAlert=true;
        },

    },
    props:{
       proyectData: null
    }

}
</script>
<style scoped>

</style>
