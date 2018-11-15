<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card mt-3" v-if="!loading && articles.length !==0"  v-for="article in articles" :key="article.id">
          <div class="card-header">
            <h1 class="title">
              {{ article.title }}
            </h1>
          </div>
          <div class="card-content">
            <p class="content">{{ article.body }}</p>
          </div>
        </div>
        <div v-else-if="!loading && articles.length === 0" class="notification">
          <h1>Array is empty</h1>
        </div>
        <div v-else>
          Loading...
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Article",
    computed: {
      articles() {
        return this.$store.getters.articles;
      },
      loading() {
        return this.$store.getters.loading;
      }
    }
  }
</script>

<style scoped>

</style>
