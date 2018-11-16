// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
/***
 * Styles
 */
import 'argon-design-system-free/assets/vendor/nucleo/css/nucleo.css'
import 'argon-design-system-free/assets/vendor/font-awesome/css/font-awesome.min.css'
import 'argon-design-system-free/assets/css/argon.min.css'
/***
 * Jquery, Popper.js, Bootstrap.js, Argon Theme. js
 */
import 'jquery'
import 'popper.js'
import 'bootstrap'
import 'argon-design-system-free/assets/js/argon.min'
Vue.config.productionTip = false;

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>',
  created () {
    /**
     * Fetch articles from backend server
     */
    // this.$store.dispatch('fetchArticles');
  }
});
