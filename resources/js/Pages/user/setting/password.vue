<template>
  <div class="main-wrapper">
    <Nav></Nav>
    <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <Link href="/setting" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></Link>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Change Password</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                <form  @submit.prevent="submit">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Old Password</label>
                                                <input v-model="userdata.oldpassword" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.oldpassword" v-text="errors.oldpassword" class="text-danger"></small>
                                            </div>        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Current Password</label>
                                                <input v-model="userdata.currentpassword" type="text" name="comment-name" class="form-control">
                                                <small v-if="errors.currentpassword" v-text="errors.currentpassword" class="text-danger"></small>
                                                <small v-if="errors.status" v-text="errors.status" class="text-danger"></small>
                                            </div>        
                                        </div>                                     
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-0">
                                            <button @click="change()" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
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
        <Chat :user_list=user_list></Chat>
  </div>
  <Footer></Footer>
</template>

<script>
import Chat from '../../layout/Chat.vue';
import Nav from '../../layout/Nav.vue';
import Footer from '../../layout/Footer.vue';
export default {
props:{user_list:Object,errors:Object},
components:{ Nav, Footer, Chat, },
data:()=>({
userdata:{oldpassword:"",currentpassword:""},
}),
methods:{
  change()
  {
    this.$inertia.post('/social/updatepassword',this.userdata);
  }
}
}
</script>

<style>

</style>