<template>
    <div class="container py-5 contact-form">
      <h2 class="display-3 text-center">Contact us</h2>
      <div class="row d-flex justify-content-center">
        <div class="col-8">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success"><i class="far fa-paper-plane mr-3"></i>Send</button>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        name: "Home"
    }
</script>

<style lang="scss" scoped>
.contact-form {
  margin-top: 100px;
}
</style>
