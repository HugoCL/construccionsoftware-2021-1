<template>
    <v-card v-model="dialogGrap">
      <v-toolbar>Graficos del proyecto</v-toolbar>
      <v-sheet dark color="primary" v-model="list">
        Tareas por sprint
        <v-sparkline
          :value="values"
          color="rgba(255, 255, 255, .7)"
          height="100"
          padding="24"
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
        v-model="proyects"
        v-for="(item, aux) in proyects"
        :key="aux"
        dark
        color="primary"
      >
        {{ item.nombre }}
        <v-progress-circular class="ma-2" :size="100" :value="item.porcentaje">
          {{ item.numtareasCompletada }}/{{ item.numTareas }}
        </v-progress-circular>
      </v-sheet>
      <v-sheet>Grafico tareas persona/proyecto</v-sheet>
      <v-sheet v-model="proyects" v-for="(item, aux) in proyects" :key="aux">
        Proyecto: {{ item.nombre }}
        <v-sheet
          v-for="(item2, aux2) in item.personas"
          :key="aux2"
          dark
          color="primary"
        >
          {{ item2.nombre }}:
          <v-progress-circular class="ma-2" :size="100" :value="item2.prom">
            {{ item2.tareasAsig }}/{{ item.numTareas }}
          </v-progress-circular>
        </v-sheet>
      </v-sheet>
      <v-btn dark color="primary" @click="dialogGrap = false"> cerrar </v-btn>
    </v-card>
</template>
<script>
export default{
    data(){
        return{
            
            values: [1,2,3,4,1,10],
            
            proyects: [
                {
                nombre: "nombre1",
                numTareas: 3,
                numtareasCompletada:1,
                porcentaje: 33,
                personas: [
                        {nombre:"juan", tareasAsig: 1, prom: 33},
                        {nombre:"pedro", tareasAsig: 2, prom: 66},
                        {nombre: "silvio",tareasAsig:3, prom: 100}]
                },
                {
                nombre: "nombre2",
                numTareas: 5,
                numtareasCompletada: 2,
                porcentaje: 40,
                personas: [
                        {nombre:"juan", tareasAsig: 1, prom: 20},
                        {nombre:"tom", tareasAsig: 4, prom: 80},
                        {nombre: "silvio",tareasAsig:3, prom: 60}]
                }
            ],
        }
    },
    methods: {

    },
}
</script>