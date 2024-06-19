@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<style type="text/css">
    #sync1 .item {
  background: #0c83e7;
  padding: 80px 0px;
  margin: 5px;
  color: #FFF;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  text-align: center;
}

#sync2 .item {
  background: #C9C9C9;
  padding: 10px 0px;
  margin: 5px;
  color: #FFF;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  text-align: center;
  cursor: pointer;
}
#sync2 .item h1 {
  font-size: 18px;
}
#sync2 .current .item {
  background: #0c83e7;
}

.owl-theme .owl-nav {
  /*default owl-theme theme reset .disabled:hover links */
}
.owl-theme .owl-nav [class*=owl-] {
  transition: all 0.3s ease;
}
.owl-theme .owl-nav [class*=owl-].disabled:hover {
  background-color: #D6D6D6;
}

#sync1.owl-theme {
  position: relative;
}
#sync1.owl-theme .owl-next, #sync1.owl-theme .owl-prev {
  width: 22px;
  height: 40px;
  margin-top: -20px;
  position: absolute;
  top: 50%;
}
#sync1.owl-theme .owl-prev {
  left: 10px;
}
#sync1.owl-theme .owl-next {
  right: 10px;
}
</style>
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
                <div class="product-details-tab">.
                    <div id="sync1" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="data/product/{{$post->img}}">
                        </div>
                        @foreach($images as $val)
                        <div class="item">
                            <img src="data/product/detail/{{$val->img}}" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div id="sync2" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="data/product/{{$post->img}}">
                        </div>
                        @foreach($images as $val)
                        <div class="item">
                            <img src="data/product/detail/{{$val->img}}" alt="">
                        </div>
                        @endforeach
                    </div>
                    <!-- <div class="outer">
                        <div id="big" class="owl-carousel owl-theme">
                            <div class="item" >
                                <img src="data/product/{{$post->img}}">
                            </div>
                            @foreach($images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/product/{{$post->img}}" alt="">
                            </div>
                            @foreach($images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div> -->
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
'"><a href="{{$post->category->slug}}/{{$post->slug}}#' +
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

<script type="text/javascript">
    $(document).ready(function() {

    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    var slidesPerPage = 4; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        autoplay: false, 
        dots: true,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
    }).on('changed.owl.carousel', syncPosition);

    sync2
        .on('initialized.owl.carousel', function() {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            items: slidesPerPage,
            dots: true,
            nav: true,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //end block

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });
});
</script>

@endsection