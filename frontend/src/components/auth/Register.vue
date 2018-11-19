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
                <small>Or sign up with credentials</small>
              </div>
              <form role="form" ref="form">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input
                      class="form-control"
                      placeholder="Name"
                      type="text"
                      name="name"
                      v-model="name"
                    >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input
                      class="form-control"
                      placeholder="Email"
                      type="email"
                      name="email"
                      v-model="email"
                    >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input
                      class="form-control"
                      placeholder="Password"
                      type="password"
                      name="password"
                      required
                      v-model="password"
                    >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input
                      class="form-control"
                      placeholder="Confirm password"
                      type="password"
                      name="password_confirmation"
                      required
                      v-model="password_confirmation"
                    >
                  </div>
                </div>
                <div class="text-muted font-italic">
                  <small>password strength:
                    <span class="text-success font-weight-700">strong</span>
                  </small>
                </div>
                <div class="text-center">
                  <button
                    type="button"
                    class="btn btn-primary mt-4"
                    @click.prevent="onSumbit">Create account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import { required, email, sameAs } from 'vuelidate/lib/validators/'
  export default {
    name: "Register",
    data() {
      return {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        validate: false
      }
    },
    validations: {
      email: {
        email,
        required
      },
      password: {
        required
      },
      password_confirmation: {
        sameAsPassword: sameAs('password')
      }
    },
    methods: {
      onSumbit() {
        const newUser = {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        };
        this.$store.dispatch('registerUser', newUser).then(() => {
          this.$router.push('/')
        }).catch(() => {})
      }
    }
  }
</script>

<style scoped>

</style>
