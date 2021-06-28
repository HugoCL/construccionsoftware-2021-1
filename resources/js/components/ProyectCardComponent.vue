<template>
    <v-card
        class="mx-auto"
        outlined
    >
        <v-list-item>
            <v-list-item-content>
                <div class="text-overline mb-1">
                    <v-list-item-title class="text-h6 mb-1" >
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
                            Fecha Inicio: {{proyectData.fechaInicio}}
                        </v-col>
                        <v-col cols="3">
                            Fecha Termino: {{proyectData.fechaTermino}}
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
            <v-btn class="btn ma-2" color="primary" >
                Editar
                <v-icon right>mdi-border-color</v-icon>
            </v-btn>
            <v-btn href="/administrar-proyectos/integrantes?id=1234" class="btn ma-2 btn-secondary" color="">
                Integrantes
                <v-icon right >mdi-account</v-icon>
            </v-btn>
            <v-btn class="btn ma-2 btn-danger" color="red">
                Eliminar
                <v-icon right>mdi-delete</v-icon>
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
