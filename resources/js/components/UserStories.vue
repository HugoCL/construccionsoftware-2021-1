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
    </v-container>
</template>

<script>
</script>

