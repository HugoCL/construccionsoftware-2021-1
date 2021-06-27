<template>
    <v-row>
        <v-col cols="10" md="10" >
            <v-card>
                <v-card-title>
                    <v-row >
                        <v-col cols="12" md ="10">

                            <v-text-field
                                outlined
                                filled
                                v-model="this.project.nombre"
                                label ="Nombre Proyecto"
                            >
                            </v-text-field>

                        </v-col>
                        <v-col>
                            <v-card-subtitle><v-icon >mdi-lead-pencil</v-icon></v-card-subtitle>
                        </v-col>
                    </v-row>
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="12" md ="10">
                            <v-textarea
                                outlined
                                filled
                                counter
                                v-model="this.project.descripcion"
                                label ="DESCRIPCION"
                            >
                            </v-textarea>

                        </v-col>
                        <v-col>
                            <v-card-subtitle><v-icon >mdi-lead-pencil</v-icon></v-card-subtitle>
                        </v-col>
                    </v-row>
                </v-card-text>
                <!--Mostrar fechas-->
                <v-card-text>
                    <v-row>

                    </v-row>

                </v-card-text>


                <!--Mostrar Distintos miembros-->
                    <v-card-text
                        v-for="(field,index) in fields" :key="index">
                        <v-card-subtitle class="text-h5">{{field.name}}</v-card-subtitle>
                        <v-card-subtitle>
                            <auto-chip-component :selectList = "field.selected"
                                                 :fullList = "field.fullList"
                            ></auto-chip-component>
                        </v-card-subtitle>
                    </v-card-text>

            </v-card>
        </v-col>
        <!--
        <v-col>
            <v-card>

                <v-calendar>

                </v-calendar>
            </v-card>
        </v-col>


    -->
    </v-row>
</template>

<script>
import AutoChipComponent from "./AutoChipComponent";
export default {
    name: "EditProyectComponent",
    components: {AutoChipComponent},
    data(){
        return {
            fields : [
                {   name:"Jefes de proyecto",
                    selected : this.leads,
                    fullList : this.users
                },
                {   name:"Desarrolladores",
                    selected : this.devs,
                    fullList : this.users
                },
            ],
            startDate: null,
            endDate:null
        //Se deben incluir listas para cada tipo de miembros
        }
    },
    props:{
        leads: [],
        devs: [],
        users: [],
        project: null

    },
    methods:{
        editNameEnable(){
            this.name = !this.name;
        }
    }
}
</script>

<style scoped>

</style>
