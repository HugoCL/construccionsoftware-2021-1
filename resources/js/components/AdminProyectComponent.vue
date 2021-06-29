<template>
    <div class="container" data-app>
        <div class="row justify-content-center">
            <div cols="12" style="float: right" >
                    <v-row>
                        <v-col class="col-md-8 align-left" >
                            <h4>Administrar Proyectos</h4>
                        </v-col>
                        <v-col class="col-md-4">
                            <v-dialog transition="dialog-top-transition"  width="64%">
                                <template v-slot:activator="{ on, attrs }">
                                    <div class="text-right d-flex align-right justify-space-around">

                                        <v-btn class="mr-4" v-bind="attrs"  v-on="on"> <v-icon dark rightclass="mr-4" >mdi-plus-circle-outline</v-icon>Nuevo Proyecto</v-btn>
                                        <v-btn class="mr-4" color = "secondary" v-on:click="refresh">  <v-icon right class="mr-4" >mdi-refresh</v-icon>Refrescar</v-btn>
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
                </div>

            <div  cols="12"
                    sm="6"
                    md="8">
                <ul class="list-group">
                    <li class="list-group-item"
                        v-for="(proyect,index) in proyectos" :key="index">
                        <proyect-card
                            :proyectData="proyect"
                        > </proyect-card>
                    </li>
                </ul>


            </div>
        </div>
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
