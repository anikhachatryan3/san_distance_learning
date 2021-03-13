import Vue from "vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import Vuesax from 'vuesax';
import 'vuesax/dist/vuesax.css';
import PortalVue from "portal-vue";

// import App from "./App.vue";
import VueRouter from "vue-router";
import StudentDashboard from "../components/StudentDashboard";
import StudentEnglishClass from "../components/StudentEnglishClass";
import TeacherEnglishClass from "../components/TeacherEnglishClass";
import StudentMathClass from "../components/StudentMathClass";
import GeographyClass from "../components/GeographyClass";
import ScienceClass from "../components/ScienceClass";
import Login from "../components/Login";
import Teacher_Dashboard from "../components/Teacher_Dashboard";
import Profile from "../components/Profile";
import Calendar from "../components/Calendar";
import Assignment from "../components/Assignment";
import People from "../components/People";
import Announcement from "../components/Announcement";
import PrivateMessages from "../components/PrivateMessages";
import CreateEnglishAssignment from "../components/CreateEnglishAssignment";
import EnglishGame from "../components/EnglishGame";

Vue.use(PortalVue);
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
    { path: "/studentDashboard", name: 'StudentDashboard', component: StudentDashboard },
    { path: "/Teacher_Dashboard", name: 'Teacher_Dashboard', component: Teacher_Dashboard },
    { path: "/StudentEnglishClass/:classId", name: 'StudentEnglishClass', component: StudentEnglishClass },
    { path: "/StudentMathClass/:classId", name: 'StudentMathClass', component: StudentMathClass },
    { path: "/TeacherEnglishClass/:classId", name: 'TeacherEnglishClass', component: TeacherEnglishClass },
    { path: "/TeacherMathClass/:classId", name: 'TeacherMathClass', component: TeacherEnglishClass },
    { path: "/geography", name: 'geography', component: GeographyClass},
    { path: "/science", name: 'science', component: ScienceClass },
    { path: "/profile", name: 'profile', component: Profile },
    { path: "/calendar", name: 'calendar', component: Calendar },
    { path: "/assignment", name: 'assignment', component: Assignment},
    { path: "/people/:classId", name: 'people', component: People},
    { path: "/announcement/:classId", name: 'announcement', component: Announcement},
    { path: "/privatemessages", name: 'privatemessages', component: PrivateMessages},
    { path: "/TeacherEnglishClass/CreateEnglishAssignment", name: 'CreateEnglishAssignment', component: CreateEnglishAssignment},
    { path: "/englishgame", name: 'EnglishGame', component: EnglishGame },
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
