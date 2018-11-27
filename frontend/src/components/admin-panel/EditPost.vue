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
    props: ['articleID'],
    name: "EditPost",
    created() {
      let single = JSON.parse(localStorage.getItem('articles')).filter(x => x.id === this.articleID).map(x => x.body);
      console.log(single);
    },
    data() {
      return {
        editorContent: '',
      }
    },
    components: {
      appNavbar: Navbar,
      VueTrix
    }
  }
</script>

<style scoped>

</style>
