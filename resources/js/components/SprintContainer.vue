<template>
    <v-container class="mx-0">
        <v-row >
            <v-col cols="9" class="mb-0 pb-0">
            <v-row class="d-flex flex-nowrap py-0 mb-0"
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
                        <draggable class="list-group v-picker--full-width" color="white" :list="backlog1.requisitos" group="requisitosGroup">
                            <v-card

                                v-model="todo"
                                placeholder="Enter Task"
                                @keyup.enter="add"
                                class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                v-for="(requisitos,index2) in backlog1.requisitos"
                                :key="index2"
                            >
                                {{ requisitos }}
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
                        <draggable class="list-group v-picker--full-width" color="white" :list="todo1.requisitos" group="requisitosGroup">
                            <v-card

                                v-model="todo"
                                placeholder="Enter Task"
                                @keyup.enter="add"
                                class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                v-for="(requisitos,index2) in todo1.requisitos"
                                :key="index2"
                            >
                                {{ requisitos }}
                            </v-card>
                        </draggable>
                    </v-card>
                </v-card>
            </v-col>
            <v-col cols="4" >
                <v-card color="secondary" class="px-2 pb-0">
                    <v-card-title class="white--text ma-0 px-0 py-1">
                        Doing
                    </v-card-title>
                    <v-card color="secondary"
                            v-for="(doing1,index1t) in doing"
                            key="todo1.index1t"
                    >
                        <draggable class="list-group v-picker--full-width" color="white" :list="doing1.requisitos" group="requisitosGroup">
                            <v-card

                                v-model="todo"
                                placeholder="Enter Task"
                                @keyup.enter="add"
                                class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                v-for="(requisitos,index2) in doing1.requisitos"
                                :key="index2"
                            >
                                {{ requisitos }}
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
                        <draggable class="list-group v-picker--full-width" color="white" :list="done1.requisitos" group="requisitosGroup">
                            <v-card

                                v-model="doing1"
                                placeholder="Enter Task"
                                @keyup.enter="add"
                                class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                v-for="(requisitos,index2) in done1.requisitos"
                                :key="index2"
                            >
                                {{ requisitos }}
                            </v-card>
                        </draggable>
                    </v-card>
                </v-card>

            </v-col>
            </v-row>
            </v-col>
            <v-col cols="3" style="height: 34rem; overflow-y: scroll" class="mb-3">
                <v-card color="primary" class="px-2 pb-2">
                    <v-card-title class="white--text mx-1 mt-0 mb-1 px-0 pb-0 pt-1">
                        Iteraciones
                    </v-card-title>
                    <v-container >
                        <v-row>
                            <v-card
                                class="rounded-2 py-0 px-1 my-2 v-picker--full-width"
                                color="secondary"
                                v-for="(iteraciones1,index1) in iteracion"
                                :key="index1"

                            >
                                <v-container>
                                    <v-row>
                                        <v-card-title class="white--text py-2 px-0 ma-0 v-picker--full-width"

                                        >
                                            Iteración {{index1+1}}:
                                        </v-card-title>
                                        <draggable class="list-group v-picker--full-width " color="white" :list="iteracion.requisitos" group="iteracionesGroup">
                                            <v-card
                                                v-model="iteracion"
                                                placeholder="Enter Task"
                                                @keyup.enter="add"
                                                class="list-group-item rounded-2 pa-2 mb-1 v-picker--full-width sorteable"
                                                v-for="(requisitos,index2) in iteraciones1.requisitos"
                                                :key="index2"
                                            >
                                                {{ requisitos }}
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
    components:{
        draggable
    },


    data: () => ({
        nuevoRequisito:"",

        aux1:[

        ],

        tareas:[

        ]
        ,
        iteracion: [

        ],
        backlog: [
            {
                requisitos:['AH','la wea','xd']
            }
        ]
        ,
        todo:[
            {
                requisitos:[]
            }
        ],
        doing: [
            {
                requisitos:[]
            }
        ]
        ,
        done:[
            {
                requisitos:[]
            }
        ],
        cycle:[],
        subcycle:[],
        fechaInic:'',
        state:'',
    }),
    created() {
        //Aqui hay que agregar el id del proyecto del tipo y tiene que quedar una url del tipo
        // '/sprint/{idProyecto}/{indexSprint}'

        this.getSprints();
        console.log(this.tareas);
        for (let i = 1; i <= 5; i++) {

            axios.get('/sprint/1/'+i)
                .then(response=>{

                    const res = response.data;

                    this.aux1 = res;
                    let aux = [];

                    for (let j = 0; j < res.length; j++) {

                        aux.push(res[j].descripcion);


                    }
                    this.iteracion.push({requisitos:aux});

                });
        }
    },
    methods: {
        add: function() {
            this.nuevoProyecto.push({ requisitos: this.nuevoProyecto});
            this.nuevoProyecto="";
        },

        getSprints: function(){
            //Aca se la url debe quedar tipo '/sprint-index/{idProyecto}'
            axios.get('/sprint-index/'+1)
                .then(response=>{

                        const res = response.data;
                        this.tareas = res;
                    }
                );
        }
    }
};
</script>

<style scoped>

</style>

