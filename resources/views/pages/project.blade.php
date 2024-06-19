@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')

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
                    <div class="outer">
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
                <div class="product_d_inner">
                    <div class="js-table-of-content table-of-content"></div>
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
      '"><a href="#' +
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

  // Just found a levelUp event
  if (segments.length - 1 > hIndex) {
    segments = segments.slice(0, hIndex + 1);
  }

  // Just found a levelDown event
  if (segments[hIndex] == undefined) {
    segments[hIndex] = 0;
  }

  // count + 1 at current level
  segments[hIndex]++;

  return {
    hLevel: hLevel,
    hIndex: hIndex,
    hText: hText,
    segments: segments
  };
}

    </script>
@endsection