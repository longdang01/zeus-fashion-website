@extends('admin.components._layout')
@section('content')

<div ng-controller="ProductController">
    <h2 class="intro-y fs-lg fw-medium mt-10">
        Danh sách sản phẩm
    </h2>
    <div class="grid columns-12 gap-6 mt-5">
        <div class="intro-y g-col-12 d-flex flex-wrap flex-sm-nowrap align-items-center mt-2">
            <button class="btn btn-primary shadow-md me-2"
            data-bs-toggle="modal"
            data-bs-target="#save-modal-product"
            ng-click="getProduct(0)"
            >Thêm sản phẩm</button>
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
            <div class="d-none d-md-block mx-auto text-gray-600">Hiển thị <span ng-cloak>@{{ pageSize }}</span> / <span ng-cloak>@{{ products.length }}</span> sản phẩm</div>
            <div class="w-full w-sm-auto mt-3 mt-sm-0 ms-sm-auto ms-md-0">
                <div class="w-56 position-relative text-gray-700 dark-text-gray-300">
                    <input ng-model="keySearch" type="text" class="form-control w-56 box border-white dark-border-dark-3 pe-10 placeholder-theme-13" placeholder="Tìm kiếm...">
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
                        <th class="text-wrap">Tên sản phẩm</th>
                        <th class="text-center text-nowrap">Số lượng còn</th>
                        <th class="text-center text-nowrap">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-cloak dir-paginate="product in products | itemsPerPage:pageSize | filter: { product_name: keySearch } track by $index" current-page="currentPage" class="intro-x">
                        <td class="text-center w-20">@{{ $index + currentPage * 10 - 9 }}</td>
                        <td>
                            <a href="" class="fw-medium text-wrap">@{{ product.product_name }}</a>
                            <div class="text-gray-600 fs-xs text-nowrap mt-0.5">@{{ product.sub_category.sub_category_name }}</div>
                        </td>
                        <td class="text-center w-40">@{{ product.remaining_stock }}</td>
                        <td class="table-report__action w-40">
                            <!-- data-bs-toggle="modal"
                            data-bs-target="#save-modal-product" -->
                            <div class="d-flex justify-content-center align-items-center">
                                <a class="d-flex align-items-center me-3" href="javascript:;"
                                ng-click="getProduct(product.id)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 me-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                </a>
                                <a class="d-flex align-items-center text-theme-6"
                                href="javascript:;"
                                ng-click="getProduct(product.id, -1);"
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

    <!-- BEGIN: Product  -->
    <div id="save-modal-product" class="modal fade" tabindex="-1" aria-hidden="true">
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
                        <div ng-if="action != 0" class="g-col-12">
                            <button class="btn btn-secondary btn__manage w-full me-1 mb-2"
                            data-bs-toggle="collapse" data-bs-target="#collapseColor" >
                                Màu sắc
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse" id="collapseColor">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12 g-col-sm-8">
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="Màu đen, Màu trắng"
                                            ng-model="color.color_name">
                                        </div>
                                        <div class="g-col-12 g-col-sm-4">
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="#000000, #ffffff"
                                            ng-model="color.hex">
                                        </div>
                                        <div class="g-col-12 d-flex justify-content-start">
                                            <button class="btn btn-secondary btn__manage btn__create-color me-1 mb-2"
                                            ng-click="addColor()"
                                            >
                                                Thêm
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__update-color me-1 mb-2"
                                            ng-click="updateColor()"
                                            >
                                                Cập nhật
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__reset-color me-1 mb-2"
                                            ng-click="actionColor(0)">
                                                Làm mới
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table table-report mt-n2 table__colors">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap">Tên màu sắc</th>
                                                <th class="text-center text-nowrap">Màu</th>
                                                <th class="text-center text-nowrap">Đơn giá (VNĐ)</th>
                                                <th class="text-center text-nowrap">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-cloak ng-repeat="color in product.colors track by $index" ng-click="getColor(color.id, $event)" class="intro-x">
                                                <td class="text-wrap">@{{ color.color_name }}</td>
                                                <td class="text-center w-20">
                                                    <div class="table__colors-color"
                                                    ng-style="{ 'background': color.hex }"
                                                    ></div>
                                                </td>
                                                <td class="text-center w-20">@{{ (color.price == null || color.price.price == null) ? "(chưa có giá)" : (color.price.price | currency:"":0) }}</td>
                                                <td class="table-report__action w-20">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <a class="d-flex align-items-center me-3" href="javascript:;"
                                                        ng-click="getColor(color.id, $event, 1)"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 me-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                                            </svg>
                                                        </a>
                                                        <a class="d-flex align-items-center text-theme-6"
                                                        href="javascript:;"
                                                        ng-click="getColor(color.id, $event, -1)"
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
                            data-bs-toggle="collapse" data-bs-target="#collapseProduct" >
                                Sản phẩm
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse" id="collapseProduct">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-1" class="form-label">Mã sản phẩm</label>
                                            <input id="modal-form-1" type="text" class="form-control" placeholder="" 
                                            ng-model="product.product_code" readonly>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-2" class="form-label">Tên sản phẩm</label>
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="T-SHIRT LOGO X ZEUS, SKINNY FIT JEANS"
                                            ng-model="product.product_name"/>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-3" class="form-label">Nguồn gốc</label>
                                            <input id="modal-form-3" type="text" class="form-control"
                                            placeholder="Việt Nam, USA"
                                            ng-model="product.origin">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-4" class="form-label">Chất liệu</label>
                                            <input id="modal-form-4" type="text" class="form-control"
                                            placeholder="Cotton, Nỉ bông"
                                            ng-model="product.material">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-5" class="form-label">Phong cách</label>
                                            <input id="modal-form-5" type="text" class="form-control"
                                            placeholder="StreetWear, Lịch thiệp"
                                            ng-model="product.style">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-6" class="form-label">Danh mục</label>
                                            <div class="">
                                                <select class="form-select w-full"
                                                ng-model="product.sub_category_id"
                                                >
                                                    <option style="display:none" value="">Chọn danh mục</option>
                                                    <optgroup ng-repeat="category in categories" label="@{{ category.category_name }}">
                                                        <option
                                                        ng-repeat="subCategory in category.sub_categories"
                                                        ng-selected="product.sub_category_id == subCategory.id"
                                                        ng-value="subCategory.id">@{{ subCategory.sub_category_name }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-6" class="form-label">Nhà cung cấp</label>
                                            <select class="form-select w-full"
                                                ng-model="product.supplier_id"
                                                >
                                                    <option style="display:none" value="">Chọn nhà cung cấp</option>
                                                    <option
                                                    ng-repeat="supplier in suppliers"
                                                    ng-selected="product.supplier_id == supplier.id"
                                                    ng-value="supplier.id">@{{ supplier.supplier_name }}</option>
                                            </select>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-6" class="form-label">Thương hiệu</label>
                                            <select class="form-select w-full"
                                                ng-model="product.brand_id"
                                                >
                                                    <option style="display:none" value="">Chọn thương hiệu</option>
                                                    <option
                                                    ng-repeat="brand in brands"
                                                    ng-selected="product.brand_id == brand.id"
                                                    ng-value="brand.id">@{{ brand.brand_name }}</option>
                                            </select>
                                        </div>
                                        <div class="g-col-12">
                                            <label for="modal-form-5" class="form-label">Bảng kích cỡ sản phẩm</label>
                                            <div class="mt-2">
                                                <input id="size-table-upload" type="file" class="form-control mb-2" ng-model="product.size_table">
                                                <img id="size-table-image" data-action="zoom" style="object-fit: cover" class="w-full rounded-2" alt="">
                                                <!-- ng-if="product.size_table" ng-src="/uploads/products/@{{product.id}}/@{{product.size_table}}" -->
                                                <button class="btn btn-secondary w-full me-1 mt-2 mb-2" ng-click="resetSTB()">Xóa bảng kích cỡ sản phẩm</button>
                                            </div>
                                        </div>
                                        <div class="g-col-12">
                                            <label for="modal-form-5" class="form-label">Mô tả sản phẩm</label>
                                            <div class="mt-2">
                                                <div
                                                    ckeditor="options"
                                                    ng-model="product.description"
                                                ></div>
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
                    class="btn btn-outline-secondary w-20 me-1">Hủy</button>
                    <button type="button" class="btn btn-primary w-20"
                    ng-click="saveProduct()"
                    >Lưu</button>
                </div>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>
    <!-- END: Product -->

    <!-- BEGIN: Color  -->
    <div id="color-modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-medium fs-base me-auto">Cập nhật thông tin của màu sắc</h2>
                </div> 
                <div class="modal-body">
                    <div class="grid columns-12 gap-4 gap-y-3 p-10 text-center">
                        <!-- sizes -->
                        <div class="g-col-6">
                            <button class="btn btn-secondary btn__manage w-full me-1 mb-2"
                            data-bs-toggle="collapse" data-bs-target="#collapseSize" >
                                Kích cỡ
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse show" id="collapseSize">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12 g-col-sm-6">
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="S, M, L, XL, ..."
                                            ng-model="size.size_name">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="50, 100, ..."
                                            ng-model="size.quantity">
                                        </div>
                                        <div class="g-col-12 d-flex justify-content-start">
                                            <button class="btn btn-secondary btn__manage btn__create-size me-1 mb-2"
                                            ng-click="addSize()"
                                            >
                                                Thêm
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__update-size me-1 mb-2"
                                            ng-click="updateSize()"
                                            >
                                                Cập nhật
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__reset-size me-1 mb-2"
                                            ng-click="actionSize(0)">
                                                Làm mới
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table table-report mt-n2 table__colors">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap" style="text-align: left !important">Kích cỡ</th>
                                                <th class="text-center text-nowrap">Số lượng</th>
                                                <th class="text-center text-nowrap">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-cloak ng-repeat="size in color.sizes track by $index" ng-click="getSize(size.id, $event)" class="intro-x">
                                                <td class="text-wrap" style="text-align: left !important">@{{ size.size_name }}</td>
                                                <td class="text-center w-40">@{{ size.quantity }}</td>
                                                <td class="table-report__action w-20">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <a class="d-flex align-items-center text-theme-6"
                                                        href="javascript:;"
                                                        ng-click="getSize(size.id, $event, -1)"
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
                    
                        <!-- price -->
                        <div class="g-col-6">
                            <button class="btn btn-secondary btn__manage w-full me-1 mb-2"
                            data-bs-toggle="collapse" data-bs-target="#collapsePrice" >
                                Đơn giá
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse show" id="collapsePrice">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12 g-col-sm-8">
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="(chưa có giá)"
                                            ng-model="color.price.price">
                                        </div>
                                        <div class="g-col-12 g-col-sm-4">
                                            <div class=""> 
                                                <select class="form-select w-full">
                                                    <option value="" selected>VNĐ</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="g-col-6">
                                            <button class="btn btn-secondary btn__manage me-1 mb-2 w-full justify-content-center"
                                            ng-click="savePrice()"
                                            >
                                                Cập nhật
                                            </button>
                                        </div>
                                        <div class="g-col-6">
                                            <button class="btn btn-secondary btn__manage btn__delete-price me-1 mb-2 w-full justify-content-center"
                                            ng-click="deletePrice(color.price.id, -1)"
                                            >
                                                Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- images -->
                        <div class="g-col-6">
                            <button class="btn btn-secondary btn__manage w-full me-1 mb-2"
                            data-bs-toggle="collapse" data-bs-target="#collapseImage" >
                                Hình ảnh
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse show" id="collapseImage">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12">
                                            <img id="color-image" src="" data-action="zoom" style="object-fit: cover" class="w-full rounded-2" alt="">
                                        </div>
                                        <div class="g-col-12">
                                            <input id="color-upload" type="file" class="form-control" ng-model="image.picture">
                                        </div>
                                        <div class="g-col-12 d-flex justify-content-start">
                                            <button class="btn btn-secondary btn__manage btn__create-image me-1 mb-2"
                                            ng-click="addImage()"
                                            >
                                                Thêm
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__update-image me-1 mb-2"
                                            ng-click="updateImage()"
                                            >
                                                Cập nhật
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__reset-image me-1 mb-2"
                                            ng-click="actionImage(0)">
                                                Làm mới
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table table-report mt-n2 table__colors">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap" style="text-align: left">Hình ảnh</th>
                                                <th class="text-center text-nowrap">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-cloak ng-repeat="image in color.images track by $index" ng-click="getImage(image.id, $event)" class="intro-x">
                                                <td class="text-wrap w-full">
                                                    <img ng-src="/uploads/products/@{{product.id}}/@{{image.picture}}"
                                                    src="/uploads/products/@{{product.id}}/@{{image.picture}}"
                                                    style="width: 50px; height: 50px; object-fit: cover"
                                                        class="rounded-2" alt="">
                                                </td>
                                                <td class="table-report__action w-20">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <!-- <a class="d-flex align-items-center me-3" href="javascript:;"
                                                        ng-click="getImage(image.id, $event, 1)"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 me-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                                            </svg>
                                                        </a> -->
                                                        <a class="d-flex align-items-center text-theme-6"
                                                        href="javascript:;"
                                                        ng-click="getImage(image.id, $event, -1)"
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
    
                        <!-- discounts -->
                        <div class="g-col-6">
                            <button class="btn btn-secondary btn__manage w-full me-1 mb-2"
                            data-bs-toggle="collapse" data-bs-target="#collapseDiscount" >
                                Giảm giá
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse show" id="collapseDiscount">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12 g-col-sm-6">
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="ZSSALE2022, ZSFLASHSALE, ..."
                                            ng-model="discount.discount_name">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <input id="modal-form-2" type="text" class="form-control"
                                            placeholder="10, 50, ..."
                                            ng-model="discount.value">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <div class=""> 
                                                <select ng-model="discount.symbol" class="form-select w-full">
                                                    <option style="display:none" value="">Chọn đơn vị</option>
                                                    <option value="K" ng-selected="discount.symbol == 'K'">K</option>
                                                    <option value="%" ng-selected="discount.symbol == '%'">%</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <select ng-model="discount.is_active" class="form-select w-full">
                                                <option style="display:none" value="">Chọn hình thức giảm giá</option>
                                                <option value="1" 
                                                ng-selected="discount.is_active == 1">
                                                    Áp dụng ngay
                                                </option>
                                                <option value="0" 
                                                ng-selected="discount.is_active == 0">
                                                    Mã giảm giá
                                                </option>
                                            </select>
                                        </div>
                                        <div class="g-col-12 d-flex justify-content-start">
                                            <button class="btn btn-secondary btn__manage btn__create-discount me-1 mb-2"
                                            ng-click="addDiscount()"
                                            >
                                                Thêm
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__update-discount me-1 mb-2"
                                            ng-click="updateDiscount()"
                                            >
                                                Cập nhật
                                            </button>
                                            <button class="btn btn-secondary btn__manage btn__reset-discount me-1 mb-2"
                                            ng-click="actionDiscount(0)">
                                                Làm mới
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table table-report mt-n2 table__colors">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap">Tên giảm giá</th>
                                                <th class="text-center text-nowrap">Giá trị</th>
                                                <th class="text-center text-nowrap">Đơn vị</th>
                                                <th class="text-center text-nowrap">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-cloak ng-repeat="discount in color.discounts track by $index" ng-click="getDiscount(discount.id, $event)" class="intro-x">
                                                <td class="text-wrap">@{{ discount.discount_name }}</td>
                                                <td class="text-center w-20">- @{{ discount.value }}@{{ discount.symbol }}</td>
                                                <td class="text-center w-40">
                                                    <div class="d-flex align-items-center justify-content-center
                                                    @{{ discount.is_active == 1 ? 'text-theme-9' : 'text-theme-6'}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                        <!-- @{{ discount.is_active == 1 ? 'Áp dụng ngay' : 'Mã giảm giá'}} -->
                                                    </div>
                                                </td>
                                                <td class="table-report__action w-20">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <a class="d-flex align-items-center text-theme-6"
                                                        href="javascript:;"
                                                        ng-click="getDiscount(discount.id, $event, -1)"
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

                    </div>
                    
                </div>
            </div>
        </div>
    </div> 
    <!-- END: Color -->
    
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
    <div id="success-modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="fs-3xl mt-5">Thành công!</div>
                        <div class="text-gray-600 mt-2">Bạn đã thực hiện thành công!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> 
                        <button type="button" data-bs-dismiss="modal"
                        class="btn btn-primary w-24" onclick="removeScrollOfBody()">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Success -->
    <!-- END: Modal Content -->
</div>

@stop