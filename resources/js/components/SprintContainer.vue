<template>
    <v-container class="mx-0">
        <v-row class="hidden-sm-and-down">
            <v-col cols="9" class="mb-0 pb-0">
                <v-row style="overflow: hidden;">
                    <kanban>
                    </kanban>
                </v-row>

                <!--v-row class="d-flex flex-nowrap py-0 mb-0"
                       style="overflow-x: scroll;height: 100%"
                >
                    <v-col cols="4">
                        <v-card color="secondary" class="px-2 pb-0">
                            <v-card-title class="white--text ma-0 px-0 py-1">
                                Backlog
                            </v-card-title>
                            <v-card color="secondary"
                                    v-for="(backlog1,index1t) in backlog"
                                    key="todo1.index1t"
                            >
                                <draggable class="list-group v-picker--full-width" color="white"
                                           :list="backlog1.subcycle" group="subcycleGroup">
                                    <v-card
                                        v-model="todo"
                                        placeholder="Enter Task"
                                        @keyup.enter="add"
                                        class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                        v-for="(subcycles,index2) in backlog1.subcycle"
                                        :key="index2"
                                    >
                                        {{ subcycles }}
                                    </v-card>
                                </draggable>
                            </v-card>
                        </v-card>
                    </v-col>
                    <v-col cols="4">
                        <v-card color="secondary" class="px-2 pb-0">
                            <v-card-title class="white--text ma-0 px-0 py-1">
                                To-do
                            </v-card-title>
                            <v-card color="secondary"
                                    v-for="(todo1,index1t) in todo"
                                    key="todo1.index1t"
                            >
                                <draggable class="list-group v-picker--full-width" color="white"
                                           :list="todo1.subcycle" group="subcycleGroup">
                                    <v-card

                                        v-model="todo"
                                        placeholder="Enter Task"
                                        @keyup.enter="add"
                                        class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                        v-for="(subcycles,index2) in todo1.subcycle"
                                        :key="index2"
                                    >
                                        {{ subcycles }}
                                    </v-card
                                    >
                                </draggable>
                            </v-card>
                        </v-card>
                    </v-col>
                    <v-col cols="4">
                        <v-card color="secondary" class="px-2 pb-0">
                            <v-card-title class="white--text ma-0 px-0 py-1">
                                Doing
                            </v-card-title>
                            <v-card color="secondary"
                                    v-for="(doing1,index1t) in doing"
                                    key="todo1.index1t"
                            >
                                <draggable class="list-group v-picker--full-width" color="white"
                                           :list="doing1.subcycle" group="subcycleGroup">
                                    <v-card

                                        v-model="todo"
                                        placeholder="Enter Task"
                                        @keyup.enter="add"
                                        class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                        v-for="(subcycles,index2) in doing1.subcycle"
                                        :key="index2"
                                    >
                                        {{ subcycles }}
                                    </v-card>
                                </draggable>
                            </v-card>
                        </v-card>
                    </v-col>
                    <v-col cols="4">
                        <v-card color="secondary" class="px-2 pb-0">
                            <v-card-title class="white--text ma-0 px-0 py-1">
                                Done
                            </v-card-title>
                            <v-card color="secondary"
                                    v-for="(done1,index1t) in done"
                                    key="done1.index1t"
                            >
                                <draggable class="list-group v-picker--full-width" color="white"
                                           :list="done1.subcycle" group="subcycleGroup">
                                    <v-card

                                        placeholder="Enter Task"
                                        @keyup.enter="add"
                                        class="list-goup-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                        v-for="(subcycles,index2) in done1.subcycle"
                                        :key="index2"
                                    >
                                        {{ subcycles }}
                                    </v-card>
                                </draggable>
                            </v-card>
                        </v-card>

                    </v-col>
                </v-row-->
                <!---->
            </v-col>
            <v-col cols="3" style="height: 34rem; overflow-y: scroll" class="mb-2">
                <v-card color="primary" class="px-2 pb-0 mb-0">
                    <v-card-title class="white--text mx-1 mt-0 mb-0 px-0 pb-0 pt-1">
                        <v-row class="ma-0 pa-0 v-picker--full-width">
                            <v-col cols="10" class="my-0 ml-0 mr-2 pa-0">
                                {{cycleTypeEj}}
                            </v-col>
                            <v-col cols="1" class="ma-0 pa-0">
                                <v-btn v-model="cycle"
                                       icon
                                       color="primary"
                                       class="ma-0 pa-0 text-right"
                                       min-width="0"
                                       min-height="0"
                                       @click="addCycle">
                                    <v-icon class="ma-0 pa-0 pb-1 white--text"
                                    >
                                        mdi-plus
                                    </v-icon>
                                </v-btn>
                            </v-col>
                        </v-row>

                    </v-card-title>

                    <v-container>
                        <v-row>
                            <v-card
                                class="rounded-2 py-0 px-1 my-2 v-picker--full-width"
                                color="secondary"
                                v-for="(cycles1,index1) in cycles"
                                :key="index1"

                            >
                                <v-container>
                                    <v-row >
                                        <v-card-title v-model="cycleName"
                                                      class="white--text pb-0 pt-1 px-0 ma-0 v-picker--full-width"
                                        >
                                            <v-row class="ma-0 pa-0 v-picker--full-width">
                                                <v-col
                                                    cols="10"
                                                    class="my-0 ml-0 mr-2 pa-0">
                                                    <div v-show = "cycles1.edit == false" class="v-picker--full-width ma-0 pa-0">
                                                        <label
                                                            class="ma-0 pa-0"
                                                            @dblclick = "cycles1.edit = true">
                                                            {{cycles1.cycleName}}
                                                        </label>
                                                    </div>
                                                    <input v-show = "cycles1.edit == true"
                                                           v-model = "cycles1.cycleName"
                                                           v-on:blur= "cycles1.edit=false; $emit('update')"
                                                           @keyup.enter = "cycles1.edit=false; $emit('update')"
                                                           @keydown.enter="editCycle(cycles1.sprintId, cycles1.cycleName)"
                                                           class="v-picker--full-width ma-0 pa-0"
                                                    >
                                                </v-col>
                                                <!--v-col cols="1" class="my-0 ml-0 mr-2 pa-0">
                                                    <v-btn v-model="cycle"
                                                           icon
                                                           color="secondary"
                                                           class="ma-0 pa-0 text-right"
                                                           min-width="0"
                                                           min-height="0"
                                                           @click="editCycle">
                                                        <v-icon class="ma-0 pa-0 white--text"
                                                        >
                                                            mdi-pencil
                                                        </v-icon>
                                                    </v-btn>
                                                </v-col-->
                                                <v-col cols="1" class="ma-0 pa-0">
                                                    <v-btn v-model="cycle"
                                                           icon
                                                           color="secondary"
                                                           class="ma-0 pa-0 pb-2 text-right"
                                                           min-width="0"
                                                           min-height="0"
                                                           @click="deleteCycle(cycles1.sprintId, index1)">
                                                        <v-icon class="ma-0 pa-0 white--text"
                                                        >
                                                            mdi-delete
                                                        </v-icon>
                                                    </v-btn>
                                                </v-col>
                                            </v-row>

                                        </v-card-title>
                                        <draggable class="list-group v-picker--full-width ma-0 pa-0"
                                                   color="white"
                                                   :list="cycles1.subcycle"
                                                   group="cycleGroup"
                                                   @change="changeSprint()"


                                        >

                                            <v-card
                                                placeholder="Enter Task"

                                                class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                                v-for="(subcycles,index2) in cycles1.subcycle"
                                                @
                                                :key="index2"

                                            >
                                                {{ subcycles.name }}
                                            </v-card>
                                        </draggable>
                                        <!--v-card
                                        class="rounded-2 pa-2 mb-1 v-picker--full-width"
                                        v-for="(requisitos,index2) in iteraciones.requisitos"
                                        key="index2">
                                        {{requisitos}}
                                        </v-card-->
                                    </v-row>
                                </v-container>

                            </v-card>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>
        <v-row class="hidden-md-and-up">
            <v-col cols="6" class="mb-0 pb-0">
                <v-row class="d-flex flex-nowrap py-0 mb-0"
                       style="overflow-x: scroll;height: 100%"
                >
                    <v-col cols="12">
                        <v-card color="secondary" class="px-2 pb-0">
                            <v-card-title class="white--text ma-0 px-0 py-1">
                                Backlog
                            </v-card-title>
                            <v-card color="secondary"
                                    v-for="(backlog1,index1t) in backlog"
                                    key="todo1.index1t"
                            >
                                <draggable class="list-group v-picker--full-width" color="white"
                                           :list="backlog1.subcycle" group="subcycleGroup">
                                    <v-card
                                        v-model="todo"
                                        placeholder="Enter Task"
                                        @keyup.enter="add"
                                        class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                        v-for="(subcycles,index2) in backlog1.subcycle"
                                        :key="index2"
                                    >
                                        {{ subcycles }}
                                    </v-card>
                                </draggable>
                            </v-card>
                        </v-card>
                    </v-col>
                    <v-col cols="12">
                        <v-card color="secondary" class="px-2 pb-0">
                            <v-card-title class="white--text ma-0 px-0 py-1">
                                To-do
                            </v-card-title>
                            <v-card color="secondary"
                                    v-for="(todo1,index1t) in todo"
                                    key="todo1.index1t"
                            >
                                <draggable class="list-group v-picker--full-width" color="white"
                                           :list="todo1.subcycle" group="subcycleGroup">
                                    <v-card

                                        v-model="todo"
                                        placeholder="Enter Task"
                                        @keyup.enter="add"
                                        class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                        v-for="(subcycles,index2) in todo1.subcycle"
                                        :key="index2"
                                    >
                                        {{ subcycles }}
                                    </v-card
                                    >
                                </draggable>
                            </v-card>
                        </v-card>
                    </v-col>
                    <v-col cols="12">
                        <v-card color="secondary" class="px-2 pb-0">
                            <v-card-title class="white--text ma-0 px-0 py-1">
                                Doing
                            </v-card-title>
                            <v-card color="secondary"
                                    v-for="(doing1,index1t) in doing"
                                    key="todo1.index1t"
                            >
                                <draggable class="list-group v-picker--full-width" color="white"
                                           :list="doing1.subcycle" group="subcycleGroup">
                                    <v-card

                                        v-model="todo"
                                        placeholder="Enter Task"
                                        @keyup.enter="add"
                                        class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                        v-for="(subcycles,index2) in doing1.subcycle"
                                        :key="index2"
                                    >
                                        {{ subcycles }}
                                    </v-card>
                                </draggable>
                            </v-card>
                        </v-card>
                    </v-col>
                    <v-col cols="12">
                        <v-card color="secondary" class="px-2 pb-0">
                            <v-card-title class="white--text ma-0 px-0 py-1">
                                Done
                            </v-card-title>
                            <v-card color="secondary"
                                    v-for="(done1,index1t) in done"
                                    key="done1.index1t"
                            >
                                <draggable class="list-group v-picker--full-width" color="white"
                                           :list="done1.subcycle" group="subcycleGroup">
                                    <v-card

                                        placeholder="Enter Task"
                                        @keyup.enter="add"
                                        class="list-goup-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                        v-for="(subcycles,index2) in done1.subcycle"
                                        :key="index2"
                                    >
                                        {{ subcycles }}
                                    </v-card>
                                </draggable>
                            </v-card>
                        </v-card>

                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="6" style="height: 34rem; overflow-y: scroll" class="mb-2">
                <v-card color="primary" class="px-2 pb-0 mb-0">
                    <v-card-title class="white--text mx-1 mt-0 mb-0 px-0 pb-0 pt-1">
                        <v-row class="ma-0 pa-0 v-picker--full-width">
                            <v-col cols="8" class="my-0 ml-0 mr-2 pa-0">
                                {{cycleTypeEj}}
                            </v-col>
                            <v-col cols="1" class="ma-0 pa-0">
                                <v-btn v-model="cycle"
                                       icon
                                       color="primary"
                                       class="ma-0 pa-0 text-right"
                                       min-width="0"
                                       min-height="0"
                                       @click="addCycle">
                                    <v-icon class="ma-0 pa-0 pb-1 white--text"
                                    >
                                        mdi-plus
                                    </v-icon>
                                </v-btn>
                            </v-col>
                        </v-row>

                    </v-card-title>

                    <v-container>
                        <v-row>
                            <v-card
                                class="rounded-2 py-0 px-1 my-2 v-picker--full-width"
                                color="secondary"
                                v-for="(cycles1,index1) in cycles"
                                :key="index1"

                            >
                                <v-container>
                                    <v-row >
                                        <v-card-title v-model="cycleName"
                                                      class="white--text pb-0 pt-1 px-0 ma-0 v-picker--full-width"
                                        >
                                            <v-row class="ma-0 pa-0 v-picker--full-width">
                                                <v-col
                                                    cols="8"
                                                    class="my-0 ml-0 mr-2 pa-0">
                                                    <div v-show = "cycles1.edit == false" class="v-picker--full-width ma-0 pa-0">
                                                        <label
                                                            class="ma-0 pa-0"
                                                            @dblclick = "cycles1.edit = true">
                                                            {{cycles1.cycleName}}
                                                        </label>
                                                    </div>
                                                    <input v-show = "cycles1.edit == true"
                                                           v-model = "cycles1.cycleName"
                                                           v-on:blur= "cycles1.edit=false; $emit('update')"
                                                           @keyup.enter = "cycles1.edit=false; $emit('update')"
                                                           @keydown="editCycle"
                                                           class="v-picker--full-width ma-0 pa-0"
                                                    >
                                                </v-col>
                                                <!--v-col cols="1" class="my-0 ml-0 mr-2 pa-0">
                                                    <v-btn v-model="cycle"
                                                           icon
                                                           color="secondary"
                                                           class="ma-0 pa-0 text-right"
                                                           min-width="0"
                                                           min-height="0"
                                                           @click="editCycle">
                                                        <v-icon class="ma-0 pa-0 white--text"
                                                        >
                                                            mdi-pencil
                                                        </v-icon>
                                                    </v-btn>
                                                </v-col-->
                                                <v-col cols="1" class="ma-0 pa-0">
                                                    <v-btn v-model="cycle"
                                                           icon
                                                           color="secondary"
                                                           class="ma-0 pa-0 pb-2 text-right"
                                                           min-width="0"
                                                           min-height="0"
                                                           @click="deleteCycle(index1)">
                                                        <v-icon class="ma-0 pa-0 white--text"
                                                        >
                                                            mdi-delete
                                                        </v-icon>
                                                    </v-btn>
                                                </v-col>
                                            </v-row>

                                        </v-card-title>
                                        <draggable class="list-group v-picker--full-width ma-0 pa-0"
                                                   color="white"
                                                   :list="cycles.subcycle"
                                                   group="cycleGroup"


                                        >
                                            <v-card
                                                placeholder="Enter Task"
                                                @keyup.enter="add"
                                                class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                                v-for="(subcycles,index2) in cycles1.subcycle"
                                                :key="index2"

                                            >
                                                {{ subcycles }}
                                            </v-card>
                                        </draggable>
                                        <!--v-card
                                        class="rounded-2 pa-2 mb-1 v-picker--full-width"
                                        v-for="(requisitos,index2) in iteraciones.requisitos"
                                        key="index2">
                                        {{requisitos}}
                                        </v-card-->
                                    </v-row>
                                </v-container>

                            </v-card>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>
    </v-container>

</template>

<script>
import draggable from 'vuedraggable';


export default {
    name: "SprintContainer",
    components: {
        draggable
    },
    props: {
        project_id: null,
        sprints: null,
        tasks: null,
    },
    data: () => ({


        nuevoRequisito: "",
        newCycle:'',
        cycle: [],
        subcycle: [],
        cycleName:'',
        fechaInic: '',
        fechaFin:'',
        cycleType: '',
        edit: false,
        cycleState:'Backlog',
        cycleTypeEj: "Iteraciones",
        cycles: [
            /*{
                cycleName:'Iteración 1:',
                edit: false,
                subcycle: ['HU01: Ejemplo1', 'HU02: Ejemplo2', 'HU03: Ejemplo3'],
                cycleState:'Backlog',
                fechaInic: '',
                fechaFin:'',
            },
            {
                cycleName:'Iteración 2:',
                edit: false,
                subcycle: ['HU04: Ejemplo4', 'HU05: Ejemplo5'],
                cycleState:'Backlog',
                fechaInic: '',
                fechaFin:'',
            },
            {
                cycleName:'Iteración 3:',
                edit: false,
                subcycle: ['HU06: Ejemplo6', 'HU07: Ejemplo7'],
                cycleState:'Backlog',
                fechaInic: '',
                fechaFin:'',
            },
            {
                cycleName:'Iteración 4:',
                edit:false,
                subcycle: ['HU08: Ejemplo8', 'HU09: Ejemplo9'],
                cycleState:'Backlog',
                fechaInic: '',
                fechaFin:'',
            },
            {
                cycleName:'Iteración 5:',
                edit: false,
                subcycle: ['HU11: Ejemplo10', 'HU11: Ejemplo11'],
                cycleState:'Backlog',
                fechaInic: '',
                fechaFin:'',
            }*/
        ],
        backlog: [
            {
                subcycle: ['This', 'is the', 'backlog'],
                cycleState:'Backlog',
                fechaInic: '',
                fechaFin:'',
            }
        ]
        ,
        todo: [
            {
                subcycle: [],
                cycleState:'Todo',
                fechaInic: '',
                fechaFin:'',
            }
        ],
        doing: [
            {
                subcycle: [],
                cycleState:'Doing',
                fechaInic: '',
                fechaFin:'',
            }
        ]
        ,
        done: [
            {
                subcycle: [],
                cycleState:'Done',
                fechaInic: '',
                fechaFin:'',
            }
        ],
        editedCycle: null,
        sprintUp: {
            id_proyecto: null,
            nombre_sprint: null,
            fechaInicio: null,
            fechaTermino: null
        },
        taskUp: {
            id_proyecto: null,
            id_sprint: null,
            descripcion: null,
            estado: null

        },
    }),
    created() {
        console.log(this.project_id);
        this.sprints.forEach(element => console.log(element));



        let index = 0;
        for (let sprint of this.sprints) {
            /*cycleName:'Iteración 4:',
                edit:false,
                subcycle: ['HU08: Ejemplo8', 'HU09: Ejemplo9'],
                cycleState:'Backlog',
                fechaInic: '',
                fechaFin:'',
             */
            let name = sprint.nombre_sprint;
            let subcycle = [];
            let tasksId = [];
            let cycleState = 'Backlog';
            let fechaInicio = '';
            let fechaFin = '';

            this.tasks[index].forEach(element => subcycle.push({name: element.name, id: element.id, id_sprint: element.id_sprint}));

            this.cycles.push({
                cycleName: name,
                edit: false,
                subcycle: subcycle,
                tasksId: tasksId,
                cycleState: cycleState,
                fechaInic: fechaInicio,
                fechaFin: fechaFin,
                sprintId: sprint.id
            });
            index++;
        }
        console.log(this.cycles);


    },

    methods: {
        add: function () {
            this.nuevoProyecto.push({requisitos: this.nuevoProyecto});
            //this.nuevoProyecto = "";

        },
        changeSprint: function (){

            //Aqui por las caracteristicas del vuedraggable se realiza la actualizacion de todos los elementos de
            //tanto la lista de tareas en sprints
            //Tras realizar el cambio se ordenan las tareas por el id que posean, ya que asi se extraen desde la base de datos
            for (const cycle of this.cycles) {
                for (const task of cycle.subcycle) {
                    if (task.id_sprint != cycle.sprintId){
                        axios.put('/sprint/'+task.id, {id_sprint: cycle.sprintId}).then( console.log('updated'));
                    }

                }

            }

        }
        ,
        addCycle: function(){

            this.sprintUp.id_proyecto = this.project_id;
            this.sprintUp.nombre_sprint = 'Nueva Iteración';
            let date = new Date();
            //Solo se ingresa la fecha actual
            this.sprintUp.fechaInicio = date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();
            this.sprintUp.fechaTermino = date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();



            axios.post('/sprint-container' , this.sprintUp);


            this.cycles.push(
                {
                    cycleName: "Nueva iteración",
                    subcycle: [],
                    edit:false,
                    cycleState: 'Backlog'
                }
            )
        },
        editCycle: function (id, name){
            let auxCycleName = this.cycleName;
            console.log(name.length);
            if(name.length != 0){
                this.cycleName = this.cycle.cycleName;
                axios.put('/sprint-container/'+id, {nombre_sprint: name}).then(request=>{console.log('update')})
            }
            else{
                console.log(this.cycleName);
                console.log(this.cycle.cycleName);
            }

        },
        deleteCycle: function (id){

            //Al eliminar falta que las tareas que estan relacionadas al sprint se muevan al primer sprint
            //o no se permita eliminar el sprint en caso que no este vacio
            let i = 0;
            for (const cycle of this.cycles) {
                if (cycle.sprintId === id && cycle.subcycle.length === 0 && !(this.cycles.length == 1)){
                    this.cycles.splice(i,1);
                    axios.delete('/sprint-container/'+id);
                    //this.cycles.splice(this.cycles.indexOf(this.SprintContainer),1);

                }
                i++;
            }



        },
        log: function(evt) {
            window.console.log(evt);
        }
    }
};
</script>

<style scoped>

</style>
