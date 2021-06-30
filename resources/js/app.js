require('./bootstrap');
window.Vue = require('vue').default;

import vuetify from './vuetify';
import Vue from 'vue'


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Board from "./components/Board";
import Card from "./components/Card";
import example from "./components/ExampleComponent";
import tasklist from './components/TaskListComponent'
Vue.component('crear-proyecto', require('./components/AddProyectComponent.vue').default);
Vue.component('proyect-card', require('./components/ProyectCardComponent.vue').default);
Vue.component('admin-proyects', require('./components/AdminProyectComponent.vue').default);

Vue.component('header-app', require('./components/Header.vue').default);
Vue.component('navdrawer-app', require('./components/NavDrawer.vue').default);
Vue.component('footer-app', require('./components/Footer.vue').default);


import App from "./components/App.vue";
const app = new Vue({
    el: '#app',
    components: {App, example, tasklist, Card, Board},
    vuetify
});


