@extends('admin.components._layout')
@section('content')

<div ng-controller="ProductController">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Tabulator</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button ng-click="action(1, product)" data-tw-toggle="modal" data-tw-target="#modalSave" class="btn btn-primary shadow-md mr-2">
                Add New Product</button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" class="lucide lucide-plus w-4 h-4" data-lucide="plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-plus" data-lucide="file-plus" class="lucide lucide-file-plus w-4 h-4 mr-2">
                                    <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="12" y1="18" x2="12" y2="12"></line>
                                    <line x1="9" y1="15" x2="15" y2="15"></line>
                                </svg> New Category
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="users" data-lucide="users" class="lucide lucide-users w-4 h-4 mr-2">
                                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 010 7.75"></path>
                                </svg> New Group
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                <div class="sm:flex items-center sm:mr-4">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Field</label>
                    <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="name">Name</option>
                        <option value="category">Category</option>
                        <option value="remaining_stock">Remaining Stock</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Type</label>
                    <select id="tabulator-html-filter-type" class="form-select w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="like" selected="">like</option>
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value="<=">&lt;=</option>
                        <option value=">">&gt;</option>
                        <option value=">=">&gt;=</option>
                        <option value="!=">!=</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                    <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Go</button>
                    <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</button>
                </div>
            </form>
            <div class="flex mt-5 sm:mt-0">
                <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="printer" data-lucide="printer" class="lucide lucide-printer w-4 h-4 mr-2">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg> Print
                </button>
                <div class="dropdown w-1/2 sm:w-auto">
                    <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2">
                            <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <line x1="10" y1="9" x2="8" y2="9"></line>
                        </svg> Export <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-auto sm:ml-2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2">
                                        <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <line x1="10" y1="9" x2="8" y2="9"></line>
                                    </svg> Export CSV
                                </a>
                            </li>
                            <li>
                                <a id="tabulator-export-json" href="javascript:;" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2">
                                        <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <line x1="10" y1="9" x2="8" y2="9"></line>
                                    </svg> Export JSON
                                </a>
                            </li>
                            <li>
                                <a id="tabulator-export-xlsx" href="javascript:;" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2">
                                        <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <line x1="10" y1="9" x2="8" y2="9"></line>
                                    </svg> Export XLSX
                                </a>
                            </li>
                            <li>
                                <a id="tabulator-export-html" href="javascript:;" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2">
                                        <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <line x1="10" y1="9" x2="8" y2="9"></line>
                                    </svg> Export HTML
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto scrollbar-hidden">
            <div id="tabulatorProduct" class="mt-5 table-report table-report--tabulator tabulator" role="grid" tabulator-layout="fitColumns">
                <div class="tabulator-header" style="padding-right: 0px; margin-left: 0px;">
                    <div class="tabulator-headers" style="margin-left: 0px;">
                        <div class="tabulator-col" role="columnheader" aria-sort="none" title="" style="min-width: 30px; width: 40px; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">&nbsp;</div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="name" title="" style="min-width: 200px; height: 44px; width: 232px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">PRODUCT NAME</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="images" title="" style="min-width: 200px; height: 44px; width: 232px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">IMAGES</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="remaining_stock" title="" style="min-width: 200px; height: 44px; width: 232px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">REMAINING STOCK</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="status" title="" style="min-width: 200px; height: 44px; width: 235px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">STATUS</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="actions" title="" style="min-width: 200px; width: 201px; display: none; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">ACTIONS</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="name" title="" style="display: none; min-width: 40px; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">PRODUCT NAME</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="category" title="" style="display: none; min-width: 40px; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">CATEGORY</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="remaining_stock" title="" style="display: none; min-width: 40px; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">REMAINING STOCK</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="status" title="" style="display: none; min-width: 40px; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">STATUS</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="images" title="" style="display: none; min-width: 40px; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">IMAGE 1</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="images" title="" style="display: none; min-width: 40px; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">IMAGE 2</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                        <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="images" title="" style="display: none; min-width: 40px; height: 44px;">
                            <div class="tabulator-col-content">
                                <div class="tabulator-col-title-holder">
                                    <div class="tabulator-col-title">IMAGE 3</div>
                                    <div class="tabulator-col-sorter">
                                        <div class="tabulator-arrow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabulator-col-resize-handle"></div>
                            <div class="tabulator-col-resize-handle prev"></div>
                        </div>
                    </div>
                    <div class="tabulator-frozen-rows-holder"></div>
                </div>
                <div class="tabulator-tableHolder" tabindex="0" style="height: 1268px;">
                    <div class="tabulator-table" style="padding-top: 0px; padding-bottom: 0px;">
                        <div ng-cloak dir-paginate="product in products | itemsPerPage:pageSize" current-page="currentPage" class="tabulator-row tabulator-selectable tabulator-row-odd" role="row" style="padding-left: 0px;">
                            <div class="tabulator-cell tabulator-row-handle" role="gridcell" title="" style="width: 40px; text-align: center; height: 64px;">
                                <div class="tabulator-responsive-collapse-toggle open"><span class="tabulator-responsive-collapse-toggle-open">+</span><span class="tabulator-responsive-collapse-toggle-close">-</span></div>
                                <div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="name" title="" style="width: 232px; display: inline-flex; align-items: center; height: 64px;">
                                <div>
                                    <div class="font-medium whitespace-nowrap" >@{{ ::product.product_name }}</div>
                                    <div class="text-slate-500 text-xs whitespace-nowrap">
                                        @{{ product.sub_category.sub_category_name }}</div>
                                </div>
                                <div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="images" title="" style="width: 232px; text-align: center; display: inline-flex; align-items: center; justify-content: center; height: 64px;">
                                <div class="flex lg:justify-center">
                                    <div ng-repeat="image in product.listImages | limitTo:1" class="intro-x w-10 h-10 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        ng-src="@{{image.picture}}">
                                    </div>
                                    
                                </div>
                                <div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell"
                            tabulator-field="remaining_stock" title="" style="width: 232px; text-align: center; display: inline-flex; align-items: center; justify-content: center; height: 64px;">
                            @{{ product.remainingStock }}  
                            <div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="status" title="" style="width: 235px; text-align: center; display: inline-flex; align-items: center; justify-content: center; height: 64px;">
                                <div class="flex items-center lg:justify-center
                                @{{ product.is_active == 1 ? 'text-success' : 'text-danger'}}">
                                    <!-- <i icon-name="check-square" class="w-4 h-4 mr-2"></i> -->
                                    @{{ product.is_active == 1 ? 'Active' : 'Inactive'}} 
                                </div>
                                <div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="actions" title="" style="width: 201px; text-align: center; display: none; align-items: center; justify-content: center; height: 64px;">
                                <div class="flex lg:justify-center items-center">
                                    <a data-tw-toggle="modal" data-tw-target="#modalSave" class="edit flex items-center mr-3" href="javascript:;">
                                        <i icon-name="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="delete flex items-center text-danger" href="javascript:;">
                                        <i icon-name="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                    <a style="color: #d3a30f" class="color flex items-center text-primary" href="javascript:;">
                                        <i icon-name=""  class="w-4 h-4 mr-1"></i> Color
                                    </a>
                                </div>
                                <div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="name" title="" style="display: none; height: 64px;">Samsung Q90 QLED TV<div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="category" title="" style="display: none; height: 64px;">Electronic<div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="remaining_stock" title="" style="display: none; height: 64px;">70<div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="status" title="" style="display: none; height: 64px;">0<div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="images" title="" style="display: none; height: 64px;">preview-10.jpg,preview-4.jpg,preview-5.jpg<div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="images" title="" style="display: none; height: 64px;">preview-10.jpg,preview-4.jpg,preview-5.jpg<div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-cell" role="gridcell" tabulator-field="images" title="" style="display: none; height: 64px;">preview-10.jpg,preview-4.jpg,preview-5.jpg<div class="tabulator-col-resize-handle"></div>
                                <div class="tabulator-col-resize-handle prev"></div>
                            </div>
                            <div class="tabulator-responsive-collapse">
                                <table>
                                    <tr>
                                        <td><strong>ACTIONS</strong></td>
                                        <td>
                                            <div>
                                                <div class="flex lg:justify-center items-center">
                                                    <a ng-click="action(2, product)" data-tw-toggle="modal" data-tw-target="#modalSave" class="edit flex items-center mr-3" href="javascript:;">
                                                        <i icon-name="check-square" class="w-4 h-4 mr-1"></i> Update
                                                    </a>
                                                    <a class="delete flex items-center text-danger" href="javascript:;">
                                                        <i icon-name="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                                    </a>
                                                    <a style="color: #d3a30f" class="color flex items-center text-primary" href="javascript:;">
                                                        <i icon-name=""  class="w-4 h-4 mr-1"></i> Color
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabulator-footer">
                    <span class="tabulator-paginator">
                        <div>
                            <label style="font-weight: 500">Page size: </label>
                            <select ng-model="pageSize" ng-init="pageSize='10'">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>  
                        </div>

                        <div style="margin: 8px auto" class="mt-2">
                            <label style="font-weight: 500" ng-cloak>
                                Showing 1 to @{{ pageSize }} of @{{ products.length }} entries
                            </label>
                        </div>


                        <dir-pagination-controls 
                            max-size="10" 
                            direction-links="true"
                            boundary-links="true"
                            >
                        </dir-pagination-controls>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- BEGIN: modal product -->
    <div id="modalSave" data-tw-backdrop="static" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-header">
                <label style="font-weight: 500; margin-right: auto" ng-cloak>
                    @{{ title }}
                </label>
                <a data-tw-dismiss="modal" 
                href="javascript:;"
                ng-click="getProducts()" 
                >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x block mx-auto"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </a>
            </div>   
            <div class="modal-content">
                <div class="modal-body">
                    <div class="intro-y box">
                        <div class="sm:grid grid-cols-1 gap-2">
                            <div>
                                <div>
                                    <label for="crud-form-1" class="form-label">Product Code</label>
                                    <input ng-model="product.product_code" id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text" disabled>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="crud-form-1" class="form-label">Product Name</label>
                                    <input ng-model="product.product_name" id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="sm:grid grid-cols-3 gap-2">
                                <div>
                                    <label for="crud-form-1" class="form-label">Origin</label>
                                    <input ng-model="product.origin" id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text">
                                </div>
    
                                <div>
                                    <label for="crud-form-1" class="form-label">Material</label>
                                    <input ng-model="product.material" id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text">
                                </div>
    
                                <div>
                                    <label for="crud-form-1" class="form-label">Style</label>
                                    <input ng-model="product.style" id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="sm:grid grid-cols-3 gap-2">
                                <div>
                                    <label for="crud-form-1" class="form-label">Category</label>
                                    <div class="mt-2">
                                        <select 
                                        ng-model="product.sub_category_id" 
                                        data-placeholder="Select category"
                                        class="w-full">
                                            <optgroup ng-repeat="category in categories"
                                            label="@{{ category.category_name }}">
                                                <option 
                                                ng-repeat="subCategory in category.sub_categories" 
                                                ng-selected="product.sub_category_id == subCategory.id"
                                                value="@{{ subCategory.id }}">@{{ subCategory.sub_category_name }}</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="crud-form-1" class="form-label">Brand</label>
                                    <div class="mt-2">
                                        <select 
                                        ng-model="product.brand_id"
                                        data-placeholder="Select brand"
                                             class="w-full">
                                            <option 
                                            ng-repeat="brand in brands" 
                                            ng-selected="product.brand_id == brand.id"
                                            value="@{{ brand.id }}">@{{ brand.brand_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="crud-form-1" class="form-label">Supplier</label>
                                    <div class="mt-2">
                                        <select ng-model="product.supplier_id" data-placeholder="Select brand"
                                             class="w-full">
                                            <option 
                                            ng-repeat="supplier in suppliers" 
                                            ng-selected="product.supplier_id == supplier.id"
                                            value="@{{ supplier.id }}">@{{ supplier.supplier_name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <label>Active Status</label>
                            <div class="form-switch mt-2">
                                <input 
                                ng-model="product.is_active"
                                ng-checked="product.is_active == 1" type="checkbox" class="form-check-input">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Size table</label>

                            <div class="form-switch mt-2">
                                <input 
                                type="file" id="upload" name='input_img'
                                select-ng-files 
                                ng-model="files"
                                ng-change="readUrl(this, '.size__table-picture')"
                                accept="image/*" 
                                class="size__table-upload w-full" style="display: none">

                                <input type="file" id="selectedFile" style="display: none;" />
                                <input 
                                id="browser"
                                type="button"
                                value="Browse..."
                                onclick="document.getElementById('upload').click();"
                                />
                            </div>

                            <div class="mt-2">
                                <img 
                                class="size__table-picture w-full rounded-md"
                                style="height: 350px; object-fit: cover;"
                                ng-src="/uploads/products/@{{ product.size_table }}"
                                >
                                
                                <div class="w-full mt-2">
                                    <button 
                                    style="color: #fff; background: #064e3b"
                                    class="btn btn-secondary
                                     w-24 mr-1 mb-2">Clear</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Description</label>
                            <div class="mt-2">
                                <div 
                                ckeditor="options"
                                ng-model="product.description"
                                ></div>
                            </div>
                        </div>
                        <div class="text-right mt-5">
                            <button ng-click="getProducts()" data-tw-dismiss="modal" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button ng-click="save(product)" type="button" class="btn btn-primary w-24">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: modal product -->
</div>





@stop