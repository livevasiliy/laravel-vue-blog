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
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle" style="width: 55px; height: 55px;">
                  <img alt="Image placeholder" :src="user.user.avatar_url" style="width: 55px; height: 55px;">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ user.user.name }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <router-link
                tag="a"
                :to="'/profile/' + user.user.id"
                class="dropdown-item cursor"
                active-class="active"
                exact>
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </router-link>
              <router-link
                :to="{ name: 'Dashboard'}"
                tag="li"
                active-class="active"
                class="dropdown-item cursor"
                exact
              >
                <i class="ni ni-settings-gear-65"></i>
                <span>Dashboard</span>
              </router-link>
              <div class="dropdown-divider"></div>
              <router-link tag="a" to="/logout" class="dropdown-item cursor">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </router-link>
            </div>
          </li>
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
      isLoggedIn() {
        return this.$store.getters.isLoggedIn;
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>
