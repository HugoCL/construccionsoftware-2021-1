<template>

<div class="row justify-content-center">

        <div class="col-12 align-self-center pb-0">
            <v-row>
                <v-col cols="12">
                    <v-list
                        ref="form"
                        class="elevation-0"
                        lazy-validation

                    >
                        <v-text-field
                            v-model="proyecto.name"
                            label="Nombre del proyecto"
                            required
                            outlined
                            prepend-icon="mdi-fountain-pen-tip"


                        ></v-text-field>

                        <v-textarea
                            v-model="proyecto.description"
                            label="Descripción del proyecto"
                            required
                            outlined
                            prepend-icon="mdi-book-open-variant"
                            auto-grow
                        ></v-textarea>
                        <!--Jefes de proyecto-->
                        <v-select
                            item-text="correo"
                            v-model="proyecto.bosses"
                            :items="items"
                            label="Jefe/s de proyecto"
                            class="mt-2"
                            multiple
                            dense
                            clearable
                            chips
                            small-chips
                            outlined
                            prepend-icon="mdi-account-hard-hat"
                        ></v-select>
                        <!--Miembros del proyecto-->
                        <v-select
                            item-text="correo"
                            v-model="proyecto.workers"
                            :items="items"
                            label="Empleados del proyecto"
                            multiple
                            dense
                            clearable
                            chips
                            small-chips
                            outlined
                            prepend-icon="mdi-account-group"

                        ></v-select>

                        <!--Fecha inicio/Iteracion-->
                        <v-dialog
                            v-model="dialogDate"
                            persistent
                            width="290px"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
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
                        <!--Tipo de proyecto-->
                        <v-select
                            outlined
                            :items="typesProject"
                            label="Tipo de proyecto"
                            hint="Seleccione metodologia"
                            v-model="proyecto.projectType"
                            prepend-icon="mdi-folder-account-outline"
                            @click="addDays"
                        >
                        </v-select>
                        <!--Config Duracion-->
                        <v-row>
                            <v-col cols="4" md="4" sm="12">
                                <!--Cantidad de repeticiones-->
                                <v-select
                                    outlined
                                    :items="values"
                                    label="Cantidad de Sesiones"
                                    hint="Seleccione numero"
                                    v-model="proyecto.projectReps"
                                    prepend-icon="mdi-calendar-plus"
                                    @click="addDays"
                                >

                                </v-select>
                            </v-col>
                            <!--Formato Medicion-->
                            <v-col cols="4" md="4" sm="12">
                                <v-select
                                    outlined
                                    :items="ranges"
                                    label="Medida (dia/semana/mes)"
                                    hint="Seleccione dia/semana/mes"
                                    v-model="proyecto.rangeType"
                                    prepend-icon="mdi-calendar-range"
                                    @click="addDays"
                                >

                                </v-select>
                            </v-col>
                            <!--Formato Medicion-->
                            <v-col>
                                <v-select
                                    outlined
                                    :items="values"
                                    label="Frecuencia"
                                    hint="Seleccione duracion"
                                    v-model="proyecto.rangeVal"
                                    prepend-icon="mdi-calendar-clock"
                                    @click="addDays"
                                >
                                </v-select>
                            </v-col>
                        </v-row>
                        <v-spacer></v-spacer>

                    </v-list>

                </v-col>


                <!--<v-col cols="4">
                    <v-date-picker
                        color="#000000"
                        full-width
                        v-model="proyecto.dates"
                        range
                        locale="es-cl"
                        class="my-4"
                    ></v-date-picker>
                </v-col>-->
            </v-row>
            <v-row>

            </v-row>
            <v-container class="mb-4 mx-0 px-0">
                <v-row class="justify-center">
                    <v-btn
                        class="justify-center"
                        width="50%"
                        @click="send"
                        color="primary"
                    >
                        <v-icon  class="pr-2">
                            mdi-send
                        </v-icon>
                        Enviar
                    </v-btn>
                </v-row>
            </v-container>

        </div>
</div>

</template>
<script>
import TaskList from "./TaskListComponent";
export default {
    components: {TaskList},
    data(){
        return {
            items: [],
            proyectos:[],
            proyecto: {
                name: '',
                dates: [],
                description: '',
                bosses: [],
                workers: [],
                projectType:'',
                projectReps:'',
                rangeType:'',
                rangeVal:'',
                select: null,
            },
            backUpDate:'',
            dialogDate:true,
            typesProject:['Agil - Sprint [Historias de usuario]','Tradicional - Iteracion [Requisitos de sistema]'],
            ranges:['Dia','Semana','Mes'],
            values:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30],
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
        }
    },

    created(){

        /*
              axios.post('/user', {correo: 'ncastillo@hotmail.com', nombre: 'Nicolas'});
              axios.post('/user', {correo: 'awallberg@hotmail.com', nombre: 'Andres'});
              axios.post('/user', {correo: 'mvalenzuela@hotmail.com', nombre: 'Manuel'});  */

        axios.get('/user')
            .then(response=>{
                const res = response.data;
                this.items = res;
                console.log(res);

            });
    },

    methods: {
        send () {
            if(this.proyecto.name === '' || this.proyecto.dates.length === 0 || this.proyecto.description === ''
                || this.proyecto.bosses.length === 0 || this.proyecto.workers.length === 0
                || this.proyecto.projectReps === '' || this.proyecto.rangeType === ''
                || this.proyecto.rangeVal === '' || this.proyecto.projectType === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
            this.addDays();
            this.methodologyType();

            const nuevoProyecto = this.proyecto;
            this.proyecto = {name: '', description: '', dates: [], bosses: [], workers: [],
                projectType:'', projectReps:'', rangeType:'', rangeVal:'',};
            axios.post('/administrar-proyectos/nuevo', nuevoProyecto)
                .then(response => {
                    console.log(response.data);
                });
            window.location.href="http://127.0.0.1:8000/administrar-proyectos";
        },
        addDays() {
            if(this.backUpDate === '' || this.proyecto.projectReps === ''
                || this.proyecto.rangeType === '' || this.proyecto.rangeVal === '')
                return;

            let sumDias;
            switch (this.proyecto.rangeType) {
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
            date.setDate(date.getDate() + (sumDias*parseInt(this.proyecto.rangeVal, 10)*parseInt(this.proyecto.projectReps, 10))+1);
            this.proyecto.dates[0] = this.backUpDate;
            this.proyecto.dates[1] = date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();
            console.log(this.proyecto.dates);
        },
        methodologyType() {
            if (this.proyecto.projectType === 'Agil - Sprint [Historias de usuario]')
                this.proyecto.projectType = 'Agil';
            else
                this.proyecto.projectType = 'Tradicional';
        },

        cancelDate(){
            this.backUpDate = this.proyecto.dates[0]
            this.dialogDate=false
        },
        selectDate(){
            this.proyecto.dates[0] = this.backUpDate
            this.dialogDate=false
            this.addDays();
        }

    }
}
</script>
