<template>
  <div id="app">
    <app-navbar></app-navbar>
    <router-view/>
  </div>
</template>

<script>
  import Navbar from './components/Navbar'
  export default {
    name: 'App',
    components: {
      appNavbar: Navbar
    }
  }
</script>

<style lang="scss">
  @import "~bootstrap/scss/bootstrap";
  @import "/styles/app";
  @import url('https://fonts.googleapis.com/css?family=Roboto:400,700');

</style>
