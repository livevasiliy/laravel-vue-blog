<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <router-view></router-view>
        <appArticle :articles="articles" :loading="loading"></appArticle>
        <appPagination></appPagination>
      </div>
    </div>
  </div>
</template>

<script>

  import Article from './Article'
  import Pagination from '../../shared/Pagination'

  export default {
    name: "ListArticle",
    components: {
      appArticle: Article,
      appPagination: Pagination
    },
    data() {
      return {
        articles: [
          {
            id: 1,
            category: 'Developing',
            title: 'How to make awesome project with Laravel + Vue.js',
            body: 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
            img: 'https://cdn-images-1.medium.com/max/2000/1*jFUgnkLTahkaBWSN8SLavg.png',
            updated_at: '16.11.2018'
          },
          {
            id: 2,
            category: 'Developing',
            title: 'How to make awesome project with Laravel + Vue.js',
            body: 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
            img: 'https://cdn-images-1.medium.com/max/2000/1*jFUgnkLTahkaBWSN8SLavg.png',
            updated_at: '16.11.2018'
          },
          {
            id: 3,
            category: 'Developing',
            title: 'How to make awesome project with Laravel + Vue.js',
            body: 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
            img: 'https://cdn-images-1.medium.com/max/2000/1*jFUgnkLTahkaBWSN8SLavg.png',
            updated_at: '16.11.2018'
          }
        ]
      }
    },
    computed: {
      // articles() {
      //   return this.$store.getters.articles;
      // },
      loading() {
        return this.$store.getters.loading;
      }
    }
  }
</script>

<style scoped>

</style>
