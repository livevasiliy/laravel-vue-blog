<template>
  <div class="container">
    <appListArticle></appListArticle>
  </div>
</template>

<script>
  import ListArticle from './content/ListArticle'

  export default {
    name: 'HelloWorld',
    components: {
      appListArticle: ListArticle
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
