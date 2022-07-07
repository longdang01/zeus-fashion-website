@extends('client.components._layout')
@section('content')

<div ng-controller="CustomerController">
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đăng nhập</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>

    <div class="main_content">

        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Đăng nhập</h3>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="email"
                                        placeholder="Tên đăng nhập" ng-model="users.username">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" type="password" name="password"
                                        placeholder="Mật khẩu" ng-model="users.password">
                                    </div>
                                    <!-- <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div> -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login"
                                        ng-click="login()">Đăng nhập</button>
                                    </div>
                                </form>
                                <div class="different_login">
                                    <span> hoặc </span>
                                </div>
                                <!-- <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul> -->
                                <div class="form-note text-center">Bạn chưa có tài khoản? <a href="/register">Đăng ký ngay</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->

    </div>


</div>




@stop