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
                    <v-col>
                        <v-dialog
                            ref="dialog"
                            v-model="modal"
                            :return-value.sync="date"
                            persistent
                            width="290px"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="date"
                                    label="Picker in dialog"
                                    prepend-icon="mdi-calendar"
                                    readonly
                                    v-bind="attrs"
                                    v-on="on"
                                ></v-text-field>
                            </template>
                            <v-date-picker
                                v-model="date"
                                scrollable
                            >
                                <v-spacer></v-spacer>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="modal = false"
                                >
                                    Cancel
                                </v-btn>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="$refs.dialog.save(date)"
                                >
                                    OK
                                </v-btn>
                            </v-date-picker>
                        </v-dialog>
                    </v-col>
                    <v-col>
                        <v-menu
                            v-model="menu2"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            transition="scale-transition"
                            offset-y
                            min-width="auto"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="date"
                                    label="Picker without buttons"
                                    prepend-icon="mdi-calendar"
                                    readonly
                                    v-bind="attrs"
                                    v-on="on"
                                ></v-text-field>
                            </template>
                            <v-date-picker
                                v-model="date"
                                @input="menu2 = false"
                            ></v-date-picker>
                        </v-menu>
                    </v-col>
                    </v-row>

                </v-card-text>


                <!--Mostrar Jefe de proyecto-->
                <v-card-title class="text-h8">Jefes de Proyecto<v-icon>mdi-user</v-icon></v-card-title>
                <v-card-text>
                    <auto-chip-component></auto-chip-component>
                </v-card-text>


                <!--Mostrar Jefe desarroladores-->
                <v-card-title class="text-h8">Programadores<v-icon>mdi-user</v-icon></v-card-title>
                <v-card-text>
                    <auto-chip-component></auto-chip-component>
                </v-card-text>

                <!--Mostrar Jefe disenadores-->
                <v-card-title class="text-h8">Diseñadores<v-icon>mdi-user</v-icon></v-card-title>
                <v-card-text>
                    <auto-chip-component></auto-chip-component>
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
            jefes: ['Nicolas','Hugo'],
            miembros: ['Manuel','Sanfurgo']
        }
    },
    props:{
        jefes: ['Nicolas','Hugo'],
        miembros: ['Manuel','Sanfurgo'],
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
