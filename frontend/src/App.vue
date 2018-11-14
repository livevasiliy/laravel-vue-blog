<template>
  <div id="app">
    <img src="./assets/logo.png">
    <h1>Test</h1>
    <ul>
      <li v-for="article in articles">
        {{ article.title}}
        {{ article.body}}
        {{ article.userId}}
      </li>
    </ul>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App',
  computed: {
    articles () {
      return this.$store.getters.getAllNews
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
