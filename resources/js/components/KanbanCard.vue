<template>
    <div class="z-depth-3 Card">
        <div class="content">
            <div class="mx-10"></div>
            <v-card
                class="mb-2"
                outlined
                rounded
                elevation="13"
            >
                <v-toolbar
                    v-bind:color="data.color"
                >
                    <v-app-bar-nav-icon onclick="colorPicker=true">
                        <v-app-bar-nav-icon></v-app-bar-nav-icon>
                    </v-app-bar-nav-icon>
                    <div v-show="colorPicker">
                        <v-card>
                            <v-color-picker
                                dot-size="19"
                                hide-inputs
                                swatches-max-height="100"
                            ></v-color-picker>
                        </v-card>
                    </div>
                    <v-toolbar-title
                        size="10 px"
                    >{{data.title}}
                    </v-toolbar-title>

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
                            @click="$destroy"
                        >
                                     <v-img src="https://cdn.discordapp.com/attachments/565725484718096404/854576874302341120/avatars-kazuma_500x500.jpg"></v-img>
                        </v-avatar>
                    </v-badge>
                    <div class="mx-1"></div>

                    <v-dialog
                        transition="dialog-bottom-transition"
                        max-width="60%"                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                v-bind="attrs"
                                v-on="on"
                                icon
                                rounded
                                color="white"
                                elevation="8"
                            >+</v-btn>
                        </template>
                        <template v-slot:default="dialog">
                            <v-card>
                                <v-toolbar
                                    color="primary"
                                    class="text-h5 white--text"
                                >Usuarios</v-toolbar>
                                <v-list three-line>
                                    <template v-for="(item, index) in items">
                                        <v-subheader
                                            v-if="item.header"
                                            :key="item.header"
                                            v-text="item.header"
                                        ></v-subheader>

                                        <v-divider
                                            v-else-if="item.divider"
                                            :key="index"
                                            :inset="item.inset"
                                        ></v-divider>

                                        <v-list-item
                                            v-else
                                            :key="item.title"
                                        >
                                            <v-list-item-avatar>
                                                <v-img :src="item.avatar"></v-img>
                                            </v-list-item-avatar>

                                            <v-list-item-content>
                                                <v-list-item-title v-html="item.title"></v-list-item-title>
                                                <v-list-item-subtitle v-html="item.subtitle"></v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                </v-list>
                                <v-card-actions class="justify-end">
                                    <v-btn
                                        text
                                        @click="dialog.value = false"
                                    >Close</v-btn>
                                </v-card-actions>
                            </v-card>
                        </template>
                    </v-dialog>
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
                        <v-icon>mdi-eye</v-icon>
                        <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                    </v-btn>
                    <v-btn
                        outlined
                        rounded
                        text
                        @click="edit = true"
                    >
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn
                        outlined
                        rounded
                        text
                        @click="$emit('remove')"
                    >
                        <v-icon>mdi-delete</v-icon>
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
                    <div v-show="edit" v-on:keyup.enter="">
                        <v-card-text>
                            <div>
                                <input v-model="newHead" v-on:keyup.enter="addNewText" placeholder="Codigo de tarea">
                                <input v-model="newTitle" v-on:keyup.enter="addNewText" placeholder="Titulo">
                            </div>
                            <div>
                                <input v-model="newDes" v-on:keyup.enter="addNewText" placeholder="Sub-Titulo">
                            </div>
                            <div>
                                <input v-model="newContent" v-on:keyup.enter="addNewText" placeholder="Contenido">
                            </div>
                        </v-card-text>
                        <v-btn
                            text
                            @click="edit = false"
                        >
                            Cancel
                        </v-btn>
                        <v-btn
                            color="primary"
                            text
                            @click="editCard"
                        >
                            Save
                        </v-btn>
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
            newHead: this.data.head,
            newTitle: this.data.title,
            newDes: this.data.des,
            newContent: this.data.content,
            colorPicker: false,
            edit: false,
            show: false,
            chip1: false,
            chip2: false,
            chip3: false,
            items: [
                {
                    avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
                    title: 'VicenteRojas1',
                    subtitle: `<span class="text--primary">vrojas@alumnos.utalca.cl</span>`,
                },
                {
                    avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
                    title: 'Alex1990',
                    subtitle: `<span class="text--primary">AlexT@gmail.com</span>`,
                },
                {
                    avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
                    title: 'SandraA02',
                    subtitle: '<span class="text--primary">SandraA@hotmail.com</span>',
                },
                {
                    avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
                    title: 'HugoCL',
                    subtitle: '<span class="text--primary">hugoCL@alumnos.utalca.cl</span>',
                },
            ],
        }

    },
    methods: {
        addNewText: function () {

        },
        editCard: function () {
            this.edit = false
            this.data.head = this.newHead
            this.data.title = this.newTitle
            this.data.des = this.newDes
            this.data.content = this.newContent
            this.$emit('update');
        },
    }
}
</script>
