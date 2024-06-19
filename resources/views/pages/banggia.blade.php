@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<style type="text/css">
    .header-title{ font-size:2rem; font-weight:bold; text-align:center; margin-bottom:20px }
</style>
@endsection
@section('content')

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
<!-- <section class="section0 " >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-home">
                    {!! $setting->content_home !!}
                    <div class="contact">
                        <a href="">
                            <span>Hotline: 0822.48.3333</span>
                            <span><i>Click gọi ngay để có giá xe tốt nhất</i></span>
                        </a>
                        <a href="">
                            <span>NHẬN BÁO GIÁ XE</span>
                            <span><i>Hoặc đăng ký nhận báo giá xe lăn bánh tốt nhất</i></span>
                        </a>
                    </div>
                    <p>Liên Hệ: Lái thử và trải nghiệm miễn phí và nhận nhiều Khuyến Mãi hấp dẫn khác, liên hệ trực tiếp với Phòng Bán Hàng để mua xe với giá tốt nhất!</p>
                    <p>Xe VinFast có sẵn nhiều màu để lựa chọn - Nhiều ưu đãi cho khách hàng - Phương thức thanh toán linh hoạt, phù hợp: trả thẳng, trả góp với lãi suất ưu đãi. Hỗ trợ lãi suất vay chỉ 8% trong 18 tháng. QUÝ KHÁCH XIN VUI LÒNG LIÊN HỆ với Phòng Bán Hàng để mua xe với giá tốt nhất!</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="container">
    @foreach($cat as $val)
    <div class="row">
        <div class="col-4">
            <div class="img">
                <img src="data/category/{{$val->img}}">   
            </div>
            <div class="name">
                {{$val->name}}
            </div>
        </div>
        <div class="col-8">
            <div></div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@section('js')

@endsection