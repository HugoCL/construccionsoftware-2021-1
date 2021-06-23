require('./bootstrap');
window.Vue = require('vue').default;

import vuetify from './vuetify';
import Vue from 'vue'

<<<<<<< HEAD
=======
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import routes from './routes'

Vue.use(Vuetify)



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
>>>>>>> javendano-HU01-TA02

//const files = require.context('./', true, /\.vue$/i)
//files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//Vue.component('app-template', require('./components/App.vue'));
Vue.component('alert-msj', require('./components/Alert.vue'));

import example from "./components/ExampleComponent";
import tasklist from './components/createtaskscomponents/TaskListComponent'
Vue.component('crear-proyecto', require('./components/AddProyectComponent.vue').default);
Vue.component('proyect-card', require('./components/ProyectCard.vue').default);
Vue.component('admin-proyects', require('./components/AdminProyectComponent.vue').default);



<<<<<<< HEAD

const app = new Vue({
    el: '#app',
    components: {example, tasklist},
    vuetify
=======
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//import ExampleComponent from "./components/ExampleComponent";
import App from './components/App.vue';

const app = new Vue({
    el: '#app',
    components: {App},
    router: new VueRouter(routes),
    vuetify: new Vuetify(),

>>>>>>> javendano-HU01-TA02
});


