<template>
  <main>
    <appHeroBlock>
      <template slot="title">Welcome to my blog</template>
      <template slot="subtitle">About web technology, Vue.js & Laravel</template>
    </appHeroBlock>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <h2 class="display-3 text-center">Lasted articles</h2>
          <appListArticle></appListArticle>
          <appPagination></appPagination>
        </div>
        <div class="col-4">
          <div class="card bg-secondary p-3">
            <img src="../assets/team/me.jpg" alt="My photo" class="card-img-top rounded-circle mx-auto"
                 style="width: 175px; height: 200px;">
            <div class="card-body">
              <h3 class="card-title">About me</h3>
              <p class="card-text">Hey there, I’m Vasiliy Pivovarov. I’m a web developer living in Astrakhan, Russian. I
                am a fan of technology and design. You can
                see my portfolio and read my blog.</p>
            </div>
          </div>
          <div class="py-3">
            <h3>Categories</h3>
            <ul class="nav flex-column">
              <li v-for="(category, index) of categories" :key="index" class="nav-item py-1">
                <a href="#" class="nav-link">
                  <span v-html="category.icon"></span>
                  {{ category.title }}
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 p-5 bg-gradient-danger ">
          <h2 class="font-weight-bold py-4 mb-3 text-white">Subscribe to new articles</h2>
          <form>
            <div class="form-row">
              <div class="col-md-4 col-lg-3 py-4">
                <div class="form-group">
                  <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1"
                         placeholder="name@example.com">
                </div>
              </div>
              <div class="col-md-6 py-4">
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Subscribe</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
  import HeroBlock from './content/HeroBlock'
  import ListArticle from './content/articles/ListArticle'
  import Pagination from './shared/Pagination'

  export default {
    name: 'Home',
    data() {
      return {
        categories: [
          {
            title: 'HTML5',
            icon: '<i class="fab fa-html5 fa-2x mr-2" style="color: #E34C26;"></i>'
          },
          {
            title: 'CSS3',
            icon: '<i class="fab fa-css3-alt fa-2x mr-2" style="color: #5e72e4"></i>'
          },
          {
            title: 'Javascript',
            icon: '<i class="fab fa-js fa-2x mr-2" style="color: #f7df1e;"></i>'
          },
          {
            title: 'Vue.js',
            icon: '<i class="fab fa-vuejs fa-2x mr-2" style="color: lightgreen;"></i>'
          },
          {
            title: 'Laravel',
            icon: '<i class="fab fa-laravel fa-2x mr-2" style="color: #e6533d;"></i>'
          }
        ]
      }
    }
    ,
    components: {
      appHeroBlock: HeroBlock,
      appListArticle: ListArticle,
      appPagination: Pagination
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
