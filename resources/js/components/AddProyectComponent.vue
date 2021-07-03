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

                        ></v-text-field>

                        <v-textarea
                            v-model="proyecto.description"
                            label="Descripción del proyecto"
                            required
                            outlined
                            auto-grow
                        ></v-textarea>

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
                        ></v-select>

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
                        ></v-select>
                        <v-menu
                            ref="menu"
                            v-model="menu"
                            :close-on-content-click="false"
                            :return-value.sync="proyecto.dates"
                            transition="scale-transition"
                            offset-y
                            min-width="auto"

                        >
                        <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    class="pl-2"
                                    v-model="proyecto.dates"
                                    label="Rango de fechas"
                                    prepend-icon="mdi-calendar"
                                    readonly
                                    v-bind="attrs"
                                    v-on="on"
                                    outlined
                                ></v-text-field>
                            </template>
                            <v-date-picker
                                v-model="proyecto.dates"
                                no-title
                                range
                                scrollable
                            >
                                <v-spacer></v-spacer>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="menu = false"
                                >
                                    Cancelar
                                </v-btn>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="$refs.menu.save(proyecto.dates)"
                                >
                                    Guardar
                                </v-btn>
                            </v-date-picker>
                        </v-menu>
                        <!--Duracion Spring-->
                        <v-row>
                            <!--Formato Medicion-->
                            <v-col cols="4" md="4" sm="12">
                                <v-select
                                    outlined
                                    :items="rangeSprint"
                                    label="Duracion Spring"
                                    hint="Seleccione dia/semana/mes"
                                    v-model="proyecto.rangeType"
                                    @click="checkValuesSprint"
                                    prepend-icon="mdi-calendar-range"
                                >

                                </v-select>
                            </v-col>
                            <!--Formato Medicion-->
                            <v-col>
                                <v-select
                                    outlined
                                    :items="valuesSprint"
                                    label="Valor Spring"
                                    hint="Seleccione duracion"
                                    v-model="proyecto.rangeVal"
                                    prepend-icon="mdi-calendar-clock"
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
                rangeType:'',
                rangeVal:'',
                select: null,
            },
            rangeSprint:['Dia','Semana','Mes'],
            valuesSprint:[],
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
                const users = [];
                const res = response.data;
                this.items = res;
                console.log(res);

            });
    },

    methods: {
        send () {
            if(this.proyecto.name.trim() === '' || this.proyecto.dates.length === 0 || this.proyecto.description.trim() === ''
                || this.proyecto.bosses.length === 0 || this.proyecto.workers.length === 0){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }

            const d1 = new Date(this.proyecto.dates[0]);
            const d2 = new Date(this.proyecto.dates[1]);

            if (+d1 >= +d2){
                console.log(this.proyecto.dates[0] + '-' + this.proyecto.dates[1])
                if (+d1 === +d2) {
                    alert('Las fechas no pueden ser iguales');
                    return;
                }
                let aux = this.proyecto.dates[1];

                this.proyecto.dates[1] = this.proyecto.dates[0];
                this.proyecto.dates[0] = aux;

            }

            console.log(
                {
                    'name':this.proyecto.name,
                    'dates':this.proyecto.dates,
                    'bosses':this.proyecto.bosses,
                    'workers':this.proyecto.workers
                }
            );
            const nuevoProyecto = this.proyecto;
            this.proyecto = {name: '', description: '', dates: [], bosses: [], workers: []};
            axios.post('/administrar-proyectos/nuevo', nuevoProyecto)
                .then(response => {
                    console.log(response.data);
                });
            window.location.href="http://127.0.0.1:8000/administrar-proyectos";
        },
        checkValuesSprint(){
            if (this.proyecto.rangeType==='Dia')
                this.valuesSprint=[1,2,3,4,5,6]
            else if (this.proyecto.rangeType==='Semana')
                this.valuesSprint=[1,2,3,4]
            else if (this.proyecto.rangeType==='Mes')
                this.valuesSprint=[1,2,3,4,5,6,7,8,9,9,10,11,12]
            else
                this.valuesSprint=[]



        }
    }
}
</script>
