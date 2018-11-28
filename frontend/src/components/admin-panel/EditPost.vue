<template>
  <div>
    <header>
      <appNavbar></appNavbar>
    </header>
    <div class="container py-5">
    <router-view></router-view>
      <div class="row">
        <div class="col-12">
          <h2>Edit Post</h2>
          <form>
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control form-control-alternative" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="body">Body:</label>
              <VueTrix inputId="body" v-model="editorContent"></VueTrix>
              <input type="hidden" id="body" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Navbar from '../Navbar'
  import VueTrix from 'vue-trix'
  export default {

    name: "EditPost",
    data() {
      return {
        editorContent: JSON.parse(localStorage.getItem('article')).toString(),
      }
    },
    mounted(){
      console.log(this.$route.params);
      let single = JSON.parse(localStorage.getItem('articles')).filter(x => x.id === this.$route.params.postId).map(x => x.body);
      localStorage.setItem('article', JSON.stringify(single));
    },
    components: {
      appNavbar: Navbar,
      VueTrix
    }
  }
</script>

<style scoped>

</style>
