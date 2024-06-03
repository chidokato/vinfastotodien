
@if($key > 0 && $key % 3 == 0)
<div class="small_product">
    <div class="single_product">
        <div class="product_content">
            <h3><a href="{{ $seikonu[$key]->category->slug }}/{{ $seikonu[$key]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonu[$key]->name }}</a></h3>
            <div class="product_ratings">
                <ul>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                </ul>
            </div>
            <div class="price_box">
                <div class="price_box">
                    <span class="current_price">
                        <small>{{ $seikonu[$key]->price ? $seikonu[$key]->unit : '' }}</small> 
                        <span>{{ $seikonu[$key]->price ? number_format($seikonu[$key]->price) : 'Giá bán: Liên hệ' }}</span>
                    </span>
                    <span class="exchange">
                        @if($seikonu[$key]->unit == '¥')
                        <small>(~₫&nbsp;</small>
                        <span> {{number_format($seikonu[$key]->price*$setting->exchange)}})</span>
                        @endif
                    </span>
                    <span class="old_price">
                        @php if(isset($seikonu[$key]->sale)){
                            echo '<small>₫&nbsp;</small>'.number_format($seikonu[$key]->price*(1+$seikonu[$key]->sale/100));
                        } @endphp
                    </span>
                </div>
            </div>
            @if($seikonu[$key]->genuine == 'on')
            <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
            @endif
        </div>
        <div class="product_thumb">
            <a class="primary_img" href="{{ $seikonu[$key]->category->slug }}/{{ $seikonu[$key]->slug }}"><img src="data/news/{{ $seikonu[$key]->img }}" alt=""></a>
        </div>
    </div>
    <div class="single_product">
        <div class="product_content">
            <h3><a href="{{ $seikonu[$key+1]->category->slug }}/{{ $seikonu[$key+1]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonu[$key+1]->name }}</a></h3>
            <div class="product_ratings">
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
                    <small>{{ $seikonu[$key+1]->price ? $seikonu[$key+1]->unit : '' }}</small> 
                    <span>{{ $seikonu[$key+1]->price ? number_format($seikonu[$key+1]->price) : 'Giá bán: Liên hệ' }}</span>
                </span>
                <span class="exchange">
                    @if($seikonu[$key+1]->unit == '¥')
                    <small>(~₫&nbsp;</small>
                    <span> {{number_format($seikonu[$key+1]->price*$setting->exchange)}})</span>
                    @endif
                </span>
                <span class="old_price">
                    @php if(isset($seikonu[$key+1]->sale)){
                        echo '<small>₫&nbsp;</small>'.number_format($seikonu[$key+1]->price*(1+$seikonu[$key+1]->sale/100));
                    } @endphp
                </span>
            </div>
            @if($seikonu[$key+1]->genuine == 'on')
            <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
            @endif
        </div>
        <div class="product_thumb">
            <a class="primary_img" href="{{ $seikonu[$key+1]->category->slug }}/{{ $seikonu[$key+1]->slug }}"><img src="data/news/{{ $seikonu[$key+1]->img }}" alt=""></a>
        </div>
    </div>
    <div class="single_product">
        <div class="product_content">
            <h3><a href="{{ $seikonu[$key+2]->category->slug }}/{{ $seikonu[$key+2]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonu[$key+2]->name }}</a></h3>
            <div class="product_ratings">
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
                    <small>{{ $seikonu[$key+2]->price ? $seikonu[$key+2]->unit : '' }}</small> 
                        <span>{{ $seikonu[$key+2]->price ? number_format($seikonu[$key+2]->price) : 'Giá bán: Liên hệ' }}</span>
                    </span>
                    <span class="exchange">
                        @if($seikonu[$key+2]->unit == '¥')
                        <small>(~₫&nbsp;</small>
                        <span> {{number_format($seikonu[$key+2]->price*$setting->exchange)}})</span>
                        @endif
                    </span>
                    <span class="old_price">
                        @php if(isset($seikonu[$key+2]->sale)){
                            echo '<small>₫&nbsp;</small>'.number_format($seikonu[$key+2]->price*(1+$seikonu[$key+2]->sale/100));
                        } @endphp
                    </span>
            </div>
            @if($seikonu[$key+2]->genuine == 'on')
            <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
            @endif
        </div>
        <div class="product_thumb">
            <a class="primary_img" href="{{ $seikonu[$key+2]->category->slug }}/{{ $seikonu[$key+2]->slug }}"><img src="data/news/{{ $seikonu[$key+2]->img }}" alt=""></a>
        </div>
    </div>
</div>
@endif
