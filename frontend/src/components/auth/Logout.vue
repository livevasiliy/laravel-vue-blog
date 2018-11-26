<template>
  <div>
    <header>
      <appNavbar></appNavbar>
    </header>
  </div>
</template>

<script>
  import Navbar from '../Navbar'
  export default {
    name: "Logout",
    components: {
      appNavbar: Navbar
    },
    mounted() {
      localStorage.removeItem('token');
      this.$store.commit('logoutUser');
      this.$router.push({name: 'Login'})
    }
  }
</script>

<style scoped>

</style>
