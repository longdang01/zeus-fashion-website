@extends('client.components._layout')
@section('content')


<div ng-controller="ProductController">
    <input type="text" hidden id="categoryID" value="{{ request()->category }}">
    <input type="text" hidden id="subCategoryID" value="{{ request()->subCategory }}">
    <input type="text" hidden id="keyword" value="{{ request()->keyword }}">

    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Cửa hàng</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cửa hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>

    <div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        
                                        <select class="form-control form-control-sm"
                                        name="sort" ng-change="sortBy()" ng-model="valueSort">
                                            <option value="" selected>Mặc định</option>
                                            <option value="price.price|Ascending">Giá tăng dần</option>
                                            <option value="price.price|Descending">Giá giảm dần</option>    
                                        <!-- <option value="order">Mặc định</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <!-- <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a> -->
                                        <!-- <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a> -->
                                    </div>
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm first_null not_chosen"
                                        ng-model="pageSize" ng-init="pageSize='9'">
                                            <option value="9" selected>9</option>
                                            <option value="15">15</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row shop_container">
                        <div 
                        dir-paginate="product in products |
                        orderBy:sortColumn:reverse |
                        itemsPerPage:pageSize"
                        current-page="currentPage"
                        class="col-md-4 col-6">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img class="product__img-item" ng-src="/uploads/products/@{{ product.id }}/@{{ product.colors[0].images[0].picture }}" alt="product_img1">
                                        <img style="display: none" class="product__img-hover" src="" alt="product_img2">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i></a></li>
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
                                        <a href="shop-product-detail.html" title="@{{ product.product_name }}">
                                            @{{ product.product_name }}
                                        </a>
                                    </h6>
                                    <div class="product_price">
                                        <span ng-if="!product.colors[0].sale" class="price">@{{ product.colors[0].price.price - product.colors[0].sale.value | currency:"":0 }} VND</span>
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
                    <div class="row">
                        <div class="col-12">
                            <dir-pagination-controls 
                                max-size="9" 
                                direction-links="true"
                                boundary-links="true"
                                >
                            </dir-pagination-controls>
                            <!-- <ul class="pagination mt-3 justify-content-center pagination_style1">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Danh mục</h5>
                            <ul class="widget_categories">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <li>
                                                    <a class="" type="button"
                                                    data-toggle="collapse" data-target="#collapse0" aria-expanded="true"
                                                    aria-controls="collapse1"
                                                    href="javascript:;">
                                                        <span class="categories_name">Tất cả sản phẩm</span>
                                                        <span class="categories_num"><i class="ti-layout-line-solid"></i></span>
                                                    </a>

                                                </li>
                                            </h2>
                                        </div>

                                        <div id="collapse0" 
                                        class="collapse" 
                                        aria-labelledby="headingOne"
                                        data-parent="#accordionExample"
                                        ng-class="(category_id || 
                                        (category_id == '' && sub_category_id == '' && keyword == '')) ? 'show' : ''"
                                        >
                                            <div class="card-body">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a 
                                                        href="/products"
                                                        class="nav-link nav-link-sub"
                                                        ng-class="(category_id == '' && sub_category_id == ''
                                                        && keyword == '') ? 'active' : ''"
                                                        >Tất cả</a>
                                                        <!-- data-toggle="tab" -->
                                                    </li>
                                                    <!-- ng-click="$event.preventDefault(); search($event);" -->
                                                    <li ng-repeat="category in categories" class="nav-item">
                                                        <a
                                                        href="/products?category=@{{ category.id }}&name=@{{ category.category_name | UrlFriendly }}"
                                                        class="nav-link nav-link-sub" 
                                                        ng-class="category_id == category.id ? 'active' : ''"
                                                        >Tất cả @{{ category.category_name | lowercase }}</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div ng-repeat="category in categories" class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <li>
                                                    <a class="" type="button"
                                                    data-toggle="collapse" data-target="#collapse@{{ category.id }}" aria-expanded="true"
                                                    aria-controls="collapse2" href="javascript:;">
                                                        <span class="categories_name">@{{ category.category_name }}</span>
                                                        <span class="categories_num"><i class="ti-layout-line-solid"></i></span>
                                                    </a>

                                                </li>
                                            </h2>
                                        </div>

                                        <div id="collapse@{{ category.id }}" 
                                        class="collapse"
                                        aria-labelledby="headingOne" data-parent="#accordionExample"
                                        ng-class="getClass(category, sub_category_id)">
                                            <div class="card-body">
                                                <ul class="nav navbar-nav">
                                                    <li ng-repeat="subCategory in category.sub_categories" class="nav-item">
                                                        <a 
                                                        href="/products?subCategory=@{{subCategory.id}}&name=@{{subCategory.sub_category_name | UrlFriendly }}"
                                                        class="nav-link nav-link-sub"
                                                        data-toggle="tab" 
                                                        ng-class="sub_category_id == subCategory.id ? 'active' : ''"
                                                        >@{{ subCategory.sub_category_name }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <!-- <div class="widget">
                            <h5 class="widget_title">Filter</h5>
                            <div class="filter_price">
                                <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 10%; width: 50%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 10%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span></div>
                                <div class="price_range">
                                    <span>Price: <span id="flt_price">$50 - $300</span></span>
                                    <input type="hidden" id="price_first">
                                    <input type="hidden" id="price_second">
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Brand</h5>	
                            <ul class="list_brand">
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="">
                                        <label class="form-check-label" for="Arrivals"><span>New Arrivals</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Lighting" value="">
                                        <label class="form-check-label" for="Lighting"><span>Lighting</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Tables" value="">
                                        <label class="form-check-label" for="Tables"><span>Tables</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Chairs" value="">
                                        <label class="form-check-label" for="Chairs"><span>Chairs</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Accessories" value="">
                                        <label class="form-check-label" for="Accessories"><span>Accessories</span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Size</h5>
                            <div class="product_size_switch">
                                <span>xs</span>
                                <span>s</span>
                                <span>m</span>
                                <span>l</span>
                                <span>xl</span>
                                <span>2xl</span>
                                <span>3xl</span>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Color</h5>
                            <div class="product_color_switch">
                                <span data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
                                <span data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                                <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span>
                                <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
                                <span data-color="#B5B6BB" style="background-color: rgb(181, 182, 187);"></span>
                                <span data-color="#B9C2DF" style="background-color: rgb(185, 194, 223);"></span>
                                <span data-color="#5FB7D4" style="background-color: rgb(95, 183, 212);"></span>
                                <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
                            </div>
                        </div> -->
                        <div class="widget">
                            <div class="shop_banner">
                                <div class="banner_img overlay_bg_20">
                                    <img src="/assets/client/dist/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
                                </div> 
                                <div class="shop_bn_content2 text_white">
                                    <h5 class="text-uppercase shop_subtitle">Welcome to Zeus studio</h5>
                                    <!-- <h3 class="text-uppercase shop_title">Sale 30% Off</h3> -->
                                    <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->


</div>
</div>



@stop