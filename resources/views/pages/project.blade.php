@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/project.css">
@endsection

@section('content')

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li><a href="{{$post->category->slug}}">{{$post->category->name}}</a></li>
                        <li>{{$post->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details variable_product mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="product-details-tab">
                    <!-- <div id="sync1" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="data/product/{{$post->img}}">
                        </div>
                        @foreach($images as $val)
                        <div class="item">
                            <img src="data/product/detail/{{$val->img}}" alt="">
                        </div>
                        @endforeach
                    </div> -->
                    <div class="main-carousel owl-carousel">
                        <div> <img src="data/product/{{$post->img}}" alt="Image 1"> </div>
                        @foreach($images as $val)
                        <div> <img src="data/product/detail/{{$val->img}}" alt="Image 1"> </div>
                        @endforeach
                    </div>
                    <div class="thumbnail-carousel owl-carousel">
                        <img src="data/product/{{$post->img}}" alt="Thumbnail 1" data-index="0">
                        @foreach($images as $key => $val)
                        <img src="data/product/detail/{{$val->img}}" alt="Thumbnail 1" data-index="{{$key+1}}">
                        @endforeach
                    </div>
                
                </div>
            </div>

            <div class="col-lg-5 col-md-5">
                <div class="product_d_right">
                    <h1>{{$post->name}}</h1>
                    <div class="product_ratings d-flex" style="align-items: center;">
                        <ul>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                        </ul>
                    </div>
                    
                    <div class="price_box">
                        <span class="current_price">
                            <span>{{ $post->price ? number_format($post->price) : 'Giá bán: Liên hệ' }}</span>
                            <small>{{ $post->price ? $post->unit : '' }}</small> 
                        </span>
                    </div>
                    <div class="product_desc">
                        {!! $post->detail !!}
                    </div>
                    
                    <div class="row btn-group-product">
                        <div class="col-6">
                            <a class="btn btn-big btn-seller" href="tel:0985075533">
                                <span>Phụ trách kinh doanh</span>
                                <span class="info-text">0985.075.533</span>
                            </a>
                            <a class="btn btn-big btn-request" href="">
                                <span>Gửi liên hệ</span>
                                <span class="info-text">Yêu cầu báo giá</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-big btn-test-driver" href="">
                                <span>Gửi liên hệ</span>
                                <span class="info-text">Đăng ký lái thử</span>
                            </a>
                            <a class="btn btn-big btn-calculator" href="">
                                <span>Tham khảo</span>
                                <span class="info-text">Chi phí lăn bánh</span>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="product_d_inner">
                    <div class="">
                        <div class="">
                            <div class="product_info_content page-content">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="fix-sticky">
                    <div class="product_d_inner ">
                        <div class="js-table-of-content table-of-content "></div>
                    </div>
                    <br>
                    <div class="product_d_inner ">
                        ádasd
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!--product area start-->
<section class="shop_area shop_reverse category mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> <strong>Sản phẩm</strong>Liên quan</span></h2>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    @foreach($related_post as $val)
                        @include('pages.iteam.product')
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
<!--product area end-->
@endsection

@section('js')
<script>
// tạo menu tự động từ h2 h3
(function ($) {});
setList();
function setList() {
var tabId = 0;
var segments = [],
arrayId = [],
html = '<div class="menu-titile">';
$(".page-content h2, .page-content h3").each(function () {
var data = getData(this, segments),
hId = "tab" + tabId + "_h" + data.hLevel + segments.join("_");
arrayId.push(data.hLevel);
segments = data.segments;
html +=
'<p class="heading-' +
data.hLevel +
'"><a class="nav-link" href="{{$post->category->slug}}/{{$post->slug}}#' +
hId +
'">' +
data.hText +
"</a></p>";
$(this).attr("id", hId);
});
html += "</div>";
console.log(html);

if (arrayId.length) {
$(".js-table-of-content").append(html);
}
}
function getData(element, segments) {
var hLevel = parseInt(element.nodeName.substring(1), 10),
hIndex = parseInt(element.nodeName.substring(1)) - 1,
hText = $(element).text();
if (segments.length - 1 > hIndex) {
segments = segments.slice(0, hIndex + 1);
}
if (segments[hIndex] == undefined) {
segments[hIndex] = 0;
}
segments[hIndex]++;
return {
hLevel: hLevel,
hIndex: hIndex,
hText: hText,
segments: segments
};
}
// tạo menu tự động từ h2 h3
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const sections = document.querySelectorAll('h2[id]');
        const navLinks = document.querySelectorAll('.nav-link');
        // alert(navLinks);
        function onScroll() {
            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                const sectionHeight = section.clientHeight;
                
                if (sectionTop <= window.innerHeight / 2 && sectionTop + sectionHeight >= 0) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').substring(1) === currentSection) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', onScroll);
        onScroll(); // Call onScroll to set the initial state
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        var mainCarousel = $(".main-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            nav: true,
            dots: false
        });

        var thumbnailCarousel = $(".thumbnail-carousel").owlCarousel({
            items: 5,
            loop: false,
            nav: false,
            dots: false
        });

        $(".thumbnail-carousel .owl-item").on("click", function() {
            var index = $(this).find("img").data("index");
            mainCarousel.trigger("owl.goTo", index);
            $(".thumbnail-carousel .owl-item").removeClass("active");
            $(this).addClass("active");
        });

        mainCarousel.on("changed.owl.carousel", function(event) {
            var index = event.item.index;
            $(".thumbnail-carousel .owl-item").removeClass("active");
            $(".thumbnail-carousel .owl-item").eq(index).addClass("active");
            var thumbnailIndex = $(".thumbnail-carousel .owl-item.active").index();
            thumbnailCarousel.trigger("owl.goTo", thumbnailIndex - 1);
        });
    });
</script>



@endsection