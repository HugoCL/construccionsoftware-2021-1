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
                                                    v-model="editedItem.nombre"
                                                    label="Nombres"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col
                                                cols="12"
                                                sm="6"
                                                md="4"
                                            >
                                                <v-text-field
                                                    v-model="editedItem.correo"
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
        <v-snackbar
            color="primary"
            class="white--text"
            v-model="snackBarNew"
            :timeout="timeout=2000"
        >
            Se agrego un usuario

        </v-snackbar>
        <v-snackbar
            color="error"
            class="white--text te"
            v-model="snackBarDelete"
            :timeout="timeout=2000"
        >
            Se elimino un usuario

        </v-snackbar>
        <v-snackbar
            color="secondary"
            class="white--text te"
            v-model="snackBarEdit"
            :timeout="timeout=2000"
        >
            Se edito un usuario
        </v-snackbar>
    </v-container>
</template>

<script>
export default {
    name:'UserTableComponent',
    data: () => ({
        dialog: false,
        dialogDelete: false,
        search: '',
        snackBarDelete:false,
        snackBarEdit:false,
        snackBarNew:false,
        headers: [
            { text: 'Nombres', align: 'start', sortable: true, value: 'nombre'},
            { text: 'Correo', value: 'correo', sortable: true },
            { text: 'Acciones', value: 'actions', sortable: false },
        ],
        students: [],
        editedIndex: -1,
        editedItem: {
            nombre: '',
            correo: '',
        },
        defaultItem: {
            nombre: '',
            correo: '',
        },
        emailRules: [
            value => !! value || 'Este campo no debe estar vacío',
            value => /.+@.+/.test(value) || 'El e-mail debe ser válido'
        ]
    }),

    computed: {
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
        //this.initialize();
        this.students = this.users;
        console.log(this.users);
    },
    props: {
        users:[]
    },
    methods: {

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
            axios.delete('/lista-usuarios/' + this.editedItem.correo)

            this.snackBarDelete=true;
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
                axios.put('/lista-usuarios/' + this.editedItem.correo, this.editedItem)
                this.snackBarEdit=true;
            } else {
                this.students.push(this.editedItem)
                axios.post('/lista-usuarios', this.editedItem)
                    .then(response => {
                        console.log("usuario enviado")
                        this.$emit('add',response.data);
                        this.snackBarNew=true;
                    });
            }
            this.close()
        },
    },
}
</script>
