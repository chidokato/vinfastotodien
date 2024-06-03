@extends('layout.index')

@section('title') Tìm kiếm: {{$key}} @endsection
@section('description') Tìm kiếm @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li>Tìm kiếm: {{$key}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop_area shop_reverse category">
    <div class="container">
        <div class="row">
            @include('layout.sibar')
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_banner">
                    <img src="assets/img/bg/banner8.jpg" alt="">
                </div>
                <div class="shop_title">
                    <h1>Tìm kiếm: {{$key}}</h1>
                </div>
                @if(count($posts) > 0)
                <div class="shop_toolbar_wrapper">
                    <div class="page_amount">
                        <p>Hiển thị 1–{{count($posts)}} of 23 kết quả</p>
                    </div>
                    <div class="flex">
                        <input type="hidden" value="3" name="idcat" id="idcat">
                        <select class="control" id="arrange_cat">
                            <option value="new">Mới nhất</option>
                            <option value="asc">Giá từ thấp -> cao</option>
                            <option value="desc">Giá từ cao -> thấp</option>
                        </select>
                    </div>
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper" id="list_cat">
                    @foreach($posts as $val)
                    <div class="col-lg-4 col-md-4 col-12 ">
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
                                        <!-- <div class="ml-1 font-1">Đã bán: {{rand(50, 100)}}</div> -->
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="current_price">{{ $val->price ? number_format($val->price) .' '. $val->unit : 'Giá bán: Liên hệ' }}</span>
                                            <span class="old_price">{{ $val->sale ? number_format($val->price*(1+$val->sale/100)) .' '. $val->unit : '' }}</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a data-url="{{route('addTocart', ['id' => $val->id])}}" href="#" class="add_cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination">
                    {{ $posts->appends(request()->all())->links() }}
                </div>
                @else
                Danh sách trống !
                @endif
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>

@endsection
