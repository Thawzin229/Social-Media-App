<template>
<div class="main-wrapper">
  <Nav></Nav>
  <div class="main-content" style="display: flex;justify-content: center;align-items: center;">
    <div class="card border-0 text-center d-block p-5">
                            <img src="http://127.0.0.1:8000/user/images/bg-43.png" alt="icon" class="w200 mb-4 ms-auto me-auto pt-md-5">
                            <h5 class="fw-700 text-grey-900 display3-size display4-md-size">Oops! It looks like you're lost.</h5>
                            <p class="text-grey-500 font-xsss my-4">The page you're looking for isn't available. Try to search again or use the go to.</p>
                            <Link href="/" class="p-3 w175 bg-current text-white d-inline-block text-center fw-600 font-xssss rounded-3 text-uppercase ls-3">Home Page</Link>
                        </div>
  </div>
</div>
  <Footer></Footer>
</template>

<script>
import Nav from '../layout/Nav.vue';
import Footer from '../layout/Footer.vue';
export default {
  components:{Nav,Footer},

}
</script>

<style>

</style>