<template>
  <div>
  <div class="main-wrapper">
<Nav></Nav>
    <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <Link href="/setting" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></Link>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Social Network</h4>
                            </div>
                            <!-- create -->
                            <div  v-if="!social_data" class="card-body p-lg-5 p-4 w-100 border-0">
                                <form @submit.prevent="submit" action="#">
                                     

                                    <div class="row">
                                        
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Facebook</label>
                                                <input  v-model="userdata.facebook" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.facebook" v-text="errors.facebook" class="text-danger"></small>
                                            </div>        
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Twitter</label>
                                                <input  v-model="userdata.twitter" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.twitter" v-text="errors.twitter" class="text-danger"></small>
                                            </div>        
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Instagram</label>
                                                <input  v-model="userdata.instagram" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.instagram" v-text="errors.instagram" class="text-danger"></small>
                                            </div>        
                                        </div>


                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Github</label>
                                                <input  v-model="userdata.github" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.github" v-text="errors.github" class="text-danger"></small>

                                            </div>        
                                        </div>


                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Google</label>
                                                <input  v-model="userdata.google" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.google" v-text="errors.google" class="text-danger"></small>
                                            </div>        
                                        </div>




                                        <div class="col-lg-12 mb-0 mt-2">
                                            <butotn @click="send()" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Create</butotn>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- update -->
                            <div  v-if="social_data" class="card-body p-lg-5 p-4 w-100 border-0">
                                <form @submit.prevent="submit" action="#">
                                     

                                    <div class="row">
                                      <h2 class="mb-3 text-muted">Update</h2>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Facebook</label>
                                                <input  v-model="social_data.facebook" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.facebook" v-text="errors.facebook" class="text-danger"></small>
                                            </div>        
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Twitter</label>
                                                <input  v-model="social_data.twitter" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.twitter" v-text="errors.twitter" class="text-danger"></small>
                                            </div>        
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Instagram</label>
                                                <input  v-model="social_data.instagram" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.instagram" v-text="errors.instagram" class="text-danger"></small>
                                            </div>        
                                        </div>


                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Github</label>
                                                <input  v-model="social_data.github" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.github" v-text="errors.github" class="text-danger"></small>

                                            </div>        
                                        </div>


                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Google</label>
                                                <input  v-model="social_data.google" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.google" v-text="errors.google" class="text-danger"></small>
                                                <div  v-if="errors.status" v-text="errors.status" class="text-light bg-success p-3 text-center"></div>

                                            </div>        
                                        </div>




                                        <div class="col-lg-12 mb-0 mt-2">
                                            <butotn @click="update()" class="w-100 bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</butotn>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>            
        </div>
        <Chat :user_list=user_list></Chat>
  </div>
  <Footer></Footer>
</div>
</template>

<script>
import Chat from '../../layout/Chat.vue';
import Nav from '../../layout/Nav.vue';
import Footer from '../../layout/Footer.vue';
export default {
    props:{user_list:Object,errors:Object,social_data:Object},
components:{ Nav, Footer, Chat},
data:()=>({
userdata:{facebook:"",twitter:"",google:"",github:"",instagram:""},
}),
methods:{
  send()
  {
    this.$inertia.post("/social/create",this.userdata);
  },
  update()
  {
    this.$inertia.post('/social/update',this.social_data);
    setTimeout(() => {
      this.errors.status =false
    }, 3000);
  }
}
}
</script>

<style>

</style>