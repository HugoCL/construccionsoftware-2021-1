<template>

            <v-card color="red lighten-5">
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
                                prepend-icon="mdi-account-group"
                                dense
                                clearable
                            ></v-select>
                            <span>Seleccionados: {{ proyecto.workers }}</span>
                            <v-btn @click="addTeam(proyecto.workers)">
                                Agregar
                            </v-btn>

                        </v-card>
                    </v-dialog>
                    <v-icon dark>mdi-plus</v-icon>
                </v-btn>
                <v-card-actions>
                    <div>
                        <card color ="red">
                            <div v-for="(estudiante, index1) in equipos" :key="index1"
                                 class='black--text'> {{estudiante.id_user}}
                                <v-col>
                                    <v-btn color="secondary"
                                           class="btn-danger align-end black--text"
                                           @click="eliminarEstudiante(estudiante.id)"><v-icon center>mdi-delete</v-icon>
                                    </v-btn>
                                </v-col>
                            </div>
                        </card>
                    </div>
                </v-card-actions>
            </v-card>

</template>

<script>
import EditProyectComponent from "./EditProyectComponent";
export default {
    name: "EditTeam",
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
            this.getTeam(this.idProy[0]);
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
