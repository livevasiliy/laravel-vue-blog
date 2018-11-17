<template>
  <div id="app">
    <header>
      <app-navbar></app-navbar>
    </header>
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
              'path': '/portfolio',
              'name': 'Portfolio'
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
    }
  }
</script>

<style lang="scss">
  @import "/styles/app";
</style>
