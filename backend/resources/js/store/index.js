import Vue from 'vue';
import Vuex from 'vuex';
import VueSession from 'vue-session';

Vue.use(Vuex);
Vue.use(VueSession);

const store = new Vuex.Store({
  // modules: {
  //     //
  // }
  state: {
    auth: false,
    user: {
      id: '',
      first_name: '',
      last_name: '',
      email: '',
      role: '',
    }
  },
  mutations: {
    logout (state) {
      console.log(state);
      state.auth = false
      state.user.id = ''
      state.user.first_name = ''
      state.user.last_name = ''
      state.user.email = ''
      state.user.role = ''
    },
    login (state, user) {
      state.auth = true
      state.user.id = user.id
      state.user.first_name = user.first_name
      state.user.last_name = user.last_name
      state.user.email = user.email
      state.user.role = user.role_name
    },
  },
  getters: {
    user: state => {
      return state.user;
    }
  }
});

export default store;