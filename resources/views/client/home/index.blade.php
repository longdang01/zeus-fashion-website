@extends('client.components._layout')
@section('content')

<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg" data-img-src="/assets/client/dist/images/banner-1.jpg">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row" style="justify-content: center; text-align: center">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <h5 style="display: none" class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s"></h5>    
                                    <h5 class="mb-3 staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">
                                    Zeus studio</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft"
                                    data-animation-delay="1s">
                                        Create <span>your</span> own <span>style</span>
                                    </h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase"
                                    href="/products" 
                                    data-animation="slideInLeft"
                                    data-animation-delay="1.5s">Shop Now!</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            
            <div class="carousel-item background_bg" data-img-src="/assets/client/dist/images/banner-2.jpg">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row" style="justify-content: center; text-align: center">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <h5 style="display: none" class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s"></h5>    
                                    <h5 class="mb-3 staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">
                                    Zeus studio</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft"
                                    data-animation-delay="1s">
                                        Create <span>your</span> own <span>style</span>
                                    </h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft"
                                    data-animation-delay="1.5s">Shop Now!</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>

            <div class="carousel-item background_bg" data-img-src="/assets/client/dist/images/banner-3.jpg">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row" style="justify-content: center; text-align: center">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <h5 style="display: none" class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s"></h5>    
                                    <h5 class="mb-3 staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">
                                    Zeus studio</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft"
                                    data-animation-delay="1s">
                                        Create <span>your</span> own <span>style</span>
                                    </h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft"
                                    data-animation-delay="1.5s">Shop Now!</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">
    <!-- [Collection] -->
    <!-- <section class="collection">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" style="padding: 15px;">
                    <a href="#" class="collection__wrap box_shadow1">
                        <img src="/assets/client/dist/images/banner-2.jpg" class="collection__wrap-img">
                        <div class="overlay"></div>
                        <div class="collection__wrap-btn">
                            <button class="btn btn-collection">Top</button>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4" style="padding: 15px;">
                    <a href="#" class="collection__wrap box_shadow1">
                        <img src="/assets/client/dist/images/banner-1.jpg" class="collection__wrap-img">
                        <div class="overlay"></div>
                        <div class="collection__wrap-btn">
                            <button class="btn btn-collection">Pants</button>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4" style="padding: 15px;">
                    <a href="#" class="collection__wrap box_shadow1">
                        <img src="/assets/client/dist/images/banner-3.jpg" class="collection__wrap-img">
                        <div class="overlay"></div>
                        <div class="collection__wrap-btn">
                            <button class="btn btn-collection">Accessories & Shoes</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section> -->
    <!-- START SECTION BANNER -->
    <!-- <div class="section pb_20">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="single_banner">
                        <img src="/assets/client/dist/images/banner-1.jpg" alt="shop_banner_img1"/>
                        <div class="single_banner_info">
                            <h5 class="single_bn_title1">Super Sale</h5>
                            <h3 class="single_bn_title">New Collection</h3>
                            <a href="shop-left-sidebar.html" class="single_bn_link">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single_banner">
                        <img src="/assets/client/dist/images/shop_banner_img2.jpg" alt="shop_banner_img2"/>
                        <div class="single_banner_info">
                            <h3 class="single_bn_title">New Season</h3>
                            <h4 class="single_bn_title1">Sale 40% Off</h4>
                            <a href="shop-left-sidebar.html" class="single_bn_link">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END SECTION BANNER -->

    <!-- START SECTION SHOP -->
    <div class="section small_pt pb_70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center text-uppercase">
                        <h2>Danh Mục</h2>
                    </div>
                </div>
            </div>
            <div class="row" ng-controller="ProductController">
                <div class="col-12">
                    <div class="tab-style1">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-capitalize" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">
                                New Arrival</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" id="sellers-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">
                                Best Sellers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" id="special-tab" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">
                                Sale
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                            <div class="row shop_container">
                                <!-- <div class="col-lg-3 col-md-4 col-6">
                                    <div class="product">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="/assets/client/dist/images/product_img1.jpg" alt="product_img1">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
                                            <div class="product_price">
                                                <span class="price">$45.00</span>
                                                <del>$55.25</del>
                                                <div class="on_sale">
                                                    <span>35% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                            <div class="pr_switch_wrap">
                                                <div class="product_color_switch">
                                                    <span class="active" data-color="#87554B"></span>
                                                    <span data-color="#333333"></span>
                                                    <span data-color="#DA323F"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div ng-repeat="product in productsNew" 
                                class="col-lg-3 col-md-4 col-6">
                                    <div class="product">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img class="product__img-item" ng-src="/uploads/products/@{{ product.id }}/@{{ product.colors[0].images[0].picture }}" alt="product_img1">
                                                <img style="display: none" class="product__img-hover" src="" alt="product_img2">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"
                                                    ng-click="addCart(product)"><i class="icon-basket-loaded"></i></a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="javascript:;" class="popup-ajax"
                                                    ng-click="goDetail(product.id, 1)"
                                                    ><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title">
                                                <a href="/details?name=@{{ product.product_name | UrlFriendly }}&id=@{{ product.id }}"
                                                ng-click="goDetail(product.id, 0)"
                                                title="@{{ product.product_name }}">
                                                    @{{ product.product_name }}
                                                </a>
                                            </h6>
                                            <div class="product_price">
                                                <span ng-if="!product.colors[0].sale" class="price">@{{ product.colors[0].price.price | currency:"":0 }} VND</span>
                                                <span ng-if="product.colors[0].sale.symbol=='K'"
                                                class="price">@{{ product.colors[0].price.price - product.colors[0].sale.value | currency:"":0 }} VND</span>
                                                <span ng-if="product.colors[0].sale.symbol=='%'"
                                                class="price">@{{ product.colors[0].price.price * ((100 - product.colors[0].sale.value)/100) | currency:"":0 }} VND</span>
                                                <del ng-if="product.colors[0].sale">@{{ product.colors[0].price.price | currency:"":0 }} VND</del>
                                                <div ng-if="product.colors[0].sale" class="on_sale">
                                                    <span>@{{ product.colors[0].sale.value }}@{{ product.colors[0].sale.symbol }} Giảm</span>
                                                </div>
                                            </div>
                                            <!-- <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div> -->
                                            <div class="pr_switch_wrap">
                                                
                                                <div class="product_color_switch">
                                                    <!-- <span class="active" data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span> -->
                                                    <span 
                                                    ng-repeat="color in product.colors"
                                                    data-color="@{{color.hex}}"
                                                    ng-style="{ 'background-color': color.hex };"
                                                    ng-mouseover="hoverInColor($event, color)" ng-mouseleave="hoverOutColor($event, color)"
                                                    ></span>
                                                    <!-- <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span> -->
                                                </div>
                                            </div>
                                            <div class="list_product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                            <div class="row shop_container">
                                <div ng-repeat="product in productsBestSeller" 
                                class="col-lg-3 col-md-4 col-6">
                                    <div class="product">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img class="product__img-item" ng-src="/uploads/products/@{{ product.id }}/@{{ product.colors[0].images[0].picture }}" alt="product_img1">
                                                <img style="display: none" class="product__img-hover" src="" alt="product_img2">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"
                                                    ng-click="addCart(product)"><i class="icon-basket-loaded"></i></a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="javascript:;" class="popup-ajax"
                                                    ng-click="goDetail(product.id, 1)"
                                                    ><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title">
                                                <a href="/details?name=@{{ product.product_name | UrlFriendly }}&id=@{{ product.id }}"
                                                ng-click="goDetail(product.id, 0)"
                                                title="@{{ product.product_name }}">
                                                    @{{ product.product_name }}
                                                </a>
                                            </h6>
                                            <div class="product_price">
                                                <span ng-if="!product.colors[0].sale" class="price">@{{ product.colors[0].price.price | currency:"":0 }} VND</span>
                                                <span ng-if="product.colors[0].sale.symbol=='K'"
                                                class="price">@{{ product.colors[0].price.price - product.colors[0].sale.value | currency:"":0 }} VND</span>
                                                <span ng-if="product.colors[0].sale.symbol=='%'"
                                                class="price">@{{ product.colors[0].price.price * ((100 - product.colors[0].sale.value)/100) | currency:"":0 }} VND</span>
                                                <del ng-if="product.colors[0].sale">@{{ product.colors[0].price.price | currency:"":0 }} VND</del>
                                                <div ng-if="product.colors[0].sale" class="on_sale">
                                                    <span>@{{ product.colors[0].sale.value }}@{{ product.colors[0].sale.symbol }} Giảm</span>
                                                </div>
                                            </div>
                                            <!-- <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div> -->
                                            <div class="pr_switch_wrap">
                                                
                                                <div class="product_color_switch">
                                                    <!-- <span class="active" data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span> -->
                                                    <span 
                                                    ng-repeat="color in product.colors"
                                                    data-color="@{{color.hex}}"
                                                    ng-style="{ 'background-color': color.hex };"
                                                    ng-mouseover="hoverInColor($event, color)" ng-mouseleave="hoverOutColor($event, color)"
                                                    ></span>
                                                    <!-- <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span> -->
                                                </div>
                                            </div>
                                            <div class="list_product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="special" role="tabpanel" aria-labelledby="special-tab">
                            <div class="row shop_container">
                                <div ng-repeat="product in productsSale" 
                                class="col-lg-3 col-md-4 col-6">
                                    <div class="product">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img class="product__img-item" ng-src="/uploads/products/@{{ product.id }}/@{{ product.colors[0].images[0].picture }}" alt="product_img1">
                                                <img style="display: none" class="product__img-hover" src="" alt="product_img2">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"
                                                    ng-click="addCart(product)"><i class="icon-basket-loaded"></i></a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="javascript:;" class="popup-ajax"
                                                    ng-click="goDetail(product.id, 1)"
                                                    ><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title">
                                                <a href="/details?name=@{{ product.product_name | UrlFriendly }}&id=@{{ product.id }}"
                                                ng-click="goDetail(product.id, 0)"
                                                title="@{{ product.product_name }}">
                                                    @{{ product.product_name }}
                                                </a>
                                            </h6>
                                            <div class="product_price">
                                                <span ng-if="!product.colors[0].sale" class="price">@{{ product.colors[0].price.price | currency:"":0 }} VND</span>
                                                <span ng-if="product.colors[0].sale.symbol=='K'"
                                                class="price">@{{ product.colors[0].price.price - product.colors[0].sale.value | currency:"":0 }} VND</span>
                                                <span ng-if="product.colors[0].sale.symbol=='%'"
                                                class="price">@{{ product.colors[0].price.price * ((100 - product.colors[0].sale.value)/100) | currency:"":0 }} VND</span>
                                                <del ng-if="product.colors[0].sale">@{{ product.colors[0].price.price | currency:"":0 }} VND</del>
                                                <div ng-if="product.colors[0].sale" class="on_sale">
                                                    <span>@{{ product.colors[0].sale.value }}@{{ product.colors[0].sale.symbol }} Giảm</span>
                                                </div>
                                            </div>
                                            <!-- <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div> -->
                                            <div class="pr_switch_wrap">
                                                
                                                <div class="product_color_switch">
                                                    <!-- <span class="active" data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span> -->
                                                    <span 
                                                    ng-repeat="color in product.colors"
                                                    data-color="@{{color.hex}}"
                                                    ng-style="{ 'background-color': color.hex };"
                                                    ng-mouseover="hoverInColor($event, color)" ng-mouseleave="hoverOutColor($event, color)"
                                                    ></span>
                                                    <!-- <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span> -->
                                                </div>
                                            </div>
                                            <div class="list_product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SINGLE BANNER --> 
    <div class="section bg_light_blue2 pb-0 pt-md-0">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-6 offset-md-1">
                    <div class="medium_divider d-none d-md-block clearfix"></div>
                    <div class="trand_banner_text text-center text-md-left">
                        <div class="heading_s1 mb-3">
                            <h5 style="font-weight: bold; font-style: italic; margin-bottom: 1rem">
                            zeus studio</h5>
                            <h2 class="heading__about-us" style="margin-bottom: 1rem">Về chúng tôi</h2>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the text</p>
                        </div>
                        <a href="shop-left-sidebar.html"
                        class="btn btn-fill-out rounded-0 btn-about-us">Tìm hiểu</a>
                    </div>
                    <div class="medium_divider clearfix"></div>
                </div>
                <div class="col-md-5">
                    <a href="https://vimeo.com/115041822" class="glightbox" data-gallery="video">
                        <!-- <img src="small.jpg" alt="image" /> -->
                        <img src="/assets/client/dist/images/tranding_img.png" alt="image">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SINGLE BANNER --> 

    <!-- START SECTION SHOP -->
    <!-- <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="/assets/client/dist/images/product_img1.jpg" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
                                    <div class="product_price">
                                        <span class="price">$45.00</span>
                                        <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="/assets/client/dist/images/product_img2.jpg" alt="product_img2">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
                                    <div class="product_price">
                                        <span class="price">$55.00</span>
                                        <del>$95.00</del>
                                        <div class="on_sale">
                                            <span>25% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:68%"></div>
                                        </div>
                                        <span class="rating_num">(15)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#847764"></span>
                                            <span data-color="#0393B5"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <span class="pr_flash">New</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="/assets/client/dist/images/product_img3.jpg" alt="product_img3">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>
                                    <div class="product_price">
                                        <span class="price">$68.00</span>
                                        <del>$99.00</del>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#333333"></span>
                                            <span data-color="#7C502F"></span>
                                            <span data-color="#2F366C"></span>
                                            <span data-color="#874A3D"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="/assets/client/dist/images/product_img4.jpg" alt="product_img4">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>
                                    <div class="product_price">
                                        <span class="price">$69.00</span>
                                        <del>$89.00</del>
                                        <div class="on_sale">
                                            <span>20% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:70%"></div>
                                        </div>
                                        <span class="rating_num">(22)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#333333"></span>
                                            <span data-color="#A92534"></span>
                                            <span data-color="#B9C2DF"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="/assets/client/dist/images/product_img5.jpg" alt="product_img5">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>
                                    <div class="product_price">
                                        <span class="price">$45.00</span>
                                        <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#5FB7D4"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END SECTION SHOP -->

    <!-- START SECTION TESTIMONIAL -->
    <!-- <div class="section bg_redon">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2>Our Client Say!</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true" data-items='1'>
                        <div class="testimonial_box">
                            <div class="testimonial_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                            </div>
                            <div class="author_wrap">
                                <div class="author_img">
                                    <img src="/assets/client/dist/images/user_img1.jpg" alt="user_img1" />
                                </div>
                                <div class="author_name">
                                    <h6>Lissa Castro</h6>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_box">
                            <div class="testimonial_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                            </div>
                            <div class="author_wrap">
                                <div class="author_img">
                                    <img src="/assets/client/dist/images/user_img2.jpg" alt="user_img2" />
                                </div>
                                <div class="author_name">
                                    <h6>Alden Smith</h6>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_box">
                            <div class="testimonial_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                            </div>
                            <div class="author_wrap">
                                <div class="author_img">
                                    <img src="/assets/client/dist/images/user_img3.jpg" alt="user_img3" />
                                </div>
                                <div class="author_name">
                                    <h6>Daisy Lana</h6>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_box">
                            <div class="testimonial_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                            </div>
                            <div class="author_wrap">
                                <div class="author_img">
                                    <img src="/assets/client/dist/images/user_img4.jpg" alt="user_img4" />
                                </div>
                                <div class="author_name">
                                    <h6>John Becker</h6>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END SECTION TESTIMONIAL -->

    <!-- START SECTION BLOG -->
    <div class="section small_pt pb_70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="heading_s1 text-center">
                        <h2>Tin tức</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post blog_style1 box_shadow1">
                        <div class="blog_img">
                            <a href="blog-single.html">
                                <img src="/assets/client/dist/images/furniture_blog_img1.jpg" alt="furniture_blog_img1">
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <div class="blog_text">
                                <h5 class="blog_title"><a href="blog-single.html">
                                    Zeus studio được thành lập như thế nào?
                                </a></h5>
                                <ul class="list_none blog_meta">
                                    <li><a href="#"><i class="ti-calendar"></i> 26/06/2023 </a></li>
                                    <!-- <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li> -->
                                </ul>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the text</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post blog_style1 box_shadow1">
                        <div class="blog_img">
                            <a href="blog-single.html">
                                <img src="/assets/client/dist/images/furniture_blog_img2.jpg" alt="furniture_blog_img2">
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <div class="blog_text">
                                <h5 class="blog_title"><a href="blog-single.html">2023! New Collection Of Summer Beach</a></h5>
                                <ul class="list_none blog_meta">
                                    <li><a href="#"><i class="ti-calendar"></i> 26/06/2023 </a></li>
                                    <!-- <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li> -->
                                </ul>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the text</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post blog_style1 box_shadow1">
                        <div class="blog_img">
                            <a href="blog-single.html">
                                <img src="/assets/client/dist/images/furniture_blog_img3.jpg" alt="furniture_blog_img3">
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <div class="blog_text">
                                <h5 class="blog_title"><a href="blog-single.html">Thời trang tại Zeus như thế nào?</a></h5>
                                <ul class="list_none blog_meta">
                                    <li><a href="#"><i class="ti-calendar"></i> 26/06/2023 </a></li>
                                    <!-- <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li> -->
                                </ul>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the text</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BLOG -->

    <!-- START SECTION SHOP INFO -->
    <div class="section pb-0 pt-md-0" style="padding-bottom: 120px !important">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading_s1 text-center">
                            <h2>Chính sách</h2>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters" style="margin-top: 25px">
                    <div class="col-lg-4">	
                        <div class="icon_box icon_box_style1">
                            <div class="icon">
                                <i class="flaticon-shipped"></i>
                            </div>
                            <div class="icon_box_content">
                                <h5>Miễn phí vận chuyển</h5>
                                <p>Miễn phí vận chuyển cho đơn hàng có giá trị từ 1,000,000 VND trở lên.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">	
                        <div class="icon_box icon_box_style1">
                            <div class="icon">
                                <i class="flaticon-money-back"></i>
                            </div>
                            <div class="icon_box_content">
                                <h5>Đổi & Trả hàng</h5>
                                <p>Được phép đổi & trả hàng trong vòng 15 ngày kể từ khi nhận hàng, chi tiết hơn xem ở phần 
                                    <a href="#" style="color: var(--primary-color)">chính sách</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">	
                        <div class="icon_box icon_box_style1">
                            <div class="icon">
                                <i class="flaticon-support"></i>
                            </div>
                            <div class="icon_box_content">
                                <h5>Hỗ trợ</h5>
                                <p>Tư vấn sản phẩm về kích cỡ, màu sắc, giá tận tình chu đáo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END SECTION SHOP INFO -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <!-- <div class="section bg_default small_pt small_pb">
        <div class="container">	
            <div class="row align-items-center">	
                <div class="col-md-6">
                    <div class="heading_s1 mb-md-0 heading_light">
                        <h3>Đăng ký email</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form>
                            <input type="text" required="" class="form-control rounded-0" placeholder="Email của bạn">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit" style="height: 50px;">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->


@stop