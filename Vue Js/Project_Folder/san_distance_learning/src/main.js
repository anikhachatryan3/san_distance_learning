import Vue from "vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

import App from "./App.vue";
import VueRouter from "vue-router";
import Dashboard from "./components/Dashboard";
import EnglishClass from "./components/EnglishClass";
import MathClass from "./components/MathClass";
import GeographyClass from "./components/GeographyClass";
import ScienceClass from "./components/ScienceClass";

Vue.use(VueRouter);

//Vue.config.productionTip = false;

const routes = [
  { path: "/", component: Dashboard },
  { path: "/english", component: EnglishClass },
  { path: "/math", component: MathClass },
  { path: "/geography", component: GeographyClass},
  { path: "/science", component: ScienceClass },
];

const router = new VueRouter({
  routes,
  mode: "history"
});

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

//Vue.config.productionTip = false;

new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
