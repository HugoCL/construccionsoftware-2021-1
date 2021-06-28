<template>

<div class="row justify-content-center">

    <div class="col-10">
        <h4 class="font-weight-light text-center my-4">Proyecto {{name}}</h4>



        <v-row justify="center">
            <v-expansion-panels accordion>
            <v-expansion-panel
                v-for="(integrant,i) in integrants"
                :key="i"
            >
                <v-expansion-panel-header>
                    {{integrant.name}}
                    <div class="col-2">
                        <v-icon @click="editIntegrant(integrant)">mdi-pencil</v-icon>
                        <v-icon @click="delIntegrant(integrant)" >mdi-delete</v-icon>
                    </div>
                    <div class="col-auto"></div>



                </v-expansion-panel-header>
                <v-expansion-panel-content>


                     <v-combobox multiple
                            v-model="integrant.rols"
                            label="Roles"
                            append-icon
                            chips
                            deletable-chips>
                    </v-combobox>


                </v-expansion-panel-content>
            </v-expansion-panel>
            <v-btn
            color="red lighten-2"
            dark
            class="btn float-right mt-2"
            @click="openDialog()"
            >
            Añadir Integrante
            </v-btn>
            </v-expansion-panels>

            </v-row>

    </div>
    <div class="text-center">
                <v-dialog
                v-model="dialog"
                width="500"
                >

                <v-card>
                    <v-card-title class="text-h5 grey lighten-2 mt-3">
                    Nuevo Integrante
                    </v-card-title>

                    <v-card-text>
                        <v-text-field
                            v-model="newIntegrant.name"
                            label="Nombre"
                            required
                        ></v-text-field>
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
            </div>
</div>
</template>
<script>
  export default {

      data(){
          return {
              name : '_Nombre',
              integrants: [
                    {
                        name: 'Integrante 1',
                        rols: [
                            'Administrador',
                            'Tester'
                        ]
                    },
                    {
                        name: 'Integrante 2',
                         rols: [
                            'Programador'
                        ]
                    }
              ],
              dialog: false,
              edit: false,
              newIntegrant: {
                  name: '',
                  rols : []
              },
              item: {}
          }
      },

      methods: {
          delIntegrant(item){
              const index = this.integrants.indexOf(item)
              confirm('Estas seguro de borrar a '+item.name) && this.integrants.splice(index, 1)
          },
          addIntegrant(){
              if(this.edit){
                this.item.name = this.newIntegrant.name
                this.edit = false
              }else{
                this.integrants.push(Object.assign({}, this.newIntegrant))
              }
              this.newIntegrant.name = ''
              this.dialog = false
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

      }
  }
</script>
