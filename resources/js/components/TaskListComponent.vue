<template>
  <v-container light fluid>
    <!--Barra de tareas-->
      <v-toolbar
          color="primary"
            rounded
      >
          <v-row >
              <v-col cols="6"
                     class="white--text pt-1 pb-0 text-h5">
                  Tareas del Proyecto
              </v-col>
              <v-col cols="6" class="white--text pt-0 pb-0 text-h5 text-right">
                  <v-btn color="secondary elevation-0"
                         @click="dialog = true"
                         fab
                         small>
                      <v-icon color="white">mdi-credit-card-plus-outline</v-icon>
                  </v-btn>
              </v-col>
          </v-row>

      </v-toolbar>



    <!--Cuadro de diálogo para crear nueva tarea-->
    <v-dialog v-model="dialog" persistent width="60%">
      <v-card class="pt-0 pb-0">
        <v-toolbar color="primary" class="white--text pt-0 pb-0 title">
          Crear nueva tarea
        </v-toolbar>

        <!--Campos de texto-->
        <div>
          <v-col justify="center">
            <v-text-field
              v-model="taskName"
              label="Nombre"
              hide-details="auto"
              outlined
            ></v-text-field>
            <div v-model="taskTags" outlined>
              <div
                v-for="(tag, index) in taskTags"
                :key="tag"
                class="tag-input__tag"
              >
                {{ tag }}
                <span @click="removeTag(index)">x</span>
              </div>
              <input
                title="Para terminar una etiqueta pulsa enter o una coma"
                type="text"
                placeholder="Añadir etiquetas"
                class="tag-input__text pl-2 body-2"
                @keydown.enter="addTag"
                @keydown.188="addTag"
                @keydown.delete="removeLastTag"
              />
            </div>
            <v-textarea
              v-model="taskDesc"
              label="Description"
              outlined
            ></v-textarea>
            <v-row>
              <v-col cols="12" md="6">
                  <v-select
                    v-model="taskMembers"
                    :items="formatedPeopleNames"
                    label="Miembros disponibles"
                    multiple
                    dense
                    chips
                    small-chips
                    outlined
                  >
              </v-select>
              </v-col>
              <v-col cols="12" md="6">
                  <v-select
                    v-model="taskState"
                    :items="['Pendiente', 'En proceso', 'Terminado']"
                    label="Estado"
                    dense
                    chips
                    small-chips
                    outlined
                  >
              </v-select>
              </v-col>
            </v-row>
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
              class="pl-2 mr-3"
              v-model="taskDate"
              label="Picker in menu"
              prepend-icon="mdi-calendar"
              readonly
              v-bind="attrs"
              v-on="on"
              outlined
            ></v-text-field>
          </template>
          <v-date-picker v-model="taskDate" no-title range scrollable>
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="menu = false"> Cancelar </v-btn>
            <v-btn text color="primary" @click="$refs.menu.save(taskDate)">
              Guardar
            </v-btn>
          </v-date-picker>
        </v-menu>
        <v-spacer></v-spacer>

        <!--Botones del cuadro de diálogo-->
        <v-card-actions class="justify-end">
          <v-btn text @click="dialog = false"> Cerrar </v-btn>
          <v-btn text @click="createTask"> Guardar </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!--Muestra las tareas disponibles-->
    <v-card
      v-for="(userTask, index1) in sortedTasks"
      :key="index1"
      md="12"
      sm="12"
      cols="12"
      outlined
      class="mt-1"
    >
      <v-toolbar color="secondary" class="white--text pt-0 pb-0 mb-1 text-h5">
        {{ userTask.username }}
      </v-toolbar>
      <v-card-actions class="pa-0">
        <v-row class="mt-2 mx-2 my-0">
          <v-col
            cols="12"
            md="6"
            v-for="(task, index2) in userTask.tasks"
            :key="index2"
            class="my-0 mx-0"
          >
            <Task
              :id_task_name="id_name"
              :tasks="tasks"
              :taskData="task"
              :peopleNames="formatedPeopleNames"
              :sortedTasks="sortedTasks"
              @sort-tasks="sortByUser"
            />
          </v-col>
        </v-row>
      </v-card-actions>
    </v-card>
  </v-container>
</template>


<script>
import Task from "./TaskComponent";
export default {
  name: "TaskList",
  components: { Task },
  data() {
    return {
      id_name: [],
      taskDate: new Date().toISOString().substr(0, 10),
      menu: false, //Para el seleccionador de fecha
      dialog: false,
      taskName: "",
      taskDesc: "",
      taskState: "Pendiente",
      taskMembers: [],
      taskTags: [],
      taskChanges: [],
      formatedPeopleNames: [],
      sortedTasks: [],
      tasks: [],
    };
  },
  props: {
    id_pro: null,
    peopleNames: [],
  },
  methods: {
    async listar() {
      let nTask = [];
      const res = await axios.get("/task");
      for (let step = 0; step < res.data.length; step++) {
        let new_task = res.data[step];
        //console.log(new_task)
        let iName = [new_task.id, new_task.name];
        this.id_name.push(iName);
        let newT = {
          name: new_task.name,
          members: JSON.parse(new_task.members),
          desc: new_task.desc,
          date: new_task.date,
          tags: ["HU02", "TA02", "P2"],
          changes: ["7/7/7   Usuario", "7/7/7   Usuario", "7/7/7   Usuario"],
          id_pro: new_task.id_proyecto,
          estado: new_task.estado,
        };
        if (new_task.id_proyecto == this.id_pro) {
          nTask.push(newT);
        }
      }
      this.tasks = nTask;
      //alert(JSON.stringify(this.tasks));
      this.sortByUser();
    },
    send(newTask) {
      const iddProyecto = window.location.href.charAt(
        window.location.href.length - 1
      );
      axios
        .post("/administrar-proyectos/tareaNueva", newTask)
        .then((response) => {});
    },
    sortByUser: function () {
      this.sortedTasks = [];
      for (let i = 0; i < this.formatedPeopleNames.length; i++) {
        let user = this.formatedPeopleNames[i];
        this.sortedTasks.push({
          username: user,
          tasks: [],
        });
        for (let j = 0; j < this.tasks.length; j++) {
          let task = this.tasks[j];
          if (task.members.includes(user)) {
            this.sortedTasks[i].tasks.push(task);
          }
        }
      }
    },
    formatPeopleNames: function () {
      for (let user of this.peopleNames) {
        this.formatedPeopleNames.push(user.nombre + " " + user.correo);
      }
    },
    addTag(event) {
      event.preventDefault();
      var val = event.target.value.trim();
      if (val.length > 0) {
        this.taskTags.push(val);
        event.target.value = "";
      }
    },

    removeTag(index) {
      this.taskTags.splice(index, 1);
    },
    createTask: function () {
      this.tasks.push({
        name: this.taskName,
        members: this.taskMembers,
        desc: this.taskDesc,
        date: this.taskDate,
        tags: this.taskTags,
        changes: this.taskChanges,
        estado: this.taskState
      });



      const newTask = {
          name: this.taskName,
          members: JSON.stringify(this.taskMembers),
          desc: this.taskDesc,
          date: this.taskDate[0],
          tags: ""+this.taskTags,
          changes: ""+this.taskChanges,
          id_pro: this.id_pro,
          estado :this.taskState
      };
      this.send(newTask);


      this.taskName = '';
      this.taskDesc = '';
      this.taskMembers = '';
      this.taskDesc = '';
      this.taskTags = '';
      this.taskChanges = '';
      this.dialog = false;
      this.listar();
      this.sortByUser();
    },
  },
  mounted() {
    this.formatPeopleNames();
    this.listar();
    this.sortByUser();
  },
};
</script>

<style scoped>
.tag-input__tag {
  height: 30px;
  float: left;
  margin-right: 10px;
  background-color: #576db9;
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
