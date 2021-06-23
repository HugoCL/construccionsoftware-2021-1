<template>

<div class="row justify-content-center">


    <div class="col-6 align-self-center">

        <h1 class="text-center font-weight-light">Nuevo proyecto </h1>
        <h3>Propuesta por Emilio </h3>

        <v-form
        ref="form"
        lazy-validation
    >
        <v-text-field
        v-model="name"
        label="Nombre del proyecto"
        required
        ></v-text-field>

         <v-date-picker
         color="#000000"
         full-width
          v-model="dates"
          range
          class="my-4"
        ></v-date-picker>

        <v-select
          v-model="bosses"
          :items="items"
          label="Jefe/s de proyecto"
          multiple
          dense
          class="my-2"
          clearable
          chips
        ></v-select>

        <v-select
          v-model="workers"
          :items="items"
          label="Empleados del proyecto"
          multiple
          dense
          class="my-2"
          clearable
          chips
        ></v-select>

        <v-btn
          class="btn w-100"
          @click="send"
          >
          Enviar
        </v-btn>
        </v-form>
    </div>
</div>

</template>
<script>
  export default {
    data: () => ({
      name: '',
      dates: ['2019-09-10', '2019-09-20'],
      select: null,
      bosses: [],
      workers: [],
      items: [
        'juan',
        'lopez',
        'ramirez'
      ],

      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
    }),

    methods: {
      send () {
        console.log(
          {
            'name':this.name,
            'dates':this.dates,
            'bosses':this.bosses,
            'workers':this.workers
          }
        )
      }
    },
  }
</script>


