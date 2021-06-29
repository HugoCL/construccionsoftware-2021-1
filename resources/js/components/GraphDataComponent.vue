<template>

</template>

<script>
export default {
    name: "GraphDataComponent",
    created(){
        axios.get('/graph')
            .then(response => {
                const res  = response.data;
                console.log(res);
                this.proyectos = res;
            })
            .catch(function(error) {
                console.log(error.data);
            })
    },

}

</script>

<style scoped>

</style>
