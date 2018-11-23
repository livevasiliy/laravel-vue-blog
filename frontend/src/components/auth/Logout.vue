<template>

</template>

<script>
  export default {
    name: "Logout",
    mounted() {
      localStorage.removeItem('token');
      this.$store.commit('logoutUser');
      this.$router.push({name: 'Login'})
    }
  }
</script>

<style scoped>

</style>
