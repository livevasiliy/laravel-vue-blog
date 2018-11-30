<template>
  <div>
    <header>
      <appNavbar></appNavbar>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <router-view></router-view>
          <div class="card my-4">
            <img src="../../../assets/article/cover-article.png" alt="Cover" class="card-img-top">
            <div class="card-header">
              <h2 class="display-3">{{ article[0].title }}</h2>
              <div class="container">
                <div class="row">
                  <img src="../../../assets/team/me.jpg" alt="Photo profile" class="rounded-circle" width="60"
                       height="60">
                  <div class="col">
                    <h5 class="text-dark px-2 mb-0">Vasiliy Pivovarov</h5>
                    <small class="px-2">{{ article[0].created_at }}</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="text-dark text-justify">
                {{ article[0].body }}
              </p>
            </div>
            <div class="card-footer py-3">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-text">Share this articles:</h3>

                    <div class="pluso" data-background="transparent"
                         data-options="medium,round,line,horizontal,counter,theme=04"
                         data-services="vkontakte,facebook,twitter,linkedin"></div>
                    <router-link tag="button" class="btn btn-success mt-3" to="/articles/">
                      <i class="mr-3 fas fa-arrow-left"></i> Go back to all articles
                    </router-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Navbar from '../../Navbar'

  export default {
    name: "DetailArticle",
    components: {
      appNavbar: Navbar
    },
    data() {
      return {
        article: null,
      }
    },
    mounted() {
      /// Fetch single article
      let single = JSON.parse(localStorage.getItem('articles')).filter(x => x.id === this.$route.params.articleId).map(x => {
        return {body: x.body, title: x.title};
      });

      localStorage.setItem('article', JSON.stringify(single));

      this.article = JSON.parse(localStorage.getItem('article'));


      /// Pluso
      (function () {
        if (window.pluso) if (typeof window.pluso.start == "function") return;
        if (window.ifpluso == undefined) {
          window.ifpluso = 1;
          var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
          s.type = 'text/javascript';
          s.charset = 'UTF-8';
          s.async = true;
          s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://share.pluso.ru/pluso-like.js';
          var h = d[g]('body')[0];
          h.appendChild(s);
        }
      })();
    }
  }
</script>

<style scoped>

</style>
