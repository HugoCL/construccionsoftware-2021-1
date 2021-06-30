<template>
    <main class ="flexbox">

        <Board id="board-1" class="regular  green lighten-5">
            <v-card-title>
                Tareas aux
            </v-card-title>
            <Card id ="card-3" draggable="true" class="priority green lighten-4">
                <p> Tarea 1</p>
            </Card>
        </Board>

        <Board id="board-2" class="regular  green lighten-5" >
            <v-card-title class="priority red lighten-4">
                Sprint por def
            </v-card-title>
            <Card id ="card-5" draggable="true" class="regular  green lighten-2" >
                <p> Tarea 2 </p>
            </Card>
            <Card id ="card-7" draggable="true" class="regular  green lighten-2">
                <p> Tarea 3 </p>
            </Card>
        </Board>
    </main>
</template>

<script>

import Task from './TaskComponent';
import Board from './Board'
import Card from './Card'

export default {
    name: 'DropBacklog',
    components: {Task, Board, Card},
    data: () => ({
        taskDate: new Date().toISOString().substr(0, 10),
        menu: false, //Para el seleccionador de fecha
        dialog: false,
        taskName: '',
        taskDesc: '',
        taskMembers: [],
        taskTags: [],
        taskChanges:[],
        peopleNames: ['Juanito Pérez', 'Juliana Soza', 'Juancho Silva', 'Manuel Hernandez', 'Jesus Alberga', 'Pedro Perez'],
    }),
    methods: {

        addTag (event) {
            event.preventDefault()
            var val = event.target.value.trim()
            if (val.length > 0) {
                this.taskTags.push(val)
                event.target.value = ''
            }
        },
        removeTag (index) {
            this.taskTags.splice(index, 1)
        },
        createTask: function () {
            this.tasks.push({
                name: this.taskName,
                members: this.taskMembers,
                desc: this.taskDesc,
                date: this.taskDate,
                tags: this.taskTags,
                changes: this.taskChanges
            });
            this.taskName = '';
            this.taskDesc = '';
            this.taskMembers = '';
            this.taskDesc = '';
            this.taskTags = '';
            this.taskChanges='';
            this.dialog = false;
        }
    }
}

</script>

<style >

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background-color: #F3F3F3;
}
.flexbox{
    display: flex;
    justify-content: space-between;

    width: 100%;
    max-width: 768px;
    height: 100vh;

    overflow: hidden;

    margin: 0 auto;
    padding: 15px;
}
.flex .board {
    display: flex;
    flex-direction: column;

    width: 100%;
    max-width: 300px;

    background-color: black;

    padding: 15px;
}
.flex .board .card {
    padding: 15px 25px;
    background-color: #F3F3F3;

    cursor: pointer;
    margin-bottom: 15px;
}

</style>
