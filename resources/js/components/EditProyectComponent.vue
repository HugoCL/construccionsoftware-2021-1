<template>
    <v-container class="">
        <!--Barra Botones-->
        <v-row class="">
            <v-col
                class="text-right"
                elavation="1"
            >

                <v-btn class="btn-primary ma-1" v-on:click="openDialogEdit=true" primary>
                    <v-icon>mdi-pen</v-icon>
                    Editar
                </v-btn>
                <v-btn class="ma-1 btn-danger white--text" color="red" v-on:click="deleteProject(project.id)">
                    <v-icon>mdi-delete</v-icon>
                    Eliminar
                </v-btn>
            </v-col>
        </v-row>
        <!--Ver Proyecto-->
        <v-row >
            <v-col col="6">
                <v-card>
                    <v-card-text>
                        <p class="text-h5 text--primary">
                            <!--b>Nombre del Proyecto: </b-->{{this.projectUp.name}}
                        </p>
                        <p>
                            <b>Fecha Incio: </b>{{this.projectUp.dates[0]}}
                            <b>    &#32 &#32  &#32 &#32 &#32   </b>
                            <b>Fecha Termino: </b>{{this.projectUp.dates[1]}}
                        </p>
                        <p><b>Metodologia: </b>{{this.projectUp.projectType}}</p>
                        <p>
                            <b>Cantidad de sesiones:</b>
                            {{this.projectUp.projectReps}}
                            <b> x </b>
                            {{this.projectUp.rangeVal}}
                            <b></b>
                            {{this.projectUp.rangeType}}
                        </p>
                        <p>

                            <b>Descripcion:   </b>{{this.projectUp.description}}
                        </p>

                    </v-card-text>

                </v-card>
            </v-col>
        </v-row>
        <!--Task list (ya tiene una row dentro)-->

        <TaskList :peopleNames="users" :id_pro="project.id" class="mt-5"/>

        <!--Miembros Emilio>
        <integrantes-proyectos></integrantes-proyectos-->
        <v-row>
          <VolereList v-if="verifyProyectType()" class="mt-5"/>
          <UserStoriesList v-if="verifyProyectType()" class="mt-5"/>
        </v-row>
        <v-row>
            <v-dialog v-model="openDialogEdit" max-width="80%">
                <v-toolbar
                    color="primary"
                    class="white--text pt-0 pb-0 text-h5"
                >
                    Editar Proyecto
                </v-toolbar>
                <v-card color="">

                    <v-card-actions>
                            <v-text-field
                                outlined
                                filled
                                dense
                                v-model="projectUp.name"
                                label ="Nombre Proyecto"
                            ></v-text-field>
                    </v-card-actions>
                    <v-card-actions>
                        <v-textarea
                            outlined
                            filled
                            auto-grow
                            counter
                            v-model="projectUp.description"
                            label ="DESCRIPCION"
                            @click=""
                        >
                    </v-textarea>
                    </v-card-actions>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="secondary" class="btn-danger white--text" @click="openDialogEdit=false">Cancelar</v-btn>
                        <v-btn color="red" class="btn-danger white--text" @click="save(project.id)">Confirmar</v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>

    </v-container>

</template>

<script>
import AutoChipComponent from "./AutoChipComponent";
import TaskList from "./TaskListComponent";
import VolereList from "./VolereListComponent"
import UserStoriesList from "./UserStoriesList"

export default {
    name: "EditProyectComponent",
    components: {TaskList, AutoChipComponent, VolereList},
    data(){
        return {
            fields : [
                {   name:"Jefes de proyecto",
                    selected : this.leads,
                    fullList : this.users
                },
                {   name:"Scrum Masters",
                    selected : this.leads,
                    fullList : this.users
                },
                {   name:"Desarrolladores",
                    selected : this.devs,
                    fullList : this.users
                },
            ],
            projects: [],
            projectUp: {
                name: this.project.nombre,
                description:this.project.descripcion,
                dates: [this.project.fechaInicio, this.project.fechaTermino],
                projectType:this.project.metodología,
                projectReps:this.project.cantIteraciones,
                rangeType:this.project.medidaIteracion,
                rangeVal:this.project.duracionIteraciones
            },
            backUpDate:this.project.fechaInicio,
            dialogDate:false,
            dialogConfirm:false,
            openDialogEdit:false,
            dialogAlert:false,
            currentMember:null
            //Se deben incluir listas para cada tipo de miembros
        }
    },
    props: {
        leads: [],
        devs: [],
        users: [],
        project: null
    },
    methods: {
        save(id) {
            // console.table(this.project)

            console.log(id);

            axios.put('/administrar-proyectos/'+id, this.projectUp);
            this.openDialogEdit=false;
        },

        deleteProject: function (id){
            axios.delete('/administrar-proyectos/'+id);
            window.location.href="/administrar-proyectos";
        },
        verifyProyectType: function(){
          let proyectType = this.projectUp.projectType.split('-')[0].split(' ')[0];
          alert(proyectType);
          if(proyectType === 'Tradicional') return true;
          else                       return false;
        }

    },
  mounted() {
      //alert(JSON.stringify(this.projectUp));
      //this.verifyProyectType();
  }
}
</script>
