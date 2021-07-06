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
                        <v-dialog
                            transition="dialog-bottom-transition"
                            max-width="600"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    color="primary"
                                    v-bind="attrs"
                                    v-on="on"
                                >Crear equipo</v-btn>
                            </template>
                            <v-card
                                class="mx-auto"
                                max-width="500"
                            >
                                <v-toolbar
                                    flat
                                    color="transparent"
                                >
                                    <v-app-bar-nav-icon></v-app-bar-nav-icon>
                                    <v-toolbar-title>Creacion de equipo</v-toolbar-title>
                                    <v-spacer></v-spacer>
                                </v-toolbar>

                                <v-container class="py-0">
                                    <v-row
                                        align="center"
                                        justify="start"
                                    >
                                        <v-col
                                            v-for="(selection, i) in selections"
                                            :key="selection.text"
                                            class="shrink"
                                        >
                                            <v-chip
                                                :disabled="loading"
                                                close
                                                @click:close="selected.splice(i, 1)"
                                            >
                                                <v-icon
                                                    left
                                                    v-text="selection.icon"
                                                ></v-icon>
                                                {{ selection.text }}
                                            </v-chip>
                                        </v-col>

                                        <v-col
                                            v-if="!allSelected"
                                            cols="12"
                                        >
                                        </v-col>
                                    </v-row>
                                </v-container>

                                <v-divider v-if="!allSelected"></v-divider>

                                <v-list>
                                    <template v-for="item in categories">
                                        <v-list-item
                                            v-if="!selected.includes(item)"
                                            :key="item.text"
                                            @click="selected.push(item)"
                                        >
                                            <v-list-item-avatar>
                                                <v-icon
                                                    :disabled="loading"
                                                    v-text="item.icon"
                                                ></v-icon>
                                            </v-list-item-avatar>
                                            <v-list-item-title v-text="item.text"></v-list-item-title>
                                        </v-list-item>
                                    </template>
                                </v-list>

                                <v-divider></v-divider>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        :disabled="!selected.length"
                                        color="purple"
                                        text
                                        @click="crearEquipo(selected)"
                                    >
                                        Crear
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>

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
            equipos: [],
            newEquipo:[],
            items: [
                {
                    text: 'Estudiante 1',
                    icon: 'mdi-account-circle',
                },
                {
                    text: 'Estudiante 2',
                    icon: 'mdi-account-circle',
                },
                {
                    text: 'Estudiante 3',
                    icon: 'mdi-account-circle',
                },
                {
                    text: 'Estudiante 4',
                    icon: 'mdi-account-circle',
                },
                {
                    text: 'Estudiante 5',
                    icon: 'mdi-account-circle',
                },
            ],
            loading: false,
            search: '',
            selected: [],

            //////////////////////////////////////////



            proyectos:[],
            proyecto: {
                name: '',
                dates: [],
                description: '',
                bosses: [],
                workers: [],
                select: null,
            },
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
    computed: {
        allSelected() {
            return this.selected.length === this.items.length
        },
        categories() {
            const search = this.search.toLowerCase()

            if (!search) return this.items

            return this.items.filter(item => {
                const text = item.text.toLowerCase()

                return text.indexOf(search) > -1
            })
        },
        selections() {
            const selections = []

            for (const selection of this.selected) {
                selections.push(selection)
            }

            return selections
        },
    },
    /////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////




    methods: {
        /////////////////////////////////
        crearEquipo(selected){
            alert(selected)
            this.equipos.push(selected)
        },

        /////////////////////////////
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
        }
    }
}
</script>
