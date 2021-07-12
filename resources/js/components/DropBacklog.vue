<template>
    <div id="vue-example">
        <div id="drag-scope">
            <div class="column">
                <v-row align="center" justify="center">
                    <v-col>
                        <div class="title">Backlog  
                            <v-btn
                                color="#FF1493"
                                elevation="8"
                                icon
                                outlined
                                x-small
                                @click="addNewCardBacklog"
                            >+</v-btn>
                        </div>
                    </v-col>
                </v-row>
                <Board class="backlog  green lighten-4" :data="todos.backlog">
                    <Card class="handle" v-for="(todos, index) in todos.backlog" :data="todos" :key="index" @remove="todos.design.splice(index, 1)"></Card>
                </Board>
            </div>
            <div class="column">
                <div class="title">Design
                    <v-btn
                        color="#FF1493"
                        elevation="8"
                        icon
                        outlined
                        x-small
                        @click="addNewCardDesign"
                    >+</v-btn>
                </div>
                <Board class="design red lighten-4" :data="todos.design">
                        <Card class="handle" v-for="(todos, index) in todos.design" :data="todos" :key="index" @remove="todos.backlog.splice(index, 1)"></Card>
                </Board>
            </div>
        </div>
    </div>
</template>
<script>
import Board from "./Board";
import Card from "./Card";
import lmdd from "../lmdd.min";



export default {
    name: "two-lists",
    display: "Two Lists",
    order: 1,
    components: {
        Board, Card
    },
    data() {
        return {
            todos: {
                backlog: [
                    {
                        color: '',
                        head: 'HU06 - TA01',
                        title: 'Implementar la columna Backlog',
                        des: 'S1 - TA01: Implementar la interfaz tipo columna que tendrá el backlog (1)',
                        content: 'Inconvenientes con integración por problemas con el entorno de desarrollo (Entre CodePen, para el prototipo y PHPStorm para el desarrollo), específicamente con ExternalScript y ExternalStylesHeets, más tiempo de estudio requerido. Sin ningún problema de comunicación entre Frontend y Backend.'

                    },
                    {
                        color:'orange lighten-1',
                        head: 'HU03 - TA02',
                        title: 'Implementar el menú lateral de navegación',
                        des: 'S1 - TA02: Implementar menú en todas las paginas(1)',
                        content: 'Manejar la forma de mostrar las iteraciones dentro de un tablero kanban perteneciente aun proyecto. (Tips: Algunas formas son mediante deslizamiento, en donde todas las iteraciones [columnas] están una al lado de la otra; por pestañas o tabs, algo similar a excel; o puede ser un menu colapsable).'

                    }
                ],
                design: []
            }
        }
    },
    mounted: function() {
        lmdd.set(document.getElementById('drag-scope'), {
            containerClass: 'Board',
            draggableItemClass: 'Card',
            dataMode: true
        });
        this.$el.addEventListener('lmddend', this.handleDragEvent);
    },
    methods: {
        handleDragEvent: function(event) {
            const newIndex = event.detail.to.index;
            const oldIndex = event.detail.from.index;
            const newContainer = event.detail.to.container.__vue__.data;
            const oldContainer = event.detail.from.container.__vue__.data;
            if (event.detail.dragType === 'move') {
                newContainer.splice(newIndex, 0, oldContainer.splice(oldIndex, 1)[0]);
            }
        },
        addNewCardBacklog: function() {
            this.todos.backlog.push({
                color:'orange lighten-1',
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:'',
                content: ''
            })
        },
        addNewCardDesign: function() {
            this.todos.design.push({
                color:'orange lighten-1',
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:'',
                content: ''
            })
        },
        editCard: function() {
            this.todos.design.push({
                color:'orange lighten-1',
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:'',
                content: ''
            })
        },

    }
};
</script>

<style>
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
