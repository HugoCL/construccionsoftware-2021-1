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
                        <v-col md="12">
                            <v-text-field
                            v-model="huName"
                            label="Titulo"
                            class="pa-2"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="2"
                        >
                            <v-text-field
                                v-model="huCode"
                                label="Codigo"
                                hide-details="auto"
                                class="pa-2 ml-5 "
                            ></v-text-field>
                        </v-col>

                        <v-col md="auto">
                            <v-subheader
                                v-text=" 'Yo como' "
                                class="mb-4 mt-2"
                                style="font-size: 16px;"
                            ></v-subheader>
                        </v-col>

                        <v-col md="8">
                            <v-select
                                v-model="huOwner"
                                :items ="['Product Owner','Scrum Master']"
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
                                v-model="huOwner"
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
                                v-text="'quiero'"
                                class="mb-4 mt-2 ml-5"
                                style="font-size: 16px;"
                            ></v-subheader>
                        </v-col>
                        <v-col md="10">
                            <v-text-field
                            v-model="huAction"
                            label="Accion"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col md="auto"

                        >
                            <v-subheader
                                v-text=" 'para' "
                                class="mb-4 mt-2 ml-5 mr-4"
                                style="font-size: 16px;"
                            ></v-subheader>
                        </v-col>
                        <v-col md="10">
                            <v-text-field
                            v-model="storiesUse"
                            label="Resultado"
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
                                {{userStory.code}}: {{userStory.name}}
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

                <!--<v-card-title>NUMERO HISTORIA DE USUARIO:</v-card-title>
                <v-card-subtitle class="text--primary">
                    INFORMACION CORRESPONDIENTE NOMBRE
                </v-card-subtitle>-->

                <v-row>
                    <v-col
                        >
                        <!--<v-card-subtitle class="text-primary pa-0"> Yo como {{ userStorie.owner }} quiero {{ userStorie.action }} para {{ userStorie.result }}</v-card-subtitle>-->

                        <v-card-subtitle class=" text--primary pa-5 " style="font-size:20px">Yo como {{ userStory.owner }} quiero {{userStory.action}} para {{userStory.result}}</v-card-subtitle>
                    </v-col>
                    <!--<v-col class="">
                        v-text = "Quiero"
                        class = "mb-4 mt-2"
                        Yo como {huOwner} quiero {huAction} para {huResult}
                        {{storiesUse.huAction}}

                    </v-col>-->
                </v-row>


                <!--<v-row>
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
                </v-row>-->


            </v-card>
        </v-dialog> <!-- Fin mostrar informacion-->
        <v-card
            class="white--text pb-0"
            light
            color="primary"
            @click="storiesUsersDialog = true"

        >
            <v-card-title
                class="subheading font-weight-bold pb-2 pt-2"
            >   <!--Reemplazar para mostrar informacion correspondiente-->
                {{userStory.code}}: {{userStory.name}}
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
        huOwner: '',
        storiesUsersDialog: false,
        editDialog: false,
        huName: '',
        huCode: '',
        huAction: '',
        storiesUse: '', //result
    }),

    props: {
        userStory: null,
        userStories: null
    },

    methods: {
        deleteHistorie: function(){
            console.log(this.userStory)
            this.userStories.splice(this.userStories.indexOf(this.userStory),1);
            axios.delete('/user-story/'+this.userStory.id)
                .then(res=>{
                    console.log(res.data);
                });
        },
        incrementar: function() {
            return increment++;
        },

        editHistorie: function(){
            this.editDialog = true;
            this.huName = this.userStory.name;
            this.huCode = this.userStory.code;
            this.huOwner = this.userStory.owner;
            this.huAction = this.userStory.action;
            this.storiesUse = this.userStory.result;

        },

        saveStorie: function(){
            this.editDialog = false;
            this.userStory.name = this.huName;
            this.userStory.code = this.huCode;
            this.userStory.owner = this.huOwner;
            this.userStory.action = this.huAction;
            this.userStory.result = this.storiesUse;
            axios.put('/user-story/'+this.userStory.id, this.userStory)
                .then(res=>{
                    console.log(res.data);
                });
        }
    }
}
</script>
