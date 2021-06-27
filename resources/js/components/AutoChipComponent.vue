<template>

    <v-combobox
        v-model="selectList"
        :items="fullList"
        item-text="correo"
        item-value="correo"
        :return-object="true"
        chips
        clearable
        label="Seleccione miembros"
        multiple
        prepend-icon="mdi-filter-variant"
        solo
    >
        <template v-slot:selection="{ attrs, item, select, selected }">
            <v-chip
                v-bind="attrs"
                color="primary"
                :input-value="selected"
                close
                @click="select"
                @click:close="remove(item)"
            >
                <strong>{{ item.nombre }} [{{item.correo}}]</strong>&nbsp;
            </v-chip>
        </template>
    </v-combobox>


</template>
<script>


export default {
    name: "AutoChipComponent",
    data () {
        return {
            auxList: null,
            auxName: null
        }
    },

    methods: {
        remove (item) {
            this.selectList.splice(this.selectList.indexOf(item), 1)
            this.selectList = [...this.selectList]
        }
    },
    props:{
        name: null,
        selectList : null,
        fullList: null

    },
}
</script>

<style scoped>

</style>
