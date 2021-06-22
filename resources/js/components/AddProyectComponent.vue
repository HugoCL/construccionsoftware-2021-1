<template>

<div class="row justify-content-center">

        <div class="col-6 align-self-center">

            <h3 class="text-center font-weight-light">Nuevo proyecto</h3>

            <v-form
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
                    class="my-2"
                    required
                ></v-textarea>

                <v-date-picker
                    color="#000000"
                    full-width
                    v-model="proyecto.dates"
                    range
                    class="my-4"
                ></v-date-picker>

                <v-select
                    v-model="bosses"
                    :items="items"
                    label="Jefe/s de proyecto"
                    multiple
                    dense
                    class="my-2"
                    clearable
                    chips
                ></v-select>

                <v-select
                    v-model="workers"
                    :items="items"
                    label="Empleados del proyecto"
                    multiple
                    dense
                    class="my-2"
                    clearable
                    chips
                ></v-select>

                <v-btn
                    class="btn w-100"
                    @click="send"
                >
                    Enviar
                </v-btn>
            </v-form>
        </div>
</div>

</template>
<script>
  export default {
      data(){
          return {
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
              axios.post('/proyects', nuevoProyecto)
                  .then(response => {
                      const res = response.data;
                      this.proyectos.push(res);
                  });

          }
      }
  }
</script>
