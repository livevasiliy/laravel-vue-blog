<template>
  <div>
    <header>
      <appNavbar></appNavbar>
    </header>
    <div class="container py-5">
      <router-view></router-view>
      <div class="row">
        <div class="col-12">
          <h2>Add new post</h2>
          <form @submit.prevent="addNewPost">
            <div class="form-group">
              <label for="title">Title:</label>
              <ckeditor :editor="editor" v-model="editorTitle" tag-name="input" class="form-control form-control-alternative" id="title" name="title"></ckeditor>
            </div>
            <div class="form-group">
              <label for="body">Body:</label>
              <ckeditor :editor="editor" v-model="editorContent" tag-name="textarea"></ckeditor>
              <input type="hidden" id="body"/>
            </div>
            <router-link :to="{ name: 'Dashboard'}" class="btn btn-secondary">Back to Dashboard</router-link>
            <button type="submit" class="btn btn-success">Add post</button>
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
        editorTitle: '',
        editorContent: '',
      }
    },
    methods: {
      async addNewPost() {
        await axios({
          method: 'post',
          url: '/api/articles/',
          data: {
            title: this.editorTitle,
            body: this.editorContent,
          },
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token')
          },
          params: {
            token: localStorage.getItem('token')
          }
        }).then(response => {
          if (response.status === 200) {
            localStorage.setItem('articles', response.data);
            this.$router.push({ name: 'Dashboard'} );
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
