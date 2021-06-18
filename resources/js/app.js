require('./bootstrap');
window.Vue = require('vue').default;

import vuetify from './vuetify';
import Vue from 'vue'


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import example from "./components/ExampleComponent";
import tasklist from './components/createtaskscomponents/TaskListComponent'


const app = new Vue({
    el: '#app',
    components: {example, tasklist},
    vuetify
});


