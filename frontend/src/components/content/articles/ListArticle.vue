<template>
  <div>
    <header>
      <appNavbar></appNavbar>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <router-view></router-view>
          <appArticle :articles="articles" :loading="loading"></appArticle>
          <appPagination></appPagination>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  import Article from './Article'
  import Pagination from '../../shared/Pagination'
  import Navbar from '../../Navbar'
  import axios from 'axios'

  export default {
    name: "ListArticle",
    components: {
      appArticle: Article,
      appPagination: Pagination,
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
      articles() {
        return JSON.parse(localStorage.getItem('articles'))
      },
      loading() {
        return this.$store.getters.loading;
      }
    }
  }
</script>

<style scoped>

</style>
