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
                        <h3>Users</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Register Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item,index) in user_data.data" :key="index">
                                <td>
                                    <img :src="'http://127.0.0.1:8000/storage/'+item.image">
                                    <p>{{ item.name }}</p>
                                </td>
                                <td>{{ item.date }}</td>
                                <td><Link v-if="permission" method="post" :href="'/admin/deleteuser/'+item.id"><span class="status completed">Delete</span></Link></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Reminders -->
                <div class="reminders">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Remiders</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Start Our Meeting</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Analyse Our Site</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <div class="task-title">
                                <i class='bx bx-x-circle'></i>
                                <p>Play Footbal</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
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
  props:{user_data:Object,permission:Boolean},
components:{Nav},
data:()=>({
  search:"",
}),
watch:{
  search:debounce(function(val){
    this.$inertia.get("/admin/userlist",{'search':val},{preserveState:true,replace:true});
  },1000)
}
}
</script>

<style>

</style>