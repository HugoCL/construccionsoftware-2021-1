<template>
    <div class="z-depth-3 tod">
        <div class="content">
            <v-card
                class="mx-auto"
                outlined
                rounded
            >
                <v-toolbar
                    color="data.title"
                    dark
                >
                    <v-app-bar-nav-icon>
                        <i class="handle"><v-app-bar-nav-icon></v-app-bar-nav-icon></i>
                    </v-app-bar-nav-icon>

                    <v-toolbar-title>{{data.title}}</v-toolbar-title>

                    <v-spacer></v-spacer>
                    <div class="mx-3"></div>

                    <v-badge
                        bordered
                        bottom
                        color="deep-purple accent-4"
                        dot
                        offset-x="10"
                        offset-y="10"
                    >
                        <v-avatar size="40">
                            <v-img src="https://avatars.githubusercontent.com/u/18600648?v=4"></v-img>
                        </v-avatar>
                    </v-badge>
                    <div class="mx-1"></div>

                    <v-badge
                        bordered
                        bottom
                        color="green accent-4"
                        dot
                        offset-x="10"
                        offset-y="10"
                    >
                        <v-avatar size="40">
                            <v-img src="https://cdn.discordapp.com/attachments/565725484718096404/854576874302341120/avatars-kazuma_500x500.jpg"></v-img>
                        </v-avatar>
                    </v-badge>

                    <v-btn icon>
                        <v-icon>mdi-magnify</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-list-item three-line>
                    <v-list-item-content>
                        <div class="text-overline mb-4">
                            {{data.head}}
                            <v-col>
                            <div class="text-left">
                                <v-chip
                                    v-if="chip1"
                                    class="ma-2"
                                    close
                                    color="green"
                                    label
                                    outlined
                                    x-small
                                    @click:close="chip1 = false"
                                >
                                    Completado
                                </v-chip>
                            </div>
                                </v-col>
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
                        @click="show = !show"
                    >
                        Ver
                        <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                    </v-btn>
                    <v-btn
                        outlined
                        rounded
                        text
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
                <v-expand-transition>
                    <div v-show="show">
                        <v-card-text>
                            {{data.content}}
                        </v-card-text>
                    </div>
                </v-expand-transition>
            </v-card>

        </div>
    </div>
</template>

<script>
export default {
    props: ['data'],
    data() {
        return {
            show: false,
            chip1: true,

        }
    },
}
</script>
