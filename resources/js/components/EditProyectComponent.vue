<template>
    <v-container class="ma-0 pa-0">

        <!--Barra Botones-->
        <v-row class="px-4">
            <v-toolbar
                color="primary"
                class="rounded white--text pt-0 pb-0 text-h5 "
                >

                    <!--b>Nombre del Proyecto: </b-->{{this.projectUp.name}}



                <v-col>
                    <v-responsive class="hidden-sm-and-down">
                        <v-row class="pl-4">
                            <div

                                v-for="(user, index) in currentMember"
                                :key="index"
                                justify="center"
                                class="mx-0 px-0 py-4"
                            >
                                <v-tooltip top
                                           class="mx-0 px-0">
                                    <template
                                        v-slot:activator="{ on }"
                                        class="mx-0 px-0"
                                    >
                                        <v-btn
                                            color="secondary"
                                            fab
                                            small
                                            v-on="on"
                                            class="white--text font-weight-bolder px-0 mx-0"

                                        >{{ user.correo.charAt(0) }}
                                        </v-btn>

                                    </template>
                                    <span>{{ user.correo }}</span>
                                </v-tooltip>

                            </div>
                        </v-row>
                    </v-responsive>
                    <v-responsive class="hidden-md-and-up">
                        <v-row>
                            <v-col cols="1">
                                <v-tooltip bottom>
                                    <template
                                        v-slot:activator="{ on }"
                                    >
                                        <v-btn
                                            color="secondary"
                                            fab
                                            small
                                            v-on="on"
                                            class="white--text font-weight-bolder"
                                        >{{currentMember.length}}+
                                        </v-btn>

                                    </template>
                                    <span v-for="(user, index) in currentMember"
                                          :key="index"
                                          justify="center">{{ user.correo }}<br/></span>
                                </v-tooltip>
                            </v-col>
                        </v-row>
                    </v-responsive>
                </v-col>
                <v-col
                    class="text-right"
                    elavation="0"
                >

                    <v-responsive class="hidden-sm-and-down">
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
                                    <v-dialog
                                        v-model="membersAlert"
                                        max-width="60%"
                                        max-height="600 px"
                                        style="overflow:hidden"

                                    >

                                            <integrantes-proyectos
                                                :leads="leads"
                                                :devs="currentMember"
                                                :users="users"
                                                :project="project"
                                                v-on:edit="changeMembers($event)"

                                            >
                                            </integrantes-proyectos>

                                    </v-dialog>
                                </v-btn>
                            </template>
                            <span>Agregar miembro</span>
                        </v-tooltip>
                        <!--Ver tablero-->
                        <v-tooltip top>
                            <template v-slot:activator="{ on }">
                                <a href="/sprint-container/">
                                    <v-btn
                                    fab
                                    dark
                                    small
                                    v-on="on"
                                    color="secondary">
                                    <v-icon>
                                        mdi-card-plus-outline
                                    </v-icon>
                                </v-btn>
                                </a>

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
                                            <TaskList
                                                :peopleNames="currentMember"
                                                :id_pro="project.id"
                                            >
                                            </TaskList>
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
                    <v-responsive class="hidden-md-and-up">
                        <v-menu
                            left
                            bottom>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    icon
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    <v-icon color="white">mdi-dots-vertical</v-icon>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item>
                                    <a class="nav-link black--text">
                                        <v-list-item-tittle @click="membersAlert=true">
                                            <v-icon>mdi-plus</v-icon>
                                            Agregar miembros
                                        </v-list-item-tittle>
                                    </a>
                                </v-list-item>
                                <v-list-item>
                                        <v-list-item-tittle>

                                            <a class="nav-link black--text" href="/sprint-container/">
                                                <v-icon >mdi-card-plus-outline</v-icon>
                                                Ver tablero
                                            </a>
                                        </v-list-item-tittle>
                                </v-list-item>
                                <v-list-item>
                                    <a class="nav-link black--text">
                                        <v-list-item-title @click="dialogTasks=true">
                                            <v-icon>mdi-card-account-details-outline</v-icon>
                                            Ver tareas
                                        </v-list-item-title>
                                    </a>
                                </v-list-item>
                                <v-list-item >
                                    <a class="nav-link black--text">
                                        <v-list-item-title @click="openDialogEdit=true">
                                            <v-icon>mdi-pen</v-icon>
                                            Editar proyecto
                                        </v-list-item-title>
                                    </a>
                                </v-list-item>
                                <v-list-item>
                                    <a class="nav-link black--text">
                                        <v-list-item-title @click="dialogAlert=true">
                                            <v-icon>mdi-delete</v-icon>
                                            Eliminar proyecto
                                        </v-list-item-title>
                                    </a>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </v-responsive>

                </v-col>

                </v-toolbar>
    </v-row>
        <!--Ver Proyecto-->
        <v-row class="ma-1 pa-1 px-0">

            <v-col class="ma-1 pa-1 px-0 mx-0">
                <info-project-component
                    :projectUp="projectUp">
                </info-project-component>
            </v-col>
            <div class="hidden-xs-and-down px-2"></div>
            <v-col class="ma-1 pa-1 px-0 mx-0">
                <graph-component
                    :idProject="project.id"
                    :nameProject="project.nombre"
                >
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
            currentMember:this.devs,

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
        changeMembers:function(list){
            this.currentMember = [];
            for (let u in list){
                this.currentMember.push(Object.assign( {},{ name: list[u].userName, correo: list[u].userEmail } ))
            }
        }
    }
}
</script>
