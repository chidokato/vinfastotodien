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
                        <?php for($i=1; $i<=2; $i++){ ?>
                        <div class="single_slider">
                            <img src="assets/img/bds/slider.jpg">
                        </div>
                        <div class="single_slider">
                            <img src="assets/img/bds/A301.jpg">
                        </div>
                        <?php } ?>
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
                        <h2><span> sdfsdfsdf <strong>sdfsda ádf</strong></span></h2>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="new_product_container">
                    <div class="sample_product">
                        <div class="product_thumb">
                            <a href="#"><img src="assets/img/bds/sp2.jpg" alt=""></a>
                        </div>
                        <div class="product_name">
                            <h3><a class="bold" href="">New and sale</a></h3>
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
                                <a href="">Chi tiết</a>
                            </div>
                            <!-- <div class="price_box">
                                <span class="current_price">Giá bán: 710,000,000 VND</span>
                                <span class="old_price">$180.00</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="product_carousel product_bg  product_column2 owl-carousel">
                        
                        <div class="small_product">
                            <div class="single_product">
                                <div class="product_content">
                                    <h3><a href="">VinFast VF3</a></h3>
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
                                        <a href="">Chi tiết</a>
                                    </div>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/bds/sp2.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_content">
                                    <h3><a href="">Bluetooth 2</a></h3>
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
                                        <span class="current_price">1,710,000,000 VND</span>
                                        <!-- <span class="regular_price">1,710,000,000 VND</span> -->
                                    </div>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/bds/sp2.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_content">
                                    <h3><a href="product-details.html">JBL Flip 3 </a></h3>
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
                                        <span class="regular_price">$180.00</span>
                                    </div>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/bds/sp1.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>

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
                        <h2><span> sdfsdfsdf <strong>sdfsda ádf</strong></span></h2>
                    </div>
                </div>
            </div>
                
            <div class="fade show">
                <div class="product_carousel product_column4 owl-carousel">
                    <?php for($j = 1; $j <= 6; $j++){ ?>
                    <div class="single_product_list">
                        <?php for($i = 1; $i <= 2; $i++){ ?>
                        <?php include('layout/single_product.php') ?>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
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
                            <a href="#"><img src="assets/img/bg/banner5.jpg" alt=""></a>
                            <div class="banner_text">
                                <h2>Win the cost of your</h2>
                                <h3>Tyres back</h3>
                                <p>Chance to win when you buy 2 + Pirell Tyres in March</p>
                                <a href="shop.html">Discover Now</a>
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
