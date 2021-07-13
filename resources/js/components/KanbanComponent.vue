<template>
    <div class="container mx-0 px-0">
        <menu-kanban></menu-kanban>
        <div class="container mt-auto">
            <div class="row mt-auto">
                <div class="col-md-4">
                    <div class="p-2 alert alert-secondary">
                        <Board class="backlog  green lighten-4" :data="all.arrBacklog">
                            <h3>BackLog
                                <v-btn
                                    color="#FF1493"
                                    elevation="8"
                                    icon
                                    outlined
                                    x-small
                                    @click="addNewCardBacklog"
                                >+</v-btn>
                            </h3>
                            <draggable class="list-group kanban-column" :list="all.arrBacklog" group="task">
                                <Card class="handle" v-for="(element, index) in all.arrBacklog" :data="element" :key="index" @remove="all.arrBacklog.splice(index, 1)"></Card>
                            </draggable>
                            <v-divider></v-divider>
                        </Board>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-2 alert alert-secondary">
                        <h3>In Progress
                            <v-btn
                                color="#FF1493"
                                elevation="8"
                                icon
                                outlined
                                x-small
                                @click="addNewCardInProgress"
                            >+</v-btn>
                        </h3>
                        <Board class="backlog  red lighten-4" :data="all.arrInProgress">
                            <draggable class="list-group kanban-column" :list="all.arrInProgress" group="task">
                                <Card class="handle" v-for="(element, index) in all.arrInProgress" :data="element" :key="index" @remove="all.arrInProgress.splice(index, 1)"></Card>
                            </draggable>
                            <v-divider></v-divider>
                        </Board>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-2 alert alert-secondary">
                        <h3>Done
                            <v-btn
                                color="#FF1493"
                                elevation="8"
                                icon
                                outlined
                                x-small
                                @click="addNewCardDone"
                            >+</v-btn>
                        </h3>
                        <Board class="backlog  blue lighten-4" :data="all.arrDone">
                            <draggable class="list-group kanban-column" :list="all.arrDone" group="task">
                                <Card class="handle" v-for="(element, index) in all.arrDone" :data="element" :key="index" @remove="all.arrDone.splice(index, 1)"></Card>
                            </draggable>
                            <v-divider></v-divider>
                        </Board>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-2 alert alert-secondary">
                        <h3>Tested</h3>
                        <Board class="backlog  orange lighten-4" :data="all.arrTested">
                            <draggable class="list-group kanban-column" :list="all.arrTested" group="task">
                                <Card class="handle" v-for="(element, index) in all.arrTested" :data="element" :key="index" @remove="all.arrTested.splice(index, 1)"></Card>
                            </draggable>
                            <v-divider></v-divider>
                        </Board>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from "vuedraggable";
import MenuKanban from "./MenuKanban";
import Board from "./Board";
import Card from "./Card";

export default {
    order: 1,
    props: ['data'],
    name: "KanbanComponent",
    components:{MenuKanban,Card,Board},
    data(){
        return{
            newTask: "",
            all:{
                arrBacklog: [
                    {
                        name: "tarea1",
                        color: 'blue',
                        head: 'HU06 - TA01',
                        title: 'Implementar Columna',
                        des: 'S1 - TA01: Implementar la interfaz tipo columna que tendrá el backlog (1)',
                        content: 'Inconvenientes con integración por problemas con el entorno de desarrollo (Entre CodePen, para el prototipo y PHPStorm para el desarrollo), específicamente con ExternalScript y ExternalStylesHeets, más tiempo de estudio requerido. Sin ningún problema de comunicación entre Frontend y Backend.'

                    },
                    {
                        name: "tarea2",
                        color:'orange',
                        head: 'HU03 - TA02',
                        title: 'Implementar Menú Lateral',
                        des: 'S1 - TA02: Implementar menú en todas las paginas(1)',
                        content: 'Manejar la forma de mostrar las iteraciones dentro de un tablero kanban perteneciente aun proyecto. (Tips: Algunas formas son mediante deslizamiento, en donde todas las iteraciones [columnas] están una al lado de la otra; por pestañas o tabs, algo similar a excel; o puede ser un menu colapsable).'
                    }
                ],
                arrInProgress: [
                    {
                        name: "tarea3",
                        color:'green lighten-2',
                        head: 'HU07 - TA01',
                        title: 'Implementar Estadísticas',
                        des: 'S1- TA01: Implementar estadísticas (gráficos) sobre datos de un proyecto',
                        content: 'Crear los scripts de backend que recaben y envien los datos a los gráficos del Frontend. Referirse a la tarea anterior para más información sobre los gráficos. (4)'
                    }
                ],
                arrDone: [],
                arrTested:[]
            }
        }
    },
    methods:{
        add(){
            if(this.newtask){
                this.arrBacklog.push({name: this.newTask});
                this.newTask="";
            }
        },
        addNewCardBacklog: function() {
            this.all.arrBacklog.push({
                name: this.newTask,
                color:'orange',
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:'',
                content: ''
            })
        },
        addNewCardInProgress: function() {
            this.all.arrInProgress.push({
                name: this.newTask,
                color:'red lighten-1',
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:'',
                content: ''
            })
        },
        addNewCardDone: function() {
            this.all.arrDone.push({
                name: this.newTask,
                color:'green lighten-2',
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:'',
                content: ''
            })
        },
    }
}
</script>

<style scoped>
    .kanban-column{
        min-height: 200px;
        min-width: 400px;
    }
    #vue-example {
        width: 100%;
        margin-top: 15px;
        margin-bottom: 15px;
        background-color: lightcyan;
    }

    #drag-scope {
        display: flex;
        justify-content: space-around;
        background-color: lightcyan;
    }

    .column {
        flex: 1 1 350px;

    }

    .handle {
        cursor: move;
    }

    .title {
        text-align: center;
        font-weight: bold;
        padding: 10px;
        margin: 5px;
    }

    .Board {
        display: flex;
        padding: 10px;
        margin: 10px;
        flex-flow: column nowrap;
        min-height: 106px;
    }
</style>
