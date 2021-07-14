<template>
    <v-card>
        <v-toolbar
            color="primary"
            class="white--text pt-0 pb-0 text-h6"
        >
            Estadistica
        </v-toolbar>
        <!--titulo-->
        <v-card-actions class="pa-2 ma-1 pb-0 pl-2 mb-0 text-h7 black-text" >
            <b>Tareas por Proyectos</b>
        </v-card-actions>
        <v-card-actions class="pa-1 ma-1 pb-0 mb-0">
            <v-sheet  class= "white--text pa-1 ma-1 pb-0 mb-0 v-picker--full-width" color="secondary" >

                <v-sparkline
                    :value="values"
                    color="white"
                    height="70"
                    padding="5"
                    stroke-linecap="round"
                    :smooth="0"
                    line-width="2"
                >
                    <template v-slot:label="item">
                        {{ item.value }}
                    </template>
                </v-sparkline>
            </v-sheet>
        </v-card-actions>

            <b>Proyecto con más y menos tareas</b>

            <b>Proyecto con mas y menos tareas finalizadas</b>



    </v-card>
</template>
<script>
import GraphDataComponent from "./GraphDataComponent";
import App from "./App";

export default{
    data(){

        /**
         * Variables momentaneas para el manejo de graficos
         * se debe relacionar con el backend para mostrar datos de un proyecto seleccionado
         */
        return{

            /**
             * Valores que corresponden al total de tareas creadas en un sprint
             * Si se crea un sprint, se calcula el total de tareas y se agrega a la lista
             */
            values: [1,2,3,4,1,10],
            /**
             * Lista personas asignadas a un proyecto
             * poseen nombre, tareas asignadas a la persona y por el momento un total de tareas
             */
            personas: [

            ],
            /**
             * variables de manejo de un proyecto
             * una para el nombre del proyecto seleccionado
             * una para el num de tareas creadas en el proyecto
             * una para el num de tareas Completadas del proyecto
             * y una variable que guarde el porcentaje que da entre n°tareasCompletadas/n°tareas
             */
            nombreProyecto: this.nameProject,
            numTareasTotal: "",
            numTareasCompletadas:"",
            porcentajeTareas: 0,

        }
    },
    props: {
        idProject: null,
        nameProject: null,
        usersIn: null,
    },
    created() {
        axios.get('/graph/')
            .then(response => {
                const res  = response.data;
                this.idProject = res.id_proyecto;

                console.log(res.id_proyecto);

            })

            .catch(function(error) {
                console.log(error.data);
            })
    },
    methods: {

    },
}
</script>
