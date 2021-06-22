require('./bootstrap');
window.Vue = require('vue').default;

import vuetify from './vuetify';
import Vue from 'vue'


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import example from "./components/ExampleComponent";
import tasklist from './components/createtaskscomponents/TaskListComponent'
Vue.component('crear-proyecto', require('./components/AddProyectComponent.vue').default);
Vue.component('proyect-card', require('./components/ProyectCard.vue').default);
Vue.component('admin-proyects', require('./components/AdminProyectComponent.vue').default);




const app = new Vue({
    el: '#app',
    components: {example, tasklist},
    vuetify
});


