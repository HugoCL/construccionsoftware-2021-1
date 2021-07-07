<template>
    <div class="z-depth-3 Card">
        <div class="content lmdd-block">
            <div class="mx-10"></div>
            <v-card
                class="mx-auto"
                outlined
                rounded
            >
                <v-toolbar
                    color="orange lighten-1"
                >
                    <i class="material-icons handle">reorder</i>
                    <v-app-bar-nav-icon>
                        <i class="handle"><v-app-bar-nav-icon></v-app-bar-nav-icon></i>
                    </v-app-bar-nav-icon>

                    <v-toolbar-title>{{data.title}}</v-toolbar-title>

                    <v-spacer></v-spacer>
                    <div class="mx-1"></div>
                    <v-badge
                        bordered
                        bottom
                        color="deep-purple accent-4"
                        dot
                        offset-x="10"
                        offset-y="10"
                    >
                        <v-avatar
                            size="40"
                            elevation="8"
                        >
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
                        <v-avatar
                            size="40"
                            elevation="8"
                        >
                            <v-img src="https://cdn.discordapp.com/attachments/565725484718096404/854576874302341120/avatars-kazuma_500x500.jpg"></v-img>
                        </v-avatar>
                    </v-badge>
                    <div class="mx-1"></div>
                    <v-btn
                        icon
                        rounded
                        color="white"
                        elevation="8"
                    >+</v-btn>
                </v-toolbar>
                <v-list-item three-line>
                    <v-list-item-content>
                        <v-row align="center" justify="center">
                            <v-col>
                                <div class="text-overline">
                                    {{data.head}}

                                    <v-menu
                                        open-on-hover
                                        offset-y
                                    >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-btn
                                                v-bind="attrs"
                                                v-on="on"
                                                dark
                                                color="cyan"
                                                x-small
                                            >+</v-btn>
                                        </template>

                                        <v-list>
                                            <v-list-item>
                                                <v-list-item-title>
                                                    <v-chip
                                                        class="ma-0"
                                                        color="red"
                                                        label
                                                        outlined
                                                        x-small
                                                        @click="chip1 = true"
                                                    >
                                                        Rojo
                                                    </v-chip>
                                                    <v-chip
                                                        class="ma-0"
                                                        color="blue"
                                                        label
                                                        outlined
                                                        x-small
                                                        @click="chip2 = true"
                                                    >
                                                        Azul
                                                    </v-chip>
                                                    <v-chip
                                                        class="ma-0"
                                                        color="green"
                                                        label
                                                        outlined
                                                        x-small
                                                        @click="chip3 = true"
                                                    >
                                                        Verde
                                                    </v-chip>
                                                </v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>
                                    <v-chip
                                        v-if="chip1"
                                        class="ma-0"
                                        close
                                        color="red"
                                        label
                                        outlined
                                        x-small
                                        @click:close="chip1 = false"
                                    >
                                        Area Roja
                                    </v-chip>
                                    <v-chip
                                        v-if="chip2"
                                        class="ma-0"
                                        close
                                        color="blue"
                                        label
                                        outlined
                                        x-small
                                        @click:close="chip2 = false"
                                    >
                                        Area Azul
                                    </v-chip>
                                    <v-chip
                                        v-show="chip3"
                                        v-if="chip3"
                                        class="ma-0"
                                        close
                                        color="green"
                                        label
                                        outlined
                                        x-small
                                        @click:close="chip3 = false"
                                    >
                                        Area Verde
                                    </v-chip>
                                </div>
                            </v-col>
                        </v-row>
                        <v-list-item-title class="text-h0">
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
                        @click="edit = true"
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
                <v-expand-transition>
                    <div v-show="edit">
                        <v-card-text>
                            <input v-model="newText" v-on:keyup.enter="addNewText" placeholder=data.head>
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
            edit: false,
            show: false,
            chip1: false,
            chip2: false,
            chip3: false,
        }
    },
    addNewText: function() {
        data.content.change(this.newText)
    }
}
</script>
