<template>
  <div id="app">
    <img src="./assets/logo.png">
    <router-view/>
    <ul>
      <li v-for="article in articles" :key="article.id">
        <h1>{{ article.title }}</h1>
        <p>{{ article.body }}</p>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'App',
  computed: {
    articles () {
      return this.$store.getters.allArticles
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
