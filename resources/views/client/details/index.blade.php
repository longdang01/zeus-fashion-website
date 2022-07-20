@extends('client.components._layout')
@section('content')


<div class="" ng-controller="DetailController">
    <input type="text" hidden id="productID" value="{{ request()->id }}">
    <input type="text" hidden id="productName" value="{{ request()->name }}">

    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Chi tiết sản phẩm</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>

    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="quickview__wrap product__detail">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="product__quickview-information-slide">
                                <div class="quickview__gallery-thumbs">
                                    <div ng-repeat="image in selectedColor.images track by $index">
                                        <img ng-src="/uploads/products/@{{ selectedColor.product_id}}/@{{ image.picture }}" class="show" alt="">
                                    </div>
                                </div>
                                
                                <div class="quickview__gallery">
                                    <div ng-repeat="image in selectedColor.images track by $index">
                                        <img ng-src="/uploads/products/@{{ selectedColor.product_id}}/@{{ image.picture }}" class="show" alt="">
                                    </div>
                                </div>     
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="pr_detail">
                                <div class="product_description">
                                    <h4 class="product_title">
                                        <a href="#">@{{ product.product_name }}</a>
                                    </h4>
                                    <div class="product_price">
                                        <span ng-if="!selectedColor.sale" class="price">@{{ selectedColor.price.price - selectedColor.sale.value | currency:"":0 }} VND</span>
                                        <span ng-if="selectedColor.sale.symbol=='K'" class="price">@{{ selectedColor.price.price - selectedColor.sale.value | currency:"":0 }} VND</span>
                                        <span ng-if="selectedColor.sale.symbol=='%'" class="price">@{{ selectedColor.price.price * ((100 - selectedColor.sale.value)/100) | currency:"":0 }} VND</span>
                                        <del ng-if="selectedColor.sale">@{{ selectedColor.price.price | currency:"":0 }} VND</del>
                                        <div ng-if="selectedColor.sale" class="on_sale">
                                            <span>@{{ selectedColor.sale.value }}@{{ selectedColor.sale.symbol }} Giảm</span>
                                        </div>
                                    </div>
                                    <!-- <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div> -->
                                    <!-- <div class="pr_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                </div> -->
                                    <div class="product_sort_info">
                                        <ul>
                                            <li><i class="linearicons-shield-check"></i> Bảo hành trong 15 ngày nếu có lỗi, hư hỏng </li>
                                            <li><i class="linearicons-sync"></i> Hỗ trợ đổi kích cỡ khi sản phẩm còn nguyên vẹn </li>
                                            <li><i class="linearicons-bag-dollar"></i> Đơn giá hợp lý tương xứng với chất lượng </li>
                                        </ul>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <span class="switch_lable">Màu sắc</span>
                                        <div class="product_color_switch">
                                            <div class="d-flex align-items-center">
                                                <div class="dropdown quickview__option-select">
                                                    <button class="btn btn-choose dropdown-toggle" type="button" id="dropdownSelectColor" data-toggle="dropdown">
                                                        @{{ selectedColor.color_name }}
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li ng-repeat="color in product.colors track by $index">
                                                            <a ng-click="changeColor(color, $index)" ng-class="color.id == selectedColor.id ? 'selected' : ''" class="dropdown-item" href="javascript:;">
                                                                @{{ color.color_name }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div ng-style="{ 'background': selectedColor.hex }" class="quickview-options-choose ms-3"></div>
                                            </div>
                                            <!-- <span ng-repeat="color in product.colors"
                                        data-color="@{{ color.hex }}"
                                        ng-style="{ 'background-color': color.hex };"></span> -->
    
                                            <!-- <span class="active" data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
                                        <span data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                                        <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span> -->
                                        </div>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <span class="switch_lable">Kích cỡ</span>
                                        <div class="product_size_switch">
                                            <div class="d-flex align-items-center">
                                                <div class="dropdown quickview__option-select">
                                                    <button class="btn btn-choose dropdown-toggle" type="button" id="dropdownSelectSize" data-toggle="dropdown">
                                                        @{{ selectedSize.size_name }}
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li ng-repeat="size in selectedColor.sizes track by $index">
                                                            <a ng-click="changeSize(size, $index)" ng-class="size.id == selectedSize.id ? 'selected' : ''" class="dropdown-item" href="javascript:;">
                                                                @{{ size.size_name }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="quickview-options-choose ms-3">
                                                    @{{ selectedSize.size_name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="cart_extra">
                                    <div class="cart-product-quantity">
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus">
                                            <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                            <input type="button" value="+" class="plus">
                                        </div>
                                    </div>
                                    <div class="cart_btn">
                                        <button class="btn btn-fill-out btn-addtocart" type="button"
                                        ng-click="addCart(product)">
                                            <i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</button>
                                        <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                                    </div>
                                </div>
                                <hr>
                                <ul class="product-meta">
                                    <!-- <li>Code: <a href="#">@{{ product.product_code }}</a></li> -->
                                    <li>Tình trạng:
                                        <span ng-class="selectedSize.quantity > 0 ? 'available' : 'sold'">
                                            @{{ selectedSize.quantity > 0 ? 'Còn ' + selectedSize.quantity + ' sản phẩm' : 'Hết hàng' }}
                                        </span>
                                    </li>
                                    <!-- <li>Nguồn gốc: @{{ product.origin }}</li>
                                    <li>Chất liệu: @{{ product.material }}</li>
                                    <li>Phong cách: @{{ product.style }}</li> -->
                                    <!-- <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li> -->
                                </ul>
    
                                <!-- <div class="product_share">
                                <span>Share:</span>
                                <ul class="social_icons">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab"
                                    data-toggle="tab" href="#Description" role="tab"
                                     aria-controls="Description" aria-selected="true">
                                    Mô tả sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab"
                                    data-toggle="tab" href="#Additional-info" role="tab"
                                     aria-controls="Additional-info" aria-selected="false">
                                    Thông tin bổ sung</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab"
                                     aria-controls="Reviews" aria-selected="false">
                                    Bảng kích cỡ</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <div>
                                        <p ng-bind-html="product.description"> 
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Màu sắc</td>
                                                <td class="addition-info-color"><span ng-repeat="color in product.colors">@{{ color.color_name }}<span>, </span></span></td>
                                            </tr>
                                            <tr>
                                                <td>Nguồn gốc</td>
                                                <td>@{{ product.origin }}</td>
                                            </tr>
                                            <tr>
                                                <td>Chất liệu</td>
                                                <td>@{{ product.material }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phong cách</td>
                                                <td>@{{ product.style }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <div>
                                        <img 
                                        ng-src="/uploads/products/@{{ product.id }}/@{{ product.size_table }}"
                                        class="size-table-img"
                                        alt="">
                                    </div>
                                    <!-- <div class="comments">
                                        <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                        <ul class="list_none comment_list mt-4">
                                            <li>
                                                <div class="comment_img">
                                                    <img src="assets/images/user1.jpg" alt="user1">
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:80%"></div>
                                                        </div>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">Alea Brooks</span>
                                                        <span class="comment-date">March 5, 2018</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment_img">
                                                    <img src="assets/images/user2.jpg" alt="user2">
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:60%"></div>
                                                        </div>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">Grace Wong</span>
                                                        <span class="comment-date">June 17, 2018</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="review_form field_form">
                                        <h5>Add a review</h5>
                                        <form class="row mt-3">
                                            <div class="form-group col-12">
                                                <div class="star_rating">
                                                    <span data-value="1"><i class="far fa-star"></i></span>
                                                    <span data-value="2"><i class="far fa-star"></i></span>
                                                    <span data-value="3"><i class="far fa-star"></i></span>
                                                    <span data-value="4"><i class="far fa-star"></i></span>
                                                    <span data-value="5"><i class="far fa-star"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                                            </div>

                                            <div class="form-group col-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                            </div>
                                        </form>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>Releted Products</h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme owl-loaded owl-drag" data-margin="20" data-responsive="{&quot;0&quot;:{&quot;items&quot;: &quot;1&quot;}, &quot;481&quot;:{&quot;items&quot;: &quot;2&quot;}, &quot;768&quot;:{&quot;items&quot;: &quot;3&quot;}, &quot;1199&quot;:{&quot;items&quot;: &quot;4&quot;}}">





                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1413px;">
                                    <div class="owl-item active" style="width: 262.5px; margin-right: 20px;">
                                        <div class="item">
                                            <div class="product">
                                                <div class="product_img">
                                                    <a href="shop-product-detail.html">
                                                        <img src="assets/images/product_img1.jpg" alt="product_img1">
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
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
                                                            <span class="active" data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
                                                            <span data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                                                            <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 262.5px; margin-right: 20px;">
                                        <div class="item">
                                            <div class="product">
                                                <div class="product_img">
                                                    <a href="shop-product-detail.html">
                                                        <img src="assets/images/product_img2.jpg" alt="product_img2">
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
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
                                                            <span class="active" data-color="#847764" style="background-color: rgb(132, 119, 100);"></span>
                                                            <span data-color="#0393B5" style="background-color: rgb(3, 147, 181);"></span>
                                                            <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 262.5px; margin-right: 20px;">
                                        <div class="item">
                                            <div class="product">
                                                <span class="pr_flash">New</span>
                                                <div class="product_img">
                                                    <a href="shop-product-detail.html">
                                                        <img src="assets/images/product_img3.jpg" alt="product_img3">
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
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
                                                            <span class="active" data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                                                            <span data-color="#7C502F" style="background-color: rgb(124, 80, 47);"></span>
                                                            <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
                                                            <span data-color="#874A3D" style="background-color: rgb(135, 74, 61);"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 262.5px; margin-right: 20px;">
                                        <div class="item">
                                            <div class="product">
                                                <div class="product_img">
                                                    <a href="shop-product-detail.html">
                                                        <img src="assets/images/product_img4.jpg" alt="product_img4">
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
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
                                                            <span class="active" data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                                                            <span data-color="#A92534" style="background-color: rgb(169, 37, 52);"></span>
                                                            <span data-color="#B9C2DF" style="background-color: rgb(185, 194, 223);"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 262.5px; margin-right: 20px;">
                                        <div class="item">
                                            <div class="product">
                                                <div class="product_img">
                                                    <a href="shop-product-detail.html">
                                                        <img src="assets/images/product_img5.jpg" alt="product_img5">
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
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
                                                            <span class="active" data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
                                                            <span data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                                                            <span data-color="#5FB7D4" style="background-color: rgb(95, 183, 212);"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="ion-ios-arrow-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="ion-ios-arrow-right"></i></button></div>
                            <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- END SECTION SHOP -->

    </div>




    @stop