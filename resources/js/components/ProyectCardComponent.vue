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
            <!--v-btn class="ma-2 btn-danger white--text" color="secondary" v-on:click="getTeam(proyectData.id)">
                Editar Equipo
                <v-icon right>mdi-account-group-outline</v-icon>
                <v-dialog v-model="dialogEdit" max-width="40%" >
                    <v-toolbar class="text-h6 text-c white--text"
                                    color="primary">
                        <v-col cols="6" class="text-left">
                            Equipos
                        </v-col>
                        <v-col cols="6" class="text-right">
                            <v-btn @click="dialogAdd=true"
                                    color="secondary"
                                    fab
                                    small>
                                <v-dialog v-model="dialogAdd" color="red" max-width="38%">
                                    <v-card>
                                        <v-card-title color="primary">
                                            Estudiantes
                                        </v-card-title>
                                        <v-card class="mx-2 px-3 mb-2 py-4">
                                            <v-select
                                                item-text="correo"
                                                v-model="proyecto.workers"
                                                :items="items"
                                                label="Empleados del proyecto"
                                                prepend-icon="mdi-account-group"
                                                dense
                                                clearable
                                            ></v-select>
                                            <span>Seleccionados: {{ proyecto.workers }}</span>
                                            <v-btn @click="addTeam(proyecto.workers)"
                                                   color="secondary">
                                                Agregar
                                            </v-btn>
                                        </v-card>

                                    </v-card>
                                </v-dialog>
                                <v-icon>mdi-plus</v-icon>
                            </v-btn>
                        </v-col>

                    </v-toolbar>
                    <v-card>
                        <v-card-actions>

                                <v-card class="v-picker--full-width">
                                    <v-container>
                                        <v-row v-for="(estudiante, index1) in equipos" :key="index1"
                                               class='black--text v-picker--full-width'>
                                            <v-col cols="6"
                                                    class="text-left mt-3"
                                                    align-center>
                                                {{estudiante.id_user}}
                                            </v-col>
                                            <v-col cols="6"
                                                   class="text-right">
                                                <v-btn color="error"
                                                       fab
                                                       small
                                                       class="white--text"
                                                       @click="eliminarEstudiante(estudiante.id)"><v-icon>mdi-delete</v-icon>
                                                </v-btn>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card>

                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-btn-->
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
            equipos: [],
            equiposAux: [],
            items: [],
            id_team: [],
            idProy: [],
            proyecto: {

            }
        }
    },

    created(){
        /*
              axios.post('/user', {correo: 'ncastillo@hotmail.com', nombre: 'Nicolas'});
              axios.post('/user', {correo: 'awallberg@hotmail.com', nombre: 'Andres'});
              axios.post('/user', {correo: 'mvalenzuela@hotmail.com', nombre: 'Manuel'});  */

        axios.get('/user')
            .then(response=>{
                const res = response.data;
                this.items = res;

            });
    },


    methods:{

        getProject: function (id){
            axios.get('/administrar-proyectos/'+id);
        },

        deleteProject: function (id){
            axios.delete('/administrar-proyectos/'+id);
            this.$emit('delete', id);
            this.dialogAlert=false;
        },

        async getTeam(id) {
           //const v = axios.get('/integrantes/'+id);
           console.log(id);
           this.dialogEdit=true;
           const res = await axios.get('/integrantes');

           const miembros = [];
           for (let i=0; i<res.data.length; i++) {
               const datos = res.data[i];
                if (datos.id_proyecto == id) {
                    miembros.push(datos);

                }
           }
           this.equipos = miembros;
           this.id_team[0] = this.equipos[0].id_equipo;
           this.idProy[0] = id;
           console.log(this.equipos);
        },
        //eliminar estudiante del equipo y bd
        async eliminarEstudiante(id){
            console.log(id);
            axios.delete('/integrantes/'+id);
            for (let i=0; i<this.equipos.length; i++) {
                if (this.equipos[i].id == id) {
                    this.equipos.splice(this.equipos.indexOf(this.equipos[i]), 1);
                    break;
                }
            }
        },

        editTeam: function (){

        },
        deleteStudent: function(position){
            alert("vamos al eliminar al wea" + position)
        },

        addTeam: function(id){
            //alert("tim agregado")
            console.log(id);
            for (let i=0; i<this.equipos.length; i++) {
                if (this.equipos[i].id_user == id) {
                    alert("Este usuario ya esta en este equipo");
                    return;
                }
            }
            console.log('agregado')
            axios.post('/integrantes', {id_equipo: this.id_team[0], id_proyecto: this.idProy[0], id_user: id, rol: 'admin'});
            //this.getTeam(this.idProy[0]);
            //this.equipos.push(equipo)
            this.dialogAdd=false;
            this.getTeam(this.idProy[0]);

        }

    },

    props:{
       proyectData: null,
       equipoData :null
    }

}
</script>
<style scoped>

</style>
