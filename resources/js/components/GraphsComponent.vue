<template>
    <v-card>
        <v-toolbar
            color="primary"
            class="white--text pt-0 pb-0 text-h6"
        >
            Estadísticas
        </v-toolbar>
        <!--titulo-->
        <v-card-actions class="pa-2 ma-1 pb-0 pl-2 mb-0 text-h7 black-text" >
             <b>Tareas por sprint</b>
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

        <!--titulo-->
        <v-card-actions class="pa-2 ma-1 pb-0 mb-0 text-h7 black-text" >
         <b>Gráfico tareas hechas/tareas totales</b>
        </v-card-actions>

        <v-card-actions>
            <v-sheet

             color="secondary"
             class= "v-picker--full-width d-flex pa-2 ma-1 pb-0 mb-0 flex-no-wrap "
         ><v-card-text class="white--text title" v-text="nombreProyecto"></v-card-text>
             <v-progress-circular class="ma-2 white--text" :size="100" :value="porcentajeTareas">
                 {{ numTareasCompletadas }}/{{ numTareasTotal}}
             </v-progress-circular>
         </v-sheet>

        </v-card-actions>

        <!--titulo-->
        <v-card-actions class="pa-2 ma-1 py-0 mb-0 text-h7 black-text">
            <b>Gráfico tareas persona/proyecto</b>
        </v-card-actions>

        <v-card-actions class="pa-2 ma-1 pb-0 mb-0">
        <v-row class="mb-1 pt-0">
             <v-col align-self="center" class="p-n4" v-for="(item2, aux2) in personas" :key="aux2">
                 <v-card
                     class= "d-flex flex-no-wrap "
                     dark
                     color="secondary"
                 >
                     <v-card-text class="white--text font-weight-bold" v-text="item2.nombre">}</v-card-text>
                     <v-progress-circular  :size="60" :value="item2.prom" class="mr-2">
                         {{ item2.tareasAsig }}/{{ numTareasTotal }}
                     </v-progress-circular>
                 </v-card>
             </v-col>
         </v-row>
        </v-card-actions>
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
        axios.get('/graph-project/'+this.idProject)
            .then(response => {
                const res  = response.data;
                this.numTareasTotal = res.tareasTotales;
                this.numTareasCompletadas = res.tareasHechas;
                this.usersIn = res.usuarios;
                console.log("datos del graficos");
                console.log(res.tareasTotales);
                console.log(res.tareasHechas);

                console.log(this.usersIn);
                this.setMiembrosGraph();
                this.getPorcentaje();
                this.getPorcentajeGente();

            })
            .catch(function(error) {
                console.log(error.data);
            })
    },
    methods: {
      getPorcentaje(){
        this.porcentajeTareas = (this.numTareasCompletadas/this.numTareasTotal)*100;
      },
      getPorcentajeGente(){
        for (let index = 0; index < this.personas.length; index++) {
          this.personas[index].prom = (this.personas[index].tareasAsig/this.numTareasTotal)*100;
        }
      },
      setMiembrosGraph(){
        for (let index = 0; index < this.usersIn.length; index++) {
          let personAux = {nombre: this.usersIn[index].nombre, tareasAsig: 0, prom: 0}
          this.personas.push(personAux);
          console.log(this.usersIn[index].nombre);
          console.log(this.personas);
        }

      }
    },
}
</script>
