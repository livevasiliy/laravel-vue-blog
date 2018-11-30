<template>
  <div>
    <header>
      <app-navbar></app-navbar>
    </header>
    <main>
      <appHeroBlock>
        <template slot="title">Welcome to my blog</template>
        <template slot="subtitle">About web technology, Vue.js & Laravel</template>
      </appHeroBlock>
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-7 col-lg-8">
            <h2 class="display-3 text-center">Lasted articles</h2>
            <app-lasted-article :articles="lastedArticles" :loading="loading"></app-lasted-article>
            <h3 class="text-center">Find more articles ?</h3>
            <router-link tag="button" :to="'/articles/'" class="btn btn-danger d-flex mx-auto my-4">Show all articles
            </router-link>
          </div>
          <div class="col-12 col-sm-12 col-md-5 col-lg-4">
            <div class="card bg-secondary p-3">
              <img src="../assets/team/me.jpg" alt="My photo" class="card-img-top rounded-circle mx-auto"
                   style="width: 150px; height: 150px;">
              <div class="card-body">
                <h3 class="card-title">About me</h3>
                <p class="card-text">Hey there, I’m Vasiliy Pivovarov. I’m a web developer living in Astrakhan, Russian.
                  I
                  am a fan of technology and design. This you can
                  see my portfolio and read my blog.</p>
              </div>
            </div>
            <div class="py-3">
              <h3>Categories</h3>
              <ul class="nav flex-row flex-sm-column flex-md-column flex-lg-column d-flex justify-content-start">
                <li v-for="(category, index) of categories" :key="index" class="nav-item py-1 flex-fill">
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
  </div>
</template>

<script>
  import HeroBlock from './content/HeroBlock'
  import LastedArticle from './content/articles/LastedArticle'
  import Pagination from './shared/Pagination'
  import Navbar from './Navbar'

  export default {
    name: 'Home',
    mounted() {
      axios.get('/api/articles', {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      }).then(response => {
        localStorage.setItem('articles', JSON.stringify(response.data));
      }).catch(error => {
        throw error.message
      });
    },
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
        ],
        // lastedArticles: [
        //   {
        //     id: 1,
        //     category: 'Developing',
        //     title: 'How to make awesome project with Laravel + Vue.js',
        //     body: 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
        //     img: 'https://cdn-images-1.medium.com/max/2000/1*jFUgnkLTahkaBWSN8SLavg.png',
        //     updated_at: '17.11.2018'
        //   },
        //   {
        //     id: 2,
        //     category: 'Developing',
        //     title: 'How to make awesome project with Laravel + Vue.js',
        //     body: 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
        //     img: 'https://cdn-images-1.medium.com/max/2000/1*jFUgnkLTahkaBWSN8SLavg.png',
        //     updated_at: '17.11.2018'
        //   },
        //   {
        //     id: 3,
        //     category: 'Developing',
        //     title: 'How to make awesome project with Laravel + Vue.js',
        //     body: 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
        //     img: 'https://cdn-images-1.medium.com/max/2000/1*jFUgnkLTahkaBWSN8SLavg.png',
        //     updated_at: '17.11.2018'
        //   }
        // ]
      }
    },
    components: {
      appHeroBlock: HeroBlock,
      appLastedArticle: LastedArticle,
      appPagination: Pagination,
      appNavbar: Navbar
    },
    computed: {
      loading() {
        return this.$store.getters.loading;
      },
      lastedArticles() {
        return JSON.parse(localStorage.getItem('articles'));
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
