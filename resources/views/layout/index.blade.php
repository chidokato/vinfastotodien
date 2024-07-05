<!doctype html>
<html>
<head>
    <!-- seo -->
    <base href="{{asset('')}}">
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" itemprop="keywords" content="@yield('keywords')" />
    <meta name="news_keywords" content="@yield('keywords')" />
    <meta name="robots" content="@yield('robots')"/>
    <link rel="shortcut icon" href="data/home/{{$setting->favicon}}" />
    <link rel="canonical" href="@yield('url')"/>
    <link rel="alternate" href="{{asset('')}}" hreflang="vi-vn" />
    <!-- and seo -->
    <!-- og -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:site_name" content="site_name" />
    <meta property="og:images" content="@yield('img')" />
    <meta property="og:image" content="@yield('img')" />
    <meta property="og:image:alt" content="@yield('title')" />
    <!-- and og -->
    <!-- twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('description')" />
    <!-- and twitter -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="article:author" content="admin" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Sen" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"> 

    <!-- CSS ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="assets/css/font.awesome.css">
    <!--ionicons min css-->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!--animate css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="assets/css/slinky.menu.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/runglac.css">

    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    
    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    @yield('css')

    <style type="text/css">
        
    </style>
    
</head>

<body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')


    <div class="hotline-phone-ring-wrap form-ring-wrap">
        <div class="hotline-phone-ring ">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle click_popup">
                <a href="javascript:void(0)" class="pps-btn-img">
                    <img src="assets/img/icon/dowload.png" alt="Gọi điện thoại" width="50">
                </a>
            </div>
        </div>
        <div class="hotline-bar click_popup">
            <a href="javascript:void(0)">
                <span class="text-hotline">Nhận bảng giá</span>
            </a>
        </div>
    </div>

    <div class="hotline-phone-ring-wrap zalo-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a target="_blank" href="https://zalo.me/{{$setting->hotline}}" class="pps-btn-img">
                <img src="assets/img/icon/zalo.png" alt="Gọi điện thoại" width="50">
            </a>
            </div>
        </div>
        <div class="hotline-bar">
            <a target="_blank" href="https://zalo.me/{{$setting->hotline}}">
                <span class="text-hotline">{{$setting->hotline}}</span>
            </a>
        </div>
    </div>

    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a href="tel:{{$setting->hotline}}" class="pps-btn-img">
                <img src="assets/img/icon/icon-call-nh.png" alt="Gọi điện thoại" width="50">
            </a>
            </div>
        </div>
        <div class="hotline-bar">
            <a href="tel:{{$setting->hotline}}">
                <span class="text-hotline">{{$setting->hotline}}</span>
            </a>
        </div>
    </div>
    
    <!-- <div class="fixd-right">
        <ul>
            <li class="click_popup"><a href="javascript:void(0)"><img src="assets/img/icon/pdf.jpg"> <div>Bảng giá</div></a>  </li>
            <li><a href="tel:{{$setting->hotline}}"><img src="assets/img/icon/phone.png"> <div>Hotline</div></a> </li>
            <li><a href="https://zalo.me/{{$setting->hotline}}"><img src="assets/img/icon/zalo.jpg"> <div>Zalo</div></a> </li>
        </ul>
    </div> -->

    <div class="mini_cart">
        <div class="cart_close">
            <div class="mini_cart_close" id="myButton">
                <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="main-pupop">
            <div class="img">
                <img src="assets/img/about/pupop.jpg">
            </div>        
            <div class="form">
                <h3>Nhận báo giá & Ưu đãi trong tháng</h3>
                <p>Ngay sau khi nhận được yêu cầu Chúng tôi sẽ gửi Báo giá Ưu đãi đến Quý khách ngay!</p>
                <form method="POST" action="{{route('sendmail')}}">
                    @csrf  
                    @method('HEAD')
                    <div>
                        <label>Họ & Tên</label>
                        <input type="text" class="" name="name" placeholder="Họ & Tên">
                    </div>
                    <div>
                        <label>Số điện thoại</label>
                        <input type="text" class="" name="phone" placeholder="Số điện thoại">
                    </div>
                    <div>
                        <label>Dòng xe quan tâm</label>
                        <select name="note">
                            <option>== Dòng xe quan tâm ==</option>
                            @foreach($dongxe as $val)
                            <option value="{{$val->name}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="Submit">Đăng ký ngay</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>


    <!-- JS
    ============================================ -->
    <!--jquery min js-->
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <!--popper min js-->
    <script src="assets/js/popper.js"></script>
    <!--bootstrap min js-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--owl carousel min js-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!--slick min js-->
    <script src="assets/js/slick.min.js"></script>
    <!--magnific popup min js-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--jquery countdown min js-->
    <script src="assets/js/jquery.countdown.js"></script>
    <!--jquery ui min js-->
    <script src="assets/js/jquery.ui.js"></script>
    <!--jquery elevatezoom min js-->
    <script src="assets/js/jquery.elevatezoom.js"></script>
    <!--isotope packaged min js-->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!--slinky menu js-->
    <script src="assets/js/slinky.menu.js"></script>
    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!--zoom img-->
    <!-- <script src="https://unpkg.com/js-image-zoom@0.4.1/js-image-zoom.js" type="application/javascript"></script>
    <script>
    var options = {
        width: 400,
        zoomWidth: 500,
        offset: {vertical: 0, horizontal: 10}
    };
    new ImageZoom(document.getElementById("img-container"), options);
    </script> -->
    
    <!-- validate -->
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script> -->
    <!-- <script src="assets/js/validate.js"></script> -->

    @yield('js')
    
    @if (Session::has('success'))
    <div id="myElement" class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

</body>

</html>