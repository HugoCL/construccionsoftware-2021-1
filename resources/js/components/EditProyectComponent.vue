<template>
  <v-row>
    <v-col cols="10" md="10">
      <v-card>
        <v-card-title>
          <v-row>
            <v-col cols="12" md="10">

              <v-text-field
                outlined
                filled
                v-model="projectName"
                label="Nombre Proyecto"
              >
              </v-text-field>

            </v-col>
            <v-col>
              <v-card-subtitle>
                <v-icon>mdi-lead-pencil</v-icon>
              </v-card-subtitle>
            </v-col>
          </v-row>
        </v-card-title>

        <v-card-text>
          <v-row>
            <v-col cols="12" md="10">
              <v-textarea
                outlined
                filled
                auto-grow
                counter
                v-model="description"
                label="DESCRIPCION"
                @click=""
              >
              </v-textarea>

            </v-col>
            <v-col>
              <v-card-subtitle>
                <v-icon>mdi-lead-pencil</v-icon>
              </v-card-subtitle>
            </v-col>
          </v-row>
        </v-card-text>
        <!--Mostrar fechas-->
        <v-card-text>
          <v-row>
            <v-col>
              <v-card-subtitle>
                <v-row>
                  <v-dialog
                    v-model="modalS"
                    persistent
                    width="290px"
                  >
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="startDate"
                        label="Fecha de Inicio"
                        prepend-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker
                      locale="es-cl"
                      v-model="startDate"
                      scrollable
                    >
                      <v-spacer></v-spacer>
                      <v-btn
                        text
                        color="primary"
                        @click="closeDialogStart"
                      >
                        Cancel
                      </v-btn>
                      <v-btn
                        text
                        color="primary"
                        @click="saveStartDate"
                      >
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-row>
              </v-card-subtitle>
            </v-col>

            <v-col>
              <v-card-subtitle>
                <v-row>
                  <v-dialog
                    v-model="modalE"
                    persistent
                    width="290px"
                  >
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="endDate"
                        label="Fecha de Termino"
                        prepend-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker
                      locale="es-cl"
                      v-model="endDate"
                      scrollable
                    >
                      <v-spacer></v-spacer>
                      <v-btn
                        text
                        color="primary"
                        @click="closeDialogEnd"
                      >
                        Cancel
                      </v-btn>
                      <v-btn
                        text
                        color="primary"
                        @click="saveEndDate"
                      >
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-row>
              </v-card-subtitle>
            </v-col>

          </v-row>

        </v-card-text>


        <!--Mostrar Distintos miembros-->
        <v-card-text>
          <v-row>
            <v-col
              v-for="(field,index) in fields" :key="index"
            >
              <v-card-subtitle class="text-h5">{{ field.name }}</v-card-subtitle>
              <v-card-subtitle>
                <auto-chip-component
                  :name="field.name"
                  :selectList="field.selected"
                  :fullList="field.fullList"
                ></auto-chip-component>
              </v-card-subtitle>
            </v-col>
          </v-row>
        </v-card-text>
        <TaskList :peopleNames="users" :id_pro="project.id"/>
      </v-card>
    </v-col>
    <v-col>
      <v-btn class="btn" v-on:click="test">
        Test
      </v-btn>
    </v-col>

    <!--
    <v-col>
        <v-card>

            <v-calendar>

            </v-calendar>
        </v-card>
    </v-col>


-->
  </v-row>
</template>

<script>
import AutoChipComponent from "./AutoChipComponent";
import TaskList from "./TaskListComponent";

export default {
  name: "EditProyectComponent",
  components: {AutoChipComponent, TaskList},
  data() {
    return {
      fields: [
        {
          name: "Jefes de proyecto",
          selected: this.leads,
          fullList: this.users
        },
        {
          name: "Desarrolladores",
          selected: this.devs,
          fullList: this.users
        },
      ],
      projectName: this.project.nombre,
      description: this.project.descripcion,
      startDate: this.project.fechaInicio,
      endDate: this.project.fechaTermino,
      currentMember: null,
      modalS: false,
      modalE: false
      //Se deben incluir listas para cada tipo de miembros
    }
  },
  props: {
    leads: [],
    devs: [],
    users: [],
    project: null

  },
  methods: {
    test() {
      console.table(this.project)

      this.project.fechaInicio = this.startDate
      this.project.fechaTermino = this.endDate
      this.project.descripcion = this.description
      this.project.nombre = this.projectName
      console.table(this.project)


    },
    closeDialogStart() {
      this.modalS = false
      this.startDate = this.project.fechaInicio

    },
    saveStartDate() {
      this.modalS = false
      this.project.fechaInicio = this.startDate
    },
    closeDialogEnd() {
      this.modalE = false
      this.endDate = this.project.fechaTermino

    },
    saveEndDate() {
      this.modalE = false
      this.project.fechaTermino = this.endDate

    }

  }
}
</script>

<style scoped>

</style>
