<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Dashboard</h1>
        <p>
          <router-link :to="{name: 'Logout'}">Logout</router-link>
        </p>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
          <p>Data: {{ $data }}</p>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  export default {
    name: "Dashboard",
    data() {
      return {
        data: 'nothing'
      }
    },
    mounted() {
      axios.get('/api/dashboard',{
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      }).then(response => {
        this.data = response.data.data
      }).catch(error => {
        throw error.message
      })
    }
  }
</script>

<style scoped>

</style>
