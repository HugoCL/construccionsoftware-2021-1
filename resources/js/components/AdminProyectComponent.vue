<template>
    <div class="container" data-app>
        <div class="row justify-content-center">
            <div class="col-md-8" >
                <div align="right">
                    <button class = "btn btn-primary" href = "http://127.0.0.1:8000/proyects" >  <v-icon dark right>mdi-plus-circle-outline</v-icon>Nuevo Proyecto</button>
                    <button class = "btn btn-primary" href = "{{}}">  <v-icon dark right>mdi-refresh</v-icon>Refrescar</button>
                </div>
            </div>

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Administrar Proyectos</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"
                            v-for="(item,index) in proyectos":key="index">
                                <proyect-card :nombre=item ></proyect-card>
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
            proyectos:["Proyecto 1","Proeycto 2"]
        }
    },
    methods:{

    }

}
</script>
<style scoped>

</style>
