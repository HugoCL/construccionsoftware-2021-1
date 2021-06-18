<template>
  <v-container>
    <div class="text-center">
      <v-dialog v-model="dialog">
        <v-card>
          <v-card-title>Crear nueva tarea</v-card-title>
          <v-form>
            <v-card-text>
              <v-row>
                <v-col cols="12">
                  <v-text-field
                    v-model="taskName"
                    label="Nombre de la tarea"
                  >
                  </v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    v-model="taskMember"
                    label="Miembro"
                  >
                  </v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-btn @click="addMember">Agregar miembro</v-btn>
                  <v-row>
                    <v-col
                      cols="1"
                      v-for="(member, index) in taskMembers"
                      :key="index"
                    >
                      {{ member }}
                    </v-col>
                  </v-row>
                </v-col>
                <v-col cols="12">
                  <v-textarea v-model="taskDesc">Descripción</v-textarea>
                </v-col>
                <v-col cols="12">
                  <v-btn @click="createTask">Crear</v-btn>
                </v-col>
              </v-row>
            </v-card-text>
          </v-form>
        </v-card>
      </v-dialog>
    </div>
    <v-card width="500">
      <Task v-for="(task, index) in tasks"
            :taskData="task"
            :key="index"
      />
    </v-card>
    <v-btn @click="dialog = true">Agregar tarea</v-btn>
  </v-container>
</template>


<script>
import Task from './TaskComponent';

export default {
  name: 'TaskList',
  components: {Task},
  data: () => ({
    dialog: false,
    taskName: '',
    taskMember: '',
    taskMembers: [],
    taskDesc: '',
    tasks: [
      {
        name: 'Crear interfaz',
        members: ['Juanito Pérez', 'Juliana Soza'],
        desc: 'Lorem ipsum dolor sit amet tempus penatibus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.'
      },
      {
        name: 'Implementar botones',
        members: ['Juancho Silva', 'Manuel Hernandez', 'Jesus Alberga'],
        desc: 'Lorem ipsum dolor sit amet consectetur adipiscing Tristique egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.'
      },
      {
        name: 'Seleccionar colores',
        members: ['Pedro Perez'],
        desc: 'Lorem ipsum dolor sit amet consectetur adipiscing elit senectus fringilla arcu a, iaculis sodales magna sollicitudin ridiculus tempus penatibus facilisis ac cursus nullam praesent, venenatis lectus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.'
      }

    ]
  }),
  methods: {
    addMember: function () {
      this.taskMembers.push(this.taskMember);
      this.taskMember = '';
    },
    createTask: function () {
      this.tasks.push({
        name: this.taskName,
        members: this.taskMembers,
        desc: this.taskDesc
      });

      this.taskName = '';
      this.taskMember = '';
      this.taskMembers = [];
      this.taskDesc = '';
      this.dialog = false;
    }
  }
}
</script>
