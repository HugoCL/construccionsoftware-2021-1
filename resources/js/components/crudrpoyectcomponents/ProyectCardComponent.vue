<template>
    <v-card
        class="mx-auto"
        outlined
    >
        <v-list-item>
            <v-list-item-content>
                <div class="text-overline mb-1">
                    <v-list-item-title class="text-h5 mb-1" >
                        {{proyectData.nombre}}
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
                            Fecha Inicio: {{proyectData.fecha_inicio}}
                        </v-col>
                        <v-col cols="3">
                            Fecha Termino: {{proyectData.fecha_termino}}
                        </v-col >
                        <v-col>
                            Miembros: {{proyectData.miembros.toString().slice(0, 15)+'...'}}
                        </v-col>
                    </v-row>

                </v-list-item-content>
                <v-list-item-content class = "col-md-12">
                    <div>
                        {{proyectData.descripcion}}
                    </div>
                </v-list-item-content>
                <v-list-item-subtitle>

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
       proyectData: null
    }

}
</script>
<style scoped>

</style>
