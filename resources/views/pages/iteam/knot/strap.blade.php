<div class="col-lg-6">
    <div class="outer">
        <div id="" class="owl-carousel owl-theme big">
            <div class="item">
                <img src="data/news/{{$strap->img}}" alt="">
            </div>
            @foreach($strap->images as $val)
            <div class="item">
                <img src="data/product/detail/{{$val->img}}" alt="">
            </div>
            @endforeach
        </div>
        <div id="" class="owl-carousel owl-theme thumbs">
            <div class="item">
                <img src="data/news/{{$strap->img}}" alt="">
            </div>
            @foreach($strap->images as $val)
            <div class="item">
                <img src="data/product/detail/{{$val->img}}" alt="">
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="desc">
        <h3>{{$strap->name}}</h3>
        <hr>
        <div class="style-4">
            <div class="price_box">
                <span class="current_price">
                    <small>{{ $strap->price ? $strap->unit : '' }}</small> 
                    <span>{{ $strap->price ? number_format($strap->price) : 'Giá bán: Liên hệ' }}</span>
                </span>
                <span class="exchange">
                    @if($strap->unit == '¥')
                    <small>(~₫&nbsp;</small>
                    <span> {{number_format($strap->price * $setting->exchange)}})</span>
                    @endif
                </span>
                <span class="old_price">
                    @php if(isset($strap->sale)){
                        echo '<small>₫&nbsp;</small>'.number_format($strap->price*(1+$strap->sale/100));
                    } @endphp
                </span>
            </div>
            <p class="genuine"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
            <div>
                {{$strap->detal}}
            </div>
            <div class="parameter">
                {!! $strap->parameter !!}
            </div>
        </div>
        <div class="mt-3">
            <a target="_blank" href="{{$strap->category->slug}}/{{$strap->slug}}"> <button class="btn btn-custom">xem chi tiết</button> </a>
        </div>
    </div>
    
</div>


<script type="text/javascript">
    $(document).ready(function() {
  var bigimage = $(".big");
  var thumbs = $(".thumbs");
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