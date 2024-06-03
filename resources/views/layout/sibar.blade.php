<?php use App\Models\Category; ?>
<div class="col-lg-3 col-md-12">
    <aside class="sidebar_widget">
    	<div class="widget_inner">
            <div class="widget_list widget_categories">
                <h3>Danh mục sản phẩm</h3>
                <ul>
                    @foreach($cat_sibar as $val)
                    <?php $sub_cat = Category::where('parent', $val->id)->get(); ?>
                    <li>
                        <a href="{{$val->slug}}">
                            <div>{{$val->name}}</div>
                            @if(count($sub_cat) == 0)<div>({{count($val->Post)}})</div>@endif
                        </a>
                    </li>
                    @if(count($sub_cat) > 0)
                    @foreach($sub_cat as $sub)
                    <li class="sub">
                        <a href="{{$sub->slug}}">
                            <div><span class="lnr lnr-chevron-right"></span> {{$sub->name}}</div>
                            <div>({{count($sub->Post)}})</div>
                        </a>
                    </li>
                    @endforeach
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>

    	<div class="shop_sidebar_banner">
            <a href="#"><img src="assets/img/bg/banner9.jpg" alt=""></a>
        </div>

        <div class="widget_list widget_post pro_news">
            <h3>Sản phẩm mới nhất</h3>
            @foreach($post_news as $val)
            <div class="iteam">
                <div class="row">
                    <div class="col-5">
                        <a class="name" href="blog-details.html"><img src="data/news/{{$val->img}}" alt=""></a>
                    </div>
                    <div class="post_info col-7">
                        <h3 class="text-truncate-set text-truncate-set-2"><a href="">{{$val->name}}</a></h3>
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
                        <span>{{$val->created_at}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </aside>
</div>