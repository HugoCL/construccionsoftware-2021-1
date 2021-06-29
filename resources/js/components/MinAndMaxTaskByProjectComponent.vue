<template>

</template>

<script>
export default {
    name: "MinAndMaxTaskByProjectComponent",
    created(){
        axios.get('/minAndMaxTaskByProject')
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
