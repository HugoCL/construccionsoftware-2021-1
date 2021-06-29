<template>
    <v-container class="">
        <!--Barra Botones-->
        <v-row class="">
            <v-col
                class="text-right"
                elavation="1"
            >   <v--transition>
                <v-btn class="ma-2 btn-secondary" v-on:click="save" :disabled="noEdit" v-if="!noEdit">
                    <v-icon>mdi-content-save-edit-outline</v-icon>
                    Guardar
                </v-btn>
                </v--transition>
                <v-btn class="btn-primary ma-2" v-on:click="disableEdit" primary>
                    <v-icon>mdi-pen</v-icon>
                    Editar
                </v-btn>
                <v-btn class="ma-2 btn-danger" color="red" v-on:click="deleteProject(project.id)">
                    <v-icon>mdi-delete</v-icon>
                    Eliminar
                </v-btn>
            </v-col>
        </v-row>
        <!--Editar/Ver Proyecto-->
        <v-row>
            <v-col cols="12" md="12" >
                    <!-- Nombre Proyecto -->
                    <v-row class="ma-2">
                        <v-col cols="12" md ="12">

                            <v-text-field
                                :disabled="noEdit"
                                outlined
                                filled
                                v-model="projectName"
                                label ="Nombre Proyecto"
                            >
                            </v-text-field>

                        </v-col>

                    </v-row>
                    <!--Descripcion-->
                    <v-row class="ma-2">
                        <v-col cols="12" md ="12">
                            <v-textarea
                                :disabled="noEdit"
                                outlined
                                filled
                                auto-grow
                                counter
                                v-model="description"
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
                                                class="ma-2"
                                                :disabled="noEdit"
                                                v-model="startDate"
                                                label="Fecha de Inicio"
                                                prepend-icon="mdi-calendar"
                                                readonly
                                                outlined
                                                v-bind="attrs"
                                                v-on="on"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            locale="es-cl"
                                            v-model="startDate"
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
                                            :disabled="noEdit"
                                            v-model="endDate"
                                            label="Fecha de Termino"
                                            prepend-icon="mdi-calendar"
                                            readonly
                                            v-bind="attrs"
                                            v-on="on"
                                        ></v-text-field>
                                    </template>
                                    <v-date-picker
                                        locale="es-cl"
                                        v-model="endDate"
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
        <!--Task list-->
        <v-row>
            <TaskList :peopleNames="users"/>
        </v-row>

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
            projectName:this.project.nombre,
            description:this.project.descripcion,
            startDate: this.project.fechaInicio,
            endDate:this.project.fechaTermino,
            currentMember:null,
            modalS:false,
            modalE:false,
            noEdit:true
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
        save() {
            // console.table(this.project)
            this.project.fechaInicio = this.startDate
            this.project.fechaTermino = this.endDate
            this.project.descripcion = this.description
            this.project.nombre = this.projectName
            //console.table(this.project)
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


        },

    }
}
</script>

<style scoped>

</style>
