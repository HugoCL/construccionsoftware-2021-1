<template>
  <div class="text-center">
    <!--Cuadro de diálogo para editar tarea-->
    <v-dialog
      v-model="editDialog"
      persistent
      max-width="600px"
    >
      <v-card class="pt-0 pb-0">
        <v-toolbar
          color="primary"
          class="white--text pt-0 pb-0"
        >
          Editar tarea
        </v-toolbar>

        <!--Campos de texto-->
        <div>
          <v-col justify="center">
            <v-text-field
              v-model="taskName"
              label="Nombre"
              hide-details="auto"
            ></v-text-field>
            <div v-model="taskTags">
              <div v-for='(tag, index) in taskTags' :key='tag' class='tag-input__tag'>
                {{ tag }}
                <span @click='removeTag(index)'>x</span>
              </div>
              <input
                title="Para terminar una etiqueta pulsa enter o una coma"
                type='text'
                placeholder="Añadir etiquetas"
                class='tag-input__text'
                @keydown.enter='addTag'
                @keydown.188='addTag'
              />
            </div>
            <v-textarea
              v-model="taskDesc"
              label="Description"
            ></v-textarea>
            <v-combobox
              v-model="taskMembers"
              :items="peopleNames"
              label="Miembros disponibles"
              multiple
              chips
            >
            </v-combobox>
          </v-col>
        </div>

        <!--Seleccionador de fecha-->
        <v-menu
          ref="menu"
          v-model="menu"
          :close-on-content-click="false"
          :return-value.sync="taskDate"
          transition="scale-transition"
          offset-y
          min-width="auto"
        >
          <template v-slot:activator="{ on, attrs }">
            <v-text-field
              v-model="taskDate"
              label="Picker in menu"
              prepend-icon="mdi-calendar"
              readonly
              v-bind="attrs"
              v-on="on"
            ></v-text-field>
          </template>
          <v-date-picker
            v-model="taskDate"
            no-title
            scrollable
          >
            <v-spacer></v-spacer>
            <v-btn
              text
              color="primary"
              @click="menu = false"
            >
              Cancelar
            </v-btn>
            <v-btn
              text
              color="primary"
              @click="$refs.menu.save(taskDate)"
            >
              Guardar
            </v-btn>
          </v-date-picker>
        </v-menu>
        <v-spacer></v-spacer>

        <!--Botones del cuadro de diálogo-->
        <v-card-actions class="justify-end">
          <v-btn
            text
            @click="editDialog = false"
          >
            Cerrar
          </v-btn>
          <v-btn
            text
            @click="saveEditedTask"
          >
            Guardar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!-- Cuadro que se abre al presionar una tarea y muestra su info-->
    <v-dialog
      v-model="dialog"
      width="60%"
      scrollable
    >
      <v-card
        width="500"
        color="primary"
        class="white--text subheading">
        <v-card-title color="primary" class="pt-1 pb-1">{{ taskData.name }}</v-card-title>
        <v-divider></v-divider>
        <v-container row wrap>
          <v-row class="pl-3">
            <v-chip-group center-active column class="pl-3 pr-1 pt-2 pb-2">
              <v-chip
                v-for='(tag, index) in taskData.tags' :key='tag'
                color="secondary"
                class="white--text font-weight-bold"
              >
                {{ tag }}
              </v-chip>
            </v-chip-group>
          </v-row>
        </v-container>
        <v-divider></v-divider>
        <v-list dense>
          <v-list-item>
            <v-list-item-content>
              Miembros:
            </v-list-item-content>
            <v-row>
              <v-col
                cols="1"
                v-for="(member, index) in taskData.members"
                :key="index"
                justify="center"
              >
                <v-tooltip top>
                  <template
                    v-slot:activator="{ on }"
                  >
                    <v-btn
                      color="primary"
                      fab
                      small
                      v-on="on"
                      class="white--text font-weight-bolder"
                    >{{ member.charAt(0) }}
                    </v-btn>
                  </template>
                  <span>{{ member }}</span>
                </v-tooltip>
              </v-col>
            </v-row>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              Descripción:
            </v-list-item-content>
            <v-list-item-content
              class="align-end"
            >
              {{ taskData.desc }}
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              Fecha:
            </v-list-item-content>
            <v-list-item-content
              class="align-end"
            >
              {{ taskData.date }}
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-col>
              <v-row class="pl-1">
                <v-text-field outlined v-model="newTaskCheck" label="Agrega tareas aquí"></v-text-field>
                <v-btn color="transparent" class="elevation-0 px-0 mt-3 mx-2" min-width="0" @click="addTask">Agregar
                </v-btn>
              </v-row>
              <v-col>
                <div v-for="taskCheckList in taskCheckLists" :key="taskCheckList.id"
                     :class="{done: isChekeada(taskCheckList)}">
                  <input type="checkbox" class="checkbox" @click="chekear" v-model="taskCheckList.checkeada">
                  <label for="checkbox">{{ taskCheckList.taskCheck }}</label>
                  <v-btn color="transparent" class="elevation-0 px-0" min-width="0" @click="quitarTareaCheck" right>
                    X
                  </v-btn>
                </div>
              </v-col>

            </v-col>
          </v-list-item>
          <v-list-item>
            <v-card-actions>
              <div align="center">
                <v-btn
                  class="mx-2"


                  dark
                  color="primary"
                  @click="dialog1=true"
                >Changes
                </v-btn>
              </div>
            </v-card-actions>
          </v-list-item>
        </v-list>


      </v-card>
    </v-dialog>
    <v-dialog v-model="dialog1" width="50%">
      <v-card>
        <v-toolbar class="mb-2"

                   color="primary"
                   dark
        >Changes History
        </v-toolbar>

        <v-card-text v-for="(item,index) in taskData.changes" :key="index">
          {{ item }}
        </v-card-text>

        <v-btn @click="dialog1=false"
               color="ml-2"
               class="mb-2"
               rounded
        > Close
        </v-btn>
      </v-card>
    </v-dialog>

    <!-- Botón o tarjeta de cada tarea -->
    <v-card
      class="white--text pb-0"
      light
      color="primary"
      @click="dialog = true"
    >
      <v-card-title
        class="subheading font-weight-bold pb-2 pt-2"
      >
        {{ taskData.name }}
      </v-card-title>

      <v-divider class="my-0 py-1"></v-divider>
      <v-container row wrap class="m-0 p-0">
        <v-row class="pl-3 my-0">
          <v-chip-group center-active column class="pl-3 pr-1 pt-0 pb-2">
            <v-chip v-for='(tag, index) in taskData.tags' :key='index' color="secondary"
                    class="white--text font-weight-bold my-0 py-0">
              {{ tag }}
            </v-chip>
          </v-chip-group>
        </v-row>
      </v-container>
      <v-divider class="ma-0 py-0"></v-divider>
      <v-card-actions>
        <v-btn
          color="accent"
          class="my-0"
          @click.stop="editTask"
        >
          Editar
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
        <v-btn
          color="error"
          @click.stop="deleteTask"
        >
          Eliminar
          <v-icon>mdi-delete</v-icon>
        </v-btn>
      </v-card-actions>
      <v-divider class="ma-0 py-0"></v-divider>

    </v-card>
  </div>
</template>

<script>


export default {
    name: 'Task',
    data: () => ({
        id_taskAu: '',
        menu: false,
        dialog: false,
        dialog1: false,
        editDialog: false,
        taskName: '',
        taskDesc: '',
        taskMembers: [],
        taskTags: [],
        taskDate: '',
        /**
         * variables a usar en v-check para checklist de tarea
         * lista testCheckList contiene una variable que almacena una "micro-tarea" string
         * y una variable booleana "chekeada" para manejar el cuadro check
         */
        newTaskCheck: "",
        taskCheckLists: [{
            taskCheck: "¡Ejemplo de tarea! Borrame",
            checkeada: false
        },
        ]
    }),
    props: {
        id_task_name: null,
        tasks: null,
        taskData: null,
        peopleNames: null,
        sortedTasks: null
    },
    methods: {
        /*
         funciones para checklist de la ventana de tareas creadas
       */

        async guardar(newTask){
            axios.put('/task/'+newTask.id,newTask)
            .then(response =>{
                console.log(response.data);
            })
        },
        send(newTask) {
            const iddProyecto = (window.location).href.charAt((window.location).href.length - 1);
            axios.post('/administrar-proyectos/task', newTask)
                .then(response => {
                    console.log(response.data);
                });
        },
        async eliminar(newTask){
            console.log(newTask.id);
            const res= await axios.delete('/task/'+newTask.id);
            this.sortByUser;

        },
        addTask: function () {
            let tarea = this.newTaskCheck;
            if (tarea) {
                this.taskCheckLists.push({taskCheck: tarea, chekeada: false});
                this.newTaskCheck = "";
            }
            this.send(this.taskDate);
        },

    chekear: function (tarea) {
      tarea.checkeada = true;
    },

    isChekeada: function (tarea) {
      return tarea.checkeada;
    },

        quitarTareaCheck: function (tarea) {
            let index = this.taskCheckLists.indexOf(tarea);
            this.taskCheckLists.splice(index, 1);
        },
        editTask: function () {

            this.editDialog = true;
            this.taskName = this.taskData.name;
            this.taskDesc = this.taskData.desc;
            this.taskMembers = this.taskData.members;
            this.taskTags = this.taskData.tags;
            this.taskDate = this.taskData.date;
            for(let i=0;i<this.id_task_name.length;i++){
                let ar = this.id_task_name[i];
                if(ar[1]==this.taskData.name){
                    console.log(ar[0]);
                    this.id_taskAu = ar[0];
                }
            }
        },
        saveEditedTask: function () {
            const iddProyecto = (window.location).href.charAt((window.location).href.length - 1);
            let taskData = this.taskData;
            taskData.id = this.id_taskAu;
            taskData.name = this.taskName;
            taskData.desc = this.taskDesc;
            taskData.members = this.taskMembers;
            taskData.tags = this.taskTags;
            taskData.date = this.taskDate;
            taskData.id_proyecto = iddProyecto;
            taskData.estado = "pendiente"
            console.log(taskData);
            this.guardar(taskData);
            this.sortByUser();
            this.editDialog = false;

    },
    deleteTask: function () {
        const iddProyecto = (window.location).href.charAt((window.location).href.length - 1);
      let deleted = this.tasks.splice(this.tasks.indexOf(this.taskData), 1);
      let id_task
      for (let item of this.sortedTasks) {
        let tasks = item.tasks;
        tasks.splice(tasks.indexOf(deleted), 1);
      }

        for(let i=0;i<this.id_task_name.length;i++){
            let ar = this.id_task_name[i];
            if(ar[1]==this.taskData.name){
                id_task = ar[0];
            }
        }
        const newTask = {
            id:id_task,
            name: this.taskName,
            members: this.taskMembers,
            desc: this.taskDesc,
            date: this.taskDate,
            tags: ""+this.taskTags,
            changes: ""+this.taskChanges,
            id_pro: iddProyecto,
            estado :"pendiente"
        };
        this.eliminar(newTask);
        this.sortByUser();
    },
    addTag(event) {
      event.preventDefault()
      let val = event.target.value.trim()
      if (val.length > 0) {
        this.taskTags.push(val)
        event.target.value = ''
      }
    },
    removeTag(index) {
      this.taskTags.splice(index, 1)
    },
    sortByUser: function () {
      this.$emit('sort-tasks');
    }
  }
}
</script>
<style scoped>


.tag-input__tag {
  height: 30px;
  float: left;
  margin-right: 10px;
  background-color: #3f51b5;
  color: white;
  margin-top: 10px;
  line-height: 30px;
  padding: 0 5px;
  border-radius: 5px;
}

.tag-input__tag > span {
  cursor: pointer;
  opacity: 0.75;
}

.tag-input__text {
  border: none;
  outline: none;
  font-size: 0.9em;
  line-height: 50px;
  background: none;
}
</style>
