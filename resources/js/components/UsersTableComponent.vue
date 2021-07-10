<template>
  <v-container id="app">
    <v-app>
      <v-data-table
        :headers="headers"
        :search="search"
        :items="students"
        sort-by="admission"
        class="elevation-1"
      >
        <template v-slot:top>
          <v-toolbar
            flat
          >
            <v-toolbar-title>LISTA DE ESTUDIANTES</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-text-field
              v-model="search"
              append-icon="mdi-magnify"
              label="Search"
              single-line
              hide-details
            ></v-text-field>

            <v-divider
              class="mx-4"
              inset
              vertical
            ></v-divider>
            <v-spacer></v-spacer>
            <v-dialog
              v-model="dialog"
              max-width="1200px"
            >
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  color="blue-grey"
                  dark
                  class="mb-2"
                >
                  Subir Lista
                <v-icon
                  right
                  dark
                >
                  mdi-cloud-upload
                </v-icon>
                </v-btn>

                <v-btn
                  color="primary"
                  dark
                  class="mb-2"
                  v-bind="attrs"
                  v-on="on"
                >
                  Agregar
                </v-btn>
              </template>
              <v-card>
                <v-card-title>
                  <span class="text-h5">{{ formTitle }}</span>
                </v-card-title>

                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col
                        cols="12"
                        sm="6"
                        md="4"
                      >
                        <v-text-field
                          v-model="editedItem.id"
                          label="Id"
                          disabled="disabled"
                        ></v-text-field>
                      </v-col>
                      <v-col
                        cols="12"
                        sm="6"
                        md="4"
                      >
                        <v-text-field
                          v-model="editedItem.name"
                          label="Nombres"
                        ></v-text-field>
                      </v-col>
                      <v-col
                        cols="12"
                        sm="6"
                        md="4"
                      >
                        <v-text-field
                          v-model="editedItem.email"
                          label="Correo"
                        ></v-text-field>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn
                    color="blue darken-1"
                    text
                    @click="close"
                  >
                    Cancelar
                  </v-btn>
                  <v-btn
                    color="blue darken-1"
                    text
                    @click="save"
                  >
                    Guardar
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
            <v-dialog v-model="dialogDelete" max-width="500px">
              <v-card>
                <v-card-title class="text-h5">¿Estás seguro de que quieres eliminar?</v-card-title>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                  <v-btn color="blue darken-1" text @click="deleteItemConfirm">Sí, estoy Seguro.</v-btn>
                  <v-spacer></v-spacer>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-toolbar>

        </template>
        <template v-slot:[`item.actions`]="{ item }">
          <v-icon
            small
            class="mr-2"
            @click="editItem(item)"
          >
            mdi-pencil
          </v-icon>
          <v-icon
            small
            @click="deleteItem(item)"
          >
            mdi-delete
          </v-icon>
        </template>
        <template v-slot:no-data>
          <v-btn
            color="primary"
            @click="initialize"
          >
            Reset
          </v-btn>
        </template>
      </v-data-table>
    </v-app>
  </v-container>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
      dialogDelete: false,
      search: '',
      headers: [
        { text: 'Id', align: 'start', sortable: true, value: 'id'},
        { text: 'Nombres', align: 'start', sortable: true, value: 'name'},
        { text: 'Correo', value: 'email', sortable: true },
        { text: 'Acciones', value: 'actions', sortable: false },
      ],
      students: [],
      editedIndex: -1,
      editedItem: {
        id: '',
        name: '',
        email: '',
      },
      defaultItem: {
        id: '',
        name: '',
        email: '',
      },
      emailRules: [
          value => !! value || 'Este campo no debe estar vacío',
          value => /.+@.+/.test(value) || 'El e-mail debe ser válido'
      ]
    }),

    computed: {

      getFullLastName(){
        return '${lastName} ${mothersLastName}';
      },
      formTitle () {
        return this.editedIndex === -1 ? 'Agregar Nuevo Estudiante' : 'Editar Estudiante'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
    },

    created () {
      this.initialize()
    },

    methods: {
      initialize () {
        this.students = [
          {
            id: '1',
            name: 'Frozen Yogurt',
            email: 'correo0001@dominio.com',
          },
          {
            id: '2',
            name: 'Ice cream sandwich',
            email: 'correo0001@dominio.com',
          },
          {
            id: '3',
            name: 'Eclair',
            email: 'correo0001@dominio.com',
          },
          {
            id: '4',
            name: 'Cupcake',
            email: 'correo0001@dominio.com',
          },
          {
            id: '5',
            name: 'Gingerbread',
            email: 'correo0001@dominio.com',
          },
          {
            id: '6',
            name: 'Jelly bean',
            email: 'correo0001@dominio.com',
          },
          {
            id: '7',
            name: 'Lollipop',
            email: 'correo0001@dominio.com',
          },
          {
            id: '8',
            name: 'Honeycomb',
            email: 'correo0001@dominio.com',
          },
          {
            id: '9',
            name: 'Donut',
            email: 'correo0001@dominio.com',
          },
          {
            id: '10',
            name: 'KitKat',
            email: 'correo0001@dominio.com',
          },
        ]
      },

      editItem (item) {
        this.editedIndex = this.students.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.students.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        this.students.splice(this.editedIndex, 1)
        this.closeDelete()
      },

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.students[this.editedIndex], this.editedItem)
        } else {
          this.students.push(this.editedItem)
        }
        this.close()
      },
    },
  }
</script>
