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
                  <div class="col-8">
                    <h3 class="mb-0">Lasted add articles</h3>
                  </div>
                  <div class="col-4">
                    <router-link tag="button" class="d-flex ml-auto btn btn-success" :to="{ name: 'AddNewPost' }"><span>Add new post</span>
                    </router-link>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush table-hover">
                  <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name article</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date created</th>
                    <th scope="col">Date updated</th>
                    <th scope="col">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="article of articles" :key="article.id">
                    <td>
                      {{ article.id }}
                    </td>
                    <td>
                      {{ article.title }}
                    </td>
                    <td>
                      {{ article.user_id }}
                    </td>
                    <td>
                      {{ article.created_at }}
                    </td>
                    <td>
                      {{ article.updated_at }}
                    </td>
                    <td>
                      <router-link
                        tag="a"
                        :to="{ name: 'EditPost', params: {postId: article.id} }"
                        class="cursor btn btn-link"
                        exact
                      >
                        <span class="mx-2">
                        <i class="fas fa-edit fa-2x"></i>
                        Edit
                      </span>
                      </router-link>
                      <a @click="deleteArticle(article.id)" class="cursor btn btn-link">
                        <i class="fas fa-eraser fa-2x"></i>
                        Delete
                      </a>
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
        logo: logo,
      }
    },
    methods: {
      async deleteArticle(postId) {
        await axios({
          url: '/api/articles/' + postId,
          method: 'delete',
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token')
          },
          params: {
            token: localStorage.getItem('token')
          }
        }).then(response => {
          let single = JSON.parse(localStorage.getItem('articles'))
            .filter(x => x.id === postId)
            .slice(postId,1);
          localStorage.setItem('article', JSON.stringify(single));
          console.log(response.data)
        }).catch(error => {
          throw error.message
        })
      }
    },
    components: {
      appNavbar: Navbar
    },
    mounted() {
      axios.get('/api/articles', {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      }).then(response => {
        localStorage.setItem('articles', JSON.stringify(response.data));
      }).catch(error => {
        throw error.message
      });
    },
    computed: {
      user() {
        return JSON.parse(localStorage.getItem('account'))
      },
      articles() {
        return JSON.parse(localStorage.getItem('articles'))
      }
    }
  }
</script>

<style scoped>

</style>
