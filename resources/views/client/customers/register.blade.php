@extends('client.components._layout')
@section('content')

<div ng-controller="CustomerController">
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- START CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Đăng ký</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đăng ký</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>

    <div class="main_content">

        <!-- START REGISTER SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Tạo tài khoản</h3>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="name" 
                                        placeholder="Họ và tên" ng-model="customer.customer_name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="email" 
                                        placeholder="Điện thoại" ng-model="customer.phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="email" 
                                        placeholder="Địa chỉ email" ng-model="customer.email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="email" 
                                        placeholder="Tên đăng nhập" ng-model="customer.users.username">
                                    </div>
                                    <div class="form-group">
                                        <input id="password" class="form-control" required="" type="password" name="password" 
                                        placeholder="Mật khẩu" ng-model="customer.users.password">
                                    </div>
                                    <div class="form-group">
                                        <input id="confirmPassword" class="form-control" required="" type="password" name="password" 
                                        placeholder="Nhập lại mật khẩu" ng-model="customer.users.confirmPassword">
                                    </div>
                                    <!-- <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                                <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="register"
                                        ng-click="register()">Đăng ký tài khoản</button>
                                    </div>
                                </form>
                                <div class="different_login">
                                    <span> hoặc </span>
                                </div>
                                <!-- <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul> -->
                                <div class="form-note text-center">Bạn đã có tài khoản? <a href="/login">Đăng nhập</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END REGISTER SECTION -->

    </div>

</div>


@stop