<div class="single_product">
    <div class="product_thumb">
        <a class="primary_img" href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/product/{{$val->img}}" alt="{{$val->name}}"></a>
    </div>

    <div class="product_content grid_content">
        <div class="product_name grid_name">
            <h3 class="text-truncate-set text-truncate-set-2"><a href="{{$val->category->slug}}/{{$val->slug}}">{{$val->name}}</a></h3>
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
            </div>
            <div class="product_footer d-flex align-items-center">
                <div class="price_box">
                    <span class="current_price">
                        <span>{{ $val->price ? number_format($val->price) : 'Giá bán: Liên hệ' }}</span>
                        <small>{{ $val->price ? $val->unit : '' }}</small> 
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
