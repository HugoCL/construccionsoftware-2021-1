<template>
    <v-container>
        <v-dialog
            v-model="editDialog"
            width="70%"
        >
            <v-card>
                <v-toolbar
                    class="mb-2"
                    color="primary"
                    dark
                >
                    <v-card-title>Editar Historia de Usuario</v-card-title>
                </v-toolbar>
                <v-form>
                    <v-row>
                        <v-col
                            sm="2"
                            md="4"
                        >
                            <v-text-field
                                v-model="storieName"
                                label="HU_CODE"
                                hide-details="auto"
                                class="ml-5"
                            ></v-text-field>
                        </v-col>

                        <v-col
                            sm="2"
                            md="0"
                        >
                            <v-subheader
                                v-text=" 'Yo como' "
                                class="mb-4 mt-2"
                                style="font-size: 16px;"
                            ></v-subheader>
                        </v-col>

                        <v-col cols="12" sm="2" md="4">
                            <v-select
                                v-model="storiesUser"
                                :items ="['PRODUCT OWNER','SCRUM MASTER']"
                                label="Cargo"
                            >
                            </v-select>
                        </v-col>
                    </v-row>
                    <!--
                    <v-row>
                        <v-col
                            sm="2"
                            md="0"
                        >
                            <v-subheader
                                v-text=" 'Yo como' "
                                class="mb-4 mt-2"
                                style="font-size: 16px;"
                            ></v-subheader>
                        </v-col>
                        <v-col cols="12" sm="4" md="2">
                            <v-select
                                v-model="storiesUser"
                                :items ="['PRODUCT OWNER','SCRUM MASTER']"
                                label="Cargo"
                            >
                            </v-select>
                        </v-col>
                    </v-row> -->

                    <v-row>
                        <v-col
                            md="auto"
                        >
                            <v-subheader
                                v-text="'Quiero'"
                                class="mb-4 mt-2 ml-5"
                                style="font-size: 16px;"
                            ></v-subheader>
                        </v-col>
                        <v-col md="10">
                            <v-text-field
                            v-model="storiesDesc"
                            label="Descripción"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col md="auto"

                        >
                            <v-subheader
                                v-text=" 'Para' "
                                class="mb-4 mt-2 ml-5 mr-4"
                                style="font-size: 16px;"
                            ></v-subheader>
                        </v-col>
                        <v-col md="10">
                            <v-text-field
                            v-model="storiesUse"
                            label="Para que se usará"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <!--botones cerrar guardar-->
                    <v-card-actions class="justify-end">
                        <v-btn
                        text
                        @click="editDialog = false"
                        >
                        Cerrar
                        </v-btn>

                        <v-btn
                        text
                        @click="saveStorie"
                        >
                        Guardar
                        </v-btn>
                    </v-card-actions>
                </v-form>
            </v-card>
        </v-dialog>
        <!--Mostrar información-->
        <v-dialog
            v-model="storiesUsersDialog"
            width="60%"
        >
            <v-card>
                <v-toolbar
                    class="mb-2 pr-0"
                    color="primary"
                    dark
                >

                    <v-list-item>
                        <v-list-item-content>
                            <v-card-title class="pa-0">
                                INFORMACION CORRESPONDIENTE
                            </v-card-title>
                        </v-list-item-content>

                        <v-list-item-content
                            class="aling-end"
                        >
                            <v-row>
                                <v-col md="2" class="offset-8"></v-col>
                            </v-row>
                        </v-list-item-content>
                    </v-list-item>
                </v-toolbar>

                <v-card-title>NUMERO HISTORIA DE USUARIO:</v-card-title>
                <v-card-subtitle class="text--primary">
                    INFORMACION CORRESPONDIENTE NOMBRE
                </v-card-subtitle>

                <v-row>
                    <v-col
                        sm="2"
                        md="0"
                        >
                        <v-subheader
                            v-text="'YO como'"
                            class="mb-4 mt-2"
                            style="font-size: 16px;"
                        ></v-subheader>
                    </v-col>
                    <v-col>
                      <!--  v-text = "Quiero"
                        class = "mb-4 mt-2"-->
                        INFORMACION CORRESPONDIENTE AL QUIERO
                        {{storiesUse.storiesDesc}}

                    </v-col>
                </v-row>


                <v-row>
                    <v-col
                        sm="2"
                        md="0"
                        >
                        <v-subheader
                            v-text="'Quiero'"
                            class="mb-4 mt-2"
                            style="font-size: 16px;"
                        ></v-subheader>
                    </v-col>
                    <v-col>
                        INFORMACION CORRESPONDIENTE AL QUIERO
                    </v-col>
                </v-row>

                <v-row>
                    <v-col></v-col>
                    <v-col></v-col>
                </v-row>
                <v-row>
                    <v-col></v-col>
                    <v-col></v-col>
                </v-row>


            </v-card>
        </v-dialog> <!-- Fin mostrar informacion-->
        <v-card
            class="white--text pb-0"
            light
            color="primary"
        >
            <v-card-title
                class="subheading font-weight-bold pb-2 pt-2"
            >   <!--Reemplazar para mostrar informacion correspondiente-->
                HU001:Ejemplo historia de usuario
            </v-card-title>

            <v-divider class="my-0 py-1"></v-divider>
            <v-card-actions>
                <v-btn
                    color="accent"
                    class="my-0"
                    @click.stop="editHistorie"
                >
                    Editar
                    <v-icon>mdi-pencil</v-icon>
                </v-btn>
                <v-btn
                    color="error"
                    @click.stop="deleteHistorie"
                >
                    Eliminar
                    <v-icon>mdi-delete</v-icon>
                </v-btn>
            </v-card-actions>
            <v-divider class="ma-0 py-0"></v-divider>

        </v-card>

    </v-container>
</template>
<!--nombre, descripción(quiero), para que se usará
 -->
<script>
export default{
    name: "UserStories.vue",
    data: () => ({
        storiesUser: '',
        storiesDialog: false,
        editDialog: false,
        storieName: '',
        storiesDesc: '',
        storiesUse: '',
    }),

    props: {
        userStorie: null,
        userStories: null
    },

    methods: {
        deleteHistorie: function(){
            this.userStorie.splice(this.userStorie.indexOf(this.userStorie),1);
        },

        editHistorie: function(){
            this.editDialog = true;
            this.storieName = this.userStorie.name;
            this.storiesDesc = this.userStorie.desc;

        },

        saveStorie: function(){
            this.editDialog = false;
            this.userStorie.name = this.storieName;
            this.userStorie.desc = this.storiesDesc;
        }
    }
}
</script>
