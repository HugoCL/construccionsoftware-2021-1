<template>
    <v-container>
        <v-dialog
            v-model="dialog"
            width="60%"
        >
            <v-card>
                <v-toolbar
                    class="mb-2"
                    color="primary"
                    dark
                >
                    <v-card-title> Crear Historia de Usuario</v-card-title>
                </v-toolbar>
                <v-form>
                    <v-row>
                        <v-col
                            cols="12"
                            sm="4"
                            md="2"
                        >
                            <v-subheader
                                v-text="'Yo como '"
                                class="mb-4 mt-2"
                                style="font-size: 16px;"
                            >
                            </v-subheader>
                        </v-col>

                        <v-col
                            cols="12"
                            sm="4"
                            md="2"
                        >
                            <v-select
                                v-model="HU_owner"
                                :items="['Product Owner']"
                                label="Cargo"
                            >
                            </v-select>
                        </v-col>

                        <v-col
                            cols="12"
                            sm="4"
                            md="2"
                        >
                            <v-subheader
                                v-text="' quiero '"
                                class="mb-4 mt-2"
                                style="font-size: 16px;"
                            >
                            </v-subheader>
                        </v-col>

                        <v-col
                            cols="12"
                            sm="4"
                            md="2"
                        >
                            <v-text-field
                                v-moder="HU_action"
                                label="Accion"
                            >
                            </v-text-field>
                        </v-col>

                        <v-col
                            cols="12"
                            sm="4"
                            md="2"
                        >
                            <v-subheader
                                v-text="' para '"
                                class="mb-4 mt-2"
                                style="font-size: 16px;"
                            >
                            </v-subheader>
                        </v-col>

                        <v-col
                            cols="12"
                            sm="4"
                            md="2"
                        >
                            <v-text-field
                                v-model="HU_result"
                                label="Resultado"
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <v-card-actions>
                        <v-btn
                            text
                            @click="dialog = false"
                        >
                            Cerrar
                        </v-btn>

                        <v-btn
                            text
                            @click="createUH"
                        >
                            Guardar
                        </v-btn>
                    </v-card-actions>
                </v-form>
            </v-card>
        </v-dialog>

        <v-row>
            <v-col>
                <v-row>
                    <v-btn
                        color="secundary"
                        @click="dialog = true"
                        class="mb-4"
                        width="50%"
                    >
                        <v-icon class="pr-2">
                            mdi-card-plus-outline
                        </v-icon>
                        Crear Historia de Usuario
                    </v-btn>
                </v-row>
            </v-col>
            <v-col
                md="4"
                v-for="(userStorie, index) in userStories" :key="index"
            >
                <!-- Llamo al otro componente  -->
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
//lamo al otro componente;
export default{
    name: "UserStoriesList.vue",
    components: {}, //el otro componente
    data: () => ({
        dialog: false,
        HU_owner: '',
        HU_action: '',
        HU_result: '',
        HU_increment: '',
        HU_number: 0,
        HULists: [
            //HU de ejemplo
            {
                //los datos de la HU
            },
        ]
    }),
    methods:{
        createHU: function(){
            this.HULists.push({
                owner: this.HU_owner,
                action: this.HU_action,
                result: this.HU_result,
                increment: parseInt(this.HU_increment)
            });
            this.dialog= false;
            this.HU_owner = '';
            this.HU_action = '';
            this.HU_result = '';
            this.increment = 0;
        }
    }
}
</script>
