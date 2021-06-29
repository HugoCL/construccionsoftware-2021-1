<template>
    <v-card
        class="mx-0 px-0 mb-4"
        outlined
    >
        <v-list-item class="mx-0">
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
            <v-btn align="center" class="ma-2" color="secondary" >
                Editar
                <v-icon right color="woptico">mdi-border-color</v-icon>
            </v-btn>
            <v-btn align="center" class="ma-2 btn-danger white--text" color="red">
                Eliminar
                <v-icon right color="woptico">mdi-delete</v-icon>
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
