<template>
  <div>
    <v-app-bar
      app
      color="primary"
      permanent
      dark
    >
      <v-app-bar-nav-icon
        @click="$emit('toggle-drawer')"
      >
      </v-app-bar-nav-icon>

      <v-toolbar-title>GPU - Gestion Proyectos Universitarios</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-bell-ring</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-arrow-expand-all</v-icon>
      </v-btn>

      <v-btn icon>
          <v-icon>mdi-settings</v-icon>
      </v-btn>


      <v-menu
        left
        bottom
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn
            icon
            v-bind="attrs"
            v-on="on"
          >
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item
            v-for="n in 5"
            :key="n"
            @click="() => {}"
          >
            <v-list-item-title>Option {{ n }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>
  </div>
</template>
