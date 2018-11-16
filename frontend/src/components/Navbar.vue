<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-green">
    <router-link tag="a" class="navbar-brand" :to="{ name: 'Home' }">
      <img :src="logo" alt="Brand logo" style="height: 45px;">
      <span class="ml-2">VueLaravel Blog</span>
    </router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <router-link
          tag="li"
          :to="link.path"
          active-class="active"
          class="nav-item cursor"
          v-for="(link, index) of links"
          :key="index"
          exact>
          <span class="nav-link">{{ link.name }}</span>
        </router-link>
      </ul>
      <ul class="ml-auto navbar-nav">
        <li class="nav-item">
          <a href="#" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Register</a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
  import logo from '../assets/brand.png'

  export default {
    name: "Navbar",
    data() {
      return {
        logo: logo,
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
    }
  }
</script>

<style lang="scss" scoped>

</style>
