import Vue from "vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import Vuesax from 'vuesax';
import 'vuesax/dist/vuesax.css';

// import App from "./App.vue";
import VueRouter from "vue-router";
import Dashboard from "../components/Dashboard";
import EnglishClass from "../components/EnglishClass";
import MathClass from "../components/MathClass";
import GeographyClass from "../components/GeographyClass";
import ScienceClass from "../components/ScienceClass";
import Login from "../components/Login";
import Teacher_Dashboard from "../components/Teacher_Dashboard";

Vue.use(VueRouter);
// Install BootstrapVue
Vue.use(BootstrapVue);
Vue.use(Vuesax, {
    colors: {
        primary:'#5b3cc4',
        success:'rgb(23,162,183)',
        danger:'rgb(242, 19, 93)',
        warning:'rgb(255, 130, 0)',
        dark:'rgb(36, 33, 69)'
    }
})
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

//Vue.config.productionTip = false;

const routes = [
    { path: "/", name: 'login', component: Login },
    { path: "/student", name: 'dashboard', component: Dashboard },
    { path: "/teacher", name: 'Teacher_Dashboard', component: Teacher_Dashboard },
    { path: "/english", name: 'english', component: EnglishClass },
    { path: "/math", name: 'math', component: MathClass },
    { path: "/geography", name: 'geography', component: GeographyClass},
    { path: "/science", name: 'science', component: ScienceClass },
];

const router = new VueRouter({
  routes,
  mode: "history"
});

//Vue.config.productionTip = false;

// new Vue({
//   router,
//   render: h => h(App)
// }).$mount("#app");

export default router;
