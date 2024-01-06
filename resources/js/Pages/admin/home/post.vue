<template>

  <Nav></Nav>
  <div class="content">
    <main>
  <nav>
    <form @submit.prevent="submit" action="#">
                  <div class="form-input">
                      <input v-model="search" type="search" placeholder="Search...">
                      <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                  </div>
              </form>
  </nav>
    <div class="bottom-data">
                  <div class="orders">
                      <div class="header">
                          <i class='bx bx-receipt'></i>
                          <h3>Post</h3>
                          <i class='bx bx-filter'></i>
                          <i class='bx bx-search'></i>
                      </div>
                      <table>
                          <thead>
                              <tr>
                                  <th>User</th>
                                  <th>Likes</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(item,index) in post.data" :key="index">
                                <td class="">
                                    <img class="" :src="'http://127.0.0.1:8000/storage/'+item.image">
                                    <p>{{ item.user_name }}</p>
                                    <p>{{ item.description }}</p>
                                </td>
                                <td>{{ item.like_count }}</td>               
                                <td v-if="permission"><button class="btn btn-danger"><Link :href="'/admin/posts/delete/'+item.id">Delete</Link></button></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
  

  
                  <!-- End of Reminders-->
  
              </div>
            </main>
            </div>
  </template>
  
  <script>
  
  import Nav from "../layout/Nav.vue"
  import debounce from "lodash/debounce"
  export default {
    props:{post:Object,permission:Boolean},
  components:{Nav},
  data:()=>({
    search:"",
  }),
  watch:{
    search:function(val){
      this.$inertia.get("/admin/posts",{'search':val},{preserveState:true,replace:true});
    }
  }

  }
  </script>
  
  <style>
  
  </style>