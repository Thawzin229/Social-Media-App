<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
<!-- Font Awesome -->

<script src="
https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css
" rel="stylesheet">
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css"
  rel="stylesheet"
/>

<link rel="stylesheet" href="{{ asset('user/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/feather.css') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/emoji.css') }}">
    
    <link rel="stylesheet" href="{{ asset('user/css/lightbox.css') }}">

    <!-- admin 1  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/1/style.css') }}">
    <!-- admin2  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('admin/2/style.css') }}">
    <!-- user profiile css  -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@1.9.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Styles -->
    <link href="{{ asset('userprofile/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userprofile/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('userprofile/css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('userprofile/css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('userprofile/css/media.css') }}" rel="stylesheet">
    <script src="{{ asset('userprofile/js/load.js') }}" type="text/javascript"></script>
    <!-- user profile css end -->
    @notifyCss
  </head>
  <body>

    @inertia

    <x-notify::notify />
        @notifyJs



<!-- userprofile js -->
<script src="{{ asset('userprofile/js/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('userprofile/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('userprofile/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Optional -->
    <script src="{{ asset('userprofile/js/app.js') }}"></script>
    <script src="{{ asset('userprofile/js/components/components.js') }}"></script>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- userprofile js end -->


<script src="https://unpkg.com/js-alert/dist/jsalert.min.js"></script>

<!-- templte -->
    <script src="{{ asset('user/js/plugin.js') }}"></script>
    <script src="{{ asset('user/js/lightbox.js') }}"></script>
    <script src="{{ asset('user/js/scripts.js') }}"></script>

    <!-- admin1 -->
<script src="{{ asset('admin/1/orders.js') }}"></script>
<script src="{{ asset('admin/1/index.js') }}"></script>
<!-- admin2 -->
<script src="{{ asset('admin/2/index.js') }}"></script>

  </body>
</html>