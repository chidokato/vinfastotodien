@extends('layout.index')

@section('title') Cảm ơn quý khách đã đăng ký nhận thông tin báo giá @endsection
@section('description') Cảm ơn quý khách đã đăng ký nhận thông tin báo giá @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<style type="text/css">
    h1{ font-size:1.4rem; text-align:center; }
    .main{ height:50vh; display:flex;     flex-direction: column;
    align-items: center;
    align-content: center;
    justify-content: center;
} }
</style>
@endsection
@section('content')


<div class="container main">
    <h1>Cảm ơn quý khách đã đăng ký nhận báo giá</h1>
    <p>Chúng tôi sẽ liên hệ và gửi quý khách báo giá trong thời gian sớm nhất</p>
</div>


@endsection

@section('js')
@endsection