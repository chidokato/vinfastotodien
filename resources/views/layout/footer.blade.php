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
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>VINFAST THĂNG LONG</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> Showroom: {{$setting->address}}</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i> Hotline: {{$setting->hotline}}</li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i> Email: {{$setting->email}}</li>
                                    <li><i class="fa fa-location-arrow" aria-hidden="true"></i> Website: {{asset('')}}</li>
                                </ul>
                            </div>
                            <br>
                            <br>
                            <h4>Giờ mở cửa</h4>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Từ 8h30 đến 22h00 (Hoạt động cả tuần)</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>LIÊN HỆ NGAY ĐỂ ĐƯỢC TƯ VẤN</h3>
                            <h4>TƯ VẤN TẬN TÌNH</h4>
                            <p>Đội ngũ tư vấn được đào tạo chuyên nghiệp, giàu kinh nghiệm luôn sẵn lòng giúp quý khách tìm được chiếc xe ưng ý.</p>
                            <h4>GIÁ ƯU ĐÃI – GIAO XE SỚM</h4>
                            <p>Đại Lý VinFast Thăng Long luôn cam kết mang lại mức giá ưu đãi nhất cho quý khách với thời gian giao xe sớm tại khu vực Miền Bắc</p>
                            <h4>BẢO HÀNH TIÊU CHUẨN TOÀN CẦU</h4>
                            <p>Cung cấp phụ tùng ô tô VinFast chính hãng. Quý khách hãy yên tâm và tin rằng xe VinFast mua tại VinFast Thăng Long luôn được chăm sóc kĩ lưỡng</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>CÁC DÒNG XE</h3>
                            <div class="footer_menu">
                                <ul>
                                    @foreach($dongxe as $val)
                                    <li><a href="{{$val->slug}}"><i class="fa fa-plus" aria-hidden="true"></i> {{$val->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="footer_bottom">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>Bản quyền thuộc về <a href="rinlisa.com">vinfastotodien.com.vn</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->