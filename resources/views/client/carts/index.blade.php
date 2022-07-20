@extends('client.components._layout')
@section('content')

<div ng-controller="CartController">
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Giỏ hàng</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giỏ hàng</li>
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
                    <div class="col-12">
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-status">
                                            <!-- <input id="checkBuy" type="checkbox" class="form-control" 
                                            style="width: 16px; height: 16px;"
                                            ng-model="asd"
                                            ng-change="chooseAll()"
                                            > -->
                                        </th>
                                        <th class="product-thumbnail">Ảnh</th>
                                        <th class="product-name" style="width: 350px">Tên sản phẩm</th>
                                        <th class="product-price">Phân loại</th>
                                        <th class="product-price">Giá (VND)</th>
                                        <th class="product-subtotal">Thành tiền</th>
                                        <th class="product-remove">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody__cart">
                                    <tr ng-repeat="item in carts.cart_details">
                                        <td class="product-status">
                                            <input id="checkBuy" type="checkbox" class="form-control" 
                                            style="width: 16px; height: 16px;"
                                            ng-true-value="1" ng-false-value="0"
                                            ng-model="item.is_active"
                                            ng-checked="item.is_active == 1 ? true : false"
                                            ng-change="updateCartDetail(item, 1)"
                                            >
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img ng-src="/uploads/products/@{{ item.product.id }}/@{{ item.color.images[0].picture }}"
                                                 alt="product1">
                                            </a>
                                        </td>
                                        <td class="product-name" style="width: 350px" data-title="Product"><a href="/details?name=@{{ item.product.product_name | UrlFriendly }}&id=@{{ item.product_id }}">
                                            @{{ item.product.product_name }}</a></td>
                                        <td class="product-type" data-title="Product">@{{ item.color.color_name }} / @{{ item.size.size_name }} / x@{{ item.quantity }}</td>
                                        <td class="product-price" data-title="Price">
                                            <span ng-if="!item.color.sale" class="price">@{{ item.color.price.price | currency:"":0 }}</span>
                                            <span ng-if="item.color.sale.symbol=='K'" class="price">@{{ item.color.price.price - item.color.sale.value | currency:"":0 }}</span>
                                            <span ng-if="item.color.sale.symbol=='%'" class="price">@{{ item.color.price.price * ((100 - item.color.sale.value)/100) | currency:"":0 }}</span>
                                            <del ng-if="item.color.sale">@{{ item.color.price.price | currency:"":0 }}</del>
                                            <div ng-if="item.color.sale" class="on_sale">
                                                <span>@{{ item.color.sale.value }}@{{ item.color.sale.symbol }} Giảm</span>
                                            </div>
                                        </td>
                                        <!-- <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="button" value="-" class="minus">
                                                <input type="text" name="quantity" value="2" title="Qty" class="qty" size="4">
                                                <input type="button" value="+" class="plus">
                                            </div>
                                        </td> -->
                                        <td class="product-subtotal" data-title="Total">
                                            <span ng-if="!item.color.sale" class="">@{{ item.color.price.price * item.quantity | currency:"":0 }}</span>
                                            <span ng-if="item.color.sale.symbol=='K'" class="">@{{ (item.color.price.price - item.color.sale.value) * item.quantity | currency:"":0 }}</span>
                                            <span ng-if="item.color.sale.symbol=='%'" class="">@{{ (item.color.price.price * ((100 - item.color.sale.value)/100)) * item.quantity | currency:"":0 }}</span>
                                        </td>
                                        <td class="product-remove" data-title="Remove" style="border-bottom: 1px solid #dee2e6;">
                                            <a href="javascript:;"
                                            ng-click="getClassify(item.id)" ><i class="ti-pencil"></i></a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#confirmDeleteCart"
                                            ng-click="getClassify(item.id, -1)" ><i class="ti-close"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="px-0">
                                            <div class="row no-gutters align-items-center">

                                                <div class="col-lg-6 col-md-6 mb-3 mb-md-0 text-left">
                                                    <!-- <button class="btn btn-fill-out btn-sm" type="button"
                                                    ng-click="chooseAll()">
                                                        Chọn tất cả
                                                    </button> -->
                                                    <!-- <button class="btn btn-fill-out btn-sm" type="button">
                                                        Xóa
                                                    </button>
                                                    <button class="btn btn-fill-out btn-sm" type="button" disabled>
                                                        Lưu vào mục ưa thích
                                                    </button> -->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-6">
                        <div class="border p-3 p-md-4">
                            <div class="heading_s1 mb-3">
                                <h6>Chọn mua</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <!-- <tr>
                                            <td class="cart_total_label">Cart Subtotal</td>
                                            <td class="cart_total_amount">$349.00</td>
                                        </tr> -->
                                        <tr>
                                            <td class="cart_total_label">Số lượng sản phẩm</td>
                                            <td class="cart_total_amount">@{{ totalItemsBuy || 0}}</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Tổng tiền</td>
                                            <td class="cart_total_amount"><strong>@{{ totalPrice | currency:"":0 || 0 }} VND</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="#" class="btn btn-fill-out"
                            ng-click="navigateToCheckout()"
                            >Tiến hành thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

    </div>


    <!-- Modal -->
    <div class="modal fade" id="productClassify"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Phân loại hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="pr_detail">
                    <div class="product_description">
                        <div class="pr_switch_wrap">
                            <span class="switch_lable">Màu sắc</span>
                            <div class="product_color_switch">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown quickview__option-select">
                                        <button class="btn btn-choose dropdown-toggle"
                                            type="button"
                                            id="dropdownSelectColor" 
                                            data-toggle="dropdown">
                                            @{{ classify.color.color_name }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li ng-repeat="color in classify.product.colors track by $index">
                                                <a 
                                                ng-click="changeColor(color, $index)"
                                                ng-class="color.id == classify.color.id ? 'selected' : ''"
                                                class="dropdown-item" href="javascript:;">
                                                    @{{ color.color_name }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div ng-style="{ 'background': classify.color.hex }"
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
                                            @{{ classify.size.size_name }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li ng-repeat="size in classify.color.sizes track by $index">
                                                <a 
                                                ng-click="changeSize(size, $index)"
                                                ng-class="size.id == classify.size.id ? 'selected' : ''"
                                                class="dropdown-item" href="javascript:;">
                                                    @{{ size.size_name }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="quickview-options-choose ms-3">
                                        @{{ classify.size.size_name }}
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
                                <input type="text" name="quantity" ng-model="classify.quantity" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <ul class="product-meta">
                        <li>Tình trạng: 
                            <span ng-class="classify.size.quantity > 0 ? 'available' : 'sold'">
                            @{{ classify.size.quantity > 0 ? 'Còn ' + classify.size.quantity + ' sản phẩm' : 'Hết hàng' }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-fill-out btn-sm"
                ng-click="updateCartDetail(classify)">Lưu</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteCart"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-fill-out btn-sm"
                ng-click="deleteProduct(classify.id)">Có</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notificationCart"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div ng-repeat="item in notifications" style="font-size: 14px; margin-bottom: 20px">
                        <div>
                            @{{ item.product.product_name }} 
                        </div>
                        <div>
                            @{{ item.color.color_name }} / @{{ item.size.size_name }} 
                        </div>
                        <div>
                            <span ng-class="item.size.quantity > 0 ? 'available' : 'sold'">
                            (@{{ item.size.quantity > 0 ? 'Còn ' + item.size.quantity + ' sản phẩm' : 'Hết hàng' }})
                            </span>
                        </div>
                    </div>
                    <div>Vui lòng điều chỉnh lại số lượng sản phẩm !</div>
                </div>
                <!-- @{{ notification }} -->
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button> -->
                <button type="button" class="btn btn-fill-out btn-sm" data-dismiss="modal">Trở lại</button>
            </div>
            </div>
        </div>
    </div>
</div>






@stop