<template>
  <div class="text-center">
    <!-- Cuadro que se abre al presionar una tarea y muestra su info-->
    <v-dialog
      v-model="dialog"
      width="500"
      scrollable
    >
      <v-card width="500">
        <v-card-title>{{ taskData.name }}</v-card-title>
        <v-card-text>
          <v-divider></v-divider>

          <v-card-subtitle>Miembros</v-card-subtitle>
          <v-card-text>
            <v-row>
              <v-col
                cols="1"
                v-for="(member, index) in taskData.members"
                :key="index"
              >
                <v-tooltip top>
                  <template
                    v-slot:activator="{ on }"
                  >
                    <v-btn
                      fab
                      small
                      v-on="on"
                    >{{ member.charAt(0) }}
                    </v-btn>
                  </template>
                  <span>{{ member }}</span>
                </v-tooltip>
              </v-col>
            </v-row>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-subtitle>Descripción</v-card-subtitle>
          <v-card-text>{{ taskData.desc }}</v-card-text>

        </v-card-text>
      </v-card>
    </v-dialog>

    <!-- Botón o tarjeta de cada tarea -->
    <v-card
      @click="dialog = true"
      class="mt-5 mb-5"
    >
      <v-card-title>{{ taskData.name }}</v-card-title>
      <v-row>
        <v-col
          cols="1"
          v-for="(member, index) in taskData.members"
          :key="index"
        >
          <v-tooltip top>
            <template v-slot:activator="{ on }">
              <v-btn
                fab
                small
                v-on="on"
              >
                {{ member.charAt(0) }}
              </v-btn>
            </template>
            <span>{{ member }}</span>
          </v-tooltip>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>
<script>
export default {
  name: 'Task',
  data: () => ({
    dialog: false
  }),
  props: {
    taskData: null
  }
}
</script>
