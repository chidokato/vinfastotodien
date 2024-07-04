@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<link rel="stylesheet" href="assets/css/banggia.css">
@endsection
@section('content')
<?php use App\Models\Post; ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li><a href="{{$data->slug}}">{{$data->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="header-title">Bảng giá xe VinFast mới nhất tại VinFast Thăng Long</h1>
        </div>
    </div>
</div>
<section class="section" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <h2>VINFAST THĂNG LONG - <span>ƯU ĐÃI QUÀ TẶNG HẤP DẪN TRONG THÁNG</span></h2>
                    <p>Vui lòng liên hệ Hotline {{$setting->hotline}} để được tư vấn tốt nhất!</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="menu">
                                <ol>
                                    @foreach($cat as $val)
                                    <li>Click ngay để xem chi tiết <a href="bang-gia-xe-vinfast#{{$val->slug}}">Giá xe {{$val->name}}</a></li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img"> <img src="assets/img/product/vinfast-vf8.webp"> </div>
                            <ul class="button1">
                                <li><a href="tel:{{$setting->hotline}}">Hotline: {{$setting->hotline}} </a></li>
                                <li class="click_popup"><a href="javascript:void(0)">Báo giá ngay</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="baogiaxe">
    <div class="container">
        @foreach($cat as $val)
        <?php $subs = Post::where('category_id', $val->id)->get(); ?>
        <div class="link-neo" id="{{$val->slug}}">
            <div class="row "  >
                <div class="col-md-4">
                    <div class="name">
                        {{$val->name}}
                    </div>
                    <div class="img">
                        <img src="data/category/{{$val->img}}">   
                    </div>
                </div>
                <div class="col-md-8">
                    <div>
                        <table>
                            <tr>
                                <th>MẪU XE</th>
                                <th>GIÁ BÁN</th>
                            </tr>
                            @foreach($subs as $sub)
                            <tr>
                                <td><a href="{{$sub->category->slug}}/{{$sub->slug}}">{{$sub->name}}</a></td>
                                <td class="price color-red bold">{{number_format($sub->price)}} {{$sub->unit}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <blockquote>
                        Giá trên là giá công bố của Hãng. Để được mua xe <span class="color-red bold">{{$val->name}} giá tốt nhất + Khuyến Mãi nhiều nhất</span> hãy gọi cho ngay cho Phòng BH: <a href="tel:{{$setting->hotline}}">{{$setting->hotline}}</a>
                    </blockquote>
                </div>
                <hr>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('js')

@endsection