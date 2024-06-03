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
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div class="outer">
                        <div id="big" class="owl-carousel owl-theme">
                            <div class="item" >
                                <img src="data/news/{{$post->img}}">
                            </div>
                            @foreach($images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/news/{{$post->img}}" alt="">
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

            <div class="col-lg-6 col-md-6">
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
                        <!-- <div class="ml-1 font-1">Đã bán: {{rand(50, 100)}} sản phẩm</div> -->
                    </div>
                    
                    <div class="price_box">
                        <span class="current_price">
                            <small>{{ $post->price ? $post->unit : '' }}</small> 
                            <span>{{ $post->price ? number_format($post->price) : 'Giá bán: Liên hệ' }}</span>
                        </span>
                        <span class="exchange">
                            @if($post->unit == '¥')
                            <small>(~₫&nbsp;</small>
                            <span> {{number_format($post->price*$setting->exchange)}})</span>
                            @endif
                        </span>
                        <span class="old_price">
                            @php if(isset($post->sale)){
                                echo '<small>₫&nbsp;</small>'.number_format($post->price*(1+$post->sale/100));
                            } @endphp
                        </span>
                    </div>
                    <div class="product_desc">
                        <p>{{$post->detail}}</p>
                        @if($post->genuine == 'on')
                        <p class="genuine"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                        @endif
                    </div>
                    <!-- <div class="product_variant color">
                        <h3>Available Options</h3>
                        <label>color</label>
                        <ul>
                            <li class="color1"><a href="#"></a></li>
                            <li class="color2"><a href="#"></a></li>
                            <li class="color3"><a href="#"></a></li>
                            <li class="color4"><a href="#"></a></li>
                        </ul>
                    </div> -->

                    <!-- <div class="product_variant size">
                        <label>size</label>
                        <select class="niceselect_option" id="color2" name="produc_color2">
                            <option selected value="1"> size in option</option>
                            <option value="2">s</option>
                            <option value="3">m</option>
                            <option value="4">l</option>
                            <option value="5">xl</option>
                            <option value="6">xxl</option>
                        </select>
                    </div> -->
                    <div class="product_variant quantity">
                        <a data-url="{{route('addTocart', ['id' => $post->id])}}" href="#" class="add_cart"><button class="button" type="button"><span class="lnr lnr-cart"></span> Thêm vào giỏ hàng</button></a>
                    </div>
                    <div class=" product_d_action">
                        <ul>
                            <li><span class="lnr lnr-phone"></span> Gọi đặt mua: {{$setting->hotline}}</li>
                        </ul>
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
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Giới thiệu chi tiết</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Thông số</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                {!! $post->content !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_info_content">
                                {!! $post->parameter !!}
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                <h2>1 review for Donec eu furniture</h2>
                                <div class="reviews_comment_box">
                                    <div class="comment_thmb">
                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                    </div>
                                    <div class="comment_text">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <p><strong>admin </strong>- September 12, 2018</p>
                                            <span>roadthemes</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="comment_title">
                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                </div>
                                <div class="product_ratting mb-10">
                                    <h3>Your rating</h3>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_review_form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea name="comment" id="review_comment"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input id="email" type="text">
                                            </div>
                                        </div>
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
<script type="text/javascript">
    $(document).ready(function() {
  var bigimage = $("#big");
  var thumbs = $("#thumbs");
  //var totalslides = 10;
  var syncedSecondary = false;

  bigimage
    .owlCarousel({
    items: 1,
    slideSpeed: 2000,
    nav: false,
    autoplay: false,
    dots: false,
    loop: false,
    responsiveRefreshRate: 200,
    navText: [
      '<span class="lnr lnr-chevron-left"></span>',
      '<span class="lnr lnr-chevron-right"></span>'
    ]
  })
    .on("changed.owl.carousel", syncPosition);

  thumbs
    .on("initialized.owl.carousel", function() {
    thumbs
      .find(".owl-item")
      .eq(0)
      .addClass("current");
  })
    .owlCarousel({
    items: 5,
    dots: false,
    nav: false,
    // navText: [
    //   '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
    //   '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    // ],
    smartSpeed: 200,
    slideSpeed: 500,
    slideBy: 4,
    responsiveRefreshRate: 100
  })
    .on("changed.owl.carousel", syncPosition2);

  function syncPosition(el) {
    //if loop is set to false, then you have to uncomment the next line
    //var current = el.item.index;

    //to disable loop, comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

    if (current < 0) {
      current = count;
    }
    if (current > count) {
      current = 0;
    }
    //to this
    thumbs
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = thumbs.find(".owl-item.active").length - 1;
    var start = thumbs
    .find(".owl-item.active")
    .first()
    .index();
    var end = thumbs
    .find(".owl-item.active")
    .last()
    .index();

    if (current > end) {
      thumbs.data("owl.carousel").to(current, 100, true);
    }
    if (current < start) {
      thumbs.data("owl.carousel").to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if (syncedSecondary) {
      var number = el.item.index;
      bigimage.data("owl.carousel").to(number, 100, true);
    }
  }

  thumbs.on("click", ".owl-item", function(e) {
    e.preventDefault();
    var number = $(this).index();
    bigimage.data("owl.carousel").to(number, 300, true);
  });
});
</script>
@endsection