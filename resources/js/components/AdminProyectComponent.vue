<template>
    <div class="container" data-app>
        <div class="row justify-content-center">
            <div class="col-md-8" >
                <div align="right">
                    <button class = "btn btn-primary" v-on:click="newProyect" >  <v-icon dark right>mdi-plus-circle-outline</v-icon>Nuevo Proyecto</button>
                    <button class = "btn btn-primary" v-on:click="refresh">  <v-icon dark right>mdi-refresh</v-icon>Refrescar</button>
                </div>
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
                                >

                                </proyect-card>
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
