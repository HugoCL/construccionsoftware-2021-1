<template>
    <div id="vue-example">
        <div id="drag-scope">
            <div class="column">
                <v-row align="center" justify="center">
                    <v-col align="center" justify="center">
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
                <Board class="backlog  green lighten-5" :data="todos.backlog">
                    <Card class="handle" v-for="(todo, index) in todos.backlog" :data="todo" :key="index" @remove="todos.backlog.splice(index, 1)"></Card>
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
                    <Card class="handle" v-for="(todo, index) in todos.design" :data="todo" :key="index" @remove="todos.design.splice(index, 1)"></Card>
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
                        head: 'HU06 - TA01',
                        title: 'Implementar la columna Backlog',
                        des: 'S1 - TA01: Implementar la interfaz tipo columna que tendrá el backlog (1)'
                    },
                    {
                        head: 'HU03 - TA02',
                        title: 'Implementar el menú lateral de navegación en la página',
                        des: 'S1 - TA02: Implementar menú en todas las paginas(1)'
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
            handleClass: 'handle',
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
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:''
            })
        },
        addNewCardDesign: function() {
            this.todos.design.push({
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:''
            })
        },
        editCard: function() {
            this.todos.design.push({
                head:'HU00 - TA00',
                title:'Nueva Tarjeta',
                des:''
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

.todo-container {
    display: flex;
    padding: 10px;
    margin: 10px;
    flex-flow: column nowrap;
    min-height: 106px;
}

.todo-item {
    padding: 3px;
    margin: 5px;
    color: black;
    font-size: 15px;
    background-color: grey;
    border: 3px solid lightgoldenrodyellow;
}

.backlog .todo-item {
    background-color: #FF5733;
}

.design .todo-item {
    background-color: #E97373;
}

.handle {
    cursor: move;
}

.remove {
    color: red;
    float: right;
    cursor: pointer;
}

.task {
    border: 1px dotted white;
    padding: 5px;
}

.title {
    text-align: center;
    font-weight: bold;
    padding: 10px;
    margin: 5px;
}

.input-model {
    padding: 0px 30px;
}
</style>
