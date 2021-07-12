<template>
    <v-card
        class="mx-0 px-0 mb-4"
        outlined
    >
        <v-list-item
            class="btn text-left mx-0"
            v-bind:href="'/administrar-proyectos/'+proyectData.id"
            v-on:click="getProject(proyectData.id)"
        >
            <v-list-item-content>
                <div class="text-overline mb-1">
                    <v-list-item-title class="text-h6 mb-1" >
                        <a  > {{proyectData.nombre}} </a>
                    </v-list-item-title>

                </div>
                <v-list-item-subtitle>
                    <v-row >
                        ID: {{proyectData.id}}
                    </v-row>
                </v-list-item-subtitle>
                <v-list-item-content>

                    <v-row >
                        <v-col cols="3">
                            Fecha Inicio: {{proyectData.fechaInicio}}
                        </v-col>
                        <v-col cols="3">
                            Fecha Termino: {{proyectData.fechaTermino}}
                        </v-col >
                        <v-col cols="3">
                            ID: {{proyectData.id}}
                        </v-col >
                    </v-row>

                </v-list-item-content>
                <v-list-item-content cols="12">
                    <div>
                        {{proyectData.descripcion}}
                    </div>
                </v-list-item-content>
                <v-list-item-subtitle>

                </v-list-item-subtitle>
            </v-list-item-content>

        </v-list-item>
        <v-card-actions style="float:right" >
            <v-btn class="ma-2 btn-danger white--text" color="error" v-on:click="dialogAlert=true">
                <div class="px-0 hidden-sm-and-down">Eliminar</div>
                <v-icon right class="mx-0 px-0">mdi-delete</v-icon>

                <v-dialog v-model="dialogAlert" max-width="40%">
                    <v-card>
                        <v-card-title class="text-h6 text-c">Seguro que desea borrar el proyecto?</v-card-title>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="secondary" class="btn-danger white--text" @click="dialogAlert=false">Cancelar</v-btn>
                            <v-btn color="red" class="btn-danger white--text" @click="deleteProject(proyectData.id)">Confirmar</v-btn>
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-btn>




            <v-btn class="ma-2 btn-danger white--text" color="error" v-on:click="dialogEdit=true">
                Editar Equipo
                <v-icon right>mdi-delete</v-icon>
                <v-dialog v-model="dialogEdit" color="red" max-width="40%" >
                    <v-card-title class="text-h6 text-c" dark color="red">Equipos</v-card-title>
                    <v-card color="red lighten-5" v-for="(equipo,index) in proyecto.equipos" :key="index">
                        <v-btn @click="dialogAdd=true">
                            <v-dialog v-model="dialogAdd" color="red" max-width="40%">
                                <v-card>
                                    <v-card-title>
                                        Estudiantes
                                    </v-card-title>
                                    <v-select
                                        item-text="correo"
                                        v-model="proyecto.workers"
                                        :items="items"
                                        label="Empleados del proyecto"
                                        multiple
                                        dense
                                        clearable
                                        chips
                                        small-chips
                                        outlined
                                        prepend-icon="mdi-account-group"

                                    ></v-select>
                                    <v-btn>
                                        Confirmar
                                    </v-btn>

                                </v-card>
                            </v-dialog>
                            <v-icon dark>mdi-plus</v-icon>
                        </v-btn>
                        <v-card-actions>
                            <div>
                                {{equipo.nombreequipo}}
                                <v-btn color="secondary"
                                       class="btn-danger white--text"
                                       @click="dialogAlert=false"><v-icon center>mdi-plus</v-icon></v-btn>
                                <v-btn color="red" class="btn-danger align- end white--text" @click="deleteTeam(equipo.nombreequipo)"><v-icon dark>mdi-delete</v-icon></v-btn>
                                <card color ="red">
                                    <div v-for="(estudiante, index1) in equipo.estudiante" :key="index1"
                                         class='black--text'> {{estudiante.name}}
                                        <v-col>
                                            <v-btn color="secondary"
                                                   class="btn-danger align-end black--text"
                                                   @click="deleteStudent(estudiante.name)"><v-icon center>mdi-delete</v-icon>
                                            </v-btn>
                                            <v-btn color="red"
                                                   class="btn-danger align-end black--text"
                                                   @click="deleteStudent(estudiante.name)"><v-icon dark>mdi-minus</v-icon>
                                            </v-btn>
                                        </v-col>
                                    </div>
                                </card>
                            </div>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-btn>

        </v-card-actions>


    </v-card>
</template>

<script>
import EditProyectComponent from "./EditProyectComponent";
export default {
    components: {EditProyectComponent},
    data(){
        return{
            dialogAlert:false,
            dialogEdit:false,
            dialogEliminar: false,
            dialogAdd: false,

            proyecto: {
                id:'1',
                equipos: [

                    {
                        nombreequipo:'Equipo 1',
                        estudiante:
                    [
                        {name: 'Elwea tim 1', correo:'ajcorreo sd@askdja.cl'},
                        {name: 'El weta tim 1', correo:'corre@askdja.cl'},
                        {name: 'El kalsjdasd3 tim 1', correo:'perra@askdja.cl'},

                    ]},
                    {
                        nombreequipo:'Equipo 2',
                        estudiante:
                            [
                                {name: 'Elwea tim 2', correo:'ajcorreo sd@askdja.cl'},
                                {name: 'El weta tim 2', correo:'corre@askdja.cl'},
                                {name: 'El kalsjdasd3 tim 2', correo:'perra@askdja.cl'},

                            ]},
                ]
            }
        }
    },
    methods:{
        getProject: function (id){
            axios.get('/administrar-proyectos/'+id);
        },

        deleteProject: function (id){
            axios.delete('/administrar-proyectos/'+id);
            this.$emit('delete', id);
        },

        getTeam: function (id) {
            axios.get('/equipo/'+id);
        },

        deleteTeam: function (){

        },
        editTeam: function (){

        },
        deleteStudent: function(position){
            alert("vamos al eliminar al wea" + position)
        },
        addTeam: function(){
            alert("tim agregado")
            //proyecto.equipos.push(equipo)
        }

    },
    props:{
       proyectData: null
    }

}
</script>
<style scoped>

</style>
