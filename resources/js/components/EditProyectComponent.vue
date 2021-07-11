<template>
    <v-container class="">

        <!--Barra Botones-->
            <v-row>
                <v-toolbar
                    color="primary"
                    class="white--text pt-0 pb-0 text-h5"
                >
                    <!--b>Nombre del Proyecto: </b-->Proyecto: {{this.projectUp.name}}
                    <v-col>
                        <v-responsive>
                            <v-row>
                                <v-col
                                    cols="1"
                                    v-for="(user, index) in users"
                                    :key="index"
                                    justify="center"
                                >
                                    <v-tooltip top>
                                        <template
                                            v-slot:activator="{ on }"
                                        >
                                            <v-btn
                                                color="secondary"
                                                fab
                                                small
                                                v-on="on"
                                                class="white--text font-weight-bolder"
                                            >{{ user.correo.charAt(0) }}
                                            </v-btn>
                                        </template>
                                        <span>{{ user.correo }}</span>
                                    </v-tooltip>
                                </v-col>
                            </v-row>
                        </v-responsive>
                    </v-col>
                    <v-col
                        class="text-right"
                        elavation="0"
                    >
                        <v-responsive>
                            <!--Agregar miembro-->
                            <v-tooltip top>
                                <template v-slot:activator="{ on }">
                                    <v-btn
                                        fab
                                        dark
                                        small
                                        v-on="on"
                                        color="grey"
                                        v-on:click="membersAlert=true"
                                    >
                                        <v-icon>mdi-plus</v-icon>
                                        <v-dialog v-model="membersAlert" max-width="60%" max-height="80%">
                                            <v-card>
                                                <integrantes-proyectos
                                                >
                                                </integrantes-proyectos>
                                            </v-card>
                                        </v-dialog>
                                    </v-btn>
                                </template>
                                <span>Agregar miembro</span>
                            </v-tooltip>
                            <!--Ver tablero-->
                            <v-tooltip top>
                                <template v-slot:activator="{ on }">
                                    <v-btn
                                        v-bind:href="/sprint-container/"
                                        fab
                                        dark
                                        small
                                        v-on="on"
                                        color="secondary">
                                        <v-icon>
                                            mdi-card-plus-outline
                                        </v-icon>
                                    </v-btn>
                                </template>
                                <span> Ver Tablero</span>
                            </v-tooltip>
                            <!--Ver tareas-->
                            <v-tooltip top>
                                <template v-slot:activator="{ on }">
                                    <v-btn
                                        fab
                                        dark
                                        small
                                        v-on="on"
                                        color="secondary"
                                        v-on:click="dialogTasks=true"
                                    >
                                        <v-icon>mdi-card-account-details-outline</v-icon>
                                        <v-dialog v-model="dialogTasks" max-width="80%">
                                            <v-card >
                                                <TaskList :peopleNames="users" :id_pro="project.id"/>
                                            </v-card>
                                        </v-dialog>
                                    </v-btn>
                                </template>
                                <span>Ver Tareas</span>
                            </v-tooltip>
                            <!--Editar Proyecto-->
                            <v-tooltip top>
                                <template v-slot:activator="{ on }">
                                    <v-btn
                                        fab
                                        small
                                        color="secondary"
                                        v-on:click="openDialogEdit=true"
                                        v-on="on"
                                    >
                                        <v-icon>mdi-pen</v-icon>

                                    </v-btn>
                                </template>
                                <span>Editar proyecto</span>
                            </v-tooltip>

                            <!--Eliminar Proyecto-->
                            <v-tooltip top>
                                <template v-slot:activator="{ on }">
                                    <v-btn
                                        small
                                        fab
                                        v-on="on"
                                        dark
                                        color="red darken-1"
                                        v-on:click="dialogAlert=true"
                                    >
                                        <v-icon>mdi-delete</v-icon>
                                        <v-dialog v-model="dialogAlert" color="red" max-width="40%">
                                            <v-card color="">
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
                                </template>
                                <span>Eliminar proyecto</span>
                            </v-tooltip>

                        </v-responsive>

                    </v-col>

                    </v-toolbar>
        </v-row>
        <!--Ver Proyecto-->
        <v-row>

            <v-col>
                <info-project-component
                    :projectUp="projectUp">
                </info-project-component>
            </v-col>
            <v-col>
                <graph-component>

                </graph-component>
            </v-col>

        </v-row>


        <!--Task list-->
        <!--Miembros Emilio>
        <integrantes-proyectos></integrantes-proyectos-->
        <v-row>
          <VolereList v-if="verifyProyectType() == true" class="mt-5"/>
          <UserStoriesList v-if="verifyProyectType() == false" class="mt-5"/>
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
import InfoProjectComponent from "./InfoProjectComponent";
import AdminMembersProjectComponent from "./AdminMembersProjectComponent";

export default {
    name: "EditProyectComponent",
    components: {
        AdminMembersProjectComponent,
        InfoProjectComponent, TaskList, AutoChipComponent, VolereList, UserStoriesList},
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
            dialogTasks:false,
            membersAlert:false,
            currentMember:null,
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

            console.log(this.users);

            axios.put('/administrar-proyectos/'+id, this.projectUp);
            this.openDialogEdit=false;
        },

        deleteProject: function (id){
            axios.delete('/administrar-proyectos/'+id);
            window.location.href="/administrar-proyectos";
        },
        verifyProyectType: function(){
          let proyectType = this.projectUp.projectType.split('-')[0].split(' ')[0];
          //alert(proyectType);
          if(proyectType === 'Tradicional') return true;
          else                       return false;
        },
        loadMembers:function (){
            var users=[];

        },

    }
}
</script>
