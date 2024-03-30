<template>
  <div class="main-wrapper">
    <Nav></Nav>
    <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0">
                    <div class="row">
                           
                        <div class="col-xl-12">
                            <div class="chat-wrapper p-3 w-100 position-relative scroll-bar bg-white theme-dark-bg">
                                <h2 class="fw-700 mb-4 mt-2 font-md text-grey-900 d-flex align-items-center">Notification
                                <span class="circle-count bg-warning text-white font-xsssss rounded-3 ms-2 ls-3 fw-600 p-2  mt-0">{{ notifications.length }}</span> 
                                    <a href="#" class="ms-auto btn-round-sm bg-greylight rounded-3"><i class="feather-hard-drive font-xss text-grey-500"></i></a> 
                                    <a href="#" class="ms-2 btn-round-sm bg-greylight rounded-3"><i class="feather-alert-circle font-xss text-grey-500"></i></a> 
                                    <a href="#" class="ms-2 btn-round-sm bg-greylight rounded-3"><i  class="feather-trash-2 font-xss text-grey-500"></i></a></h2>
                                    
                                    
                                <ul class="notification-box">


                                    <li v-for="(item,index) in notifications" :key="index">
                                        <a href="#" class="d-flex align-items-center p-3 rounded-3 bg-lightblue theme-light-bg">
                                            <img :src="'http://127.0.0.1:8000/storage/'+item.data.image" alt="user" class="w45 me-3">
                                            <i class="feather-heart text-white bg-red-gradiant me-2 font-xssss notification-react"></i>
                                            <h6 class="font-xssss text-grey-900 text-grey-900 mb-0 mt-0 fw-500 lh-20"><strong>{{ item.data.name }}</strong> posted in <strong>UI/UX Community</strong> : “liked your post.” <span class="d-block text-grey-500 font-xssss fw-600 mb-0 mt-0 0l-auto"> 12 minutes ago</span> </h6>
                                            <i class="ti-more-alt text-grey-500 font-xs ms-auto"></i>
                                        </a>
                                    </li>


                                </ul>                                 
                            </div>
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
  props:{user_list:Object,notifications:Object},
  components:{Chat,Nav,Footer},
  methods:{

  }
}

</script>

<style>

</style>