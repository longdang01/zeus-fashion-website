<footer class="footer_dark">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="#">
                                <h3>Zeus <span>.</span></h3>
                                <!-- <img src="/assets/client/dist/images/logo_light.png" alt="logo"/> -->
                            </a>
                        </div>
                        <p>If you are going to use of Lorem Ipsum need to be sure there isn't hidden of text</p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <!-- <li><a href="#"><i class="ion-social-twitter"></i></a></li> -->
                            <!-- <li><a href="#"><i class="ion-social-googleplus"></i></a></li> -->
                            <!-- <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li> -->
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Thông tin</h6>
                        <ul class="widget_links">
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Hướng dẫn mua hàng</a></li>
                            <li><a href="#">Câu hỏi thường gặp</a></li>
                            <!-- <li><a href="#">Location</a></li>
                            <li><a href="#">Affiliates</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Danh mục</h6>
                        <ul class="widget_links" ng-controller="CategoryController">
                            <li><a href="/products">Tất cả</a></li>
                            
                            <li ng-repeat="category in categories">
                                <a href="/products?category=@{{ category.id }}&name=@{{ category.category_name | UrlFriendly }}"
                                >Tất cả @{{ category.category_name }}</a>
                            </li>
                            <!-- <li><a href="#">Best Saller</a></li>
                            <li><a href="#">New Arrivals</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Chính sách</h6>
                        <ul class="widget_links">
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Chính sách đổi hàng</a></li>
                            <li><a href="#">Chính sách trả hàng</a></li>
                            <li><a href="#">Chính sách bảo hành</a></li>
                            <!-- <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Contact Info</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>Ong To, Thi Tran Yen My, Huyen Yen My, Hung Yen</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@sitename.com">zeus-studio@gmail.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>(+89) 283 921 833</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-left">© 2023 All Rights Reserved by Zeus studio</p>
                </div>
                <div class="col-md-6">
                    <ul class="footer_payment text-center text-lg-right">
                        <li><a href="#"><img src="/assets/client/dist/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="/assets/client/dist/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="/assets/client/dist/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="/assets/client/dist/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="/assets/client/dist/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
</footer>