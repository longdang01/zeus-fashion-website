<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header" style="min-height: 50px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <!-- <div class="lng_dropdown mr-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="/assets/client/dist/images/vn.png"
                                data-title="Việt Nam">Việt Nam</option>
                                <option value='en' data-image="/assets/client/dist/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="/assets/client/dist/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="/assets/client/dist/images/us.png" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="mr-3">
                            <select name="countries" class="custome_select">
                                <option value='VND' data-title="VND">VND</option>
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div> -->
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>098-382-2912</span></li>
                            <li><i class="ti-email"></i><span>zeus-studio@gmail.com</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list" ng-controller="CustomerController">
                            <!-- <li><a href="compare.html"><i class="ti-control-shuffle"></i><span>Compare</span></a></li> -->
                            <!-- <li><a href="wishlist.html"><i class="ti-heart"></i><span>Wishlist</span></a></li> -->
                            <!-- <li><a href="login.html"><i class="ti-location-pin"></i><span>Địa chỉ cửa hàng</span></a></li> -->
                            <li>
                                <a href="login.html">
                                    <i class="ti-control-shuffle"></i>
                                    <span>So sánh</span>
                                </a>
                            </li>
                            <li>
                                <a href="login.html">
                                    <i class="ti-heart"></i>
                                    <span>Yêu thích</span>
                                </a>
                            </li>
                            <li ng-if="status == 0"><a href="/login"><i class="ti-power-off"></i><span>Đăng nhập</span></a></li>
                            <li ng-if="status == 0"><a href="/register"><i class="fa-regular fa-address-card"></i><span>Đăng ký</span></a></li>
                            <li ng-if="status == 1"><a href="javascript:;" ng-click="logOut()"><i class="ti-power-off"></i><span>Đăng xuất</span></a></li>
                            <li ng-if="status == 1">
                                <i style="color: var(--primary-color)" class="fa-solid fa-hand-sparkles"></i>
                                <span>Hi, @{{ customer.customer_name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase" style="height: 70px;">
        <div class="container h-100">
            <nav class="navbar navbar-expand-lg h-100"> 
                <a class="navbar-brand" href="index.html">
                    <h3>Zeus<span>.</span></h3>
                    <!-- <img class="logo_light" src="/assets/client/dist/images/logo_light.png" alt="logo" />
                    <img class="logo_dark" src="/assets/client/dist/images/logo_dark.png" alt="logo" /> -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item active" 
                        href="contact.html">Trang chủ</a></li> 
                        <li class="dropdown dropdown-mega-menu" ng-controller="CategoryController">
                            <a class="dropdown-toggle nav-link" href="#"
                            data-toggle="dropdown">Danh mục</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
                                    <li class="mega-menu-col col-lg-9">
                                        <ul class="d-lg-flex">
                                            <li ng-repeat="category in categories" class="mega-menu-col col-lg-4">
                                                <ul> 
                                                    <li class="dropdown-header">@{{ category.category_name }}</li>
                                                    <li><a class="dropdown-item nav-link nav_item"
                                                    href="/products?category=@{{ category.id }}&name=@{{ category.category_name | UrlFriendly }}">
                                                    Tất cả @{{ category.category_name }}</a></li>
                                                    <li ng-repeat="subCategory in category.sub_categories"><a class="dropdown-item nav-link nav_item" 
                                                    href="/products?subCategory=@{{subCategory.id}}&name=@{{subCategory.sub_category_name | UrlFriendly }}"
                                                    >@{{ subCategory.sub_category_name }}</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <div class="header_banner">
                                            <div class="header_banner_content">
                                                <div class="shop_banner">
                                                    <div class="banner_img overlay_bg_40">
                                                        <img src="/assets/client/dist/images/shop_banner.jpg" alt="shop_banner"/>
                                                    </div> 
                                                    <div class="shop_bn_content">
                                                        <h5 class="text-uppercase shop_subtitle">Zeus studio</h5>
                                                        <!-- <h3 class="text-uppercase shop_title">Khám phá ngay</h3> -->
                                                        <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="nav-link nav_item" href="contact.html">Cửa hàng</a></li> 
                        <li><a class="nav-link nav_item" href="contact.html">Tin tức</a></li> 
                        <li><a class="nav-link nav_item" href="contact.html">Về chúng tôi</a></li> 
                        <li><a class="nav-link nav_item" href="contact.html">Liên hệ</a></li> 
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form id="formSearch">
                                <input type="text" placeholder="Tìm kiếm" class="form-control" 
                                id="search_input" name="search_input"
                                ng-model="keyword">
                                <a href="/products?keyword=@{{keyword | UrlFriendly }}"
                                class="search_icon"><i class="ion-ios-search-strong"></i></a>
                            </form>
                        </div><div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="/assets/client/dist/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                                    <!-- <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span> -->
                                </li>
                                
                            </ul>
                            <div class="cart_footer">
                                <!-- <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p> -->
                                <p class="cart_buttons">
                                    <a href="#" class="btn btn-fill-out rounded-5 view-cart">Xem giỏ hàng</a>
                                    <!-- <a href="#" class="btn btn-fill-out rounded-0 checkout">Checkout</a> -->
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="nav-link pr-0">
                            <i class="ti-user"></i>
                        </a>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </div>
    <div class="top-header" style="border: 0; min-height: 50px; background: var(--black-color)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <!-- <div class="lng_dropdown mr-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="/assets/client/dist/images/vn.png"
                                data-title="Việt Nam">Việt Nam</option>
                                <option value='en' data-image="/assets/client/dist/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="/assets/client/dist/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="/assets/client/dist/images/us.png" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="mr-3">
                            <select name="countries" class="custome_select">
                                <option value='VND' data-title="VND">VND</option>
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div> -->
                        <ul class="contact_detail text-center text-lg-left">
                            <li style="color: #fff; font-weight: bold"><i class="ti-light-bulb"></i><span>NEW! - Collection Summer Beach Zeus Studio 2023</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list">
                            <li>
                            <a href="login.html" class="header_list-social">
                            <i class="ti-facebook"></i></a>
                            </li>

                            <li>
                            <a href="login.html" class="header_list-social">
                            <i class="ti-instagram"></i></a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>