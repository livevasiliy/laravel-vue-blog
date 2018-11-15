<template>
  <div id="app">
    <img src="./assets/logo.png">
    <h1>Test</h1>
    <div v-if="!loading && articles.length !==0">
      <ul>
        <li v-for="article in articles" :key="article.id">
          {{ article.title }}
          {{ article.body }}
          {{ article.userId }}
        </li>
      </ul>
    </div>
    <div v-else-if="!loading && articles.length === 0">
      <h1>Array is empty</h1>
    </div>
    <div v-else>
      Loading...
    </div>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App',
  computed: {
    articles () {
      return this.$store.getters.articles;
    },
    loading() {
      return this.$store.getters.loading;
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
