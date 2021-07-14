<template>
    <div class="container mx-0 px-0" data-app style="background-color: transparent">
        <v-container>
            <v-row >
              <v-toolbar
                  color="primary"
                  class="white--text"
                  rounded
              >
                  <v-col cols="9" class="title mr-13 ml-1 pr-0 pb-0 hidden-sm-and-down">
                      Administrar proyectos
                  </v-col>
                  <v-col cols="7" class="title mr-15 ml-1 pr-0 pb-0 hidden-md-and-up">
                      Administrar proyectos
                  </v-col>
                  <v-col cols="2">
                      <v-dialog v-model="dialog" transition="dialog-top-transition"  width="64%">
                          <template v-slot:activator="{ on, attrs }">
                              <div class="text-right">
                                  <v-btn v-bind="attrs" color="secondary" v-on="on" class="hidden-md-and-down">
                                      <v-icon>
                                          mdi-plus
                                      </v-icon>
                                      <div class="pl-2">Nuevo Proyecto</div>
                                  </v-btn>
                                  <v-btn v-bind="attrs" color="secondary" v-on="on" class="hidden-lg-and-up ml-2">
                                      <v-icon>
                                          mdi-plus
                                      </v-icon>
                                  </v-btn>
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

                  <v-col>
                     <v-col cols="3">
                         <v-dialog v-model="dialog2" transition="dialog-top-transition"  width="64%">
                             <template v-slot:activator="{ on, attrs }">
                                 <div class="text-right">
                                     <v-btn v-bind="attrs" color="secondary" v-on="on" class="hidden-md-and-down">
                                         <v-icon>
                                             mdi-chart-line
                                         </v-icon>
                                         <div class="pl-2">Graficos</div>
                                     </v-btn>
                                     <v-btn v-bind="attrs" color="secondary" v-on="on" class="hidden-lg-and-up ml-2">
                                         <v-icon>
                                             mdi-chart-line
                                         </v-icon>
                                     </v-btn>
                                 </div>
                             </template>
                             <template v-slot:default="dialog" >
                                 <v-card>
                                     <graficos-ventana></graficos-ventana>
                                 </v-card>
                             </template>
                         </v-dialog>
                     </v-col>
                  </v-col>

              </v-toolbar>

            </v-row>


            <v-row class="mt-2">
                <v-card outlined>
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
                </v-card>
            </v-row>

            <v-snackbar
                color="blue"
                class="white--text"
                v-model="snackBarNewProject"
                :timeout="timeout=10000"
            >
                Se creo un nuevo proyecto

            </v-snackbar>
            <v-snackbar
                color="error"
                class="white--text"
                v-model="snackBarDeleteProject"
                :timeout="timeout=10000"
            >
                Se elimino un proyecto

            </v-snackbar>
        </v-container>
    </div>
</template>

<script>
export default {
    data(){
        return{
            projectsView: this.projects,
            dialog:false,dialog2:false,
            snackBarNewProject:false,
            snackBarDeleteProject:false,

        }
    },
    methods:{
        editProyect: function (e){

        },
        deleteProjetc(id){
            this.snackBarDeleteProject=true;
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
            this.dialog=false;
            this.dialog2=false;
            this.snackBarNewProject=true;
            this.projectsView.push(add)


        }
    },
    props:{
        projects: null
    }

}
</script>
<style scoped>

</style>
