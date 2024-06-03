@if($key > 0 && $key % 3 == 0)
<div class="small_product">
    <div class="single_product">
        <div class="product_content">
            <h3><a href="{{ $seikonam[$key]->category->slug }}/{{ $seikonam[$key]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonam[$key]->name }}</a></h3>
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
                        <small>{{ $seikonam[$key]->price ? $seikonam[$key]->unit : '' }}</small> 
                        <span>{{ $seikonam[$key]->price ? number_format($seikonam[$key]->price) : 'Giá bán: Liên hệ' }}</span>
                    </span>
                    <span class="exchange">
                        @if($seikonam[$key]->unit == '¥')
                        <small>(~₫&nbsp;</small>
                        <span> {{number_format($seikonam[$key]->price*$setting->exchange)}})</span>
                        @endif
                    </span>
                    <span class="old_price">
                        @php if(isset($seikonam[$key]->sale)){
                            echo '<small>₫&nbsp;</small>'.number_format($seikonam[$key]->price*(1+$seikonam[$key]->sale/100));
                        } @endphp
                    </span>
                </div>
            </div>
            @if($seikonam[$key]->genuine == 'on')
            <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
            @endif
        </div>
        <div class="product_thumb">
            <a class="primary_img" href="{{ $seikonam[$key]->category->slug }}/{{ $seikonam[$key]->slug }}"><img src="data/news/{{ $seikonam[$key]->img }}" alt=""></a>
        </div>
    </div>
    <div class="single_product">
        <div class="product_content">
            <h3><a href="{{ $seikonam[$key+1]->category->slug }}/{{ $seikonam[$key+1]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonam[$key+1]->name }}</a></h3>
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
                    <small>{{ $seikonam[$key+1]->price ? $seikonam[$key+1]->unit : '' }}</small> 
                    <span>{{ $seikonam[$key+1]->price ? number_format($seikonam[$key+1]->price) : 'Giá bán: Liên hệ' }}</span>
                </span>
                <span class="exchange">
                    @if($seikonam[$key+1]->unit == '¥')
                    <small>(~₫&nbsp;</small>
                    <span> {{number_format($seikonam[$key+1]->price*$setting->exchange)}})</span>
                    @endif
                </span>
                <span class="old_price">
                    @php if(isset($seikonam[$key+1]->sale)){
                        echo '<small>₫&nbsp;</small>'.number_format($seikonam[$key+1]->price*(1+$seikonam[$key+1]->sale/100));
                    } @endphp
                </span>
            </div>
            @if($seikonam[$key+1]->genuine == 'on')
            <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
            @endif
        </div>
        <div class="product_thumb">
            <a class="primary_img" href="{{ $seikonam[$key+1]->category->slug }}/{{ $seikonam[$key+1]->slug }}"><img src="data/news/{{ $seikonam[$key+1]->img }}" alt=""></a>
        </div>
    </div>
    <div class="single_product">
        <div class="product_content">
            <h3><a href="{{ $seikonam[$key+2]->category->slug }}/{{ $seikonam[$key+2]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonam[$key+2]->name }}</a></h3>
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
                    <small>{{ $seikonam[$key+2]->price ? $seikonam[$key+2]->unit : '' }}</small> 
                        <span>{{ $seikonam[$key+2]->price ? number_format($seikonam[$key+2]->price) : 'Giá bán: Liên hệ' }}</span>
                    </span>
                    <span class="exchange">
                        @if($seikonam[$key+2]->unit == '¥')
                        <small>(~₫&nbsp;</small>
                        <span> {{number_format($seikonam[$key+2]->price*$setting->exchange)}})</span>
                        @endif
                    </span>
                    <span class="old_price">
                        @php if(isset($seikonam[$key+2]->sale)){
                            echo '<small>₫&nbsp;</small>'.number_format($seikonam[$key+2]->price*(1+$seikonam[$key+2]->sale/100));
                        } @endphp
                    </span>
            </div>
            @if($seikonam[$key+2]->genuine == 'on')
            <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
            @endif
        </div>
        <div class="product_thumb">
            <a class="primary_img" href="{{ $seikonam[$key+2]->category->slug }}/{{ $seikonam[$key+2]->slug }}"><img src="data/news/{{ $seikonam[$key+2]->img }}" alt=""></a>
        </div>
    </div>
</div>
@endif
