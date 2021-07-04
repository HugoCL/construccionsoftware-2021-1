<template>
 <v-container>
   <v-dialog
     v-model="volereDialog"
     width="60%"
   >
     <v-card>
       <v-toolbar
         class="mb-2"
         color="primary"
         dark
       >
         <v-card-title>{{ 'RU'+("0000" + volereCard.id).substr(volereCard.id.toString().length , 5)+': '+volereCard.name}}</v-card-title>
       </v-toolbar>

       <v-card-title>Descripción:</v-card-title>
       <v-card-text class="text--primary">
        {{volereCard.desc}}
       </v-card-text>

       <v-card-title>Fuente:</v-card-title>
       <v-card-text class="text--primary">
         {{volereCard.source.join()}}
       </v-card-text>

       <v-card-title>Tipo usuario:</v-card-title>
       <v-card-text class="text--primary">
         {{volereCard.usertypes.join()}}
       </v-card-text>

       <v-row>
         <v-col md="6">
           <v-card-title>Tipo requisito:</v-card-title>
           <v-card-text class="text--primary">
             {{ volereCard.type }}
           </v-card-text>
         </v-col>
         <v-col md="6">
           <v-card-title>Estado:</v-card-title>
           <v-card-text class="text--primary">
             <strong class="red--text text--lighten-1">
               {{volereCard.state}}
             </strong>
           </v-card-text>
         </v-col>
       </v-row>
       <v-row>
         <v-col md="6">
           <v-card-title>Prioridad:</v-card-title>
           <v-card-text class="text--primary">
             <strong class="red--text text--lighten-1">
               {{volereCard.priority}}
             </strong>
           </v-card-text>
         </v-col>
         <v-col md="6">
           <v-card-title>Estabilidad: </v-card-title>
           <v-card-text class="text--primary">
             <strong class="red--text text--lighten-1">
               {{volereCard.stability}}
             </strong>
           </v-card-text>
         </v-col>
       </v-row>
       <v-card-title>Medida:</v-card-title>
       <v-card-text class="text--primary">
        {{volereCard.measure}}
       </v-card-text>
       <v-card-title>Escala:</v-card-title>
       <v-card-text class="text--primary">
        {{volereCard.scale}}
       </v-card-text>
       <v-row>
         <v-col md="6">
           <v-card-title>Fecha Actualiz.:</v-card-title>
           <v-card-text class="text--primary">
             {{ volereCard.date + ' ' + volereCard.time }}
           </v-card-text>
         </v-col>
         <v-col md="6">
           <v-card-title>Incremento: </v-card-title>
           <v-card-text class="text--primary justify-center">
             {{volereCard.increment}}
           </v-card-text>
         </v-col>
       </v-row>

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
       {{ 'RU'+("0000" + volereCard.id).substr(volereCard.id.toString().length , 5)+': '+volereCard.name}}
     </v-card-title>

     <v-divider class="my-0 py-1"></v-divider>
     <v-card-actions>
       <v-btn
         color="accent"
         class="my-0"
       >
         Editar <v-icon>mdi-pencil</v-icon>
       </v-btn>
       <v-btn
         color="error"
       >
         Eliminar <v-icon>mdi-delete</v-icon>
       </v-btn>
     </v-card-actions>
     <v-divider class="ma-0 py-0"></v-divider>

   </v-card>
 </v-container>

</template>

<script>
export default {
  name: "VolereCardComponent.vue",
  data: () =>({
    volereDialog: false
  }),
  props:{
    volereCard: null
  }

}
</script>

<style scoped>

</style>