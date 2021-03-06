require("./bootstrap");
window.Vue = require("vue").default;

import vuetify from "./vuetify";
import Vue from "vue";

const files = require.context("./", true, /\.vue$/i);
files
    .keys()
    .map((key) =>
        Vue.component(key.split("/").pop().split(".")[0], files(key).default)
    );

import Board from "./components/Board";
import Card from "./components/Card";
// import DropBacklog from "./components/DropBacklog";
import example from "./components/ExampleComponent";
// import tarea from "./components/tareaComponent.vue";
import tasklist from "./components/TaskListComponent";
Vue.component(
    "lista-usuarios",
    require("./components/UsersTableComponent.vue").default
);
Vue.component(
    "crear-proyecto",
    require("./components/AddProyectComponent.vue").default
);
Vue.component(
    "proyect-card",
    require("./components/ProyectCardComponent.vue").default
);
Vue.component(
    "admin-proyects",
    require("./components/AdminProyectComponent.vue").default
);
Vue.component("menu-kanban", require("./components/MenuKanban.vue").default);
Vue.component(
    "integrantes-proyectos",
    require("./components/IntegrantsComponent.vue").default
);
Vue.component(
    "graficos-ventana",
    require("./components/GraphDataComponent.vue").default
);
Vue.component("kanban", require("./components/KanbanComponent.vue").default);
Vue.component("header-app", require("./components/Header.vue").default);
Vue.component("navdrawer-app", require("./components/NavDrawer.vue").default);
Vue.component("footer-app", require("./components/Footer.vue").default);
Vue.component(
    "graph-component",
    require("./components/GraphsComponent").default
);

Vue.component(
    "sprint-container",
    require("./components/SprintContainer.vue").default
);
Vue.component("user-stories", require("./components/UserStories.vue").default);
import App from "./components/App.vue";
const app = new Vue({
    el: "#app",
    components: { App, example, tasklist, Card, Board },
    vuetify,
});
