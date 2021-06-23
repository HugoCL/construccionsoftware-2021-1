import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

export default new Vuetify({
  theme: {
    themes: {
      light: {
        primary:{
            base:'#3f51b5',
            lighten: '#757de8',
            darken: '#002984',
        },
        secondary: '#3f8cb5',
        accent: '#8c9eff',
        error: '#b71c1c',
      },
    },
  },
})
