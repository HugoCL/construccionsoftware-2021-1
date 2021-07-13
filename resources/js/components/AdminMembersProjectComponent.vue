<template>
    <v-container>
        <v-card>
            <v-toolbar
                color="primary"
                class="white--text pt-0 pb-0 text-h5"
            >
                Edicion de miembros
                <v-col
                    class="text-right"
                    elavation="0"
                >
                    <v-responsive>
                        <!--Agregar miembro-->
                        <v-tooltip top>
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    fab
                                    dark
                                    small
                                    v-on="on"
                                    color="grey"
                                    v-on:click="rolAlert=true"
                                >
                                    <v-icon>mdi-account-multiple-plus-outline</v-icon>
                                    <v-dialog v-model="rolAlert" max-width="40%" max-height="80%">
                                        <v-card>
                                            <v-toolbar
                                                color="primary"
                                                class="white--text pt-0 pb-0 text-h5">
                                                Roles del Proyecto

                                            </v-toolbar>
                                            <v-card-actions>
                                                <v-combobox
                                                    v-model="rolesNombres"
                                                    :items="rolesSelecc"
                                                    label="Roles"
                                                    multiple
                                                    chips
                                                    small-chips
                                                >
                                                </v-combobox>
                                            </v-card-actions>
                                        </v-card>
                                    </v-dialog>
                                </v-btn>
                            </template>
                            <span>Agregar Rol</span>
                        </v-tooltip>
                    </v-responsive>

                </v-col>
            </v-toolbar>
            <v-col>
                <v-combobox
                    v-model="users"
                    :items="selected"
                    label="Miembros disponibles"
                    multiple
                    chips
                >
                </v-combobox>
            </v-col>
            <v-col>
                <v-col
                    v-for="(user, val) in selected"
                    :key="val"
                >
                    <v-toolbar>
                        <v-col>{{user.correo}}</v-col>
                        <v-col>
                            <v-combobox
                                v-model="rolesNombres"
                                :items="getRolsUser(user.correo)"
                                label="Miembros disponibles"
                                multiple
                                chips
                            >
                            </v-combobox>
                        </v-col>
                    </v-toolbar>

                </v-col>
            </v-col>
        </v-card>
    </v-container>
</template>

<script>
export default {
    name: "AdminMembersProjectComponent",
    data(){
        return{
            users:this.getNames(),
            selected:this.select,
            rolUsuario:[
                {
                    correo:'awallberg@hotmail.com',
                    rolId:'2'
                },
            ],
            roles:[
                {
                    id:'1',
                    nombre:'Administrador'
                },
                {
                    id:'2',
                    nombre:'Designer'
                },
                {
                    id:'3',
                    nombre:'Tester'
                },

            ],
            rolesNombres:this.getRoles(),
            rolesSelecc:[],
        }
    },
    props:{
        allUsers:{},
        select:{},

    },
    methods:{
        getRolsUser(correo){
            const roles = [];
            for(let val of this.rolUsuario){
                if( val.id===correo){
                    for(let rol in roles)
                        if(rol.id===val.rolId){
                            roles.push(rol);
                        }
                }
            }
            console.log(roles);
            return roles;
        },
        getRoles(){
            var rolesNombres=[];
            for(let rol of roles){
                rolesNombres.push(rol);
            }
            return rolesNombres;
        },
        getNames(){
            var usuarios=[];
            for(var val in this.allUsers){
                usuarios.push(val.correo);
            }
            return usuarios;
        }

    }
}
</script>

<style scoped>

</style>
