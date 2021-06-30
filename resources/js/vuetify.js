import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

export default new Vuetify({
  theme: {
    themes: {
      light: {
        primary: '#0D47A1',
        secondary: '#039BE5',
        accent: '#82B1FF',
        error: '#D32F2F',
        bgwoptico:'#EBF1FB',
      },
    },
  },
})
