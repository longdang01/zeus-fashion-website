@extends('client.components._layout')
@section('content')


<div class="account__wrap" ng-controller="AccountController">
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Tài khoản của bạn</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tài khoản của bạn</li>
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
                    <div class="col-lg-3 col-md-4">
                        <div class="dashboard_menu">
                            <ul class="nav nav-tabs flex-column" role="tablist">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" id="dashboard-tab" data-toggle="tab" 
                                href="#dashboard" role="tab" aria-controls="dashboard" 
                                aria-selected="false"><i class="ti-layout-grid2"></i>Bảng điều khiển</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link active" id="orders-tab" data-toggle="tab" 
                                href="#orders" role="tab" aria-controls="orders" 
                                aria-selected="false"><i class="ti-shopping-cart-full"></i>Đơn hàng của bạn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-toggle="tab" 
                                href="#address" role="tab" aria-controls="address" 
                                aria-selected="true"><i class="ti-location-pin"></i>Địa chỉ nhận hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-toggle="tab" 
                                href="#account-detail" role="tab" aria-controls="account-detail" 
                                aria-selected="true"><i class="ti-id-badge"></i>Thông tin tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;" ng-click="logOut()"><i class="ti-lock"></i>Đăng xuất</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content dashboard_content">
                            <!-- <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Bảng điều khiển</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Trải nghiệm những chức năng và mua hàng tại Zeus nhé !</p>
                                    </div>
                                </div>
                            </div> -->
                            <div ng-controller="OrdersController" class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h3>Đơn hàng của bạn</h3>
                                    </div> -->
                                    <div class="card-body">
                                        <div class="orders__wrap-main" style="margin-top: 4rem">
                                            <div class="unit__body">
                                                <ul class="nav nav-pills" style="justify-content: space-between">
                                                    <li class="nav-item">
                                                        <a href="#ordersAll" class="nav-link active" 
                                                        data-toggle="tab">Tất cả</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#ordersStatus0" class="nav-link" 
                                                        data-toggle="tab">Chưa xác nhận</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#ordersStatus1" class="nav-link" 
                                                        data-toggle="tab">Chờ lấy hàng</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#ordersStatus2" class="nav-link" 
                                                        data-toggle="tab">Đang giao</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#ordersStatus3" class="nav-link" 
                                                        data-toggle="tab">Đã giao</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#ordersStatus4" class="nav-link" 
                                                        data-toggle="tab">Đã hủy</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="ordersAll">
                                                        <div class="unit__main orders__wrap-main-body">
                                                            <div class="orders__wrap-main-body-item table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Ngày đặt</th>
                                                                            <!-- <th>Địa chỉ nhận</th> -->
                                                                            <th>Thành tiền (VNĐ)</th>
                                                                            <th style="text-align: end">Hành động</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="item in orders track by $index">
                                                                            <td>
                                                                                @{{ item.order_date.slice(0, 10) | date:'dd/MM/yyyy' }}
                                                                            </td>
                                                                            <!-- <td>
                                                                                @{{ item.delivery_address.consignee_name }} (@{{ item.delivery_address.consignee_phone }})
                                                                                - @{{ item.delivery_address.delivery_address_name }}
                                                                            </td> -->
                                                                            <td>
                                                                                @{{ item.total | currency:"":0 }}
                                                                            </td>
                                                                            <td style="text-align: end">
                                                                                <div>
                                                                                    <a href="javascript:;" class="btn btn-fill-out btn-sm"
                                                                                    ng-click="goDetail(item)"
                                                                                    data-toggle="modal" data-target="#ordersDetailModal" 
                                                                                    >Chi tiết</a>
                                                                                    <a href="javascript:;" class="btn btn-dark btn-sm"
                                                                                    ng-click="remove($event, item)"
                                                                                    ng-if="item.status == 0 || item.status == 1"  
                                                                                    >Hủy</a>
                                                                                    <a href="javascript:;" class="btn btn-dark btn-sm"
                                                                                    ng-click="revert($event, item)"  
                                                                                    ng-if="item.status == 4"  
                                                                                    >Đặt lại</a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="ordersStatus0">
                                                        <div class="unit__main orders__wrap-main-body">
                                                            <div class="orders__wrap-main-body-item table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Ngày đặt</th>
                                                                            <!-- <th>Địa chỉ nhận</th> -->
                                                                            <th>Thành tiền (VNĐ)</th>
                                                                            <th style="text-align: end">Hành động</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="item in orders0 track by $index">
                                                                            <td>
                                                                                @{{ item.order_date.slice(0, 10) | date:'dd/MM/yyyy' }}
                                                                            </td>
                                                                            <!-- <td>
                                                                                @{{ item.delivery_address.consignee_name }} (@{{ item.delivery_address.consignee_phone }})
                                                                                - @{{ item.delivery_address.delivery_address_name }}
                                                                            </td> -->
                                                                            <td>
                                                                                @{{ item.total | currency:"":0 }}
                                                                            </td>
                                                                            <td style="text-align: end">
                                                                                <div>
                                                                                    <a href="javascript:;" class="btn btn-fill-out btn-sm"
                                                                                    ng-click="goDetail(item)"
                                                                                    data-toggle="modal" data-target="#ordersDetailModal" 
                                                                                    >Chi tiết</a>
                                                                                    <a href="javascript:;" class="btn btn-dark btn-sm"
                                                                                    ng-click="remove($event, item, 0)"  
                                                                                    >Hủy</a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="ordersStatus1">
                                                        <div class="unit__main orders__wrap-main-body">
                                                            <div class="orders__wrap-main-body-item table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Ngày đặt</th>
                                                                            <!-- <th>Địa chỉ nhận</th> -->
                                                                            <th>Thành tiền (VNĐ)</th>
                                                                            <th style="text-align: end">Hành động</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="item in orders1 track by $index">
                                                                            <td>
                                                                                @{{ item.order_date.slice(0, 10) | date:'dd/MM/yyyy' }}
                                                                            </td>
                                                                            <!-- <td>
                                                                                @{{ item.delivery_address.consignee_name }} (@{{ item.delivery_address.consignee_phone }})
                                                                                - @{{ item.delivery_address.delivery_address_name }}
                                                                            </td> -->
                                                                            <td>
                                                                                @{{ item.total | currency:"":0 }}
                                                                            </td>
                                                                            <td style="text-align: end">
                                                                                <div>
                                                                                    <a href="javascript:;" class="btn btn-fill-out btn-sm"
                                                                                    ng-click="goDetail(item)"
                                                                                    data-toggle="modal" data-target="#ordersDetailModal" 
                                                                                    >Chi tiết</a>
                                                                                    <a href="javascript:;" class="btn btn-dark btn-sm"
                                                                                    ng-click="remove($event, item, 1)"  
                                                                                    >Hủy</a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="ordersStatus2">
                                                        <div class="unit__main orders__wrap-main-body">
                                                            <div class="orders__wrap-main-body-item table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Ngày đặt</th>
                                                                            <!-- <th>Địa chỉ nhận</th> -->
                                                                            <th>Thành tiền (VNĐ)</th>
                                                                            <th style="text-align: end">Hành động</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="item in orders2 track by $index">
                                                                            <td>
                                                                                @{{ item.order_date.slice(0, 10) | date:'dd/MM/yyyy' }}
                                                                            </td>
                                                                            <!-- <td>
                                                                                @{{ item.delivery_address.consignee_name }} (@{{ item.delivery_address.consignee_phone }})
                                                                                - @{{ item.delivery_address.delivery_address_name }}
                                                                            </td> -->
                                                                            <td>
                                                                                @{{ item.total | currency:"":0 }}
                                                                            </td>
                                                                            <td style="text-align: end">
                                                                                <div>
                                                                                    <a href="javascript:;" class="btn btn-fill-out btn-sm"
                                                                                    ng-click="goDetail(item)"
                                                                                    data-toggle="modal" data-target="#ordersDetailModal" 
                                                                                    >Chi tiết</a>
                                                                                    <!-- <a href="javascript:;" class="btn btn-dark btn-sm"
                                                                                    ng-click="remove($event, item)"  
                                                                                    >Hủy</a> -->
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="ordersStatus3">
                                                        <div class="unit__main orders__wrap-main-body">
                                                            <div class="orders__wrap-main-body-item table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Ngày đặt</th>
                                                                            <!-- <th>Địa chỉ nhận</th> -->
                                                                            <th>Thành tiền (VNĐ)</th>
                                                                            <th style="text-align: end">Hành động</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="item in orders3 track by $index">
                                                                            <td>
                                                                                @{{ item.order_date.slice(0, 10) | date:'dd/MM/yyyy' }}
                                                                            </td>
                                                                            <!-- <td>
                                                                                @{{ item.delivery_address.consignee_name }} (@{{ item.delivery_address.consignee_phone }})
                                                                                - @{{ item.delivery_address.delivery_address_name }}
                                                                            </td> -->
                                                                            <td>
                                                                                @{{ item.total | currency:"":0 }}
                                                                            </td>
                                                                            <td style="text-align: end">
                                                                                <div>
                                                                                    <a href="javascript:;" class="btn btn-fill-out btn-sm"
                                                                                    ng-click="goDetail(item)"
                                                                                    data-toggle="modal" data-target="#ordersDetailModal" 
                                                                                    >Chi tiết</a>
                                                                                    <!-- <a href="javascript:;" class="btn btn-dark btn-sm"
                                                                                    ng-click="remove($event, item)"  
                                                                                    >Hủy</a> -->
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="ordersStatus4">
                                                        <div class="unit__main orders__wrap-main-body">
                                                            <div class="orders__wrap-main-body-item table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Ngày đặt</th>
                                                                            <!-- <th>Địa chỉ nhận</th> -->
                                                                            <th>Thành tiền (VNĐ)</th>
                                                                            <th style="text-align: end">Hành động</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="item in orders4 track by $index">
                                                                            <td>
                                                                                @{{ item.order_date.slice(0, 10) | date:'dd/MM/yyyy' }}
                                                                            </td>
                                                                            <!-- <td>
                                                                                @{{ item.delivery_address.consignee_name }} (@{{ item.delivery_address.consignee_phone }})
                                                                                - @{{ item.delivery_address.delivery_address_name }}
                                                                            </td> -->
                                                                            <td>
                                                                                @{{ item.total | currency:"":0 }}
                                                                            </td>
                                                                            <td style="text-align: end">
                                                                                <div>
                                                                                    <a href="javascript:;" class="btn btn-fill-out btn-sm"
                                                                                    ng-click="goDetail(item)"
                                                                                    data-toggle="modal" data-target="#ordersDetailModal" 
                                                                                    >Chi tiết</a>
                                                                                    <!-- <a href="javascript:;" class="btn btn-dark btn-sm"
                                                                                    ng-click="remove($event, item)"  
                                                                                    >Hủy</a> -->
                                                                                    <a href="javascript:;" class="btn btn-dark btn-sm"
                                                                                    ng-click="revert($event, item)"  
                                                                                    >Đặt lại</a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Ngày đặt</th>
                                                        <th>Địa chỉ nhận</th>
                                                        <th>Thành tiền (VND)</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#1234</td>
                                                        <td>March 15, 2020</td>
                                                        <td>Processing</td>
                                                        <td>
                                                            <a href="#" class="btn btn-fill-out btn-sm">Chi tiết</a>
                                                            <a href="#" class="btn btn-dark btn-sm">Hủy</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div ng-controller="DeliveryAddressController" class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h3>Địa chỉ nhận hàng</h3>
                                    </div> -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <a href="javascript:;" class="btn btn-dark btn-sm"
                                                ng-click="getDeliveryAddress(0)"
                                                data-toggle="modal"
                                                data-target="#delivery-address-modal">Thêm địa chỉ mới</a>
                                            </div>
                                            <div ng-repeat="address in deliveryAddressList" class="col-lg-6 mb-3">
                                                <div class="card mb-3 mb-lg-0" style="border: 1px solid #e6e6e6; border-radius: 3px">
                                                    <!-- <div class="card-header">
                                                        <h3>@{{ address.consignee_name }}</h3>
                                                    </div> -->
                                                    <div class="card-body">
                                                        <div class="address__info">Họ và tên: @{{ address.consignee_name }}</div>
                                                        <div class="address__info">Điện thoại: @{{ address.consignee_phone }}</div>
                                                        <div class="address__info">Địa chỉ: @{{ address.delivery_address_name }}</div>
                                                        <div 
                                                        ng-class="address.is_active == 1 ? 'green' : 'hidden'" class="address__info"
                                                        >@{{ address.is_active == 1 ? 'Mặc định' : 'ads' }}</div>

                                                        <a href="javascript:;" class="mr-2" style="text-decoration: underline;"
                                                        ng-click="getDeliveryAddress(address.id)">Cập nhật</a>
                                                        <a ng-if="address.is_active == 0" href="javascript:;" class="mr-2" style="text-decoration: underline;"
                                                        ng-click="getDeliveryAddress(address.id, -1);">Xóa</a>
                                                        <div>
                                                            <button type="button" class="btn btn-secondary btn-sm mt-2"
                                                            ng-disabled="address.is_active == 1"
                                                            ng-click="setDefault(address.id)">Thiết lập mặc định</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <!-- <div class="card">
                                    <div class="card-header">
                                        <h3>Account Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Already have an account? <a href="#">Log in instead!</a></p>
                                        <form method="post" name="enq">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>First Name <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="name" type="text">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Last Name <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="phone">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Display Name <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="dname" type="text">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="email" type="email">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Current Password <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="password" type="password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>New Password <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="npassword" type="password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="cpassword" type="password">
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>


    <!-- Modal deliveryAddress -->
    <div ng-controller="DeliveryAddressController" class="modal fade" id="delivery-address-modal"
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

    <div ng-controller="DeliveryAddressController" class="modal fade" id="delete-modal"
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
            Bạn có chắc chắn muốn xóa không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-fill-out btn-sm"
                ng-click="confirmDelete()">Có</button>
            </div>
            </div>
        </div>
    </div>

    <div class="orders__detail-wrap" ng-controller="OrdersController">
    <!-- Modal -->
        <div class="modal fade" id="ordersDetailModal">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 1rem;">
                        <div class="row mb-5">
                            <div class="col-lg-4 col-md-6 col-sm-12 px-3">
                                <div class="mb-3">
                                    <label for="">Tên khách hàng: </label>
                                    <span>@{{ ordersItem.delivery_address.consignee_name }}</span>
                                </div>
                                <div class="mb-3">
                                    <label for="">Điện thoại: </label>
                                    <span>@{{ ordersItem.delivery_address.consignee_phone }}</span>
                                </div>
                                <div class="mb-3">
                                    <label for="">Ngày đặt: </label>
                                    <span>@{{ ordersItem.order_date.slice(0, 10) | date:'dd/MM/yyyy' }}</span>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6 col-sm-12 px-3">
                                <div class="mb-3">
                                    <label for="">Địa chỉ nhận: <label>
                                    <span>@{{ ordersItem.delivery_address.delivery_address_name }}</span>
                                </div>
                                <div class="mb-3">
                                    <label for="">Hình thức thanh toán: </label>
                                    <span>@{{ ordersItem.payment.payment_type }}</span>
                                </div>
                                <div class="mb-3">
                                    <label for="">Hình thức giao hàng: </label>
                                    <span>@{{ ordersItem.transport.transport_type }}/@{{ ordersItem.transport.fee | currency:"":0 }}VNĐ</span>
                                </div>
                                <div class="mb-3">
                                    <label for="">Thành tiền: </label>
                                    <span>@{{ ordersItem.total | currency:"":0 }} VNĐ (@{{ totalOrdersBuy }} sản phẩm)</span>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: left">Ảnh</th>
                                        <th style="padding-left: 1rem">Tên</th>
                                        <th>Loại</th>
                                        <th>Đơn giá (VNĐ)</th>
                                        <th>Lượng</th>
                                        <th>Thành tiền (VNĐ)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in ordersItem.orders_details">
                                        <td style="text-align: left">
                                            <img ng-src="/uploads/products/@{{ item.product_id }}/@{{ item.color.images[0].picture }}"
                                            style="height: 50px; object-fit: cover">
                                        </td>
                                        <td style="padding-left: 1rem">
                                            <a href="#">@{{ item.product.product_name }}</a>
                                        </td>
                                        <td>
                                            @{{ item.color.color_name }}/@{{ item.size.size_name }}
                                        </td>
                                        <td>@{{ item.price | currency:"":0 }}</td>
                                        <td>@{{ item.quantity }}</td>
                                        <td>@{{ item.price * item.quantity | currency:"":0 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@stop