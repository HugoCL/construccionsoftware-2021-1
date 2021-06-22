<template>
    <v-card
        class="mx-auto"
        outlined
    >
        <v-list-item>
            <v-list-item-content>
                <div class="text-overline mb-1">
                    <v-list-item-title class="text-h5 mb-1" >
                        {{this.nombre}}
                    </v-list-item-title>

                </div>

                <v-list-item-subtitle>{{this.id}}</v-list-item-subtitle>
                <v-list-item-content class = "col-md-12">
                    <div>
                        {{this.descripcion}}
                    </div>
                </v-list-item-content>
                <v-list-item-subtitle>
                    <div align="right">
                        {{this.fecha_inicio}} - {{this.fecha_termino}}
                    </div>
                </v-list-item-subtitle>
            </v-list-item-content>

        </v-list-item>
        <v-card-actions style="float:right">
            <v-btn class="ma-10 btn-primary" style="margin-right:10px" >
                Editar
                <v-icon right>mdi-border-color</v-icon>
            </v-btn>
            <v-btn class="ma-10 btn-danger" color="red">
                Eliminar
                <v-icon dark right>mdi-delete</v-icon>
            </v-btn>

        </v-card-actions>


    </v-card>
</template>

<script>
export default {
    data(){
        return{

        }
    },
    methods:{

    },
    props:{
        id:"000000",
        nombre:'',
        descripcion:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ',
        fecha_inicio : '2019-09-10',
        fecha_termino : '2019-09-11'
    }

}
</script>
<style scoped>

</style>
