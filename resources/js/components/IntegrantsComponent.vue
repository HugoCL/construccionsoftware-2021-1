<template>

<v-card class="">
    <v-toolbar
        color="primary"

    >
        <v-row>
            <v-col cols="11"
                   class="white--text pt-0 pb-0 text-h5">
                Integrantes del proyecto
            </v-col>
            <v-col cols="1" class="white--text pt-0 pb-0 text-h5">
                <v-btn color="secondary elevation-0"
                       @click="openDialog()"
                       fab
                       small>
                   <v-icon color="white">mdi-account-plus</v-icon>
                </v-btn>
            </v-col>
        </v-row>

    </v-toolbar>
    <v-card-actions>
        <v-expansion-panels accordion>
            <v-expansion-panel
            v-for="(integrant,i) in integrants"
            :key="i"
        >
            <v-expansion-panel-header>
                {{integrant.userName}}
                <div class="col-2">
                    <v-icon @click="delIntegrant(integrant)" >mdi-delete</v-icon>
                </div>
                <div class="col-auto"></div>



            </v-expansion-panel-header>
            <v-expansion-panel-content>


                 <v-combobox
                        @change="update(integrant)"
                        v-model="integrant.rol"
                        label="Rol"
                        append-icon
                        chips
                        deletable-chips>
                </v-combobox>


            </v-expansion-panel-content>
        </v-expansion-panel>

        </v-expansion-panels>

        </v-card-actions>
    <v-card>
                <v-dialog
                v-model="dialog"
                width="500"
                >

                <v-card>
                    <v-toolbar
                        color="primary"
                        class="white--text pt-0 pb-0 text-h5"
                        >
                    Nuevo Integrante
                    </v-toolbar>

                    <v-card-text>
                        <v-select
                            :items="this.reaming"
                            item-text="correo"
                            v-model="newIntegrant"
                            label="Nombre"
                            :return-object="true"
                            required
                        ></v-select>
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="addIntegrant()"
                        class="btn"
                    >
                        Crear
                    </v-btn>
                    </v-card-actions>
                </v-card>
                </v-dialog>
            </v-card>
    <v-snackbar
        color="primary"
        class="white--text"
        v-model="snackBarNew"
        :timeout="timeout=2000"
    >
        Se agrego un integrante

    </v-snackbar>
    <v-snackbar
        color="error"
        class="white--text te"
        v-model="snackBarDelete"
        :timeout="timeout=2000"
    >
        Se elimino una integrante

    </v-snackbar>
    <v-snackbar
        color="secondary"
        class="white--text te"
        v-model="snackBarEdit"
        :timeout="timeout=2000"
    >
        Se edito un rol

    </v-snackbar>
</v-card>
</template>
<script>
  export default {

      data(){
          return {
              name : this.project.nombre, //nombre del proyecto
              integrants: [],
              //integrants: this.devs.concat(this.leads) //deveps + leads list
              dialog: false,
              edit: false,
              newIntegrant: {},
              item: {},
              reaming: [],
              snackBarDelete:false,
              snackBarEdit:false,
              snackBarNew:false,
          }
      },
      created() {
          this.upIntegrants();
          this.reamingUser();
      },
      methods: {
          reamingUser: function () {
              let bool = true;
              console.log("devs");
              console.log(this.devs);
              for (let i = 0; i < this.users.length; i++) {
                  bool = true;
                  for (let j = 0; j < this.devs.length; j++) {
                      if (this.devs[j].correo === this.users[i].correo){
                          bool = false;
                          break;
                      }
                  }
                  if (bool){
                      this.reaming.push(this.users[i]);
                  }
              }
              console.log(this.reaming);
          },
          update: function(integrant){
              console.log(integrant)
              axios.put('/administrar-proyectos/integrantes/'+this.project.id, integrant)
                  .then(response=>{
                      console.log(response.data)
                  })
              this.snackBarEdit=true;
          },
          deleteIntegrant: function(item){
              console.log(item)
              axios.delete('/administrar-proyectos/integrantes/'+item.userEmail, {
                  params:{
                      'id_project': this.project.id
                  }
              }).then(res=>{
                  console.log(res.data);
              });
              this.snackBarDelete=true;
          },
          add: function(item){
              console.log('holi');
              console.log(item)
              const info = {id_user: item.userEmail, id_project: this.project.id, rol: item.rol};
              console.log(info);
              axios.post('/administrar-proyectos/integrantes/', info)
                  .then(res=>{
                      console.log(res.data);
                  });
              this.snackBarNew=true;
          },
          upIntegrants: function(){
              //console.log("Comparacion fallida!!")
              //console.log(this.participates)
              //console.log(this.users)
              let integrantes = [];
              for (let i in this.devs){
                  axios.get('/administrar-proyectos/integrantes/'+this.devs[i].correo,{params:{'id_project':this.project.id}})
                      .then(response=> {
                          integrantes.push(response.data);
                          console.log(response.data);
                      })
              }
              this.integrants = integrantes;
            /*for(let p in this.participates){
                for(let u in this.users){
                    if(this.users[u].correo === this.participates[p].id_user){

                        console.log("Comparacion exitosa!")
                        console.log(this.users[u].nombre)
                        console.log(this.participates[p].rol)
                        this.newIntegrant.name = this.users[u].nombre
                        this.newIntegrant.role = this.participates[p].rol

                        this.integrants.push(this.newIntegrant)

                    }
                }
            }*/
          },
          delIntegrant(item){
              const index = this.integrants.indexOf(item)
              if (confirm('Estas seguro de borrar a '+item.userName) && this.integrants.splice(index, 1)){
                  this.deleteIntegrant(item);
                  this.reaming.push( Object.assign( {},{ correo:item.userEmail, nombre:item.userName  } ) )
              }
              this.$emit('edit',this.integrants);
          },
          addIntegrant(){
              if(this.edit){
                this.item.name = this.newIntegrant.name
                this.item.role = this.newIntegrant.role
                this.edit = false
              }else{
                let info = {userName:this.newIntegrant.nombre, userEmail:this.newIntegrant.correo ,rol: 'developer'};
                this.integrants.push( Object.assign( {},{ userName:this.newIntegrant.nombre, userEmail:this.newIntegrant.correo ,rol: 'developer'  } ) )
                this.add(info);

                const index = this.reaming.indexOf(this.newIntegrant)
                this.reaming.splice(index, 1)
              }
              this.dialog = false
              this.$emit('edit',this.integrants);
          },
          editIntegrant(item){
            this.edit = true
            this.newIntegrant.name = item.name
            this.item = item
            this.dialog = true
          },
          openDialog(){
              this.dialog = true
              this.edit = false
          }
      },
      props:{
          leads: [],//leads define by email
          devs: [],//developers define by email
          users: [],//user table
          //participates: [], //participates in the project with rols
          project: null, //actual project
      }
  }
</script>
