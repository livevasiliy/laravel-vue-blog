<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <router-view></router-view>
        <div class="card my-4">
          <img src="../../../assets/article/cover-article.png" alt="Cover" class="card-img-top">
          <div class="card-header">
            <h2 class="display-3">How to make awesome project with Vue & Laravel</h2>
            <div class="container">
              <div class="row">
                <img src="../../../assets/team/me.jpg" alt="Photo profile" class="rounded-circle" width="60"
                     height="60">
                <div class="col">
                  <h5 class="text-dark px-2 mb-0">Vasiliy Pivovarov</h5>
                  <small class="px-2">16.11.2018</small>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <p class="text-dark text-justify">
              <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi aspernatur, autem distinctio exercitationem id inventore laborum nesciunt nihil nisi, obcaecati perferendis perspiciatis placeat quas repellat sunt tempora totam ut.</span><span>Blanditiis culpa deleniti inventore laboriosam pariatur! Dicta facere facilis ipsa officiis porro. Ab accusantium assumenda consequuntur, cumque dolorum eius exercitationem impedit iure nesciunt nisi praesentium qui ratione reprehenderit sapiente voluptatibus.</span><span>Accusamus deleniti eaque eius eos fugit labore modi quasi, reiciendis rem? Accusantium at autem corporis cupiditate eligendi molestiae obcaecati quae quia, quos sapiente totam unde vitae? Aut culpa dolorem quae.</span><span>A amet assumenda autem commodi consequatur cumque cupiditate dignissimos dolorem eius esse harum id illo iste laborum minima modi optio quas repellat reprehenderit sapiente similique temporibus, ut vero voluptate voluptatum!</span><span>Doloribus, maxime quae? Ad cupiditate doloremque eius, eligendi illo nobis quam tempore voluptate. Animi autem corporis dignissimos eos, eum fugiat hic ipsum labore nihil non obcaecati officia possimus reiciendis unde?</span><span>Beatae, blanditiis consequatur dignissimos, ex fuga fugit harum labore neque qui rem saepe sequi velit voluptate. Aliquam consequatur delectus ducimus, earum expedita fuga hic, maxime natus, nobis placeat praesentium quam?</span><span>A ab accusantium amet architecto beatae culpa deleniti dicta ea eius ex fugiat fugit, illum impedit, magnam modi odio omnis pariatur quas recusandae reprehenderit similique tenetur unde veniam veritatis voluptatem?</span><span>Ab autem tempore vitae! Delectus doloremque perspiciatis ut vero. Animi asperiores facere, fuga molestiae nemo officiis qui quod temporibus veniam. Animi dolor eveniet incidunt ipsum nemo pariatur repudiandae sapiente tempore!</span><span>Accusantium adipisci at autem commodi consequuntur doloremque dolores ea eos explicabo harum illum molestias, nam necessitatibus, praesentium quidem quisquam tempora temporibus. Architecto distinctio, facere laborum laudantium nesciunt omnis possimus voluptatum.</span><span>Doloribus, vitae, voluptatem. Aliquam atque beatae blanditiis dicta dolorum esse excepturi exercitationem, harum, in, ipsa iste labore laboriosam temporibus ullam voluptatibus. Aperiam eaque eveniet ex ipsum laudantium recusandae voluptatibus. Adipisci.</span>
            </p>
          </div>
          <div class="card-footer">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h3 class="card-text">Share this articles:</h3>
                  <button class="btn btn-icon btn-2 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fab fa-twitter fa-lg"></i></span>
                  </button>
                  <button class="btn btn-icon btn-2 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fab fa-google-plus fa-lg"></i></span>
                  </button>
                  <button class="btn btn-icon btn-2 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fab fa-facebook-f fa-lg"></i></span>
                  </button>
                  <button class="btn btn-icon btn-2 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fab fa-vk fa-lg"></i></span>
                  </button>
                </div>
                <div class="col-12 mt-3">
                  <router-link tag="button" class="btn btn-success" to="/articles/"><i class="mr-3 fas fa-arrow-left"></i> Go back to all articles</router-link>
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
    export default {
        name: "DetailArticle"
    }
</script>

<style scoped>

</style>
