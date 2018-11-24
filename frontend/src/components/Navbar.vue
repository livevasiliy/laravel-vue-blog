<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-green">
    <div class="container">
      <router-link tag="a" class="navbar-brand" :to="{ name: 'Home' }">
        <img :src="logo" alt="Brand logo" style="height: 45px;">
        <span class="ml-2">VueLaravel Blog</span>
      </router-link>
      <button class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-8 collapse-brand">
              <router-link tag="a" :to="{ name: 'Home' }">
                <img :src="logo">
                <span class="ml-2">VueLaravel Blog</span>
              </router-link>
            </div>
            <div class="col-4 collapse-close">
              <button type="button"
                      class="navbar-toggler"
                      data-toggle="collapse"
                      data-target="#navbarNav"
                      aria-controls="navbarNav"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
              >
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
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
        <ul class="ml-auto navbar-nav" v-if="!isLoggedIn">
          <router-link to="/login" tag="li" class="nav-item cursor" active-class="active" exact>
            <span class="nav-link">Login</span>
          </router-link>
          <router-link to="/register" tag="li" class="nav-item cursor" active-class="active" exact>
            <span class="nav-link">Register</span>
          </router-link>
        </ul>
        <ul class="ml-auto navbar-nav" v-else>
          <img :src="user.user.avatar_url" alt="avatar" style="width: 45px; height: 45px;" class="rounded-circle">
          <router-link :to="'profile/' + user.user.id">
            <span class="nav-link">{{ user.user.name }}</span>
          </router-link>
          <router-link :to="{ name: 'Logout'}">
            <span class="nav-link">Log out</span>
          </router-link>
        </ul>
      </div>
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
              'path': '/articles',
              'name': 'Articles'
            },
            {
              'path': '/aboutme',
              'name': 'About me'
            },
            {
              'path': '/contacts',
              'name': 'Contacts'
            }
          ]
      }
    },
    computed: {
      user() {
        return JSON.parse(localStorage.getItem('account'));
      },
      isLoggedIn(){
        return this.$store.getters.isLoggedIn;
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>
