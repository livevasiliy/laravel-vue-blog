<template>
  <div class="article my-4">
    <div class="card mb-4" v-if="!loading && articles.length !==0" v-for="article in articles" :key="article.id">
      <div class="card-header">
        <h4 class="card-title font-weight-bold">
          {{ article.title }}
        </h4>
        <h5 class="text-primary">
          <small>{{ article.category }}</small>
        </h5>
        <p class="card-text">
          <small class="text-muted">Last update {{ article.updated_at }}</small>
        </p>
      </div>
      <div class="card-body my-3">
        <p class="card-text">{{ article.body }}</p>
      </div>
      <div class="card-footer">
        <router-link tag="button" class="btn btn-success" :to="'/articles/' + article.id">Read</router-link>
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
    props: ['articles', 'loading'],
    name: "LastedArticle"
  }
</script>

<style scoped>

</style>
