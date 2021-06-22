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
          
          
          
            <v-col>
              <v-row>
                <v-text-field v-model="newTaskCheck" label="agrega tareas aquí"></v-text-field>
                <v-btn @click="addTask">Agregar</v-btn>
              </v-row>
              <v-col> 
                <div v-for="taskCheckList in taskCheckLists" :key="taskCheckList.id" :class="{done: isChekeada(taskCheckList)}">
                  <input type="checkbox" class="checkbox" @click="chekear" v-model="taskCheckList.checkeada">
                  <label for="checkbox">{{taskCheckList.taskCheck}}</label>
                  <v-btn @click="quitarTareaCheck" right>
                    X
                  </v-btn>
                </div>
              </v-col>

            </v-col>



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
      dialog: false,
      /**
     * variables a usar en v-check para checklist de tarea
     * lista testCheckList contiene una variable que almacena una "micro-tarea" string
     * y una variable booleana "chekeada" para manejar el cuadro check
     */
    newTaskCheck:"",
    taskCheckLists:[ {
        taskCheck: "¡ejemplo de tarea! borrame",
        checkeada: false
     },
    ]
    }),
    props: {
      taskData: null
    },
    methods:{
       /*
        funciones para checklist de la ventana de tareas creadas
      */
      addTask: function(){
        let tarea = this.newTaskCheck;
        if(tarea){
          this.taskCheckLists.push({taskCheck:tarea,chekeada:false});
          this.newTaskCheck="";
        }
      },

      chekear: function(tarea){
          tarea.checkeada=true;
        },

      isChekeada: function(tarea){
          return tarea.checkeada;
        },

      quitarTareaCheck: function(tarea){
          let index = this.taskCheckLists.indexOf(tarea);
          this.taskCheckLists.splice(index,1);
        }
    }
  }
</script>
