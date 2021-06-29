<template>

<div class="row justify-content-center">

        <div class="col-12 align-self-center">
            <v-row>
                <v-col cols="8">
                    <v-card
                        ref="form"
                        lazy-validation
                    >
                        <v-text-field
                            v-model="proyecto.name"
                            label="Nombre del proyecto"
                            required
                        ></v-text-field>

                        <v-textarea
                            v-model="proyecto.description"
                            label="Descripcion del proyecto"
                            class="my-1"
                            required
                        ></v-textarea>

                        <v-select
                            item-text="correo"
                            v-model="proyecto.bosses"
                            :items="items"
                            label="Jefe/s de proyecto"
                            multiple
                            dense
                            class="my-2"
                            clearable
                            chips
                        ></v-select>

                        <v-select
                            item-text="correo"
                            v-model="proyecto.workers"
                            :items="items"
                            label="Empleados del proyecto"
                            multiple
                            dense
                            class="my-2"
                            clearable
                            chips
                        ></v-select>

                    </v-card>

                </v-col>

                <v-col cols="4">
                    <v-date-picker
                        color="#000000"
                        full-width
                        v-model="proyecto.dates"
                        range
                        locale="es-cl"
                        class="my-4"
                    ></v-date-picker>
                </v-col>
            </v-row>
            <v-btn
                class="btn w-100"
                @click="send"
            >
                Enviar
            </v-btn>

        </div>
</div>

</template>
<script>
  import TaskList from "./TaskListComponent";
  export default {
      components: {TaskList},
      data(){
          return {
              items: [],
              proyectos:[],
              proyecto: {
                  name: '',
                  dates: [],
                  description: '',
                  bosses: [],
                  workers: [],
                  select: null,
              },




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
                axios.post('/user', {correo: 'mvalenzuela@hotmail.com', nombre: 'Manuel'});  */

           axios.get('/user')
               .then(response=>{
                   const users = [];
                   const res = response.data;
                   this.items = res;
                   console.log(res);

               });
       },

       methods: {
           send () {
               if(this.proyecto.name.trim() === '' || this.proyecto.dates.length === 0 || this.proyecto.description.trim() === ''
                   || this.proyecto.bosses.length === 0 || this.proyecto.workers.length === 0){
                   alert('Debes completar todos los campos antes de guardar');
                   return;
               }

               const d1 = new Date(this.proyecto.dates[0]);
               const d2 = new Date(this.proyecto.dates[1]);

               if (+d1 >= +d2){
                   console.log(this.proyecto.dates[0] + '-' + this.proyecto.dates[1])
                   if (+d1 === +d2) {
                       alert('Las fechas no pueden ser iguales');
                       return;
                   }
                   let aux = this.proyecto.dates[1];

                   this.proyecto.dates[1] = this.proyecto.dates[0];
                   this.proyecto.dates[0] = aux;

               }

               console.log(
                   {
                       'name':this.proyecto.name,
                       'dates':this.proyecto.dates,
                       'bosses':this.proyecto.bosses,
                       'workers':this.proyecto.workers
                   }
               );
               const nuevoProyecto = this.proyecto;
               this.proyecto = {name: '', description: '', dates: [], bosses: [], workers: []};
               axios.post('/administrar-proyectos/nuevo', nuevoProyecto)
                   .then(response => {
                       console.log(response.data);
                   });
               window.location.href="http://127.0.0.1:8000/administrar-proyectos";
           }
       }
   }
</script>
