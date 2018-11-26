<template>
  <div>
    <header>
      <appNavbar></appNavbar>
    </header>

    <!-- Main content -->
    <div class="main-content">
      <!-- Page content -->
      <div class="container-fluid mt--7">
        <div class="row mt-5">
          <div class="col-xl-12 mb-5 mb-xl-0">
            <h1 class="font-weight-bold">Dashboard</h1>
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Lasted add articles</h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                  <tr>
                    <th scope="col">Article name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date created</th>
                    <th scope="col">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th scope="row">
                      /argon/
                    </th>
                    <td>
                      4,569
                    </td>
                    <td>
                      340
                    </td>
                    <td>
                      <i class="fas fa-edit">Edit</i>
                      <i class="fas fa-eraser"><a href="#">Delete</a></i>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  import logo from '../../assets/brand.png'
  import Navbar from '../Navbar'
  export default {
    name: "Dashboard",
    data() {
      return {
        data: 'nothing',
        logo: logo,
      }
    },
    components: {
      appNavbar: Navbar
    },
    mounted() {
      axios.get('/api/dashboard', {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      }).then(response => {
        this.data = response.data.data
      }).catch(error => {
        throw error.message
      });
    },
    computed: {
      user() {
        return JSON.parse(localStorage.getItem('account'))
      }
    }
  }
</script>

<style scoped>

</style>
