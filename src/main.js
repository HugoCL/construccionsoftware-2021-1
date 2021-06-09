import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import * as Sentry from "@sentry/vue";
import { Integrations } from "@sentry/tracing";



Vue.config.productionTip = false

Sentry.init({
  Vue,
  dsn: "https://d264845d1b7d42b59fec48009d9517b2@o291882.ingest.sentry.io/5807501",
  integrations: [new Integrations.BrowserTracing()],

  tracesSampleRate: 1.0,
});

new Vue({
  vuetify,
  render: h => h(App)
}).$mount('#app')
