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
                    <img :src="user.user.avatar_url" class="rounded-circle">
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
              <h3>{{ user.user.name }}
                <span class="font-weight-light">, {{ user.user.id }}</span>
              </h3>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
  export default {
    name: "Profile",
    computed: {
      user() {
        console.log(JSON.parse(localStorage.getItem('account')));
        return JSON.parse(localStorage.getItem('account'));

      }
    }
  }
</script>

<style scoped>

</style>
