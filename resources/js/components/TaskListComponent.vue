<template>
  <v-container light fluid>
    <!--Barra de tareas-->
    <v-row class="justify-center  mx-0 px-0">
      <v-btn
        color="secondary"
        @click="dialog = true"
        class="mb-4"
        width="50%"
      >
        <v-icon class="pr-2">
          mdi-card-plus-outline
        </v-icon>
        Nueva tarea
      </v-btn>
    </v-row>


    <!--Cuadro de diálogo para crear nueva tarea-->
    <v-dialog
      v-model="dialog"
      persistent
      width="60%"
    >
      <v-card class="pt-0 pb-0">
        <v-toolbar
          color="primary"
          class="white--text pt-0 pb-0 title"
        >
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
              <div v-for='(tag, index) in taskTags' :key='tag' class='tag-input__tag'>
                {{ tag }}
                <span @click='removeTag(index)'>x</span>
              </div>
              <input
                title="Para terminar una etiqueta pulsa enter o una coma"
                type='text'
                placeholder="Añadir etiquetas"
                class='tag-input__text pl-2 body-2'
                @keydown.enter='addTag'
                @keydown.188='addTag'
                @keydown.delete='removeLastTag'
              />
            </div>
            <v-textarea
              v-model="taskDesc"
              label="Description"
              outlined
            ></v-textarea>
            <v-combobox
              v-model="taskMembers"
              :items="formatedPeopleNames"
              label="Miembros disponibles"
              multiple
              dense
              chips
              small-chips
              outlined
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
          <v-date-picker
            v-model="taskDate"
            no-title
            range
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
            @click="dialog = false"
          >
            Cerrar
          </v-btn>
          <v-btn
            text
            @click="createTask"
          >
            Guardar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!--Muestra las tareas disponibles-->
    <v-row
      v-for="(userTask, index1) in sortedTasks"
      :key="index1"
    >
      <v-col cols="12">
        <h2>{{ userTask.username }}</h2>
      </v-col>
      <v-col
        v-for="(task, index2) in userTask.tasks"
        :key="index2"
        cols="12"
      >
        <Task
          :tasks="tasks"
          :taskData="task"
          :peopleNames="formatedPeopleNames"
          :sortedTasks="sortedTasks"
          @sort-tasks="sortByUser"
        />
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import Task from './TaskComponent';
export default {
  name: 'TaskList',
  components: {Task},
  data(){
      return{
          taskDate: new Date().toISOString().substr(0, 10),
          menu: false, //Para el seleccionador de fecha
          dialog: false,
          taskName: '',
          taskDesc: '',
          taskMembers: [],
          taskTags: [],
          taskChanges: [],
          formatedPeopleNames: [],
          sortedTasks: [],
          tasks: [
              /*{
                  name: 'Crear interfaz',
                  members: ['Andres awallberg@hotmail.com'],
                  desc: 'Lorem ipsum dolor sit amet tempus penatibus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
                  date: '2021-06-26',
                  tags: ['HU02', 'TA02', 'P1'],
                  changes: ['7/7/7   Usuario', '7/7/7   Usuario', '7/7/7   Usuario',]
              },
              {
                  name: 'Implementar botones',
                  members: ['Andres awallberg@hotmail.com'],
                  desc: 'Lorem ipsum dolor sit amet consectetur adipiscing Tristique egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
                  date: '2021-06-10',
                  tags: ['HU02', 'TA02', 'P2'],
                  changes: ['7/7/7   Usuario', '8/7/7   Usuario', '9/7/7   Usuario',]
              },
              {
                  name: 'Seleccionar colores',
                  members: ['Andres awallberg@hotmail.com'],
                  desc: 'Lorem ipsum dolor sit amet consectetur adipiscing elit senectus fringilla arcu a, iaculis sodales magna sollicitudin ridiculus tempus penatibus facilisis ac cursus nullam praesent, venenatis lectus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
                  date: '2021-07-01',
                  tags: ['HU02', 'TA02', 'P3'],
                  changes: ['7/7/7   Usuario', '7/7/7   Usuario', '7/7/7   Usuario',]
              }*/

          ]
      }
  },
  props: {
    id_pro: null,
    peopleNames: []
  },
  methods: {
    async listar(){
      let nTask = [];
      const res= await axios.get('/task');
      console.log(res.data);
      for (let step = 0; step < res.data.length; step++) {
        let new_task = res.data[step];

        let newT = {
          name: res.data[2],
          members: ['Andres awallberg@hotmail.com'],
          desc: res.data[3],
          date: res.data[4],
          tags: ['HU02', 'TA02', 'P2'],
          changes: ['7/7/7   Usuario', '7/7/7   Usuario', '7/7/7   Usuario',],
          id_pro: this.id_pro,
          estado :'pendiente'
        };
        console.log(new_t)
        nTask.push(newT);
      }
      this.tasks = nTask;
      alert(JSON.stringify(this.tasks));
      this.sortByUser();
    },
    send(newTask) {
      const iddProyecto = (window.location).href.charAt((window.location).href.length - 1);
      axios.post('/administrar-proyectos/tareaNueva', newTask)
          .then(response => {
              console.log(response.data);
          });
    },
    sortByUser: function () {
      this.sortedTasks = [];
      for (let i = 0; i < this.formatedPeopleNames.length; i++) {
        let user = this.formatedPeopleNames[i];
        this.sortedTasks.push({
          username: user,
          tasks: []
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
        this.formatedPeopleNames.push(user.nombre + ' ' + user.correo);
      }
    },
    addTag(event) {

      event.preventDefault()
      var val = event.target.value.trim()
      if (val.length > 0) {
        this.taskTags.push(val)
        event.target.value = ''
      }
    },

    removeTag(index) {
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
      const newTask = {
        name: this.taskName,
        members: this.taskMembers,
        desc: this.taskDesc,
        date: this.taskDate[0],
        tags: this.taskTags,
        changes: this.taskChanges,
        id_pro: this.id_pro,
        estado :"pendiente"
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
    }
  },
  mounted() {
    this.formatPeopleNames();
    this.listar();
    this.sortByUser();
  }
}
</script>

<style scoped>
.tag-input__tag {
  height: 30px;
  float: left;
  margin-right: 10px;
  background-color: #576DB9;
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
