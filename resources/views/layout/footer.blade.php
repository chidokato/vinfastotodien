<!--call to action start-->
    <section class="call_to_action">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call_action_inner">
                        <div class="call_text">
                            <h3>Theo dõi chúng tôi trên các nền tảng mạng xã hội</h3>
                            <p>Để nhận được nhiều ưu đãi sớm nhất</p>
                        </div>
                        <!-- <div class="discover_now">
                            <a href="#">discover now</a>
                        </div> -->
                        <div class="link_follow">
                            <ul>
                                <li><a target="_blank" href="{{$setting->facebook}}"><i class="ion-social-facebook"></i></a></li>
                                <!-- <li><a href="#"><i class="ion-social-tiktok"></i></a></li> -->
                                <!-- <li><a href="#"><i class="ion-social-googleplus"></i></a></li> -->
                                <li><a target="_blank" href="{{$setting->youtube}}"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--call to action end-->

<!--footer area start-->
    <footer class="footer_widgets">
        <div class="container">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <div class="footer_contact">
                                <p><span>Địa chỉ:</span> {{$setting->address}}</p>
                                <p><span>Số điện thoại:</span><a href="tel:{{$setting->hotline}}">{{$setting->hotline}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Thôn tin về chúng tôi</h3>
                            <div class="footer_menu">
                                <ul>
                                    <!-- <li><a href="">Giới thiệu</a></li> -->
                                    <li><a href="lien-he">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container">
                            <h3>Theo dõi chúng tôi</h3>
                            <p>Chung tôi luôn cam kết bảo mật thông tin người dùng</p>
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email address here..." />
                                    <button id="mc-submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>Bản quyền thuộc về <a href="rinlisa.com">rinlisa.com</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->