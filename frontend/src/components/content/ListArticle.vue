<template>
  <div class="col-6">
    <div class="card my-3" v-if="!loading && articles.length !==0" v-for="article in articles" :key="article.id">
      <div class="card-body">
        <h4 class="card-title font-weight-bold">
          {{ article.title }}
        </h4>
        <p class="card-text">{{ article.body }}</p>
        <p class="card-text"><small class="text-muted">Last update {{ article.updated_at }}</small></p>
      </div>
    </div>
    <div v-else-if="!loading && articles.length === 0" class="notification">
      <h1>Array is empty</h1>
    </div>
    <div v-else>
      Loading...
    </div>
  </div>
</template>

<script>
  export default {
    name: "Article",
    data () {
      return {
        articles: [{
          title: 'How to make awesome project with Laravel + Vue.js',
          body: 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
          img: 'https://cdn-images-1.medium.com/max/2000/1*jFUgnkLTahkaBWSN8SLavg.png',
          updated_at: '16.11.2018'
        }]
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
