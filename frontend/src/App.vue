<template>
  <div id="app">
    <router-view/>
    <footer class="footer-sticky">
        <div class="container-fluid bg-gradient-green">
          <div class="row">
            <div class="col-12 my-5 d-flex flex-column justify-content-center">
              <h2 class="text-white text-center">VueLaravel Blog</h2>
              <ul class="nav justify-content-center">
                <router-link
                  tag="li"
                  :to="link.path"
                  active-class="active"
                  class="nav-item px-2 cursor"
                  v-for="(link, index) of links"
                  :key="index"
                  exact>
                  <span class="nav-link text-white">{{ link.name }}</span>
                </router-link>
              </ul>
            </div>
          </div>
          <div class="col-12 justify-content-center d-flex">
            <h5 class="text-center text-white">Coding with <i class="ni ni-favourite-28 text-danger"></i> from Russian
            </h5>
          </div>
        </div>
    </footer>
  </div>
</template>

<script>
  import Navbar from './components/Navbar'
  import axios from 'axios'
  export default {
    name: 'App',
    data() {
      return {
        links:
          [
            {
              'path': '/',
              'name': 'Home'
            },
            {
              'path': '/articles',
              'name': 'Articles'
            },
            {
              'path': '/about',
              'name': 'About us'
            },
            {
              'path': '/contacts',
              'name': 'Contacts'
            }
          ]
      }
    },
    components: {
      appNavbar: Navbar
    },
    created() {
      if (localStorage.token){
        axios.get('/api/user', {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token')
          },
          params: {
            token: localStorage.getItem('token')
          }
        }).then(response => {
          this.$store.commit('loginUser');
          localStorage.setItem('account', JSON.stringify(response.data));
        }).catch(error => {
          if (error.response.status === 401 || error.response.status === 403) {
            this.$store.commit('logoutUser');
            localStorage.setItem('token', '');
            this.$router.push({name: 'Login'})
          }
        });
      }
    }
  }
</script>

<style lang="scss">
  @import "/styles/app";
</style>
