@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<style type="text/css">
    .header-title{ font-size:2rem; font-weight:bold; text-align:center; margin-bottom:20px }
    .baogiaxe .name{ text-align:center; font-size:1.2rem; font-weight:bold; text-transform:uppercase; }
    .baogiaxe .img{ padding:0px 30px }
    .baogiaxe table{ width:100% }
    .baogiaxe th{ border:1px solid #ddd; background:#f0f0f0; text-align:center; padding:10px 0px; }
    .baogiaxe td{ border:1px solid #ddd; padding:10px;}
    .baogiaxe td.price{ width:30%; text-align:center; font-size:1rem; font-weight:bold; color:#e31d1a; }
    .baogiaxe blockquote {
        background-color: #f5f6f7;
        border-left: 3px solid #ff6a00;
        border-radius: 4px;
        color: #3c4043;
        padding: 12px 10px;
        margin-bottom: 1rem;
    }
    .baogiaxe blockquote a{ color:#0094da; font-weight:bold; font-size:1.1rem }
    .color-red{ color:#e31d1a }
    .bold{ font-weight:bold; }
    .baogiaxe hr{ margin:30px 0px }
    .section .content{ border:2px dotted #e74c3c; border-radius:20px; padding:40px 20px; margin-bottom:50px }
    .section .content h2{ font-size:1.6rem; font-weight:bold; text-align:center; color:#e74c3c }
    .section .content h2 span{ color:#288ad6 }
    .section .content p{ text-align:center; }
    .section .content .button1 button{ border:1px solid #ddd; border-radius:3px; padding:12px 20px; background:#288ad6; color:#fff; width:40%; margin-left:20px }
    .section .content .menu ol{}
    .section .content .menu ol li{ padding:15px 10px; font-size:1.1rem }
    .section .content .menu ol li a{ color:#288ad6; font-weight:bold; }
    .link-neo{ padding-top: 80px; margin-top: -80px; }
</style>
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
                        <div class="col-6">
                            <div class="menu">
                                <ol>
                                    @foreach($cat as $val)
                                    <li>Click ngay để xem chi tiết <a href="bang-gia-xe-vinfast#{{$val->slug}}">Giá xe {{$val->name}}</a></li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="img"> <img src="assets/img/product/vinfast-vf8.webp"> </div>
                            <div class="button1">
                                <a href="tel:{{$setting->hotline}}"><button type="button"> Hotline: {{$setting->hotline}} </button></a>
                                <button type="button"> Báo giá ngay </button>
                            </div>
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
                <div class="col-4">
                    <div class="name">
                        {{$val->name}}
                    </div>
                    <div class="img">
                        <img src="data/category/{{$val->img}}">   
                    </div>
                </div>
                <div class="col-8">
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