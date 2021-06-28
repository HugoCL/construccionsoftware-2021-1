import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

export default new Vuetify({
  theme: {
    themes: {
      light: {
        primary: '#29348E',
        secondary: '#576DB9',
        accent: '#26C0FE',
        error: '#D32F2F',
      },
    },
  },
})
