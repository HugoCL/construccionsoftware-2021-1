<template>
    <div class="container">
        <menu-kanban></menu-kanban>
        <div class="container mt-5">
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="p-2 alert alert-secondary">
                        <h3>BackLog</h3>
                        <draggable class="list-group kanban-column" :list="arrBacklog" group="task">
                            <div class="list-group-item" v-for="element in arrBacklog" :key="element.name">
                                {{element.name}}
                            </div>
                        </draggable>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-2 alert alert-secondary">
                        <h3>In Progress</h3>
                        <draggable class="list-group kanban-column" :list="arrInProgres" group="task">
                            <div class="list-group-item" v-for="element in arrInProgres" :key="element.name">
                                {{element.name}}
                            </div>

                        </draggable>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-2 alert alert-secondary">
                        <h3>Done</h3>
                        <draggable class="list-group kanban-column" :list="arrDone" group="task">
                            <div class="list-group-item" v-for="element in arrDone" :key="element.name">
                                {{element.name}}
                            </div>
                        </draggable>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-2 alert alert-secondary">
                        <h3>Tested</h3>
                        <draggable class="list-group kanban-column" :list="arrTested" group="task">
                            <div class="list-group-item" v-for="element in arrTested" :key="element.name">
                                {{element.name}}
                            </div>
                        </draggable>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from "vuedraggable";
import MenuKanban from "./MenuKanban";
export default {
    name: "KanbanComponent",
    components:{MenuKanban},
    data(){
        return{
            newTask: "",
            arrBacklog: [
                {name: "tarea"},
                {name: "tarea 1"},
                {name: "tarea 2"},
                {name: "tarea 3"},
                {name: "tarea 4"},
                {name: "tarea 5"},
                {name: "tarea 6"},
                {name: "tarea 7"},
                {name: "tarea 8"},
                {name: "tarea 9"}
            ],
            arrInProgres: [],
            arrDone: [],
            arrTested:[]
        }
    },
    methods:{
        add(){
            if(this.newtask){
                this.arrBacklog.push({name: this.newTask});
                this.newTask="";
            }
        }
    }
}
</script>

<style scoped>
    .kanban-column{
        min-height: 350px;
    }
</style>
