<div class="single_product">
    <div class="product_thumb">
        <a class="primary_img" href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/news/{{$val->img}}" alt=""></a>
        <!-- <a class="secondary_img" href=""><img src="assets/img/product/product11.jpg" alt=""></a> -->
        @if($val->sale)
        <div class="label_product">
            <span class='label_sale'>-{{$val->sale}}%</span>
        </div>
        @endif
        <!-- <div class="action_links">
            <ul>
                <li class="wishlist"><a href="" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                <li class="compare"><a href="" title="compare"><span class="lnr lnr-cart"></span></a></li>
            </ul>
        </div> -->
    </div>

    <div class="product_content grid_content">
        <div class="product_name grid_name">
            <h3 class="text-truncate-set text-truncate-set-2"><a href="{{$val->category->slug}}/{{$val->slug}}">{{$val->name}}</a></h3>
            <!-- <p class="manufacture_product"><a href="#">{{$val->category->name}}</a></p> -->
        </div>
        <div class="content_inner">
            <div class="product_ratings d-flex" style="align-items: center;">
                <ul>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                </ul>
                @if($val->genuine == 'on')
                <p class="genuine ml-2" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Chính hãng</p>
                @endif
            </div>
            <div class="product_footer d-flex align-items-center">
                <div class="price_box">
                    <span class="current_price">
                        <small>{{ $val->price ? $val->unit : '' }}</small> 
                        <span>{{ $val->price ? number_format($val->price) : 'Giá bán: Liên hệ' }}</span>
                    </span>
                    <span class="exchange">
                        @if($val->unit == '¥')
                        <small>(~₫&nbsp;</small>
                        <span> {{number_format($val->price * $setting->exchange)}})</span>
                        @endif
                    </span>
                    <span class="old_price">
                        @php if(isset($val->sale)){
                            echo '<small>₫&nbsp;</small>'.number_format($val->price*(1+$val->sale/100));
                        } @endphp
                    </span>
                </div>
                <div class="add_to_cart">
                    <a data-url="{{route('addTocart', ['id' => $val->id])}}" href="#" class="add_cart"><span class="lnr lnr-cart"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
