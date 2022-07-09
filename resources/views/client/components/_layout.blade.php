<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>Zeus - Thời trang đi đầu xu hướng</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/client/dist/images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="/assets/client/dist/css/animate.css">	
    <!-- Glight box -->
    <link rel="stylesheet" href="/assets/client/dist/css/glightbox.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="/assets/client/dist/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
    <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/assets/client/dist/css/all.min.css">
    <link rel="stylesheet" href="/assets/client/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/client/dist/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/client/dist/css/linearicons.css">
    <link rel="stylesheet" href="/assets/client/dist/css/flaticon.css">
    <link rel="stylesheet" href="/assets/client/dist/css/simple-line-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="/assets/client/dist/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/client/dist/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="/assets/client/dist/owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="/assets/client/dist/css/magnific-popup.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="/assets/client/dist/css/slick.css">
    <link rel="stylesheet" href="/assets/client/dist/css/slick-theme.css">
    
    <!-- Style CSS -->
    <!-- <link rel="stylesheet" href="/assets/client/dist/css/suruchi.min.css"> -->
    <link rel="stylesheet" href="/assets/client/dist/css/style.css">
    <link rel="stylesheet" href="/assets/client/dist/css/responsive.css">
    <link rel="stylesheet" href="/assets/client/dist/css/reset.css">

    <!-- Hotjar Tracking Code for bestwebcreator.com -->
    <!-- <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2073024,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script> -->

</head>

<body ng-app="App" ng-controller="AppController">

    <!-- LOADER -->
    @include('client.components._preloader')
    <!-- END LOADER -->

    <!-- Home Popup Section -->
    <!-- @include('client.components._popup') -->
    <!-- End Screen Load Popup Section --> 

    <!-- START HEADER -->
    @include('client.components._header')
    <!-- END HEADER -->

    <div>
        @yield('content')
    </div>

    <!-- START FOOTER -->
    @include('client.components._footer')
    <!-- END FOOTER -->

    <!-- START QUICK VIEW -->
    @include('client.components._quickview')
    <!-- END QUICK VIEW -->

    <!-- BEGIN: Toast -->
    @include('client.components._toast')
    <!-- END: Dark Mode Switcher-->

    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 


    <!-- Latest jQuery --> 
    <script src="/assets/client/dist/js/jquery-3.6.0.min.js"></script> 
    <!-- migrate -->
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    <!-- ui -->
    <script src="/assets/client/dist/js/jquery-ui.min.js"></script>
    <!-- popper min js -->
    <script src="/assets/client/dist/js/popper.min.js"></script>
    <!-- Latest compiled and minified Bootstrap --> 
    <script src="/assets/client/dist/bootstrap/js/bootstrap.min.js"></script> 
    <!-- owl-carousel min js  --> 
    <script src="/assets/client/dist/owlcarousel/js/owl.carousel.min.js"></script> 
    <!-- magnific-popup min js  --> 
    <script src="/assets/client/dist/js/magnific-popup.min.js"></script> 
    <!-- waypoints min js  --> 
    <script src="/assets/client/dist/js/waypoints.min.js"></script> 
    <!-- parallax js  --> 
    <script src="/assets/client/dist/js/parallax.js"></script> 
    <!-- countdown js  --> 
    <script src="/assets/client/dist/js/jquery.countdown.min.js"></script> 
    <!-- imagesloaded js --> 
    <script src="/assets/client/dist/js/imagesloaded.pkgd.min.js"></script>
    <!-- isotope min js --> 
    <script src="/assets/client/dist/js/isotope.min.js"></script>
    <!-- jquery.dd.min js -->
    <script src="/assets/client/dist/js/jquery.dd.min.js"></script>
    <!-- slick js -->
    <script src="/assets/client/dist/js/slick.min.js"></script>
    <!-- elevatezoom js -->
    <script src="/assets/client/dist/js/jquery.elevatezoom.js"></script>
    <!-- Glight box -->
    <script src="/assets/client/dist/js/glightbox.min.js"></script>
    <!-- scripts js --> 
    <!-- <script src="/assets/client/dist/js/suruchi.min.js"></script> -->
    <script src="/assets/client/dist/js/scripts.js"></script>
    
    <script src="/assets/client/dist/js/angular.min.js"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-sanitize.js"></script>
    <script src="/assets/client/dist/js/dirPagination.js"></script> 
    <script src="/assets/client/dist/controllers/AppController.js"></script>
    <script src="/assets/client/dist/controllers/CategoryController.js"></script>
    <script src="/assets/client/dist/controllers/ProductController.js"></script>
    <script src="/assets/client/dist/controllers/DetailController.js"></script>
    <script src="/assets/client/dist/controllers/CustomerController.js"></script>
    <script src="/assets/client/dist/controllers/CartController.js"></script>

</body>
</html>