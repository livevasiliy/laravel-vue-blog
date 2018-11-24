import Vue from 'vue'
import Vuex from 'vuex'
import Vuelidate from 'vuelidate'
import article from './article'
//import user from './user'
import shared from './shared'
import account from './account'
Vue.use(Vuex);
Vue.use(Vuelidate);
export default new Vuex.Store({
  modules: {
    article,
    //user,
    account,
    shared
  }
})
