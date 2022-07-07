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
<body ng-app="App" class="login">
    <div ng-controller="LoginController" class="container px-sm-10">
        <div class="grid columns-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="g-col-2 g-col-xl-1 d-none d-xl-flex flex-column min-vh-screen">
                <a href="" class="-intro-x d-flex align-items-center pt-5">
                    <img alt="Rubick Bootstrap HTML Admin Template" class="w-6" src="/assets/admin/dist/images/logo.svg">
                    <span class="text-white fs-lg ms-3"> Ru<span class="fw-medium">bick</span> </span>
                </a>
                <div class="my-auto">
                    <img alt="Rubick Bootstrap HTML Admin Template" class="-intro-x w-1/2 mt-n16" src="/assets/admin/dist/images/illustration.svg">
                    <div class="-intro-x text-white fw-medium fs-4xl lh-base mt-10">
                        Đăng nhập vào hệ thống
                        <br>
                        để trải nghiệm
                    </div>
                    <div class="-intro-x mt-5 fs-lg text-white text-opacity-70 dark-text-gray-500">
                        Quản lý hệ thống e-commerce của bạn
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="g-col-2 g-col-xl-1 h-screen h-xl-auto d-flex py-5 py-xl-0 my-10 my-xl-0">
                <div class="my-auto mx-auto ms-xl-20 bg-white dark-bg-dark-1 bg-xl-transparent px-5 px-sm-8 py-8 p-xl-0 rounded-2 shadow-md shadow-xl-none w-full w-sm-3/4 w-lg-2/4 w-xl-auto">
                    <h2 class="intro-x fw-bold fs-2xl fs-xl-3xl text-center text-xl-start">
                        Chào mừng bạn đến với Zeus Studio
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 d-xl-none text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                    <div class="intro-x mt-8">
                        <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block"
                        placeholder="Tên đăng nhập" 
                        ng-model="users.username">
                        <input type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4"
                        placeholder="Mật khẩu" 
                        ng-model="users.password">
                    </div>
                    <div class="intro-x d-flex text-gray-700 dark-text-gray-600 fs-xs fs-sm-sm mt-4">
                        <!-- <div class="d-flex align-items-center me-auto">
                            <input id="remember-me" type="checkbox" class="form-check-input border me-2">
                            <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                        </div> -->
                        <!-- <a href="">Forgot Password?</a>  -->
                    </div>
                    <div class="intro-x mt-5 mt-xl-8 text-center text-xl-start">
                        <button class="btn btn-primary py-3 px-4 w-full w-xl-32 me-xl-3 align-top"
                        ng-click="login()">
                            Đăng nhập
                        </button>
                        <!-- <button class="btn btn-outline-secondary py-3 px-4 w-full w-xl-32 mt-3 mt-xl-0 align-top">Sign up</button> -->
                    </div>
                    <div class="intro-x mt-10 mt-xl-24 text-gray-700 dark-text-gray-600 text-center text-xl-start">
                        Vui lòng đăng nhập vào <a class="text-theme-1 dark-text-theme-10" href="/admin/login">tài khoản của bạn</a> để sử dụng !
                        <br>
                        <!-- <a class="text-theme-1 dark-text-theme-10" href="">Terms and Conditions</a> & <a class="text-theme-1 dark-text-theme-10" href="">Privacy Policy</a>  -->
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

    <div style="z-index: 99999" class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastErr" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <!-- <div class="toast-header">
            <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#d32929"></rect></svg>
            <strong class="me-auto"></strong>
            <small></small>
            </div> -->
            <div class="toast-body" style="background: #d32929; color: #fff; font-weight: bold">
            <div class="d-flex align-items-center" style="justify-content: space-between;">
                Thất bại! Thông tin đăng nhập chưa chính xác.
                
                <button style="background: none; color: #fff;" type="button" class="btn-close d-flex justify-content-between align-items-center fw-bold" data-bs-dismiss="toast"
                aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" 
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" 
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x d-block mx-auto"><line x1="18" y1="6" x2="6" y2="18"
                ></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            </div>
        </div>
        </div>
        
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
    <script src="/assets/admin/dist/js/angular-datetime.js"></script>
    <script src="/assets/admin/dist/js/main.js"></script>
    <script src="/assets/admin/dist/controllers/AppController.js"></script>
    <script src="/assets/admin/dist/controllers/LoginController.js"></script>
    <!-- END: JS Assets-->
</body>
</html>