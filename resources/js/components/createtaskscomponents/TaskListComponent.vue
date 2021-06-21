<template>
  <v-container fluid>
      <!--Barra de tareas-->
      <v-toolbar
        dark
        color="#a40056"
        class="mb-1"
      >
        <v-btn
          color="#db0082"
          dark
          @click="dialog = true"

        >
          Nueva tarea
        </v-btn>
      </v-toolbar>

    <!--Cuadro de diálogo para crear nueva tarea-->
      <v-dialog
        v-model="dialog"
        persistent
        max-width="600px"
      >
        <v-card class="pt-0 pb-0">
          <v-toolbar
            color="#db0082"
            dark
            class="white--text pt-0 pb-0"
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
                        @keydown.delete='removeLastTag'
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
    <v-row>
      <v-col
        v-for="(task, index) in tasks"
        :key="index"
        cols="12"
        sm="6"
        md="6"
        lg="4"
      >
        <Task
          :taskData="task"
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
  data: () => ({
    taskDate: new Date().toISOString().substr(0, 10),
    menu: false, //Para el seleccionador de fecha
    dialog: false,
    taskName: '',
    taskDesc: '',
    taskMembers: [],
    taskTags: [],
    peopleNames: ['Juanito Pérez', 'Juliana Soza', 'Juancho Silva', 'Manuel Hernandez', 'Jesus Alberga', 'Pedro Perez'],

    tasks: [
      {
        name: 'Crear interfaz',
        members: ['Juanito Pérez', 'Juliana Soza'],
        desc: 'Lorem ipsum dolor sit amet tempus penatibus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
        date: '25/06/2021',
        tags: ['HU02','TA02','P1']
      },
      {
        name: 'Implementar botones',
        members: ['Juancho Silva', 'Manuel Hernandez', 'Jesus Alberga'],
        desc: 'Lorem ipsum dolor sit amet consectetur adipiscing Tristique egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
        date: '10/06/2021',
        tags: ['HU02','TA02','P2']
      },
      {
        name: 'Seleccionar colores',
        members: ['Pedro Perez'],
        desc: 'Lorem ipsum dolor sit amet consectetur adipiscing elit senectus fringilla arcu a, iaculis sodales magna sollicitudin ridiculus tempus penatibus facilisis ac cursus nullam praesent, venenatis lectus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
        date: '01/07/2021',
        tags: ['HU02','TA02','P3']
      }

    ]
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
        tags: this.taskTags

      });


      this.taskName = '';
      this.taskDesc = '';
      this.taskMembers = '';
      this.taskDesc = '';
      this.taskTags = '';
      this.dialog = false;
    }
  }
}
</script>

<style scoped>


.tag-input__tag {
    height: 30px;
    float: left;
    margin-right: 10px;
    background-color: #a800cf;
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
