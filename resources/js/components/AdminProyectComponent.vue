<template>
    <div class="container mx-0 px-0" data-app style="background-color: transparent">
        <v-container>
            <v-row >
                <v-col cols="9" class="title mr-13 ml-1 pr-0 pb-0 ">
                    Administrar proyectos
                </v-col>
                <v-col cols="2">
                    <v-dialog v-model="dialog" transition="dialog-top-transition"  width="64%">
                        <template v-slot:activator="{ on, attrs }">
                            <div>
                                <v-btn v-bind="attrs" color="secondary" v-on="on"> <v-icon class="pr-2" >mdi-plus</v-icon>Nuevo Proyecto</v-btn>
                            </div>
                        </template>
                        <template v-slot:default="dialog" >
                            <v-card>
                                <v-toolbar class="elevation-0">
                                    <v-row align="center">
                                        <v-col cols="10" >
                                            <span class="pl-2 mt-2 pt-2 title" >
                                                Nuevo proyecto
                                            </span>
                                        </v-col>
                                        <v-col cols="2" style="float: right;" class="text-right">
                                                    <span class="pr-2">
                                                        <v-btn color="transparent" class="pl-1 pr-1 pt-1 pb-1 elevation-0" @click="dialog.value = false" min-width="0" min-height="0">
                                                            <v-icon>
                                                                mdi-close
                                                            </v-icon>
                                                        </v-btn>
                                                    </span>
                                        </v-col>
                                    </v-row>

                                </v-toolbar>



                                <v-card-text>
                                    <crear-proyecto
                                        v-on:add="addProject($event)"></crear-proyecto>
                                </v-card-text>
                            </v-card>
                        </template>
                    </v-dialog>

                </v-col>

            </v-row>


            <v-row class="mt-0" >
                <v-col cols="12">
                    <ul class="list-group mx-0 px-0" >
                        <li class="list-group-item mb-4"
                            v-for="(proyect,index) in projectsView" :key="index"
                        >
                            <proyect-card
                                v-on:delete="deleteProjetc($event)"
                                :proyectData="proyect">

                            </proyect-card>
                        </li>
                    </ul>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    data(){
        return{
            projectsView: this.projects,
            dialog:false,

        }
    },
    methods:{
        editProyect: function (e){

        },
        deleteProjetc(id){
            for (var i = 0; i < this.projectsView.length; i++) {
                if (this.projectsView[i].id === id){
                    this.projectsView.splice(i, 1);
                    return;
                }
            }
        },
        addProject(nuevoProyecto){
            const add = nuevoProyecto;
            console.log(nuevoProyecto)
            console.log(this.projectsView)
            this.projectsView.push(add)
            this.dialog=false

        }
    },
    props:{
        projects: null
    }

}
</script>
<style scoped>

</style>
