<template>
    <v-card>
        <v-responsive>
        <v-toolbar
            color="primary"
            class="white--text pt-0 pb-0 text-h6"
        >
            Informacion del proyecto
        </v-toolbar>
        <v-card-text>
            <p>
                <b>Fecha Incio: </b>{{this.projectUp.dates[0]}}
            </p>
            <p>
                <b>Fecha Termino: </b>{{this.projectUp.dates[1]}}
            </p>
            <p><b>Metodologia: </b>{{this.projectUp.projectType}}</p>
            <p>
                <b>Cantidad de sesiones:</b>
                {{this.projectUp.projectReps}}
                <b> x </b>
                {{this.projectUp.rangeVal}}
                <b></b>
                {{this.projectUp.rangeType}}
            </p>
            <p>

                <b>Descripcion:   </b>{{this.projectUp.description}}
            </p>

        </v-card-text>
        </v-responsive>
    </v-card>
</template>

<script>
export default {
    name: "InfoProjectComponent",
    props: {
        projectUp:null
    }
}
</script>

<style scoped>

</style>
