<!DOCTYPE html>
<!--
Template Name: Rubick - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light theme-1">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="/assets/admin/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rubick admin is super flexible, powerful, clean & modern responsive bootstrap admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Zeus - Trang Quản Trị</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/admin/dist/css/app.css" />
    <link rel="stylesheet" href="/assets/admin/dist/css/reset.css" />
    <link rel="stylesheet" href="/assets/admin/dist/css/style.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="main" ng-app="App">
    <!-- BEGIN: Mobile Menu -->
    @include('admin.components._mobile')
    <!-- END: Mobile Menu -->
    <div class="d-flex">
        <!-- BEGIN: Side Menu -->
        @include('admin.components._sidebar')
        <!-- END: Side Menu -->

        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            @include('admin.components._topbar')
            <!-- END: Top Bar -->

            <div class="main">
                @yield('content')
            </div>
            
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <!-- @include('admin.components._switcher') -->
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: Toast -->
    @include('admin.components._toast')
    <!-- END: Dark Mode Switcher-->
    
    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG7gNHAhDzgYmq4-EHvM4bqW1DNj2UCuk&libraries=places"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="http://cdn.ckeditor.com/4.5.11/full-all/plugins/divarea/plugin.js"></script>
    <script src="/assets/admin/dist/js/app.js"></script>
    <script src="/assets/admin/dist/js/angular.min.js"></script>
    <script src="/assets/admin/dist/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/admin/dist/js/dirPagination.js"></script>
    <script src="/assets/admin/dist/js/angular-ckeditor.js"></script>
    <script src="/assets/admin/dist/js/main.js"></script>
    <script src="/assets/admin/dist/controllers/AppController.js"></script>
    <script src="/assets/admin/dist/controllers/ProductController.js"></script>
    <!-- END: JS Assets-->
</body>
</html>