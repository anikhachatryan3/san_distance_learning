import Vue from "vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

import App from "./App.vue";
import VueRouter from "vue-router";
import EnglishClass from "@/components/EnglishClass";

Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    { path: "/", component: App.vue },
    { path: "/english/", component: EnglishClass.vue }
  ],
  mode: "history"
});

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

Vue.config.productionTip = false;

new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
