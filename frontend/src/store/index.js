import Vue from 'vue'
import Vuex from 'vuex'
import article from './article'
import shared from './shared'
Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    article,
    shared
  }
})
