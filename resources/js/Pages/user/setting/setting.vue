<template>
  <div class="main-wrapper">
  <Nav :user=user></Nav>
  <div>
            <!-- main content -->
            <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            
                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb-4 font-xxl fw-700 mont-font mb-lg-5 mb-4 font-md-xs">Settings</h4>
                                        <div class="nav-caption fw-600 font-xssss text-grey-500 mb-2">Genaral</div>
                                        <ul class="list-inline mb-4">
                                            <li class="list-inline-item d-block border-bottom me-0"><Link href="/account" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-primary-gradiant text-white feather-home font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Acount Information</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></Link></li>
                                            <li class="list-inline-item d-block me-0"><Link href="/social" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-red-gradiant text-white feather-twitter font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Social Acount</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></Link></li>
                                        </ul>

                                        <div class="nav-caption fw-600 font-xsss text-grey-500 mb-2">Acount</div>
                                        <ul class="list-inline mb-4">
                                            <li class="list-inline-item d-block  me-0"><Link href="/social/changepassword" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-blue-gradiant text-white feather-inbox font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Password</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></Link></li>
                                            
                                        </ul>

                                        <div class="nav-caption fw-600 font-xsss text-grey-500 mb-2">Other</div>
                                        <ul class="list-inline">
                                            <li class="list-inline-item d-block border-bottom me-0"><Link href="/notification" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-gold-gradiant text-white feather-bell font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Notification</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></Link></li>
                                            <li class="list-inline-item d-block border-bottom me-0"><Link :href="'/user/profile/'+$page.props.data_user.id" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-primary-gradiant text-white feather-help-circle font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">My Posts</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></Link></li>
                                            <li class="list-inline-item d-block border-bottom me-0"><Link :href="'/user/story/'+$page.props.data_user.id" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-primary-gradiant text-white feather-help-circle font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">My Stories</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></Link></li>
                                            <li class="list-inline-item d-block me-0"><Link method="post" href="/logout" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-red-gradiant text-white feather-lock font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Logout</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></Link></li>
                                            
                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                        
                    </div>
                </div>
                 
            </div>            
        </div>
        <!-- main content -->
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
    props:{user_list:Object},
components:{ Nav, Footer, Chat },
}
</script>

<style>

</style>