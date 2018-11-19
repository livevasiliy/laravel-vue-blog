<template>
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 bg-gradient-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container pt-lg-md">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign in with credentials</small>
              </div>
              <form role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" v-model="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" v-model="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="customCheckLogin" type="checkbox" v-model="remember_me">
                  <label class="custom-control-label" for="customCheckLogin">
                    <span>Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4" @click.prevent="onSumbit">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <router-link to="Restore" class="text-light">
                <small>Forgot password?</small>
              </router-link>
            </div>
            <div class="col-6 text-right">
              <router-link to="Register" class="text-light">
                <small>Create new account</small>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import { required, email } from 'vuelidate/lib/validators/'
  export default {
    name: "Login",
    data() {
      return {
        email: '',
        password: '',
        remember_me: false,
      }
    },
    validations: {
      email: {
        email,
        required
      },
      password: {
        required
      }
    },
    methods: {
      onSumbit() {
        const user = {
          email: this.email,
          password: this.password,
          remember_me: this.remember_me
        };
        this.$store.dispatch('loginUser', user)
          .then(() => {
            this.$router.push('/profile')
          }).catch(() => {
        })
      }
    },
    computed: {
      loading() {
        return this.$store.getters.loading
      }
    }
  }
</script>

<style scoped>
  @media screen and (min-width: 320px) {
    section.section.section-shaped.section-lg {
      padding: 12rem 0rem;
    }
  }
</style>
