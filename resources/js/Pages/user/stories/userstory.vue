<template>
  <div class="main-wrapper">
  <Nav></Nav>
        <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                                <div class="card-body d-flex align-items-center p-0">
                                    <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Storie</h2>
                                    <div class="search-form-2 ms-auto">
                                        <i class="ti-search font-xss"></i>
                                        <input  type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here.">
                                    </div>
                                    <a href="#" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i class="feather-filter font-xss text-grey-500"></i></a>
                                </div>
                            </div>

                            <div class="row ps-2 pe-1">
                                 <div v-for="(item,index) in stories.data" :key="index" class="col-md-3 col-xss-6 pe-2 ps-2">
                                  <div class="card h300 d-block border-0 shadow-xss rounded-3 bg-gradiant-bottom overflow-hidden mb-3 bg-image-cover">
                                    <Link class="position-absolute bottom-4 mx-1"  :href="'/story/delete/'+item.id"  v-if="item.user_id==$page.props.data_user.id"><i class="zmdi zmdi-close"></i></Link>
                                    <img style="height:100%;" :src="'http://127.0.0.1:8000/storage/'+item.image" alt="">
                                    <div class="card-body d-block w-100 position-absolute bottom-0 text-center">
                                      <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img  style="width: 50px;height: 50px;border-radius: 100%;"  :src="'http://127.0.0.1:8000/storage/'+item.user_image" alt="image" class="float-right p-0 bg-white  shadow-xss"></figure>
                                      <div class="clearfix"></div>
                                      <h4 class="fw-600 position-relative z-index-1 ls-3 font-xssss text-white mt-2 mb-1">{{ item.user_name }}</h4>
                                    </div>
                                    </div>
                                 </div>
                                 
                                 
                                 </div>
                                <Component class="btn btn-secondary mx-1" :is="link.url?'Link':'span'" :href="link.url" v-html="link.label"  v-for="(link,index) in stories.links" :key="index"></Component>
                        </div>               
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
  props:{user_list:Object,stories:Object,},
components:{ Nav, Footer, Chat },


}
</script>

<style>

</style>