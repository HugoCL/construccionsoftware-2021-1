<template>
    <v-combobox
        v-model="boss"
        :items="bosses"
        chips
        clearable
        label="Selector"
        multiple
        prepend-icon="mdi-filter-variant"
        solo
    >
        <template v-slot:selection="{ attrs, item, select, selected }">
            <v-chip
                v-bind="attrs"
                :input-value="selected"
                close
                @click="select"
                @click:close="remove(item)"
            >
                <strong>{{ item }}</strong>&nbsp;
            </v-chip>
        </template>
    </v-combobox>
</template>
<script>
export default {
    name: "AutoChipComponent",
    data () {
        return {
            name: "Jefes de Proyecto",
            boss : ["Nicolas","Juan"],
            bosses: ["Juan","Nicolas","Andres"]
        }
    },

    methods: {
        remove (item) {
            this.boss.splice(this.boss.indexOf(item), 1)
            this.boss = [...this.boss]
        },
    },
    props:{

    },
}
</script>

<style scoped>

</style>
