@extends('admin.components._layout')
@section('content')

    
<div class="grid columns-12 gap-6">
    <div class="g-col-12 g-col-xxl-9">
        <div class="grid columns-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="g-col-12 mt-8">
                <div class="intro-y d-flex align-items-center h-10">
                    <h2 class="fs-lg fw-medium truncate me-5">
                        General Report
                    </h2>
                    <a href="" class="ms-auto d-flex align-items-center text-theme-1 dark-text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 me-3"></i> Reload Data </a>
                </div>
                <div class="grid columns-12 gap-6 mt-5">
                    <div class="g-col-12 g-col-sm-6 g-col-xl-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="d-flex">
                                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i> 
                                    <div class="ms-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4 ms-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="report-box__total fs-3xl fw-medium mt-6">4.710</div>
                                <div class="fs-base text-gray-600 mt-1">Item Sales</div>
                            </div>
                        </div>
                    </div>
                    <div class="g-col-12 g-col-sm-6 g-col-xl-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="d-flex">
                                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i> 
                                    <div class="ms-auto">
                                        <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-feather="chevron-down" class="w-4 h-4 ms-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="report-box__total fs-3xl fw-medium mt-6">3.721</div>
                                <div class="fs-base text-gray-600 mt-1">New Orders</div>
                            </div>
                        </div>
                    </div>
                    <div class="g-col-12 g-col-sm-6 g-col-xl-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="d-flex">
                                    <i data-feather="monitor" class="report-box__icon text-theme-12"></i> 
                                    <div class="ms-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4 ms-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="report-box__total fs-3xl fw-medium mt-6">2.149</div>
                                <div class="fs-base text-gray-600 mt-1">Total Products</div>
                            </div>
                        </div>
                    </div>
                    <div class="g-col-12 g-col-sm-6 g-col-xl-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="d-flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i> 
                                    <div class="ms-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4 ms-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="report-box__total fs-3xl fw-medium mt-6">152.040</div>
                                <div class="fs-base text-gray-600 mt-1">Unique Visitor</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Sales Report -->
            <!-- END: Sales Report -->
            <!-- BEGIN: Weekly Top Seller -->
            <!-- END: Weekly Top Seller -->
            <!-- BEGIN: Sales Report -->
            <!-- END: Sales Report -->
            <!-- BEGIN: Official Store -->
            <!-- END: Official Store -->
            <!-- BEGIN: Weekly Best Sellers -->
            <!-- END: Weekly Best Sellers -->
            <!-- BEGIN: General Report -->
            <!-- END: General Report -->
            <!-- BEGIN: Weekly Top Products -->
            <!-- END: Weekly Top Products -->
        </div>
    </div>
    <div class="g-col-12 g-col-xxl-3">
        <div class="border-start-xxl border-theme-5 dark-border-dark-3 mb-n10 pb-10">
            <div class="ps-xxl-6 grid grid-cols-12 gap-6">
                <!-- BEGIN: Transactions -->
                <!-- END: Transactions -->
                <!-- BEGIN: Recent Activities -->
                <!-- END: Recent Activities -->
                <!-- BEGIN: Important Notes -->
                <!-- END: Important Notes -->
                <!-- BEGIN: Schedules -->
                <div class="g-col-12 g-col-md-6 g-col-xl-4 g-col-xxl-12 g-start-xl-1 g-row-start-xl-2 g-start-xxl-auto g-row-start-xxl-auto mt-3">
                    <div class="intro-x d-flex align-items-center h-10">
                        <h2 class="fs-lg fw-medium truncate me-5">
                            Schedules
                        </h2>
                        <a href="" class="ms-auto text-theme-26 dark-text-gray-400 truncate d-flex align-items-center"> <i data-feather="plus" class="w-4 h-4 me-1"></i> Add New Schedules </a>
                    </div>
                    <div class="mt-5">
                        <div class="intro-x box">
                            <div class="p-5">
                                <div class="d-flex">
                                    <i data-feather="chevron-left" class="w-5 h-5 text-gray-600"></i> 
                                    <div class="fw-medium fs-base mx-auto">April</div>
                                    <i data-feather="chevron-right" class="w-5 h-5 text-gray-600"></i> 
                                </div>
                                <div class="grid columns-7 gap-4 mt-5 text-center">
                                    <div class="fw-medium">Su</div>
                                    <div class="fw-medium">Mo</div>
                                    <div class="fw-medium">Tu</div>
                                    <div class="fw-medium">We</div>
                                    <div class="fw-medium">Th</div>
                                    <div class="fw-medium">Fr</div>
                                    <div class="fw-medium">Sa</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">29</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">30</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">31</div>
                                    <div class="py-0.5 rounded position-relative">1</div>
                                    <div class="py-0.5 rounded position-relative">2</div>
                                    <div class="py-0.5 rounded position-relative">3</div>
                                    <div class="py-0.5 rounded position-relative">4</div>
                                    <div class="py-0.5 rounded position-relative">5</div>
                                    <div class="py-0.5 bg-theme-18 dark-bg-theme-9 rounded position-relative">6</div>
                                    <div class="py-0.5 rounded position-relative">7</div>
                                    <div class="py-0.5 bg-theme-1 dark-bg-theme-1 text-white rounded position-relative">8</div>
                                    <div class="py-0.5 rounded position-relative">9</div>
                                    <div class="py-0.5 rounded position-relative">10</div>
                                    <div class="py-0.5 rounded position-relative">11</div>
                                    <div class="py-0.5 rounded position-relative">12</div>
                                    <div class="py-0.5 rounded position-relative">13</div>
                                    <div class="py-0.5 rounded position-relative">14</div>
                                    <div class="py-0.5 rounded position-relative">15</div>
                                    <div class="py-0.5 rounded position-relative">16</div>
                                    <div class="py-0.5 rounded position-relative">17</div>
                                    <div class="py-0.5 rounded position-relative">18</div>
                                    <div class="py-0.5 rounded position-relative">19</div>
                                    <div class="py-0.5 rounded position-relative">20</div>
                                    <div class="py-0.5 rounded position-relative">21</div>
                                    <div class="py-0.5 rounded position-relative">22</div>
                                    <div class="py-0.5 bg-theme-17 dark-bg-theme-11 rounded position-relative">23</div>
                                    <div class="py-0.5 rounded position-relative">24</div>
                                    <div class="py-0.5 rounded position-relative">25</div>
                                    <div class="py-0.5 rounded position-relative">26</div>
                                    <div class="py-0.5 bg-theme-14 dark-bg-theme-12 rounded position-relative">27</div>
                                    <div class="py-0.5 rounded position-relative">28</div>
                                    <div class="py-0.5 rounded position-relative">29</div>
                                    <div class="py-0.5 rounded position-relative">30</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">1</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">2</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">3</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">4</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">5</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">6</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">7</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">8</div>
                                    <div class="py-0.5 rounded position-relative text-gray-600">9</div>
                                </div>
                            </div>
                            <div class="border-top border-gray-200 dark-border-dark-5 p-5">
                                <div class="d-flex align-items-center">
                                    <div class="w-2 h-2 bg-theme-11 rounded-circle me-3"></div>
                                    <span class="truncate">UI/UX Workshop</span> 
                                    <div class="h-px flex-1 border border-right border-dashed border-gray-300 mx-3 d-xl-none"></div>
                                    <span class="fw-medium ms-xl-auto">23th</span> 
                                </div>
                                <div class="d-flex align-items-center mt-4">
                                    <div class="w-2 h-2 bg-theme-1 dark-bg-theme-10 rounded-circle me-3"></div>
                                    <span class="truncate">VueJs Frontend Development</span> 
                                    <div class="h-px flex-1 border border-right border-dashed border-gray-300 mx-3 d-xl-none"></div>
                                    <span class="fw-medium ms-xl-auto">10th</span> 
                                </div>
                                <div class="d-flex align-items-center mt-4">
                                    <div class="w-2 h-2 bg-theme-12 rounded-circle me-3"></div>
                                    <span class="truncate">Laravel Rest API</span> 
                                    <div class="h-px flex-1 border border-right border-dashed border-gray-300 mx-3 d-xl-none"></div>
                                    <span class="fw-medium ms-xl-auto">31th</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Schedules -->
            </div>
        </div>
    </div>
</div>

@stop