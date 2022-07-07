@extends('admin.components._layout')
@section('content')


<div ng-controller="OrdersController">
    <h2 class="intro-y fs-lg fw-medium mt-10">
        Danh sách đơn hàng
    </h2>
    <div class="grid columns-12 gap-6 mt-5">
        <div class="intro-y g-col-12 d-flex flex-wrap flex-sm-nowrap align-items-center mt-2">
            <!-- <button class="btn btn-primary shadow-md me-2"
            data-bs-toggle="modal"
            data-bs-target="#save-modal-orders"
            ng-click="getOrders(0)"
            >Thêm đơn hàng</button> -->
            <div class="me-2"> 
                <select id="searchOrders" class="form-select w-full" style="background: #fff; box-shadow: 0 3px 20px #0000000b;" 
                ng-model="searchOrd">
                    <option value="">Tất cả đơn hàng</option>
                    <option value="1">Đơn hàng chờ xác nhận</option>
                    <option value="2">Đơn hàng chờ lấy hàng</option>
                    <option value="3">Đơn hàng đang giao</option>
                    <option value="4">Đơn hàng đã giao</option>
                    <option value="5">Đơn hàng đã hủy</option>
                </select>
            </div>
            <div class="dropdown" style="position: relative;" data-uid="_sebjmtfy8">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark-text-gray-300" aria-expanded="[object HTMLDivElement]" data-bs-toggle="dropdown">
                    <span class="w-5 h-5 d-flex align-items-center justify-content-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-4 h-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
                </button>
                <div class="dropdown-menu w-40" data-uid="_sebjmtfy8">
                    <div class="dropdown-content">
                        <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer w-4 h-4 me-2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> In </a>
                        <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text w-4 h-4 me-2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Xuất ra Excel </a>
                        <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text w-4 h-4 me-2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Xuất ra PDF </a>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-block mx-auto text-gray-600">Hiển thị <span ng-cloak>@{{ pageSize }}</span> / <span ng-cloak>@{{ ordersList.length }}</span> đơn hàng</div>
            <div class="w-full w-sm-auto mt-3 mt-sm-0 ms-sm-auto ms-md-0">
                <div class="w-56 position-relative text-gray-700 dark-text-gray-300">
                    <input ng-model="keySearch" type="text" class="form-control w-56 box border-white dark-border-dark-3 pe-10 placeholder-theme-13" placeholder="Tìm kiếm theo ngày đặt...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 position-absolute my-auto top-0 bottom-0 me-3 end-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y g-col-12 overflow-auto overflow-lg-visible">
            <table class="table table-report mt-n2">
                <thead>
                    <tr>
                        <th class="text-center text-nowrap">Thứ tự</th>
                        <th class="text-wrap">Người đặt hàng</th>
                        <th class="text-center text-nowrap">Ngày đặt hàng</th>
                        <th class="text-center text-nowrap">Tổng tiền (VNĐ)</th>
                        <th class="text-center text-nowrap">Trạng thái</th>
                        <th class="text-center text-nowrap">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-cloak dir-paginate="orders in ordersList | itemsPerPage:pageSize | filter: { status: searchOrd, order_date: keySearch } track by $index" current-page="currentPage" class="intro-x">
                        <td class="text-center w-20">@{{ $index + currentPage * 10 - 9 }}</td>
                        <td class="text-start">@{{ orders.customer.customer_name }}</td>
                        <td class="text-center w-20">@{{ orders.order_date.slice(0, 10) | date:'dd/MM/yyyy' }}</td>
                        <td class="text-center w-20">@{{ orders.total | currency:"":0 }}</td>
                        <td class="text-center w-56">
                            <div>
                                <select class="form-select w-full"
                                style="background: #fff; box-shadow: 0 3px 20px #0000000b;"
                                ng-change="updateStatus(orders.id, orders)"
                                ng-model="orders.status">
                                    <option value="1">Chờ xác nhận</option>
                                    <option value="2">Chờ lấy hàng</option>
                                    <option value="3">Đang giao</option>
                                    <option value="4">Đã giao</option>
                                    <option value="5">Đã hủy</option>
                                </select>
                            </div>
                        </td>
                        <td class="table-report__action w-40">
                            <div class="d-flex justify-content-center align-items-center">
                                <a class="d-flex align-items-center"
                                href="javascript:;"
                                ng-click="getOrders(orders.id);"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                                class="feather feather-eye w-4 h-4 d-block mx-auto"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y g-col-12 d-flex flex-wrap flex-sm-row flex-sm-nowrap align-items-center">
            <nav class="w-full w-sm-auto me-sm-auto">
                <dir-pagination-controls
                    max-size="10"
                    direction-links="true"
                    boundary-links="true"
                    >
                </dir-pagination-controls>
            </nav>
            <select class="w-20 form-select box mt-3 mt-sm-0"
            ng-model="pageSize" ng-init="pageSize='10'">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>

    <!-- BEGIN: Modal Content -->

    <!-- BEGIN: Order  -->
    <div id="save-modal-orders" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="fw-medium fs-base me-auto">@{{ title }}</h2>
                </div> 
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body">
                    <div class="grid columns-12 gap-4 gap-y-3">
                        <div class="g-col-12">
                            <button class="btn btn-secondary btn__manage w-full me-1 mb-2"
                            data-bs-toggle="collapse" data-bs-target="#collapseOrdersStatus" >
                                Trạng thái
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse" id="collapseOrdersStatus">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12 g-col-sm-6">
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="Chuyển đến kho ..."
                                            ng-model="ordersStatus.orders_status_name">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <input id="dateOrdersStatus" type="date" class="form-control" ng-model="ordersStatus.date" date-format>
                                        </div>
                                        <div class="g-col-12 d-flex justify-content-start">
                                            <button class="btn btn-secondary btn__manage btn__create-orders-status me-1 mb-2"
                                            ng-click="addOrdersStatus()"
                                            >
                                                Thêm
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__update-orders-status me-1 mb-2"
                                            ng-click="updateOrdersStatus()"
                                            >
                                                Cập nhật
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__reset-orders-status me-1 mb-2"
                                            ng-click="actionOrdersStatus(0)">
                                                Làm mới
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table table-report mt-n2 table__colors">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap">Trạng thái</th>
                                                <th class="text-center text-nowrap">Thời gian</th>
                                                <th class="text-center text-nowrap">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-cloak ng-repeat="ordersStatus in orders.orders_status track by $index" ng-click="getOrdersStatus(ordersStatus.id, $event)" class="intro-x">
                                                <td class="text-wrap">@{{ ordersStatus.orders_status_name }}</td>
                                                <td class="text-center w-20">@{{ ordersStatus.date.slice(0, 10) | date:'dd/MM/yyyy' }}</td>
                                                <td class="table-report__action w-20">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <a class="d-flex align-items-center text-theme-6"
                                                        href="javascript:;"
                                                        ng-click="getOrdersStatus(ordersStatus.id, $event, -1)"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash-2 w-4 h-4 me-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="g-col-12">
                            <button class="btn btn-secondary btn__manage w-full me-1 mb-2"
                            data-bs-toggle="collapse" data-bs-target="#collapseOrders" >
                                Đơn hàng
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse" id="collapseOrders">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-1" class="form-label">Tên người nhận</label>
                                            <input id="modal-form-1" type="text" class="form-control" placeholder="" 
                                            ng-model="orders.delivery_address.consignee_name" readonly>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-2" class="form-label">Ngày đặt hàng</label>
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder=""
                                            ng-value="orders.order_date.slice(0, 10) | date:'dd/MM/yyyy'" readonly/>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-3" class="form-label">Điện thoại</label>
                                            <input id="modal-form-3" type="text" class="form-control"
                                            placeholder=""
                                            ng-model="orders.delivery_address.consignee_phone" readonly>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-4" class="form-label">Địa chỉ nhận hàng</label>
                                            <input id="modal-form-4" type="text" class="form-control"
                                            placeholder=""
                                            ng-model="orders.delivery_address.delivery_address_name" readonly>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-5" class="form-label">Hình thức thanh toán</label>
                                            <input id="modal-form-5" type="text" class="form-control"
                                            placeholder=""
                                            ng-model="orders.payment.payment_type" readonly>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            
                                            <div class="grid columns-12 gap-4 gap-y-3 w-full">
                                                <div class="g-col-12 g-col-sm-6">
                                                    <label for="modal-form-5" class="form-label">Hình thức giao hàng</label>
                                                    <input id="modal-form-5" type="text" class="form-control"
                                                    placeholder=""
                                                    ng-model="orders.transport.transport_type" readonly>
                                                </div>
                                                <div class="g-col-12 g-col-sm-6">
                                                    <label for="modal-form-5" class="form-label">Phí ship (VNĐ)</label>
                                                    <input id="modal-form-5" type="text" class="form-control"
                                                    placeholder=""
                                                    ng-value="orders.transport.fee | currency:'':0" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-5" class="form-label">Tổng tiền</label>
                                            <input id="modal-form-5" type="text" class="form-control"
                                            placeholder=""
                                            ng-value="orders.total | currency:'':0" readonly>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-5" class="form-label">Trạng thái</label>
                                            <div>
                                                <select class="form-select w-full"
                                                style="background: #fff; box-shadow: 0 3px 20px #0000000b;"
                                                ng-change="updateStatus(orders.id, orders)"
                                                ng-model="orders.status">
                                                    <option value="1">Chờ xác nhận</option>
                                                    <option value="2">Chờ lấy hàng</option>
                                                    <option value="3">Đang giao</option>
                                                    <option value="4">Đã giao</option>
                                                    <option value="5">Đã hủy</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="g-col-12">
                                            <label for="modal-form-5" class="form-label">Danh sách sản phẩm đã đặt (<span ng-cloak>@{{ orders.orders_details.length }}</span> sản phẩm)</label>
                                            <div class="mt-2">
                                                <table class="table table-report mt-n2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-wrap">Tên sản phẩm</th>
                                                            <th class="text-wrap">Màu sắc</th>
                                                            <th class="text-center text-nowrap">Kích cỡ</th>
                                                            <th class="text-center text-nowrap">Số lượng</th>
                                                            <th class="text-center text-nowrap">Đơn giá (VNĐ)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-cloak ng-repeat="ordersDetail in orders.orders_details track by $index" current-page="currentPage" class="intro-x">
                                                            <td class="text-start">@{{ ordersDetail.product.product_name }}</td>
                                                            <td class="text-start w-40">@{{ ordersDetail.color.color_name }}</td>
                                                            <td class="text-center w-20">@{{ ordersDetail.size.size_name }}</td>
                                                            <td class="text-center w-20">@{{ ordersDetail.quantity }}</td>
                                                            <td class="text-center w-20">@{{ ordersDetail.price | currency:"":0 }}</td>
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
                </div>
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer text-end">
                    <button type="button" data-bs-dismiss="modal"
                    class="btn btn-outline-secondary w-20 me-1">Thoát</button>
                    <!-- <button type="button" class="btn btn-primary w-20"
                    ng-click="saveProduct()"
                    >Lưu</button> -->
                </div>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>
    <!-- END: Product -->
    
    <!-- BEGIN: Confirm Delete  -->
    <div id="delete-modal" class="modal fade" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
                
                 <div class="modal-body p-0">
                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="fs-3xl mt-5">Bạn có chắc không?</div>
                        <div class="text-gray-600 mt-2">Bạn có thực sự muốn xóa mục này không? <br>Không thể hoàn tác quá trình này.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-bs-dismiss="modal"
                        class="btn btn-outline-secondary w-24 me-1">Hủy</button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger w-24"
                        ng-click="confirmDelete()">
                        <!-- ng-click="deleteProduct(product.id)"> -->
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Confirm Delete -->
    
    <!-- BEGIN: Success  -->
    <div id="success-modal-preview" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="fs-3xl mt-5">Thành công!</div>
                        <div class="text-gray-600 mt-2">Bạn đã thực hiện thành công!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-bs-dismiss="modal" class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Success -->
    <!-- END: Modal Content -->
</div>



@stop