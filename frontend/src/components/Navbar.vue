<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <router-link tag="a" class="navbar-brand" :to="{ name: 'Home' }">Logo</router-link>
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
          class="nav-item"
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
  export default {
    name: "Navbar",
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
            }
          ]
      }
    }
  }
</script>

<style scoped>

</style>
