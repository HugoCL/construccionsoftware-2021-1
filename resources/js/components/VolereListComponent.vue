<template>
  <v-container>
    <v-dialog
      v-model="dialog"
      persistent
      width="60%"
    >
      <v-card class="pt-0 pb-0">
        <v-toolbar
          class="mb-2"
          color="primary"
          dark
        >
          <v-card-title>Crear Tarjeta de Volere</v-card-title>
        </v-toolbar>
         <v-form
          class="ma-5"
          ref="form"
          v-model="validateForm"
          lazy-validation
          >
           <v-row>
             <v-col cols="8">
               <v-text-field
                 v-model="volereName"
                 label="Nombre"
                 hide-details="auto"
                 outlined
                 required
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
                 label="Tipo de función"
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
                 outlined
                 required
                 type="number"
               ></v-text-field>
             </v-col>
           </v-row>

           <v-card-actions class="justify-end">
             <v-btn
               text
               @click="dialog = false"
             >
               Cerrar
             </v-btn>
             <v-btn
               text
               @click="createVolere"
             >
               Guardar
             </v-btn>
           </v-card-actions>
         </v-form>
      </v-card>

    </v-dialog >
    <v-row>
      <v-col cols="12">
        <v-row class="justify-center ">
          <v-toolbar color="primary"
                     rounded>
              <v-col cols="6" class="text-left white--text text-h5">
                  Tarjetas de volere
              </v-col>
              <v-col cols="6" class="text-right">
                  <v-btn
                      color="secondary"
                      @click="dialog = true"

                      fab
                      small
                  >
                      <v-icon>
                          mdi-card-plus-outline
                      </v-icon>
                  </v-btn>
              </v-col>
          </v-toolbar>
        </v-row>
      </v-col>
      <v-col
        cols="12"
        md="6"
      >
        <v-card>
          <v-toolbar color="secondary" class="white--text mb-3 pt-0 pb-0 text-h5">
            Requisitos de Usuario
          </v-toolbar>
            <v-row class="pb-3">
              <v-col
                cols="12"
                v-for="(volereCard, index) in volereCards.filter(item=> item.rurs === 'RU')"
                :key="index"
                class="my-0 py-0"
              >
                <VolereCard
                  :volereCard = "volereCard"
                  :volereCards = "volereCards"
                  :project="project"
                  class="pb-0"
                />
              </v-col>
            </v-row>
        </v-card>
      </v-col>
      <v-col
        cols="12"
        md="6"
      >
        <v-card>
          <v-toolbar color="secondary" class="white--text mb-3 pt-0 pb-0 text-h5">
            Requisitos de Sistema
          </v-toolbar>
          <v-row class="pb-3">
            <v-col
              cols="12"
              v-for="(volereCard, index) in volereCards.filter(item=> item.rurs === 'RS')"
              :key="index"
              class="my-0 py-0"
            >
              <VolereCard
                :volereCard = "volereCard"
                :volereCards = "volereCards"
                :project="project"
                class="pb-0"
              />
            </v-col>
          </v-row>
        </v-card>
      </v-col>

    </v-row>
      <v-snackbar
          color="primary"
          class="white--text"
          v-model="snackBarNew"
          :timeout="timeout=2000"
      >
          Se agrego una nueva tarjeta de volere

      </v-snackbar>
  </v-container>
</template>

<script>
import VolereCard from './VolereCardComponent';
export default {
  name: "VolereListComponent.vue",
  components: {VolereCard},
  data: () => ({
    validateForm: true,
    dialog: false,
    volereRURS: '',
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
    volereIncrement: '0',
    volereNumber: 0,
    volereCards: [],
      snackBarNew:false,
  }),
    props:{
      project: null,
      voleres: []
    },
    created() {
      console.log(this.voleres);
      this.volereCards = this.voleres;

      /*
      axios.get('/card-volere', {params:{id_project: this.project.id}})
          .then(res=>{
              this.volereCards = res.data;
          });*/
    },
    methods: {
    createVolere: function () {
      let today = new Date();
      let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      let card = {
        rurs: this.volereRURS,
        number: parseInt(this.volereNumber),
        name: this.volereName,
        desc: this.volereDesc,
        source: this.volereSource,
        usertypes: this.volereUsertype,
        type: this.volereType,
        state: this.volereState,
        priority: this.volerePriority,
        stability: this.volereStability,
        measure: this.volereMeasure,
        scale: this.volereScale,
        date: date,
        time: time,
        increment: parseInt(this.volereIncrement),
        id_project: this.project.id
      };
      if(this.validate()){
      this.volereCards.push(card);
      this.dialog = false;
      this.volereName = '';
      this.volereDesc = '';
      this.volereSource = '';
      this.volereUsertype = '';
      this.volereType = '';
      this.volereState = '';
      this.volerePriority = '';
      this.volereStability = '';
      this.volereMeasure = '';
      this.volereScale = '';
      this.volereIncrement = 0;
      axios.post('/card-volere', card)
          .then(res=>{
              console.log(res.data.id);
              console.log(res.data);
          });}
      this.snackBarNew=true;
    },
    validate: function () {
      return this.$refs.form.validate();
    }
  }
}
</script>

<style scoped>

</style>
