
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
<!-- <html lang="en" ng-app="App" ng-controller="AppController" ng-class="colorTheme"> -->
<html lang="en" class="light theme-1">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="http://rubick.left4code.com/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rubick admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta name="csrf_token" content="{{csrf_token()}}"> -->

    <title>Dashboard - Rubick - Tailwind HTML Admin Template</title>

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/assets/admin/dist/css/app.css" />
    <link rel="stylesheet" href="/assets/admin/dist/css/style.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body ng-app="App" class="py-5">
    
    <!-- BEGIN: Mobile Menu -->
    @include('admin.components._mobile')
    <!-- END: Mobile Menu -->
    <div class="flex">
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
    <!-- BEGIN: Switcher-->
    <!-- @include('admin.components._switcher') -->
    <!-- END: Switcher-->

    <!-- BEGIN: Modal -->
    @include('admin.components._modal')
    <!-- END: Top Bar -->

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
    <!-- END: JS Assets-->
    
    <!-- Child -->
    <script src="/assets/admin/dist/js/main.js"></script>
    <script src="/assets/admin/dist/controllers/AppController.js"></script>
    <script src="/assets/admin/dist/controllers/ProductController.js"></script>

</body>
</html>
