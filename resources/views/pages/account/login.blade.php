@extends('layout.index')

@section('title') Đăng nhập @endsection
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
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<div class="customer_login mt-32">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>ĐĂNG NHẬP</h2>
                    <form id="validateForm" action="admin" method="post" name="registerform">
                        @csrf
                        <p>
                            <label>Địa chỉ email <span>*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Địa chỉ email" />
                        </p>
                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input name="password" type="password" placeholder="Mật khẩu">
                        </p>
                        <div class="login_submit">
                            <a href="#">Quyên mật khẩu ?</a>
                            <label for="remember">
                                <input id="remember" type="checkbox">
                                Remember me
                            </label>
                            <button class="btn btn-dark ml-2" type="submit">ĐĂNG NHẬP</button>
                        </div>
                        <div class="text-center mt-5">
                            Bạn chưa có tài khoản ? <a href="{{route('dangky')}}"><button type="button" class="btn btn-outline-info ml-2"> ĐĂNG KÝ </button></a>
                        </div>
                    </form>

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