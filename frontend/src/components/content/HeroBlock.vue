<template>
  <div class="jumbotron jumbotron-fluid bg-gradient-blue text-white">
    <div class="container p-5">
      <h1 class="display-1 text-white">
        <slot name="title"></slot>
      </h1>
      <h5 class="display-5 text-white">
        <slot name="subtitle"></slot>
      </h5>
    </div>
  </div>

</template>

<script>
  export default {
    name: "HeroBlock"
  }
</script>

<style scoped>

</style>
