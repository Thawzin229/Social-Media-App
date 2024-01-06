<template>
<Nav></Nav>  

<div class="content">
  <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <Link href="/admin/home" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-dark"></i></Link>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Account Details</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 text-center">
                                    <figure class="avatar ms-auto me-auto mb-0 mt-2 w100"><img :src="'http://127.0.0.1:8000/storage/'+admin_data.image" alt="image" class="shadow-sm rounded-3 w-100"></figure>
                                    <h4 class="text-grey-500 fw-500 mb-3 font-xsss my-4">{{ admin_data.name }}</h4>    
                                    <!-- <a href="#" class="p-3 alert-primary text-primary font-xsss fw-500 mt-2 rounded-3">Upload New Photo</a> -->
                                </div>
                            </div>

                            <form @submit.prevent="submit">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">First Name</label>
                                            <input type="text"  class="form-control" v-model="admin_data.name">
                                            <small v-if="errors.name" v-text="errors.name" class="text-danger"></small>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Email</label>
                                            <input type="text" class="form-control" v-model="admin_data.email">
                                            <small v-if="errors.email" v-text="errors.email" class="text-danger"></small>
                                        </div>        
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Gender</label>
                                            <input type="text" class="form-control" v-model="admin_data.gender">
                                            <small v-if="errors.gender" v-text="errors.gender" class="text-danger"></small>
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
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
                                        <button  :disabled="block"  @click="send()"  class="bg-current text-center w-100 bg-primary text-light font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
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
</template>

<script>
import Nav from '../layout/Nav.vue';
export default {
components:{Nav},
props:{errors:Object,admin_data:Object},
data:()=>({
block:false,
}),
methods:{
  send(){
    this.$inertia.post("/admin/update",this.admin_data,{
      onStart:()=>{this.block = true},
      onFinish:()=>{
        this.block = false
        setTimeout(() => {
      this.errors.status = false;
    }, 2000);
      },
    });

  },
  uploadImg(e)
  {
    this.admin_data.image = e.target.files[0];
  }
  
}
}
</script>

<style>

</style>