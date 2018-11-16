<template>
  <main>
    <div class="container-fluid">
      <div class="row">
        <appCarouselArticle></appCarouselArticle>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <appListArticle v-for="index of 6" :key="index"></appListArticle>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 p-5 bg-gradient-blue">
          <h2 class="display-3 mb-3">Subscribe to newsletters</h2>
          <form>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn">Subscribe</button>
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
  import CarouselArticle from './content/CarouselArticle'
  import ListArticle from './content/ListArticle'

  export default {
    name: 'HelloWorld',
    components: {
      appCarouselArticle: CarouselArticle,
      appListArticle: ListArticle
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
