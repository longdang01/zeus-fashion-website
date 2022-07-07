

<nav class="side-nav" ng-controller="LoginController">
    <a href="" class="intro-x d-flex align-items-center ps-5 pt-4">
        <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="/assets/admin/dist/images/logo.svg">
        <span class="d-none d-xl-block text-white fs-lg ms-3"> Zeus. </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="/admin/dashboards" 
            class="side-menu side-menu--open"
            ng-class="getClass('/admin/dashboards')">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Bảng Điều Khiển 
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
        </li>
        <li ng-cloak ng-if="checkPermission('nhập hàng', groupImport)" class="side-nav__devider my-6"></li>
        <li ng-cloak ng-if="checkPermission('nhập hàng', groupImport)">
            <a href="javascript:;.html" class="side-menu side-menu--open"
            ng-class="getClass(null, groupImport)">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Nhập Hàng
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="/admin/products" class="side-menu"
                    ng-class="getClass('/admin/products')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Sản Phẩm </div>
                    </a>
                </li>
                <li>
                    <a href="/admin/categories" class="side-menu"
                    ng-class="getClass('/admin/categories')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Danh Mục </div>
                    </a>
                </li>
                <li>
                    <a href="/admin/brands" class="side-menu"
                    ng-class="getClass('/admin/brands')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Thương hiệu </div>
                    </a>
                </li>
                <li>
                    <a href="/admin/suppliers" class="side-menu"
                    ng-class="getClass('/admin/suppliers')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Nhà Cung Cấp </div>
                    </a>
                </li>
            </ul>
        </li>
        <li ng-cloak ng-if="checkPermission('bán hàng', groupSell)" class="side-nav__devider my-6"></li>
        <li ng-cloak ng-if="checkPermission('bán hàng', groupSell)">
            <a href="javascript:;.html" class="side-menu side-menu--open"
            ng-class="getClass(null, groupSell)">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Bán Hàng
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="/admin/orders" class="side-menu"
                    ng-class="getClass('/admin/orders')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Đơn Hàng </div>
                    </a>
                </li>
                <li>
                    <a href="/admin/payments" class="side-menu"
                    ng-class="getClass('/admin/payments')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Thanh Toán </div>
                    </a>
                </li>
                <li>
                    <a href="/admin/transports" class="side-menu"
                    ng-class="getClass('/admin/transports')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Vận Chuyển </div>
                    </a>
                </li>
            </ul>
        </li>
        <li ng-cloak ng-if="checkPermission('admin', groupUsers)" class="side-nav__devider my-6"></li>
        <li ng-cloak ng-if="checkPermission('admin', groupUsers)">
            <a href="javascript:;.html" class="side-menu side-menu--open"
            ng-class="getClass(null, groupUsers)">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Người Dùng
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="/admin/staffs" class="side-menu"
                    ng-class="getClass('/admin/staffs')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Nhân Viên </div>
                    </a>
                </li>
                <li>
                    <a href="/admin/roles" class="side-menu"
                    ng-class="getClass('/admin/roles')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Vai Trò </div>
                    </a>
                </li>
            </ul>
        </li>
        <li ng-cloak ng-if="checkPermission('nội dung', groupUtilities)" class="side-nav__devider my-6"></li>
        <li ng-cloak ng-if="checkPermission('nội dung', groupUtilities)">
            <a href="javascript:;.html" class="side-menu side-menu--open"
            ng-class="getClass(null, groupUtilities)">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Nội dung
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="/admin/news" class="side-menu"
                    ng-class="getClass('/admin/news')">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tin tức </div>
                    </a>
                </li>
            </ul>
        </li>
        
    </ul>
</nav>
