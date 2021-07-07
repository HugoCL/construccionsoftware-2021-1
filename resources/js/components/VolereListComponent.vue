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
         <v-form class="ma-5">
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
               >
               </v-combobox>
             </v-col>
             <v-col cols="12">
               <v-textarea
                 v-model="volereDesc"
                 label="Description"
                 outlined
               ></v-textarea>
             </v-col>
             <v-col cols="12">
               <v-text-field
                 v-model="volereSource"
                 label="Fuente (separar nombres con comas)"
                 hide-details="auto"
                 outlined
               ></v-text-field>
             </v-col>
             <v-col cols="12">
               <v-text-field
                 v-model="volereUsertype"
                 label="Tipo de usuario (separar tipos con comas)"
                 hide-details="auto"
                 outlined
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
               >
               </v-combobox>
             </v-col>
             <v-col cols="12">
               <v-text-field
                 v-model="volereMeasure"
                 label="Medida"
                 hide-details="auto"
                 outlined
               ></v-text-field>
             </v-col>
             <v-col cols="12">
               <v-text-field
                 v-model="volereScale"
                 label="Escala"
                 hide-details="auto"
                 outlined
               ></v-text-field>
             </v-col>
             <v-col cols="12" md="6">
               <v-text-field
                 v-model="volereIncrement"
                 label="Incremento"
                 hide-details="auto"
                 outlined
                 type="number"
               ></v-text-field>
             </v-col>
             <v-col cols="12" md="6">
               <v-text-field
                 v-model="volereNumber"
                 label="Número del requisito"
                 hide-details="auto"
                 outlined
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

    </v-dialog>
    <v-row>
      <v-col cols="12">
        <v-row class="justify-center ">
          <v-btn
            color="secondary"
            @click="dialog = true"
            class="mb-4"
            width="50%"
          >
            <v-icon class="pr-2">
              mdi-card-plus-outline
            </v-icon>
            Crear Tarjeta de Volere
          </v-btn>
        </v-row>
      </v-col>
      <v-col
        md="4"
        v-for="(volereCard, index) in volereCards"
        :key="index"
      >
        <VolereCard
          :volereCard = "volereCard"
          :volereCards = "volereCards"
        />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import VolereCard from './VolereCardComponent';
export default {
  name: "VolereListComponent.vue",
  components: {VolereCard},
  data: () => ({
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
    volereIncrement: '',
    volereNumber: 0,
    volereCards: [
      //Tarjeta de ejemplo
      {
        rurs: 'RS',
        number: 1,
        name: 'Registrar información de cada universidad',
        desc: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur cum dicta dolor dolorum\n' +
          '         earum explicabo itaque laborum nostrum praesentium quaerat quia quod ratione sed suscipit, tenetur voluptas.\n' +
          '         Dignissimos, suscipit!',
        source: ['Juan Leiva', 'Pedro'],
        usertypes: ['Administrador, Actualizador'],
        type: 'Funcional',
        state: 'No cumple',
        priority: 'Crítica',
        stability: 'Intransable',
        measure: 'Cantidad de Registros ingresados en el sistema.',
        scale: '20 registros por hora',
        date: '2021-06-10',
        time: '15:45',
        increment: 1
      },
    ]
  }),
  methods: {
    createVolere: function () {
      let today = new Date();
      let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      this.volereCards.push({
        number: parseInt(this.volereNumber),
        name: this.volereName,
        desc: this.volereDesc,
        source: this.volereSource.split(","),
        usertypes: this.volereUsertype.split(","),
        type: this.volereType,
        state: this.volereState,
        priority: this.volerePriority,
        stability: this.volereStability,
        measure: this.volereMeasure,
        scale: this.volereScale,
        date: date,
        time: time,
        increment: parseInt(this.volereIncrement)
      });
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
    }
  }
}
</script>

<style scoped>

</style>