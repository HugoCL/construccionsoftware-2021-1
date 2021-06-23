<template>
    <div class="container" data-app>
        <div class="row justify-content-center">
            <div cols="12" style="float: right" >
                    <v-col cols="3">
                        <v-dialog transition="dialog-top-transition"  max-width="800">
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn class = "btn btn-primary" v-bind="attrs"  v-on="on"> <v-icon dark right>mdi-plus-circle-outline</v-icon>Nuevo Proyecto</v-btn>
                                <v-btn class = "btn btn-primary" v-on:click="refresh">  <v-icon dark right>mdi-refresh</v-icon>Refrescar</v-btn>
                            </template>
                            <template v-slot:default="dialog">
                                <v-card>
                                    <v-toolbar>
                                        <v-row>
                                            <v-col cols="11">
                                                Nuevo Proyecto
                                            </v-col>
                                            <v-col cols="1" style="float: right;">
                                                <v-btn style="background: red;" @click="dialog.value = false"><v-icon>mdi-close</v-icon></v-btn>
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
                    <v-col cols="3">

                    </v-col>
            </div>

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Administrar Proyectos</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"
                            v-for="(proyect,index) in proyectos":key="index">
                                <proyect-card
                                    :proyectData="proyect"
                                > </proyect-card>
                            </li>
                        </ul>
                    </div>
                </div>
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
