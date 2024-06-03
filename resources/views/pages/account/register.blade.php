@extends('layout.index')

@section('title') Đăng ký tài khoản @endsection
@section('description')  @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
@include('admin.alert')
<div class="customer_login mt-32">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>ĐĂNG KÝ</h2>
                    <form id="validateForm" action="{{route('register')}}" method="post" name="registerform">
                    	<input type="hidden" value="6" name="permission">
                        @csrf
                        <p>
                            <label>Họ & Tên <span>*</span></label>
                            <input type="text" name="yourname" class="form-control" placeholder="Họ Tên" />
                        </p>
                        <p>
                            <label>Địa chỉ email <span>*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="Địa chỉ email" />
                        </p>
                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input id="password" class="form-control" name="password" type="password" placeholder="Mật khẩu">
                        </p>
                        <p>
                            <label>Nhập lại mật khẩu <span>*</span></label>
                            <input class="form-control" name="passwordagain" type="password" placeholder="Mật khẩu">
                        </p>
                        <div id="style-4" style="height: 250px; overflow: auto; margin-bottom: 20px; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                            {!! $setting->register !!}
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-dark ml-2" type="submit">ĐĂNG KÝ</button>
                        </div>
                        
                    </form>

                </div>
                <div class="text-center mt-3">
                            Bạn đã có tài khoản ? <a href="{{route('dangnhap')}}"><button type="button" class="btn btn-outline-info ml-2"> ĐĂNG NHẬP </button></a>
                        </div>
            </div>
            <div class="col-lg-3 col-md-3"></div>
            <!--login area start-->
        </div>
    </div>
</div>
<!-- customer login end -->

@endsection

@section('script')
@endsection