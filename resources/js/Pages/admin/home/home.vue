<template>
  <div>
<Nav></Nav>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <Link href="" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </Link>
            <Link href="/admin/detail" class="profile">
                <img :src="'http://127.0.0.1:8000/storage/'+current_img">
            </Link>
        </nav>

        <!-- End of Navbar -->

        <main>
            <ul>
                <li v-for="(item,index) in messages" :key="index">{{ item }}</li>
            </ul>

            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Shop</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            {{ post_count }}
                        </h3>
                        <p>Posts</p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                           {{  user_data.total }}
                        </h3>
                        <p>Registered Users</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p>Searches</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->
<!-- user list  -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>New Users</h2>
                <div class="user-list">
                    <div v-for="(user,index) in user_data.data" :key="index" class="user">
                        <img :src="'http://127.0.0.1:8000/storage/'+user.image">
                        <h2>{{ user.name }}</h2>
                        <p>54 Min Ago</p>
                    </div>
                </div>
            </div>

            <!-- End of New Users Section -->
<!-- end of use list -->
    

        </main>

    </div>
  <Link href="/admin/logout" method="post">loguot</Link>
</div>
</template>

<script>
import Nav from '../layout/Nav.vue';
export default{
    props:{user_data:Object,current_img:File,post_count:Number},
    components:{Nav},
    setup()
    {
        Pusher.logToConsole = true;

var pusher = new Pusher('f0596644e7ba401ce10c', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('social-channel');
channel.bind('social-event', function(data) {
    JSAlert.alert("A new user :" + JSON.stringify(data.name)+"has joined our website.");

});

    }

}


</script>



<style>

</style>