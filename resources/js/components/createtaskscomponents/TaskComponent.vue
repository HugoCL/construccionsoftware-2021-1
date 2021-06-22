<template>
  <div class="text-center">
    <!-- Cuadro que se abre al presionar una tarea y muestra su info-->
    <v-dialog
      v-model="dialog"
      width="500"
      scrollable
    >
      <v-card
        width="500"
        color="primary"
        class="white--text subheading">
        <v-card-title color="primary" class="pt-1 pb-1">{{ taskData.name }}</v-card-title>
          <v-divider></v-divider>
          <v-container row wrap>
              <v-row  class="pl-3">
                  <v-chip-group  center-active column class="pl-3 pr-1 pt-2 pb-2">
                      <v-chip
                        v-for='(tag, index) in taskData.tags' :key='tag'
                        color="secondary"
                        class="white--text font-weight-bold"
                        >
                          {{ tag }}
                      </v-chip>
                  </v-chip-group>
              </v-row>
          </v-container>
          <v-divider></v-divider>
          <v-list dense>
              <v-list-item>
                  <v-list-item-content>
                      Miembros:
                  </v-list-item-content>
                  <v-row>
                      <v-col
                          cols="1"
                          v-for="(member, index) in taskData.members"
                          :key="index"
                          justify="center"
                      >
                          <v-tooltip top>
                              <template
                                  v-slot:activator="{ on }"
                              >
                                  <v-btn
                                      color="primary"
                                      fab
                                      small
                                      v-on="on"
                                      class="white--text font-weight-bolder"
                                  >{{ member.charAt(0) }}
                                  </v-btn>
                              </template>
                              <span>{{ member }}</span>
                          </v-tooltip>
                      </v-col>
                  </v-row>
              </v-list-item>
              <v-list-item>
                  <v-list-item-content>
                      Descripción:
                  </v-list-item-content>
                  <v-list-item-content
                      class="align-end"
                  >
                      {{ taskData.desc }}
                  </v-list-item-content>
              </v-list-item>
              <v-list-item>
                  <v-list-item-content>
                      Fecha:
                  </v-list-item-content>
                  <v-list-item-content
                      class="align-end"
                  >
                      {{taskData.date}}
                  </v-list-item-content>
              </v-list-item>
          </v-list>

      </v-card>
    </v-dialog>

    <!-- Botón o tarjeta de cada tarea -->
    <v-card
      class="white--text"
      light
      color="primary"
      @click="dialog = true"
    >
      <v-card-title
        class="subheading font-weight-bold pb-1 pt-1"
      >
          {{taskData.name}}
      </v-card-title>

      <v-divider></v-divider>
        <v-container row wrap>
            <v-row  class="pl-3">
              <v-chip-group  center-active column class="pl-3 pr-1 pt-2 pb-2" >
                <v-chip v-for='(tag, index) in taskData.tags' :key='tag' color="secondary"  class="white--text font-weight-bold">
                  {{tag}}
                </v-chip>
              </v-chip-group>
            </v-row>
        </v-container>
        <v-divider></v-divider>
<!--
      <v-list dense>
        <v-list-item>
          <v-list-item-content>
            Descripción:
          </v-list-item-content>
          <v-list-item-content
            class="align-end"
          >
            {{taskData.desc.slice(0, 20)+'...'}}
          </v-list-item-content>
        </v-list-item>
        <v-list-item>
          <v-list-item-content>
            Miembros:
          </v-list-item-content>
          <v-list-item-content
            class="align-end"
          >
            {{taskData.members.toString().slice(0, 15)+'...'}}
          </v-list-item-content>
        </v-list-item>
        <v-list-item>
          <v-list-item-content>
            Fecha:
          </v-list-item-content>
          <v-list-item-content
            class="align-end"
          >
            {{taskData.date}}
          </v-list-item-content>
        </v-list-item>
      </v-list>
-->
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
    },
      methods:{
          remove (id) {
              let idx = this.attrArr.indexOf(id)
              this.attrArr.splice(idx, 1)
              this.attrArr = [...this.attrArr]
          }
      }
  }
</script>
