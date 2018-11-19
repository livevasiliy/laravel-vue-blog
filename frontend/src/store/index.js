import Vue from 'vue'
import Vuex from 'vuex'
import article from './article'
import shared from './shared'
import user from './user'
Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    article,
    user,
    shared
  }
})
