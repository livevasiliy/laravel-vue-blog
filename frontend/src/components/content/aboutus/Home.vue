<template>
  <main class="profile-page">
    <section class="section">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../../../assets/team/me.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">
                  <a href="#" class="btn btn-success btn-lg float-right">Connect</a>
                  <a href="#" class="btn btn-default mr-4"><i class="fab fa-linkedin fa-2x"></i></a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center flex-wrap">
                  <div>
                    <button class="btn btn-github"><i class="fab fa-github fa-2x"></i></button>
                  </div>
                  <div>
                    <button class="btn btn-primary"><i class="fab fa-vk fa-2x"></i></button>
                  </div>
                  <div>
                    <button class="btn btn-instagram"><i class="fab fa-instagram fa-2x"></i></button>
                  </div>
                  <div>
                    <button class="btn btn-twitter"><i class="fab fa-twitter fa-2x"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>Vasiliy Pivovarov
                <span class="font-weight-light">, 21</span>
              </h3>
              <div class="h6 font-weight-300"><i class="fal fa-location-arrow mr-2"></i>Astrakhan, Russia</div>
              <div class="h6 mt-4"><i class="fal fa-briefcase mr-2"></i>Backend Developer - Integranta
              </div>
              <div><i class="fal fa-graduation-cap mr-2"></i>Saint-Petersburg Colledge Information Technology</div>
            </div>
            <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <p>Hey there, I’m Vasiliy Pivovarov. I’m a web developer living in Astrakhan, Russian. I am a fan of
                    technology, photography, and design. I’m also interested in music and programming.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
  export default {
    name: "AboutUs"
  }
</script>

<style scoped>
  .section {
    padding-top: 15rem;
  }

  .card-profile-image img {
    width: 100%;
    height: 200px;
  }

  .profile-page .card-profile .card-profile-stats > div {
    margin-right: 0rem;
    padding: 10px;

  }

  @media screen and (min-width: 992px) {
    .section {
      padding-top: 25rem;
    }
  }

  @media screen and (max-width: 575.98px){
    .profile-page .card-profile .card-profile-actions {
      margin-top: 130px;
    }
  }
</style>
