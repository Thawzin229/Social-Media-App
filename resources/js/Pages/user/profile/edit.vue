<template>
    <div class="main-wrapper">
    <Nav></Nav>
          <!-- main content -->
          <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <Link href="/setting" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></Link>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Account Details</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 text-center">
                                    <figure class="avatar ms-auto me-auto mb-0 mt-2 w100"><img :src="'http://127.0.0.1:8000/storage/'+post.image" alt="image" class="shadow-sm rounded-3 w-100"></figure>
                                    <!-- <a href="#" class="p-3 alert-primary text-primary font-xsss fw-500 mt-2 rounded-3">Upload New Photo</a> -->
                                </div>
                            </div>

                            <form @submit.prevent="submit">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">description</label>
                                            <textarea  class="form-control p-4" v-model="post.description" name="" id="" cols="30" rows="10"></textarea>
                                            <small v-if="errors.description" v-text="errors.description" class="text-danger"></small>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-12 mb-3">
                                        <div class="card mt-3 border-0">
                                            <div class="card-body d-flex justify-content-between align-items-end p-0">
                                                <div class="form-group mb-0 w-100">
                                                    <input type="file" @change="uploadImg" name="file" id="file" class="input-file">
                                                    <label for="file" class="rounded-3 text-center bg-white btn-tertiary js-labelFile p-4 w-100 border-dashed">
                                                    <i class="ti-cloud-down large-icon me-3 d-block"></i>
                                                    <span class="js-fileName">Drag and drop or click to replace</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div v-if="errors.status" v-text="errors.status" class="text-light text-center bg-success p-3"></div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <button @click="send()"  class="bg-current text-center w-100  text-dark font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
                                    </div>
                                </div>

                            </form>
                            </div>
                        </div>
                        <!-- <div class="card w-100 border-0 p-2"></div> -->
                    </div>
                </div>
                 
            </div>            
        </div>
      </div>
        <!-- main content -->
        <Footer></Footer>
</template>

<script>
import Chat from '../../layout/Chat.vue';
import Nav from '../../layout/Nav.vue';
import Footer from '../../layout/Footer.vue';
export default {
components:{Nav,Footer,Chat},
props:{post:Object,errors:Object},
methods:{
  send()
  {
    this.$inertia.post("/user/profile/update",this.post);
  },
  uploadImg(e)
  {
    this.post.image = e.target.files[0];
  }
}
}
</script>

<style>

</style>