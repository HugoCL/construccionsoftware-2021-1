<template>
    <div class="container" data-app>
        <div class="row justify-content-center">
            <div cols="10" style="float: right" >
                    <v-row>
                        <v-col class="col-md-8 text-left" >
                            <h4>Administrar Proyectos</h4>
                        </v-col>
                        <v-col class="col-md-2">
                            <v-dialog transition="dialog-top-transition"  max-width="800">
                                <template v-slot:activator="{ on, attrs }">
                                    <div class="text-right d-flex align-right justify-space-around">

                                        <v-btn class="mr-4" v-bind="attrs"  v-on="on"> <v-icon dark rightclass="mr-4" >mdi-plus-circle-outline</v-icon>Nuevo Proyecto</v-btn>
                                        <v-btn class="mr-4" color = "primary" v-on:click="refresh">  <v-icon right class="mr-4" >mdi-refresh</v-icon>Refrescar</v-btn>
                                    </div>
                                </template>
                                <template v-slot:default="dialog">
                                    <v-card>
                                        <v-toolbar>
                                            <v-row>
                                                <v-col cols="auto">
                                                    Nuevo Proyecto
                                                </v-col>
                                                <v-col cols="1"  class=" text-right" style="float: right">
                                                    <v-btn style="background: red;" @click="dialog.value = false"><v-icon>mdi-close</v-icon></v-btn>
                                                </v-col>
                                            </v-row>

                                        </v-toolbar>

                                        <v-card-text>
                                            <crear-proyecto></crear-proyecto>
                                        </v-card-text>
                                    </v-card>
                                </template>
                            </v-dialog>

                        </v-col>

                    </v-row>
                </div>

            <div  cols="10"
                    sm="6"
                    md="8">
                <ul class="list-group">
                    <li class="list-group-item"
                        v-for="(proyect,index) in projects" :key="index">
                        <proyect-card
                            :proyectData="proyect"
                        > </proyect-card>
                    </li>
                </ul>


            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
        }
    },
    methods:{
        editProyect: function (e){

        },
        refresh: function (){
            window.location.href="administrar-proyectos";
        }
    },
    props:{
        projects: null
    }

}
</script>
<style scoped>

</style>
