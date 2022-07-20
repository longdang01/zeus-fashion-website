<div class="quickview__wrap" ng-controller="DetailController">
    <div class="modal fade show" id="quickViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Xem nhanh sản phẩm
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                                        @{{ product.product_name }}
                                    </h4>
                                    <div class="product_price">
                                        <span ng-if="!selectedColor.sale" class="price">@{{ selectedColor.price.price | currency:"":0 }} VND</span>
                                        <span ng-if="selectedColor.sale.symbol=='K'"
                                        class="price">@{{ selectedColor.price.price - selectedColor.sale.value | currency:"":0 }} VND</span>
                                        <span ng-if="selectedColor.sale.symbol=='%'"
                                        class="price">@{{ selectedColor.price.price * ((100 - selectedColor.sale.value)/100) | currency:"":0 }} VND</span>
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
                                                    <button class="btn btn-choose dropdown-toggle"
                                                        type="button"
                                                        id="dropdownSelectColor" 
                                                        data-toggle="dropdown">
                                                        @{{ selectedColor.color_name }}
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li ng-repeat="color in product.colors track by $index">
                                                            <a 
                                                            ng-click="changeColor(color, $index)"
                                                            ng-class="color.id == selectedColor.id ? 'selected' : ''"
                                                            class="dropdown-item" href="javascript:;">
                                                                @{{ color.color_name }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div ng-style="{ 'background': selectedColor.hex }"
                                                class="quickview-options-choose ms-3"></div>
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
                                                    <button class="btn btn-choose dropdown-toggle"
                                                        type="button"
                                                        id="dropdownSelectSize" 
                                                        data-toggle="dropdown">
                                                        @{{ selectedSize.size_name }}
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li ng-repeat="size in selectedColor.sizes track by $index">
                                                            <a 
                                                            ng-click="changeSize(size, $index)"
                                                            ng-class="size.id == selectedSize.id ? 'selected' : ''"
                                                            class="dropdown-item" href="javascript:;">
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
                                    <li>Nguồn gốc: @{{ product.origin }}</li>
                                    <li>Chất liệu: @{{ product.material }}</li>
                                    <li>Phong cách: @{{ product.style }}</li>
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
            </div>
        </div>
    </div>
</div>
