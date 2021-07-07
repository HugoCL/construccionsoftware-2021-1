<template>
    <v-container class="">

        <!--Ver Proyecto-->
        <v-row >
            <v-col col="6">
                <v-card>
                    <v-toolbar
                        color="primary"
                        class="white--text pt-0 pb-0 text-h5"
                    >
                        Proyecto
                    </v-toolbar>
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

                        <v-text-field
                            :disabled="noEdit"
                            outlined
                            filled
                            dense
                            v-model="projectUp.name"
                            label ="Nombre Proyecto"
                        >
                        </v-text-field>

                    </v-col>

                </v-card>
            </v-col>
        </v-row>
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
                <v-btn class="ma-2 btn-danger white--text" color="error" v-on:click="dialogAlert=true">
                    Eliminar
                    <v-icon right>mdi-delete</v-icon>
                    <v-dialog v-model="dialogAlert" color="red" max-width="40%">
                        <v-card color="">
                            <v-card-title class="text-h6 text-c">Seguro que desea borrar el proyecto?</v-card-title>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="secondary" class="btn-danger white--text" @click="dialogAlert=false">Cancelar</v-btn>
                                <v-btn color="red" class="btn-danger white--text" @click="deleteProject(project.id)">Confirmar</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-btn>
            </v-col>
        </v-row>
        <!--Task list-->
        <v-row>
            <TaskList :peopleNames="users" :id_pro="project.id"/>
        </v-row>
        <!--Miembros Emilio>
        <integrantes-proyectos></integrantes-proyectos-->
        <v-row>
          <VolereList v-if="verifyProyectType()" class="mt-5"/>
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
                            :disabled="noEdit"
                            outlined
                            filled
                            auto-grow
                            counter
                            v-model="projectUp.description"
                            label ="DESCRIPCION"
                            @click=""
                        >
                        </v-textarea>

                    </v-col>

                </v-row>
                <!--Mostrar fechas-->
                <v-row class="ma-2">
                    <!--Fecha Incio-->
                    <v-col>
                        <v-row>
                            <v-dialog
                                v-model="modalS"
                                persistent
                                width="290px"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        :disabled="noEdit"
                                        v-model="projectUp.dates[0]"
                                        label="Fecha de Inicio"
                                        prepend-icon="mdi-calendar"
                                        readonly
                                        outlined
                                        class="pt-2"
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                </template>
                                <v-date-picker
                                    locale="es-cl"
                                    v-model="projectUp.dates[0]"
                                    scrollable
                                >
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="closeDialogStart"
                                    >
                                        Cancel
                                    </v-btn>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="saveStartDate"
                                    >
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-row>
                    </v-col>
                    <!--Fecha termino-->
                    <v-col>
                        <v-row>
                            <v-dialog
                                v-model="modalE"
                                persistent
                                width="290px"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        class="ma-2"
                                        outlined
                                        v-model="projectUp.dates[1]"
                                        :disabled="noEdit"
                                        label="Fecha de Termino"
                                        prepend-icon="mdi-calendar"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                </template>
                                <v-date-picker
                                    locale="es-cl"
                                    v-model="projectUp.dates[1]"
                                    scrollable
                                >
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="closeDialogEnd"
                                    >
                                        Cancel
                                    </v-btn>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="saveEndDate"
                                    >
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-row>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
        <v-row class="justify-center  mx-0 px-0">
            <v-btn v-bind:href="/sprint-container/"
                   color="secondary"
                   @click="dialog = true"
                   class="mb-4"
                   width="50%">
                Iteración
            </v-btn>
        </v-row>
        <!--Task list-->
        <v-row>
            <TaskList :peopleNames="users" :id_pro="project.id"/>
        </v-row>
        <!--Miembros Emilio-->
        <integrantes-proyectos :devs="devs" :leads="leads" :users="users" :project="project" :participates="participates"></integrantes-proyectos>
    </v-container>

</template>

<script>
import AutoChipComponent from "./AutoChipComponent";
import TaskList from "./TaskListComponent";

export default {
    name: "EditProyectComponent",
    components: {TaskList, AutoChipComponent},
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
        participates: [],
        project: null
    },
    methods: {
        save(id) {
            // console.table(this.project)
            const d1 = new Date(this.projectUp.dates[0]);
            const d2 = new Date(this.projectUp.dates[1]);

            if (+d1 >= +d2){
                console.log(this.projectUp.dates[0] + '-' + this.projectUp.dates[1])
                if (+d1 === +d2) {
                    alert('Las fechas no pueden ser iguales');
                    return;
                }
                let aux = this.projectUp.dates[1];

                this.projectUp.dates[1] = this.projectUp.dates[0];
                this.projectUp.dates[0] = aux;
                this.noEdit=!this.noEdit
            }
            console.log(this.projectUp);

            axios.put('/administrar-proyectos/'+id, this.projectUp);
            this.disableEdit();
        },
        closeDialogStart() {
            this.modalS = false
        },
        saveStartDate() {
            this.modalS = false
        },
        closeDialogEnd() {
            this.modalE = false
        },
        saveEndDate() {
            this.modalE = false
        },
        disableEdit(){
            this.noEdit=!this.noEdit
        },
        deleteProject: function (id){
            axios.delete('/administrar-proyectos/'+id);
            window.location.href="/administrar-proyectos";
            window.location.href="/administrar-proyectos";
            this.dialogAlert = false;

        },
        verifyProyectType: function(){
          let proyectType = this.projectUp.projectType.split('-')[0].split(' ')[0];
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
