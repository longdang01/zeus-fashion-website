@extends('admin.components._layout')
@section('content')


<div ng-controller="SupplierController">
    <h2 class="intro-y fs-lg fw-medium mt-10">
        Danh sách nhà cung cấp
    </h2>
    <div class="grid columns-12 gap-6 mt-5">
        <div class="intro-y g-col-12 d-flex flex-wrap flex-sm-nowrap align-items-center mt-2">
            <button class="btn btn-primary shadow-md me-2"
            data-bs-toggle="modal"
            data-bs-target="#save-modal-supplier"
            ng-click="getSupplier(0)"
            >Thêm nhà cung cấp</button>
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
            <div class="d-none d-md-block mx-auto text-gray-600">Hiển thị <span ng-cloak>@{{ pageSize }}</span> / <span ng-cloak>@{{ suppliers.length }}</span> nhà cung cấp</div>
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
                        <th class="text-wrap">Nhà cung cấp</th>
                        <th class="text-wrap">Địa chỉ</th>
                        <th class="text-center text-nowrap">Điện thoại</th>
                        <th class="text-center text-nowrap">Email</th>
                        <th class="text-center text-nowrap">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-cloak dir-paginate="supplier in suppliers | itemsPerPage:pageSize | filter: { supplier_name: keySearch } track by $index" current-page="currentPage" class="intro-x">
                        <td class="text-center w-20">@{{ $index + currentPage * 10 - 9 }}</td>
                        <td class="text-start">@{{ supplier.supplier_name }}</td>
                        <td class="text-start">@{{ supplier.address }}</td>
                        <td class="text-center">@{{ supplier.phone }}</td>
                        <td class="text-center">@{{ supplier.email }}</td>
                        <td class="table-report__action w-40">
                            <div class="d-flex justify-content-center align-items-center">
                                <a class="d-flex align-items-center me-3" href="javascript:;"
                                ng-click="getSupplier(supplier.id)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 me-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                </a>
                                <a class="d-flex align-items-center text-theme-6"
                                href="javascript:;"
                                ng-click="getSupplier(supplier.id, -1);"
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

    <!-- BEGIN: Brand  -->
    <div id="save-modal-supplier" class="modal fade" tabindex="-1" aria-hidden="true">
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
                            data-bs-toggle="collapse" data-bs-target="#collapseSupplier" >
                                Nhà cung cấp
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </button>
                            <div class="collapse" id="collapseSupplier">
                                <div class="card card-body" style="background: #f1f5f8;">
                                    <div style="background: #fff;" class="grid columns-12 gap-4 gap-y-3 w-full p-5">
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-1" class="form-label">Tên nhà cung cấp</label>
                                            <input id="modal-form-1" type="text" class="form-control"
                                            placeholder="ZEUS STUDIO, CANDLES LAND" 
                                            ng-model="supplier.supplier_name">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-1" class="form-label">Địa chỉ</label>
                                            <input id="modal-form-1" type="text" class="form-control"
                                            placeholder="Hà Nội, Thành phố Hồ Chí Minh" 
                                            ng-model="supplier.address">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-1" class="form-label">Điện thoại</label>
                                            <input id="modal-form-1" type="text" class="form-control"
                                            placeholder="000-000-000-xxx" 
                                            ng-model="supplier.phone">
                                        </div>
                                        <div class="g-col-12 g-col-sm-6">
                                            <label for="modal-form-1" class="form-label">Email</label>
                                            <input id="modal-form-1" type="text" class="form-control"
                                            placeholder="zeus-studio@gmail.com" 
                                            ng-model="supplier.email">
                                        </div>
                                        <div class="g-col-12">
                                            <label for="modal-form-5" class="form-label">Mô tả nhà cung cấp</label>
                                            <div class="mt-2">
                                                <div
                                                    ckeditor="options"
                                                    ng-model="supplier.description"
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
                    ng-click="saveSupplier()"
                    >Lưu</button>
                </div>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>
    <!-- END: Brand -->
    
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