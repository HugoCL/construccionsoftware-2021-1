<template>
    <v-container>
        <v-dialog
            v-model="editDialog"
            width="60%"
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
                            sm="8"
                            md="8"
                        >
                            <v-text-field
                                v-model="storyName"
                                label="Nombre Historia de usuario"
                                hide-details="auto"
                                outlined
                            ></v-text-field>
                        </v-col>
                    </v-row>

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
                            <v-textarea
                            v-model="storiesDesc"
                            label="Descripción"
                            outlined
                            ></v-textarea>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col
                            sm="2"
                            md="0"
                        >
                            <v-subheader
                                v-text=" 'Para' "
                                class="mb-4 mt-2"
                                style="font-size: 16px;"
                            ></v-subheader>
                        </v-col>
                        <v-col>
                            <v-textarea
                            v-model="storiesUse"
                            label="Para que se usará"
                            outlined
                            ></v-textarea>
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
                        @click="saveVolere"
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
                            <v-card-title>
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

                <v-card-title>NOMBRE HISTORIO DE USUARIO:</v-card-title>
                <v-card-subtitle class="text--primary">
                    INFORMACION CORRESPONDIENTE
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
                        INFORMACION CORRESPONDIENTE AL QUIERO
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
                >
                    Editar
                    <v-icon>mdi-pencil</v-icon>
                </v-btn>
                <v-btn
                    color="error"
                >
                    Eliminar
                    <v-icon>mdi-delete</v-icon>
                </v-btn>
            </v-card-actions>
            <v-divider class="ma-0 py-0"></v-divider>

        </v-card>

    </v-container>
</template>

<script>
export default{
    name: "UserStories.vue",
    data: () => ({

    }),

    props: {
        userStorie: null,
        userStories: null
    },
}
</script>

