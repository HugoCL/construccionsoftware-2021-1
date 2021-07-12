<template>
    <v-card>
      <v-sheet dark color="primary" >
        Tareas por sprint
        <v-sparkline
          :value="values"
          color="rgba(255, 255, 255, .7)"
          height="70"
          padding="5"
          stroke-linecap="round"
          :smooth="0"
          line-width="1"
        >
          <template v-slot:label="item">
            {{ item.value }}
          </template>
        </v-sparkline>
      </v-sheet>

      <v-sheet>Grafico tareas hechas/tareas totales</v-sheet>
      <v-sheet
        dark
        color="primary"
        class= "d-flex flex-no-wrap "
      ><v-card-text v-text="nombreProyecto"></v-card-text>
        <v-progress-circular class="ma-2" :size="100" :value="porcentajeTareas">
          {{ numTareasCompletadas }}/{{ numTareasTotal}}
        </v-progress-circular>
      </v-sheet>

      <v-sheet>Grafico tareas persona/proyecto</v-sheet>
      <v-row class="mb-1">
        <v-col align-self="center" class="p-n4" v-for="(item2, aux2) in personas" :key="aux2">
          <v-card
            class= "d-flex flex-no-wrap "
            dark
            color="primary"
          >
          <v-card-text v-text="item2.nombre"></v-card-text>
            <v-progress-circular  :size="60" :value="item2.prom" class="mr-2">
              {{ item2.tareasAsig }}/{{ numTareasTotal }}
            </v-progress-circular>
          </v-card>
        </v-col>
      </v-row>
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
