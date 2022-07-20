@extends('client.components._layout')
@section('content')

<div>
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Thanh toán</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thanh toán</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>

    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row" ng-controller="DeliveryAddressController">
                    <div class="col-lg-12">
                        <div class="heading_s1">
                            <h4>Địa chỉ nhận hàng</h4>
                        </div>
                        <div class="table-responsive order_table">
                            <div class="mb-3">
                                <a href="javascript:;" class="btn btn-fill-out btn-sm"
                                ng-click="getDeliveryAddress(0)"
                                data-toggle="modal"
                                data-target="#delivery-address-modal">
                                    Thêm địa chỉ mới</a>
                                <a href="/accounts" class="btn btn-dark btn-sm">
                                Tài khoản của bạn</a>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Thiết lập</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="address in deliveryAddressList">
                                        <td><span class="">@{{ address.consignee_name }} (@{{ address.consignee_phone }})</span>
                                        @{{ address.delivery_address_name }}</td>
                                        <td>
                                            <div ng-class="address.is_active == 1 ? 'green' : 'hidden'" class=""
                                            >@{{ address.is_active == 1 ? 'Mặc định' : '' }}</div>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-dark btn-sm"
                                                ng-disabled="address.is_active == 1"
                                                ng-click="setDefault(address.id)">Thiết lập mặc định</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                    <!-- Modal deliveryAddress -->
                    <div class="modal fade" id="delivery-address-modal"
                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    @{{ title }} 
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Họ và tên</label>
                                            <input type="text" class="form-control"
                                            placeholder="Nguyễn Văn A, Trần Thị B"
                                            ng-model="deliveryAddress.consignee_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Điện thoại</label>
                                            <input type="text" class="form-control"
                                            placeholder="0123382xxx"
                                            ng-model="deliveryAddress.consignee_phone">
                                        </div>
                                    </div>
                                    <div ng-if="action == 1" class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Địa chỉ hiện tại</label>
                                            <input type="text" class="form-control"
                                            placeholder="0123382xxx"
                                            ng-model="deliveryAddress.delivery_address_name" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Địa chỉ
                                            <span ng-if="action == 1">(Lưu ý: không nhập vào mục này nếu không muốn cập nhật địa chỉ hiện tại)</span>
                                        </label>
                                        <input id="specific_address" type="text" class="form-control" placeholder="Số nhà, Thôn">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <select id="province" class="custom-select"
                                                        ng-model="selectedProvince"
                                                        ng-change="selectAddress(0)">
                                                    <option value="">Tỉnh</option>  
                                                    <option ng-repeat="province in listProvinces"
                                                            value="@{{ province.Id }}">
                                                        @{{ province.Name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <select id="district" class="custom-select"
                                                        ng-model="selectedDistrict"
                                                        ng-change="selectAddress(1)">
                                                    <option value="">Huyện</option>
                                                    <option ng-repeat="district in listDistricts"
                                                            value="@{{ district.Id }}">
                                                        @{{ district.Name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                    
                                            <div class="form-group">
                                                <select id="commune" class="custom-select"
                                                        ng-model="selectedCommune">
                                                    <option value="">Xã</option>
                                                    <option ng-repeat="commune in listCommunes"
                                                            value="@{{ commune.Id }}">
                                                        @{{ commune.Name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-fill-out btn-sm"
                                ng-click="saveDeliveryAddress()">Lưu</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row" ng-controller="CartController">
                    <div class="col-lg-12">
                        <div class="heading_s1">
                            <h4>Sản phẩm</h4>
                        </div>
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail text-left">Ảnh</th>
                                        <th class="product-name" style="width: 350px">Tên sản phẩm</th>
                                        <th class="product-price">Phân loại</th>
                                        <th class="product-price">Giá (VND)</th>
                                        <th class="product-subtotal">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody__cart">
                                    <tr ng-repeat="item in cartsBuy">
                                        <td class="product-thumbnail text-left">
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
                                        <td class="product-subtotal" data-title="Total">
                                            <span ng-if="!item.color.sale" class="">@{{ item.color.price.price * item.quantity | currency:"":0 }}</span>
                                            <span ng-if="item.color.sale.symbol=='K'" class="">@{{ (item.color.price.price - item.color.sale.value) * item.quantity | currency:"":0 }}</span>
                                            <span ng-if="item.color.sale.symbol=='%'" class="">@{{ (item.color.price.price * ((100 - item.color.sale.value)/100)) * item.quantity | currency:"":0 }}</span>
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
                        <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row" ng-controller="CheckoutController">
                    <div class="col-lg-12">
                        <div class="heading_s1">
                            <h4>Tiến hành đặt mua</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <div>
                                        <select class="custom-select"
                                                ng-model="selectedTransport"
                                                ng-change="selectTransport()"
                                                >
                                            <option value="">Chọn hình thức vận chuyển</option>
                                            <option ng-repeat="transport in transports"
                                                    value="@{{ transport.id }}">
                                                @{{ transport.transport_type }} (@{{ transport.fee| currency:"":0 }} VND)
                                            </option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="mb-3">
                                    <div>
                                        <select class="custom-select"
                                                ng-model="selectedPayment"
                                                ng-change="selectPayment()"
                                                >
                                            <option value="">Chọn hình thức thanh toán</option>
                                            <option ng-repeat="payment in payments"
                                                    value="@{{ payment.id }}">
                                                @{{ payment.payment_type }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <textarea id="note" rows="5" class="form-control" placeholder="Ghi chú đơn hàng"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Mã giảm giá (nếu có)">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <a href="#" class="btn btn-dark d-flex 
                                        justify-content-center align-items-center w-100"
                                        style="font-size: 14px; height: 50px; padding: 1rem 0; cursor: not-allowed"
                                        >Áp dụng</a>
                                    </div>
                                    <div class="mb-3 checkout__total">
                                        <p>Số lượng: </p>
                                        <p>@{{ totalItemsBuy }} sản phẩm</p>
                                    </div>
                                    <div class="mb-3 checkout__total">
                                        <p>Tổng tiền: </p>
                                        <p>@{{ totalPrice | currency:"":0 }} VND</p>
                                    </div>
                                    <div class="mb-3 checkout__total" >
                                        <p>Ship: </p>
                                        <p>+@{{ ship | currency:"":0 }} VND</p>
                                    </div>
                                    <div class="mb-3 checkout__total">
                                        <p>Mã giảm giá: </p>
                                        <p>-0 VND</p>
                                    </div>
                                    <div class="mb-3 checkout__total">
                                        <p>Thành tiền: </p>
                                        <p id="total">@{{ totalPrice + ship | currency:"":0 }} VND</p>
                                    </div>
                                    <div class="mt-3">
                                        <a href="#"
                                        ng-click="purchase()"
                                        class="btn btn-dark d-flex 
                                        justify-content-center align-items-center w-100"
                                        style="font-size: 14px; height: 50px; padding: 1rem 0;"
                                        >Thanh toán</a>
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