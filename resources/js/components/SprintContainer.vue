<template>
    <v-container class="mx-0 fluid fill-height">
        <v-row >
            <v-col cols="3">
                <v-card color="secondary" class="px-2 pb-2">
                    <v-card-title class="white--text ma-0 px-0 py-1">
                        BackLog
                    </v-card-title>
                    <v-container>
                        <v-row>
                            <v-card class="rounded-2 pa-2 my-1 v-picker--full-width" draggable="true" ondrop="this">
                                Ejemplo 1
                            </v-card>
                            <v-card class="rounded-2 pa-2 my-1 v-picker--full-width" draggable="true" ondrop="this">
                                Ejemplo 2
                            </v-card>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
            <v-col cols="3">
                <v-card color="secondary" class="px-2 pb-0">
                    <v-card-title class="white--text ma-0 px-0 py-1">
                        To-do
                    </v-card-title>
                    <v-container>
                        <v-row>
                            <v-card class="rounded-2 pa-2 my-1 v-picker--full-width">
                                Ejemplo 3
                            </v-card>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
            <v-col cols="6">
                <v-card color="primary" class="px-2 pb-2">
                    <v-card-title class="white--text ma-1 px-0 pb-0 pt-1">
                        Iteraciones
                    </v-card-title>
                    <v-container>
                        <v-row>
                            <v-card
                                class="rounded-2 py-0 px-1 my-2 v-picker--full-width"
                                color="secondary"
                                v-for="(iteraciones,index) in iteracion"
                                key="index"
                            >
                                    <v-container>
                                        <v-row>
                                            <v-card-title class="white--text py-2 px-0 ma-0 v-picker--full-width"

                                            >
                                                Iteración {{index+1}}:
                                            </v-card-title>
                                            <v-card
                                                draggable="true"
                                                class="rounded-2 pa-2 mb-1 v-picker--full-width"
                                                v-for="(requisitos,index2) in iteraciones.requisitos"
                                                key="index2">
                                                {{requisitos}}
                                            </v-card>
                                        </v-row>
                                    </v-container>

                            </v-card>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>
    </v-container>

</template>

<script>
export default {
    name: "SprintContainer",
    data: () => ({

        iteracion: [
            {
                requisitos: ['HU01: Lavar','HU02: Planchar', 'HU03: owo']
            },
            {
                requisitos: ['HU01: Lavar','HU02: Planchar']
            },
            {
                requisitos: ['HU01: Lavar','HU02: Planchar']
            }
        ],
        cycle:[],
        subcycle:[],
        fechaInic:'',
        state:'',

    }),
}
</script>

<style scoped>

</style>
