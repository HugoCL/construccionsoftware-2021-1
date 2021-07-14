<template>
    <div class="container mx-0 px-0 pt-0 mt-0" data-app style="background-color: transparent">
        <v-container class="mx-0 px-0 pt-0 mt-0">
            <v-toolbar color="primary"
                       class="mx-0 py-0 pt-0 mt-0 mb-2 white--text text-h5"
                       rounded>


            <v-col >
                    Kanban
            </v-col>

            <v-col>
                <v-container class="fill-height">
                    <v-row
                        align="end"
                        justify="end"
                        >
                        <v-spacer></v-spacer>
                        <v-btn
                            color="secondary"
                            @click.stop="drawer = !drawer"
                            >
                            Menú
                        </v-btn>
                    </v-row>
                </v-container>


            </v-col>

            </v-toolbar>
            <v-row>
                <v-navigation-drawer
                    v-model="drawer"
                    absolute
                    temporary
                    right
                    color="bgwoptico"
                >

                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title class="text-center text-h6">
                                Menú
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-divider class="my-0 py-0"></v-divider>

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
