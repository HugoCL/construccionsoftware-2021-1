<template>
  <v-container>
    <v-dialog
      v-model="editDialog"
      persistent
      width="60%"
    >
      <v-card class="pt-0 pb-0">
        <v-toolbar
          class="mb-2"
          color="primary"
          dark
        >
          <v-card-title>Editar Tarjeta de Volere</v-card-title>
        </v-toolbar>
        <v-form>
          <v-row>
            <v-col cols="8">
              <v-text-field
                v-model="volereName"
                label="Nombre"
                hide-details="auto"
                outlined
              ></v-text-field>
            </v-col>
            <v-col cols="4">
              <v-combobox
                v-model="volereRURS"
                :items="['RU', 'RS']"
                label="Tipo de requisito"
                dense
                chips
                small-chips
                outlined
                required
              >
              </v-combobox>
            </v-col>
            <v-col cols="12">
              <v-textarea
                v-model="volereDesc"
                label="Description"
                outlined
                required
              ></v-textarea>
            </v-col>
            <v-col cols="12">
              <v-text-field
                v-model="volereSource"
                label="Fuente (separar nombres con comas)"
                hide-details="auto"
                outlined
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                v-model="volereUsertype"
                label="Tipo de usuario (separar tipos con comas)"
                hide-details="auto"
                outlined
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" md="6">
              <v-combobox
                v-model="volereType"
                :items="['Funcional', 'No funcional']"
                label="Tipo"
                dense
                chips
                small-chips
                outlined
                required
              >
              </v-combobox>
            </v-col>
            <v-col cols="12" md="6">
              <v-combobox
                v-model="volereState"
                :items="['Cumple', 'No cumple']"
                label="Estado"
                dense
                chips
                small-chips
                outlined
                required
              >
              </v-combobox>
            </v-col>
            <v-col cols="12" md="6">
              <v-combobox
                v-model="volerePriority"
                :items="['No urgente', 'Urgente', 'Crítica']"
                label="Prioridad"
                dense
                chips
                small-chips
                outlined
                required
              >
              </v-combobox>
            </v-col>
            <v-col cols="12" md="6">
              <v-combobox
                v-model="volereStability"
                :items="['Transable', 'Intransable']"
                label="Estabilidad"
                dense
                chips
                small-chips
                outlined
                required
              >
              </v-combobox>
            </v-col>
            <v-col cols="12">
              <v-text-field
                v-model="volereMeasure"
                label="Medida"
                hide-details="auto"
                outlined
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                v-model="volereScale"
                label="Escala"
                hide-details="auto"
                outlined
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field
                v-model="volereIncrement"
                label="Incremento"
                hide-details="auto"
                outlined
                required
                type="number"
              ></v-text-field>
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field
                v-model="volereNumber"
                label="Número del requisito"
                hide-details="auto"
                outlined}
                required
                type="number"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-card-actions class="justify-end">
            <v-btn
              text
              @click="editDialog = false"
            >
              Cerrar
            </v-btn>
            <v-btn
              text
              @click="saveVolere"
            >
              Guardar
            </v-btn>
          </v-card-actions>
        </v-form>
      </v-card>

    </v-dialog>

    <v-dialog
      v-model="volereDialog"
      width="800"
    >
      <v-card>
        <v-toolbar
          class="mb-2 pr-0"
          color="primary"
          dark
        >
          <v-card-title>
                {{
                  volereCard.rurs + ("0000" + volereCard.number).substr(volereCard.number.toString().length, 5) + ':' + volereCard.name
                }}
          </v-card-title>
        </v-toolbar>

        <v-container >
          <v-row>
            <v-col cols="12" class="pb-0">
              <v-card-title class="pb-0 pl-2">Descripción</v-card-title>
            </v-col>
            <v-col cols="12" class="pb-0 pt-0">
              <v-card-subtitle class="text--primary">
                {{ volereCard.desc }}
              </v-card-subtitle>
            </v-col>
          </v-row>

          <v-row class="ml-3">
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Fuente</v-card-title></v-row>
              <v-row>
                <v-chip
                  v-for="(item, index) in volereCard.source.split(',')"
                  :key="index"
                  class="mr-1"
                  color="primary"
                >
                  {{item}}
                </v-chip>
              </v-row>
            </v-col>
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Tipo usuario</v-card-title></v-row>
              <v-row>
                <v-chip
                  v-for="(item, index) in volereCard.usertypes.split(',')"
                  :key="index"
                  class="mr-1"
                  color="primary"
                >
                  {{item}}
                </v-chip>
              </v-row>
            </v-col>
          </v-row>

          <v-row class="ml-3">
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Tipo requisito</v-card-title></v-row>
              <v-row>
                <v-chip
                  v-if="volereCard.type === 'Funcional'"
                  color="primary"
                >
                  {{volereCard.type}}
                </v-chip>
                <v-chip
                  v-if="volereCard.type === 'No funcional'"
                >
                  {{volereCard.type}}
                </v-chip>
              </v-row>
            </v-col>
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Estado</v-card-title></v-row>
              <v-row>
                <v-chip
                  v-if="volereCard.state === 'Cumple'"
                  color="success"
                >
                  {{volereCard.state}}
                </v-chip>
                <v-chip
                  v-if="volereCard.state === 'No cumple'"
                  color="error"
                >
                  {{volereCard.state}}
                </v-chip>
              </v-row>
            </v-col>
          </v-row>

          <v-row class="ml-3">
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Prioridad</v-card-title></v-row>
              <v-row>
                <v-chip
                  v-if="volereCard.priority === 'No urgente'"
                  color="success"
                >
                  {{volereCard.priority}}
                </v-chip>
                <v-chip
                  v-if="volereCard.priority === 'Urgente'"
                  color="warning"
                >
                  {{volereCard.priority}}
                </v-chip>
                <v-chip
                  v-if="volereCard.priority === 'Crítica'"
                  color="error"
                >
                  {{volereCard.priority}}
                </v-chip>
              </v-row>
            </v-col>
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Estabilidad</v-card-title></v-row>
              <v-row>
                <v-chip
                  color="primary"
                >
                  {{volereCard.stability}}
                </v-chip>
              </v-row>
            </v-col>
          </v-row>

          <v-row class="ml-3">
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Escala</v-card-title></v-row>
              <v-row>
                
                  <v-card-subtitle class="text--primary pl-0">
                {{ volereCard.scale }}
              </v-card-subtitle>
              </v-row>
            </v-col>
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Medida</v-card-title></v-row>
              <v-row>
                <v-card-subtitle class="text--primary pl-0">
                {{ volereCard.measure }}
              </v-card-subtitle>
              </v-row>
            </v-col>
          </v-row>

        

          <v-row class="ml-3 mb-3">
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Fecha actualización</v-card-title></v-row>
              <v-row>
                <v-chip
                  color="primary"
                >
                  {{volereCard.date + ' '+ volereCard.time}}
                </v-chip>
              </v-row>
            </v-col>
            <v-col 
              cols="12" 
              md="6"
            > 
              <v-row><v-card-title class="pl-0">Incremento</v-card-title></v-row>
              <v-row>
                <v-chip
                  color="primary"
                >
                  {{volereCard.increment}}
                </v-chip>
              </v-row>
            </v-col>
          </v-row>


        </v-container>

       
      </v-card>
    </v-dialog>

    <v-card
      class="white--text pb-0"
      light
      color="primary"
      @click="volereDialog = true"
    >
      <v-card-title
        class="subheading font-weight-bold pb-2 pt-2"
      >
        {{ volereCard.rurs + ("0000" + volereCard.number).substr(volereCard.number.toString().length, 5) + ': ' + volereCard.name }}
      </v-card-title>

      <v-divider class="my-0 py-1"></v-divider>
      <v-card-actions>
        <v-btn
          color="accent"
          class="my-0"
          @click.stop="editVolere"
        >
          Editar
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
        <v-btn
          color="error"
          @click.stop="deleteVolere"
        >
          Eliminar
          <v-icon>mdi-delete</v-icon>
        </v-btn>
      </v-card-actions>
      <v-divider class="ma-0 py-0"></v-divider>

    </v-card>

  </v-container>

</template>

<script>
export default {
  name: "VolereCardComponent.vue",
  data: () => ({
    volereRURS: '',
    volereDialog: false,
    editDialog: false,
    volereName: '',
    volereDesc: '',
    volereSource: '',
    volereUsertype: '',
    volereType: '',
    volereState: '',
    volerePriority: '',
    volereStability: '',
    volereMeasure: '',
    volereScale: '',
    volereIncrement: '',
    volereNumber: 0,
  }),
  props: {
    volereCard: null,
    volereCards: null,
    project: null
  },
  methods: {
    deleteVolere: function () {
      this.volereCards.splice(this.volereCards.indexOf(this.volereCard), 1);
      axios.delete('/card-volere/'+this.volereCard.id)
          .then(res=>{
              console.log(res.data);
          });
    },
    editVolere: function(){

      this.editDialog = true;
      this.volereRURS = this.volereCard.rurs;
      this.volereName = this.volereCard.name;
      this.volereDesc = this.volereCard.desc;
      this.volereSource = this.volereCard.source;
      this.volereUsertype = this.volereCard.usertypes;
      this.volereType = this.volereCard.type;
      this.volereState = this.volereCard.state;
      this.volerePriority = this.volereCard.priority;
      this.volereStability = this.volereCard.stability;
      this.volereMeasure = this.volereCard.measure;
      this.volereScale = this.volereCard.scale;
      this.volereIncrement = this.volereCard.increment;
      this.volereNumber = this.volereCard.number;
    },
    saveVolere: function () {
      this.editDialog = false;
      this.volereCard.rurs = this.volereRURS;
      this.volereCard.name = this.volereName ;
      this.volereCard.desc = this.volereDesc;
      this.volereCard.source = this.volereSource;
      this.volereCard.usertypes = this.volereUsertype;
      this.volereCard.type = this.volereType;
      this.volereCard.state = this.volereState;
      this.volereCard.priority = this.volerePriority;
      this.volereCard.stability = this.volereStability;
      this.volereCard.measure = this.volereMeasure;
      this.volereCard.scale = this.volereScale;
      this.volereCard.increment = this.volereIncrement;
      this.volereCard.number = this.volereNumber;
      axios.put('/card-volere/'+this.volereCard.id, this.volereCard)
          .then(res=>{
              console.log(res.data);
          });
    }

  }

}
</script>

<style scoped>

</style>
