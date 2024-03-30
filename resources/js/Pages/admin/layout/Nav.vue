<template>
      <!-- Sidebar -->
      <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>Asmr</span>Prog</div>
        </a>
        <ul class="side-menu">
            <li><Link href="/admin/home"><i class='bx bxs-dashboard'></i>Dashboard</Link></li>
            <li><Link href="/admin/userlist"><i class='bx bx-group'></i>Users</Link></li>
            <li><Link href="/admin/posts"><i class='bx bx-group'></i>Posts</Link></li>
        </ul>
        <ul class="side-menu">
            <li>
                <Link method="post" href="/admin/logout" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </Link>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->
</template>

<script>
export default {

}
</script>

<style>

</style>