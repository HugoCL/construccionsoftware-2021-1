<template>
    <div class="container mx-0 px-0" data-app style="background-color: transparent">
        <v-container>
            <v-row >
                    Kanban
            </v-row>

            <v-row class="mt-0">
                <v-container class="fill-height">
                    <v-row
                        align="end"
                        justify="end"
                        >
                        <v-spacer></v-spacer>
                        <v-btn
                            color="secondary"
                            dark
                            @click.stop="drawer = !drawer"
                            >
                            Menú
                        </v-btn>
                    </v-row>
                </v-container>

                <v-navigation-drawer
                    v-model="drawer"
                    absolute
                    temporary
                    right
                    >

                    <v-list-item>
                         <v-list-item-content>
                            <v-list-item-title>
                                <p class="text-center">
                                        Menú
                                </p>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-divider></v-divider>

                    <v-list dense>
                        <v-list-item
                            v-for="item in items"
                            :key="item.title"
                            link
                            >
                            <v-list-item-icon>
                                <v-icon>{{ item.icon }}</v-icon>
                            </v-list-item-icon>

                            <v-list-item-content>
                                <v-list-item-title>{{ item.title }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-navigation-drawer>
            </v-row>
        </v-container>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        drawer: null,
        items: [
          { title: 'Acerca de este tablero', icon: 'mdi-menu' },
          { title: 'Cambiar fondo', icon: 'mdi-image' },
          { title: 'Buscar tarjeta', icon: 'mdi-file-document-box-search-outline' },
          { title: 'Actividad', icon: 'mdi-clock'},
          { title: 'Mas ', icon: 'mdi-more'},
          { title: 'Configuraciones', icon: 'mdi-settings-outline'},
        ],
      }
    },
  }
</script>
