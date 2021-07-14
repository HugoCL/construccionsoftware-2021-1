<template>
    <div class="container mx-0 px-0">
        <menu-kanban></menu-kanban>
        <div class="container mx-0 px-0">
            <v-row class="d-flex flex-nowrap py-0 mb-0"
                   style="overflow: scroll;height: 29rem;">
                <v-col cols="4" class="mx-2">
                    <v-row>
                    <v-col cols="12" class="p-2 alert alert-secondary kanban-list">
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
                        <KanbanBoard class="backlog  blue lighten-4" :data="all.arrBacklog">
                            <draggable class="list-group kanban-column" :list="all.arrBacklog" group="task">
                                <KanbanCard class="handle" v-for="(element, index) in all.arrBacklog" :data="element" :key="index" @remove="deleteBacklogCard(index)" @update="updateBoard"></KanbanCard>
                            </draggable>
                            <v-divider></v-divider>
                        </KanbanBoard>
                    </v-col>
                    </v-row>
                </v-col>
                <!---->
                <v-col cols="4" class="mx-2">
                    <v-row>
                    <v-col class="p-2 alert alert-secondary kanban-list">
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
                        <KanbanBoard class="backlog  red lighten-4" :data="all.arrInProgress">
                            <draggable class="list-group kanban-column" :list="all.arrInProgress" group="task">
                                <KanbanCard class="handle" v-for="(element, index) in all.arrInProgress" :data="element" :key="index" @remove="deleteInProgressCard(index)" @update="updateBoard"></KanbanCard>
                            </draggable>
                            <v-divider></v-divider>
                        </KanbanBoard>
                    </v-col>
                    </v-row>
                </v-col>
                <v-col cols="4" class="mx-2">
                    <v-row>
                    <v-col cols="12" class="p-2 alert alert-secondary kanban-list">
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
                        <KanbanBoard class="backlog  green lighten-4" :data="all.arrDone">
                            <draggable class="list-group kanban-column" :list="all.arrDone" group="task">
                                <KanbanCard class="handle" v-for="(element, index) in all.arrDone" :data="element" :key="index" @remove="deleteDoneCard(index)" @update="updateBoard"></KanbanCard>
                            </draggable>
                            <v-divider></v-divider>
                        </KanbanBoard>
                    </v-col>
                    </v-row>
                </v-col>
                <v-col cols="4" class="mx-2">
                    <v-row>
                    <v-col cols="12" class="p-2 alert alert-secondary kanban-list">
                        <h3>Tested
                            <v-btn
                                color="#FF1493"
                                elevation="8"
                                icon
                                outlined
                                x-small
                                @click="addNewCardTest"
                            >+</v-btn>
                        </h3>
                        <KanbanBoard class="backlog  orange lighten-4" :data="all.arrTested">
                            <draggable class="list-group kanban-column" :list="all.arrTested" group="task">
                                <KanbanCard class="handle" v-for="(element, index) in all.arrTested" :data="element" :key="index" @remove="deleteTestCard(index)" @update="updateBoard"></KanbanCard>
                            </draggable>
                            <v-divider></v-divider>
                        </KanbanBoard>
                    </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </div>
    </div>
</template>

<script>
import draggable from "vuedraggable";
import MenuKanban from "./MenuKanban";
import KanbanBoard from "./KanbanBoard";
import KanbanCard from "./KanbanCard";

export default {
    order: 1,
    props: ['data'],
    name: "KanbanComponent",
    components:{MenuKanban,KanbanCard,KanbanBoard},
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
                        color:'blue',
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
                color:'blue',
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
        addNewCardTest: function() {
            this.all.arrTested.push({
                name: this.newTask,
                color:'orange',
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:'',
                content: ''
            })
        },
        updateBoard(){

        },
        deleteBacklogCard(index){
            this.all.arrBacklog.splice(index, 1);
        },
        deleteInProgressCard(index){
            this.all.arrInProgress.splice(index, 1);
        },
        deleteDoneCard(index){
            this.all.arrDone.splice(index, 1);
        },
        deleteTestCard(index){
            this.all.arrTested.splice(index, 1);
        },
    }
}
</script>

<style scoped>
.kanban-column{


}

.kanban-list{

}

.handle {
    cursor: move;
}

.KanbanBoard {
    display: flex;
    padding: 10px;
    margin: 10px;
    flex-flow: column nowrap;
    min-height: 106px;
}
</style>
