// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import axios from 'axios';
axios.defaults.baseURL = 'http://127.0.0.1:8000';

/***
 * Styles
 */
import 'argon-design-system-free/assets/vendor/nucleo/css/nucleo.css'
import '@fortawesome/fontawesome-free/css/all.min.css'
import '@fortawesome/fontawesome-free/js/all.min'
import 'argon-design-system-free/assets/css/argon.min.css'
/***
 * Jquery, Popper.js, Bootstrap.js, Argon Theme. js
 */
import 'jquery'
import 'popper.js'
import 'argon-design-system-free/assets/vendor/bootstrap/bootstrap.min'
import 'argon-design-system-free/assets/js/argon.min'

Vue.config.productionTip = false;

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: {App},
  template: '<App/>',
  created() {

    /**
     * Fetch articles from backend server
     */
    // this.$store.dispatch('fetchArticles');
  }
});
