<!-- TABLA DE USUARIOS - (Por si alguien necesita este componente) -->
<template>
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
        <v-toolbar-title>LISTA DE USUARIOS</v-toolbar-title>
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
            <space></space>
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
                      v-model="editedItem.lastName"
                      label="Apellido Paterno"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.mothersLastName"
                      label="Apellido Materno"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.admission"
                      label="Año de Ingreso"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.rut"
                      label="RUT"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.enrollment"
                      label="Matricula"
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
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.phone"
                      label="Teléfono"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.direction"
                      label="Dirección"
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
</template>
<script>
  export default {
    data: () => ({
      dialog: false,
      dialogDelete: false,
      search: '',
      headers: [
        {
          text: 'Nombres',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        {
          text: 'Apellidos',
          align: 'start',
          sortable: true,
          value: 'lastName',
        },
        { text: 'Ingreso', value: 'admission' },
        { text: 'RUT', value: 'rut', sortable: false },
        { text: 'Matricula', value: 'enrollment', sortable: false },
        { text: 'Correo', value: 'email', sortable: false },
        { text: 'Acciones', value: 'actions', sortable: false },
      ],
      students: [],
      editedIndex: -1,
      editedItem: {
        name: '',
        lastName: '',
        mothersLastName: '',
        admission: 0,
        rut: '',
        enrollment: 0,
        email: '',
      },
      defaultItem: {
        name: '',
        lastName: '',
        mothersLastName: '',
        admission: 0,
        rut: '',
        enrollment: 0,
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
            name: 'Frozen Yogurt',
            lastName: 'Ap PaternoA',
            mothersLastName: 'Ap Materno',
            admission: 2013,
            rut: '15.555.666-5',
            enrollment: 24,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'Ice cream sandwich',
            lastName: 'Ap PaternoB',
            mothersLastName: 'Ap Materno',
            admission: 2013,
            rut: '15.777.888-1111',
            enrollment: 37,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'Eclair',
            lastName: 'Ap PaternoC',
            mothersLastName: 'Ap Materno',
            admission: 2012,
            rut: '14.123.456-9',
            enrollment: 23,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'Cupcake',
            lastName: 'Ap PaternoD',
            mothersLastName: 'Ap Materno',
            admission: 2015,
            rut: '16.551.214-4',
            enrollment: 67,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'Gingerbread',
            lastName: 'Ap PaternoE',
            mothersLastName: 'Ap Materno',
            admission: 2016,
            rut: '18.014.333-8',
            enrollment: 49,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'Jelly bean',
            lastName: 'Ap PaternoF',
            mothersLastName: 'Ap Materno',
            admission: 2016,
            rut: '18.693.254-8',
            enrollment: 94,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'Lollipop',
            lastName: 'Ap PaternoG',
            mothersLastName: 'Ap Materno',
            admission: 2017,
            rut: '18.856.321-7',
            enrollment: 98,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'Honeycomb',
            lastName: 'Ap PaternoH',
            mothersLastName: 'Ap Materno',
            admission: 2018,
            rut: '19.002.120-5',
            enrollment: 87,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'Donut',
            lastName: 'Ap PaternoI',
            mothersLastName: 'Ap Materno',
            admission: 2019,
            rut: '19.985.214-3',
            enrollment: 51,
            email: 'correo0001@dominio.com',
          },
          {
            name: 'KitKat',
            lastName: 'Ap PaternoJ',
            mothersLastName: 'Ap Materno',
            admission: 2020,
            rut: '20.556.112-5',
            enrollment: 65,
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
