<template>
    <div class="container" data-app>
        <v-container>
            <v-row >
                <v-col cols="3" class="title mr-16 pr-0">
                    Administrar proyectos
                </v-col>
                <v-col cols="2">
                    <v-dialog transition="dialog-top-transition"  width="64%">
                        <template v-slot:activator="{ on, attrs }">
                            <div>

                                <v-btn v-bind="attrs" color="secondary" v-on="on"> <v-icon class="pr-2">mdi-plus-circle-outline</v-icon>Nuevo Proyecto</v-btn>
                            </div>
                        </template>
                        <template v-slot:default="dialog" >
                            <v-card>
                                <v-toolbar class="elevation-0">
                                    <v-row align="center">
                                        <v-col cols="10" >
                                                    <span class="pl-2 mt-2 pt-2 title" >
                                                        Nuevo proyecto
                                                    </span>
                                        </v-col>
                                        <v-col cols="2" style="float: right;" class="text-right">
                                                    <span class="pr-2">
                                                        <v-btn color="transparent" class="pl-1 pr-1 pt-1 pb-1 elevation-0" @click="dialog.value = false" min-width="0" min-height="0">
                                                            <v-icon>
                                                                mdi-close
                                                            </v-icon>
                                                        </v-btn>
                                                    </span>
                                        </v-col>
                                    </v-row>

                                </v-toolbar>

                                <v-card-text>
                                    <crear-proyecto></crear-proyecto>
                                </v-card-text>
                            </v-card>
                        </template>
                    </v-dialog>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="6">
                    <ul class="list-group mx-0 px-0">
                        <li class="list-group-item"
                            v-for="(proyect,index) in proyectos":key="index">
                            <proyect-card
                                :proyectData="proyect"
                             > </proyect-card>
                        </li>
                    </ul>
                </v-col>
            </v-row>
        </v-container>

    </div>
</template>

<script>
export default {
    data(){
        return{

            proyectos:[
                {
                    id: "123123",
                    nombre:"Proyecto 1",
                    descripcion: 'Lorem ipsum dolor sit amet tempus penatibus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
                    fecha_inicio : '2019-09-10',
                    fecha_termino : '2019-09-11',
                    miembros: ['Pedro Perez']
                },
                {
                    id: "123124",
                    nombre:"Proyecto 2",
                    descripcion: 'Lorem ipsum dolor sit amet tempus penatibus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
                    fecha_inicio : '2019-09-10',
                    fecha_termino : '2019-09-11',
                    miembros: ['Juancho Silva', 'Manuel Hernandez', 'Jesus Alberga']
                },
                {
                    id: "123125",
                    nombre:"Proyecto 3",
                    descripcion: 'Lorem ipsum dolor sit amet tempus penatibus taciti feugiat cras fames laoreet bibendum ligula nibh. Tristique convallis leo nibh porta odio feugiat blandit ullamcorper scelerisque cursus, luctus aptent netus sagittis egestas quis felis pulvinar ut vestibulum, ante mi cum suspendisse ornare potenti praesent eleifend varius. Quis dignissim dictum imperdiet bibendum mattis, vivamus phasellus donec tempor.',
                    fecha_inicio : '2019-09-10',
                    fecha_termino : '2019-09-11',
                    miembros: ['Juanito Pérez', 'Juliana Soza']
                }]
        }
    },
    created(){
        axios.get('/proyectos')
            .then(response => {
                const res  = response.data;
                this.proyectos = res;
            })
            .catch(function(error) {
                console.log(error.data);
            })
    },
    methods:{
        newProyect: function (e){
            window.location.href="administrar-proyectos/nuevo";
        },
        refresh: function (){
            window.location.href="administrar-proyectos";
        }
    }

}
</script>
<style scoped>

</style>
