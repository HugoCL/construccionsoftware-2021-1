<template>
    <v-card >
      <v-navigation-drawer
        app
        :mini-variant.sync="expandOnHover"
        :expand-on-hover="drawer"
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
        >
          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-view-dashboard</v-icon>
            </v-list-item-icon>
            <v-list-item-title>
                <a class="nav-link black--text" href="/">Dashboard</a>
                <!--<router-link to="/proyectos" > Dashboard </router-link>-->
                </v-list-item-title>
          </v-list-item>
          <v-list-item link :to="{name: 'administrar-proyectos'}">
            <v-list-item-icon>
              <v-icon>mdi-folder-multiple</v-icon>
            </v-list-item-icon>
            <v-list-item-title>
                <a class="nav-link black--text" href="/administrar-proyectos">Proyectos</a>
                <!--<router-link href="/administrar-proyectos" > Proyectos2 </router-link>-->
                <!--<router-link to="/administrar-proyectos" > Proyectos3 </router-link>-->
                </v-list-item-title>
          </v-list-item>
          <v-list-item link exact :to="{name: 'users'}">
            <v-list-item-icon>
              <v-icon>mdi-account-multiple</v-icon>
            </v-list-item-icon>
            <v-list-item-title class="nav-link black--text">Usuarios</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
    </v-card>
</template>
<script>
  export default {
    //
    data () {
      return {
        drawer: true,
        expandOnHover: true
      }
    },
    methods:{
        newProyect: function (e){
            window.location.href="administrar-proyectos/nuevo";
        },
        refresh: function (){
            window.location.href="administrar-proyectos";
        }
    }
  }
</script>
