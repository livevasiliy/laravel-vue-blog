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
          <form @submit.prevent="updatePost">
            <div class="form-group">
              <label for="title">Title:</label>
              <ckeditor :editor="editor" v-model="editorTitle" tag-name="input"
                        class="form-control form-control-alternative" id="title" name="title"></ckeditor>
            </div>
            <div class="form-group">
              <label for="body">Body:</label>
              <ckeditor :editor="editor" v-model="editorContent" tag-name="textarea"></ckeditor>
              <input type="hidden" id="body"/>
            </div>
            <router-link :to="{ name: 'Dashboard'}" class="btn btn-secondary">Back to Dashboard</router-link>
            <button type="submit" class="btn btn-success">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Navbar from '../Navbar'
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
  import CKEditor from '@ckeditor/ckeditor5-vue'
  import axios from 'axios'

  export default {

    name: "EditPost",
    data() {
      return {
        editor: ClassicEditor,
        editorTitle: JSON.parse(localStorage.getItem('article')).map(x => x.title)[0],
        editorContent: JSON.parse(localStorage.getItem('article')).map(x => x.body)[0],
      }
    },
    mounted() {
      let single = JSON.parse(localStorage.getItem('articles')).filter(x => x.id === this.$route.params.postId).map(x => {
        return {body: x.body, title: x.title};
      });
      localStorage.setItem('article', JSON.stringify(single));
    },
    methods: {
      async updatePost() {
        await axios({
          method: 'put',
          url: '/api/articles/' + this.$route.params.postId,
          data: {
            title: this.editorTitle,
            body: this.editorContent,
            token: localStorage.getItem('token')
          },
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token')
          },
          params: {
            token: localStorage.getItem('token')
          }
        }).then(response => {
          if (response.status === 200) {
            this.$router.go(-1);
          }
        }).catch(error => {
          console.log(error);
          throw error.message
        })
      }
    },
    components: {
      appNavbar: Navbar,
      ckeditor: CKEditor.component
    }
  }
</script>

<style scoped>

</style>
