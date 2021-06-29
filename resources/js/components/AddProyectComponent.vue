<template>

<div class="row justify-content-center">

        <div class="col-12 align-self-center pb-0">
            <v-row>
                <v-col cols="12">
                    <v-list
                        ref="form"
                        class="elevation-0"
                        lazy-validation

                    >
                        <v-text-field
                            v-model="proyecto.name"
                            label="Nombre del proyecto"
                            required
                            outlined

                        ></v-text-field>

                        <v-textarea
                            v-model="proyecto.description"
                            label="Descripción del proyecto"
                            required
                            outlined
                            auto-grow
                        ></v-textarea>

                        <v-select
                            v-model="bosses"
                            :items="items"
                            label="Jefe/s de proyecto"
                            class="mt-2"
                            multiple
                            dense
                            clearable
                            chips
                            small-chips
                            outlined
                        ></v-select>

                        <v-select
                            v-model="workers"
                            :items="items"
                            label="Empleados del proyecto"
                            multiple
                            dense
                            clearable
                            chips
                            small-chips
                            outlined
                        ></v-select>
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
                                    class="pl-2"
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

                    </v-list>

                </v-col>



            </v-row>
            <v-container class="mb-4 mx-0 px-0">
                <v-row class="justify-center">
                    <v-btn
                        class="justify-center"
                        width="50%"
                        @click="send"
                        color="primary"
                    >
                        <v-icon  class="pr-2">
                            mdi-send
                        </v-icon>
                        Enviar
                    </v-btn>
                </v-row>
            </v-container>

        </div>
        <v-container class="pb-0 mx-0 px-0">
            <v-row>
                <TaskList></TaskList>
            </v-row>
        </v-container>
</div>

</template>
<script>
  import TaskList from "./TaskListComponent";
  export default {
      components: {TaskList},
      data(){
          return {
              taskDate: new Date().toISOString().substr(0, 10),
              menu:false,
              items: [
                  'juan',
                  'lopez',
                  'ramirez'
              ],
              proyectos:[],
              proyecto: {
                  name: '',
                  dates: ['2019-09-10', '2019-09-20'],
                  description: ''
              },

              select: null,
              bosses: [],
              workers: [],

              emailRules: [
                  v => !!v || 'E-mail is required',
                  v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
              ],
          }
      },

      created(){
          /*
          axios.post('/user', {correo: 'ncastillo@hotmail.com', nombre: 'Nicolas'});
          axios.post('/user', {correo: 'awallberg@hotmail.com', nombre: 'Andres'});
          axios.post('/user', {correo: 'mvalenzuela@hotmail.com', nombre: 'Manuel'});*/

          axios.get('/user')
              .then(response=>{
                  const users = [];
                  const res = response.data;
                  for (let user in res){
                      console.log(res[user]);
                      users.push(res[user].nombre.concat(' [', res[user].correo+']'));
                  }
                  this.items = users;

              });
      },

      methods: {
          send () {
              if(this.proyecto.name.trim() === ''){
                  alert('Debes completar todos los campos antes de guardar');
                  return;
              }

              console.log(
                  {
                      'name':this.proyecto.name,
                      'dates':this.proyecto.dates,
                      'bosses':this.bosses,
                      'workers':this.workers
                  }
              );
              const nuevoProyecto = this.proyecto;
              this.proyecto = {name: '', description: '', dates: ['2019-09-10', '2019-09-20']};
              axios.post('/administrar-proyectos/nuevo', nuevoProyecto)
                  .then(response => {
                      const res = response.data;
                      this.proyectos.push(res);
                  });

          }
      }
  }
</script>
