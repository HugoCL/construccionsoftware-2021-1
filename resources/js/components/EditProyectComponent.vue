<template>
    <v-container class="">
        <!--Barra Botones-->
        <v-row class="">
            <v-col
                class="text-right"
                elavation="1"
            >
                <v-fade-transition>
                <v-btn class="ma-2 btn-secondary" v-on:click="save(project.id)" :disabled="noEdit" v-if="!noEdit">
                    <v-icon>mdi-content-save-edit-outline</v-icon>
                    Guardar
                </v-btn>
                </v-fade-transition>
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
                            dense
                            v-model="projectUp.name"
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
                            v-model="projectUp.description"
                            label ="DESCRIPCION"
                            @click=""
                        >
                        </v-textarea>

                    </v-col>

                </v-row>
                <!--Mostrar fechas-->
                <v-row>
                    <!--Fecha inicio/Iteracion-->
                    <v-col>
                        <v-dialog
                        v-model="dialogDate"
                        persistent
                        width="290px"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                :disabled="noEdit"
                                v-model="backUpDate"
                                label="Fecha de Inicio Proyecto"
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
                            v-model="backUpDate"
                            scrollable
                        >
                            <v-spacer></v-spacer>
                            <v-btn
                                text
                                color="primary"
                                @click="cancelDate"
                            >
                                Cancel
                            </v-btn>
                            <v-btn
                                text
                                color="primary"
                                @click="selectDate"
                            >
                                OK
                            </v-btn>
                        </v-date-picker>
                    </v-dialog>
                    </v-col>
                    <!--Tipo de proyecto-->
                    <v-col>
                        <v-select
                        outlined
                        :disabled="noEdit"
                        :items="typesProject"
                        label="Tipo de proyecto"
                        hint="Seleccione metodologia"
                        v-model="projectUp.projectType"
                        prepend-icon="mdi-folder-account-outline"
                        @click="addDays"
                    >
                    </v-select>

                    </v-col>
                    <!--Config Duracion-->
                </v-row>
                    <v-row>
                        <v-col cols="4" md="4" sm="12">
                            <!--Cantidad de repeticiones-->
                            <v-select
                                :disabled="noEdit"
                                outlined
                                :items="values"
                                label="Cantidad de Sesiones"
                                hint="Seleccione numero"
                                v-model="projectUp.projectReps"
                                prepend-icon="mdi-calendar-plus"
                                @click="addDays"
                            >

                            </v-select>
                        </v-col>
                        <!--Formato Medicion-->
                        <v-col cols="4" md="4" sm="12">
                            <v-select
                                :disabled="noEdit"
                                outlined
                                :items="ranges"
                                label="Medida (dia/semana/mes)"
                                hint="Seleccione dia/semana/mes"
                                v-model="projectUp.rangeType"
                                prepend-icon="mdi-calendar-range"
                                @click="addDays"
                            >

                            </v-select>
                        </v-col>
                        <!--Formato Medicion-->
                        <v-col>
                            <v-select
                                :disabled="noEdit"
                                outlined
                                :items="values"
                                label="Frecuencia"
                                hint="Seleccione duracion"
                                v-model="projectUp.rangeVal"
                                prepend-icon="mdi-calendar-clock"
                                @click="addDays"
                            >
                            </v-select>
                        </v-col>
                    </v-row>
            </v-col>
        </v-row>
        <!--Task list-->
        <v-row>
            <TaskList :peopleNames="users" :id_pro="project.id"/>
        </v-row>
        <!--Miembros Emilio>
        <integrantes-proyectos></integrantes-proyectos-->
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
                projectType:this.project.metodología,
                projectReps:this.project.cantIteraciones,
                rangeType:this.project.medidaIteracion,
                rangeVal:this.project.duracionIteraciones
            },
            backUpDate:this.project.fechaInicio,
            dialogDate:false,
            dialogConfirm:false,
            dialogAlert:false,
            typesProject:['Agil - Sprint [Historias de usuario]','Tradicional - Iteracion [Requisitos de sistema]'],
            ranges:['Dia','Semana','Mes'],
            values:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30],
            currentMember:null,
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
        disableEdit(){
            console.log(this.project)
            this.noEdit=!this.noEdit
        },
        deleteProject: function (id){
            axios.delete('/administrar-proyectos/'+id);
            window.location.href="/administrar-proyectos";
        },
        addDays() {
            if(this.backUpDate === '' || this.projectUp.projectReps === ''
                || this.projectUp.rangeType === '' || this.projectUp.rangeVal === '')
                return;

            let sumDias;
            switch (this.projectUp.rangeType) {
                case "Dia":
                    sumDias = 1;
                    break;
                case "Semana":
                    sumDias = 7;
                    break;
                case "Mes":
                    sumDias = 30;
                    break;
            }

            let date = new Date(this.backUpDate);
            date.setDate(date.getDate() + (sumDias*parseInt(this.projectUp.rangeVal, 10)*parseInt(this.projectUp.projectReps, 10))+1);
            this.projectUp.dates[0] = this.backUpDate;
            this.projectUp.dates[1] = date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();

        },
        methodologyType() {
            if (this.projectUp.projectType === 'Agil - Sprint [Historias de usuario]')
                this.projectUp.projectType = 'Agil';
            else
                this.projectUp.projectType = 'Tradicional';
        },

        cancelDate(){
            this.backUpDate = this.projectUp.dates[0]
            this.dialogDate=false
        },
        selectDate(){
            this.projectUp.dates[0] = this.backUpDate
            this.dialogDate=false
            this.addDays();
        },


    }
}
</script>
