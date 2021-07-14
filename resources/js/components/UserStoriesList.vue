<template>
    <v-container>
        <v-dialog
            v-model="dialog"
            width="70%"
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
                        <v-col lg="2">
                            <v-text-field
                                class="pa-2 ml-10"
                                v-model="huCode"
                                label="Codigo"
                            >
                            </v-text-field>
                        </v-col>
                        <v-col md="auto">
                           <v-subheader
                                v-text="'Yo como '"
                                class="mb-4 mt-2 "
                                style="font-size: 16px;"
                            >
                            </v-subheader>
                        </v-col>
                        <v-col md="8">
                            <v-select
                                v-model="huOwner"
                                :items="['Product Owner','Scrum Master']"
                                label="Cargo"
                            >
                            </v-select>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col md="auto">
                            <v-subheader
                                v-text="' quiero '"
                                class="mb-4 mt-2 ml-5"
                                style="font-size: 16px;"
                            >
                            </v-subheader>
                        </v-col>

                        <v-col md="10">
                            <v-text-field
                                v-model="huAction"
                                label="Accion"
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col md="auto">
                            <v-subheader
                                v-text="' para '"
                                class="mb-4 mt-2 ml-5 mr-4"
                                style="font-size: 16px;"
                            >
                            </v-subheader>
                        </v-col>

                        <v-col md="10">
                            <v-text-field
                                v-model="huResult"
                                label="Resultado"
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <v-card-actions class="justify-end">
                        <v-btn
                            text
                            @click="dialog = false"
                        >
                            Cerrar
                        </v-btn>

                        <v-btn
                            text
                            @click="createHU"
                        >
                            Guardar
                        </v-btn>
                    </v-card-actions>
                </v-form>
            </v-card>
        </v-dialog>

        <v-row>
            <v-col cols="12">
                <v-row class="justify-center">
                    <v-btn
                        color="secondary"
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
                v-for="(userStory, index) in userStories"
                :key="index"
            >
                <!-- Llamo al otro componente  -->

                <user-stories
                    :userStory = "userStory"
                    :userStories = "userStories"
                    :project="project"
                ></user-stories>

            </v-col>
        </v-row>
    </v-container>
</template>

<script>
//lamo al otro componente;
import UserStories from './UserStories'; //modificarNombre singular
export default{
    name: "UserStoriesList.vue",
    components: {}, //el otro componente //modificar singular
    data: () => ({
        dialog: false,
        huCode: '',
        huOwner: '',
        huAction: '',
        huResult: '',
        huIncrement: '',
        huNumber: 0,
        userStories: [
            //HU de ejemplo
            /*{
                //los datos de la HU
                id_project: this.project.id,
                code: 'HU001',
                owner: 'Product Owner',
                action: 'crear proyectos',
                result: 'guardarlos en mi corazon',
                increment: 1
            }*/
        ]
    }),
    props:{
        project: null,
        userstories: []
    },
    created() {
      console.log(this.userstories);
      this.userStories = this.userstories;
    },
    methods:{
        createHU: function(){
            console.log(this.huCode)
            let card = {
                code: this.huCode,
                owner: this.huOwner,
                action: this.huAction,
                result: this.huResult,
                id_project: this.project.id
            };
            console.log(card)
            this.userStories.push(Object.assign( {},{ id_project: this.project.id, code: this.huCode, action: this.huAction, result: this.huResult }));
            this.dialog= false;
            axios.post('/user-story',card)
                .then(res=>{
                    console.log(res.data.id);
                    console.log(res.data);
                });
            this.huCode = '',
            this.huOwner = '';
            this.hUAction = '';
            this.huResult = '';
            this.huIncrement = 0;
        }
    }
}
</script>
