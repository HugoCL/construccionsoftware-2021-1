<template>
    <div class="z-depth-3 tod">
        <div class="content">
            <v-card
                class="mx-auto"
                outlined
            >
                <v-list-item three-line>
                    <v-list-item-content>
                        <v-row align="start" justify="start">
                            <v-col>
                                <i class="handle"> reorder</i>
                            </v-col>
                        </v-row>
                        <div class="text-overline mb-4">
                            {{data.head}}

                        </div>
                        <v-list-item-title class="text-h0 mb-1">
                            {{data.title}}
                        </v-list-item-title>
                        <v-list-item-subtitle>{{data.des}}</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
                <v-card-actions>
                    <v-btn
                        outlined
                        rounded
                        text
                    >
                        Ver
                    </v-btn>
                    <v-btn
                        outlined
                        rounded
                        text
                        @click="$emit('remove')"
                    >
                        Editar
                    </v-btn>
                    <v-btn
                        outlined
                        rounded
                        text
                        @click="$emit('remove')"
                    >
                        Eliminar
                    </v-btn>
                </v-card-actions>
            </v-card>

        </div>
    </div>
</template>

<script>
export default {
    props: ['data'],
}
</script>
