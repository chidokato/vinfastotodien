@extends('layout.index')

@section('title') {{$setting->title ? $setting->title : $setting->name}} @endsection
@section('description') {{$setting->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')

@endsection

@section('content')

<!--slider area start-->
    <section class="slider_section">
        
        <div class="">
            <div class="">
                <div class="col-lg-12 col-md-12">
                    <div class="slider_area slider_three owl-carousel">
                        @foreach($slider as $val)
                        <div class="single_slider">
                            <img src="data/home/{{$val->img}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--slider area end-->

    <!--product area start-->
    <section class="section1 new_product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> Các dòng xe <strong>VinFast</strong></span></h2>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="new_product_container">
                    <div class="sample_product">
                        <div class="product_thumb">
                            <a href="{{$cat_home_first->slug}}"><img src="data/category/{{$cat_home_first->img}}" alt=""></a>
                        </div>
                        <div class="product_name">
                            <h3><a class="bold" href="{{$cat_home_first->slug}}">{{$cat_home_first->name}}</a></h3>
                        </div>
                        <div class="product_content">
                            <div class="product_ratings">
                                <ul>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                </ul>
                            </div>
                            <div class="detail">
                                <a href="{{$cat_home_first->slug}}">Chi tiết</a>
                            </div>
                        </div>
                    </div>

                    <div class="product_carousel product_bg  product_column2 owl-carousel">
                        @foreach($cat_home as $key => $val)
                        @if($key % 3 == 0)
                        <div class="small_product">
                            <div class="single_product">
                                <div class="product_content">
                                    <h3><a href="{{$cat_home[$key]->slug}}">{{$cat_home[$key]->name}}</a></h3>
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="detail">
                                        <a href="{{$cat_home[$key]->slug}}">Chi tiết</a>
                                    </div>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{$cat_home[$key]->slug}}"><img src="data/category/{{$cat_home[$key]->img}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_content">
                                    <h3><a href="{{$cat_home[$key+1]->slug}}">{{$cat_home[$key+1]->name}}</a></h3>
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="detail">
                                        <a href="{{$cat_home[$key+1]->slug}}">Chi tiết</a>
                                    </div>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{$cat_home[$key+1]->slug}}"><img src="data/category/{{$cat_home[$key+1]->img}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_content">
                                    <h3><a href="{{$cat_home[$key+2]->slug}}">{{$cat_home[$key+2]->name}}</a></h3>
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="detail">
                                        <a href="{{$cat_home[$key+2]->slug}}">Chi tiết</a>
                                    </div>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{$cat_home[$key+2]->slug}}"><img src="data/category/{{$cat_home[$key+2]->img}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->


    <!--product area start-->
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> Các xe VinFast <strong>Bán Chạy</strong></span></h2>
                    </div>
                </div>
            </div>
                
            <div class="row">
                @foreach($post as $val)
                    <div class="col-lg-4 col-md-4 col-6 ">
                    @include('pages.iteam.product')
                    </div>
                @endforeach
            </div>
                
        </div>
    </section>
    <!--product area end-->

    

    <!--banner area start-->
    <section class="banner_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_banner banner_fullwidth">
                        <div class="banner_thumb">
                            <a href="bang-gia-xe-vinfast"><img src="assets/img/bg/banner5.jpg" alt=""></a>
                            <div class="banner_text">
                                <h2>Bảng giá xe VinFast</h2>
                                <h3>Mới nhất</h3>
                                <p>Tại VinFast Thăng Long</p>
                                <a href="bang-gia-xe-vinfast">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->

@endsection

@section('js')



@endsection
