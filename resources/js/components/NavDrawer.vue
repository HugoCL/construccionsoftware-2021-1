<template>
    <v-card >
      <v-navigation-drawer
        app
        :expand-on-hover="drawer"
        permanent
        color="bgwoptico"
        class="rounded-0">

        <v-list>
        <v-list-item class="px-2">
            <v-list-item-avatar>
            <v-img src="https://cdn.discordapp.com/attachments/565725484718096404/854576874302341120/avatars-kazuma_500x500.jpg"></v-img>
            </v-list-item-avatar>
            <v-list-item-title
              class="d.flex text-h6 black--text pl-6">
                Wawito
            </v-list-item-title>
        </v-list-item>
        </v-list>

        <v-divider class="ma-0"></v-divider>

        <v-list
          nav
          dense
          rounded
        >
            <!-- CAMBIANDO COD. PARA NAVEGAR (evaluando para el proximo sprint) -->
            <!--<v-list-item-group
              v-model="selectedItem"
              color="accent"
            >
              <v-list-item
                v-for="(item, i) in items"
                :key="i"
                link
              >
                <v-list-item-icon>
                    <v-icon v-text="item.icon"></v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title class="white--text"> {{item.text}} </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list-item-group>-->

            <v-list-item link>
                <a class="nav-link black--text pl-0" href="/">
                <v-list-item-title>
                    <v-icon class="pr-10">
                        mdi-view-dashboard
                    </v-icon>
                    Dashboard
                </v-list-item-title>
                </a>
            </v-list-item>
            <v-list-item link>
                <a class="nav-link black--text pl-0" href="/administrar-proyectos">

                <v-list-item-title>
                    <v-icon class="pr-10">
                        mdi-folder-multiple
                    </v-icon>
                    Proyectos
                </v-list-item-title>
                </a>
            </v-list-item>
            <v-list-item link>
                <a class="nav-link black--text pl-0" href="/lista-usuarios">
                    <v-list-item-title>
                        <v-icon class="pr-10">
                            mdi-account-multiple
                        </v-icon>
                        Usuarios
                    </v-list-item-title>
                </a>
            </v-list-item>
        </v-list>
      </v-navigation-drawer>
    </v-card>
</template>
<script>
  export default {
    data: () => ({
      selectedItem: 0,
      items: [
        { text: 'Dashboard', icon: 'mdi-view-dashboard' },
        { text: 'Proyectos', icon: 'mdi-folder-multiple' },
        { text: 'Usuarios', icon: 'mdi-account-multiple' },
      ],
      drawer: true,
      expandOnHover: true
    }),
  }
</script>
