@extends('layout.index')

@section('title') Người dùng @endsection
@section('description') Người dùng @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
@include('admin.alert')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li>Thông tin cá nhân</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    @include('pages.account.sitebar')
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <h3 class="title1">Thông tin người dùng</h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form method="POST" action="{{route('update_account', [$user->id])}}" enctype="multipart/form-data">
                                    @csrf
                                        <label>Họ và Tên</label>
                                        <input class="form-control" value="{{$user->yourname}}" type="text" name="name">

                                        <div class="input-radio">
                                            <label><span class="custom-radio"><input <?php if($user->gender == 'Nam'){echo "checked";} ?> type="radio" value="Nam" name="gender"> Nam</span></label>
                                            <label><span class="custom-radio"><input <?php if($user->gender == 'Nữ'){echo "checked";} ?> type="radio" value="Nữ" name="gender"> Nữ</span></label>
                                        </div> <br>

                                        <label>Ảnh đại diện</label>
                                        <input style="border: none; padding-left: 0; margin-top: 3px;" class="" type="file" name="img">

                                        <label>Số điện thoại</label>
                                        <input class="form-control" value="{{$user->phone}}" type="text" name="phone">

                                        <label>Email</label>
                                        <input class="form-control" disabled value="{{$user->email}}" type="mail" name="email">

                                        <label>Địa chỉ</label>
                                        <input class="form-control" value="{{$user->address}}" type="text" name="address">

                                        <label>Facebook</label>
                                        <input class="form-control" value="{{$user->facebook}}" type="text" placeholder="..." value="" name="facebook">

                                        <div class="input-radio">
                                            <label><span class="custom-radio"><input id="changepassword" name="changepassword" type="checkbox" > Đổi mật khẩu</span></label>
                                        </div>

                                        <label>Mật khẩu</label>
                                        <input class="form-control pass" type="password" disabled name="password">

                                        <label>Nhập lại mật khẩu</label>
                                        <input class="form-control pass" type="password" disabled name="passwordagain">
                                        
                                        <div class="save_button primary_btn default_button">
                                            <button type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account end   -->

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#changepassword').change(function(){
            if ($(this).is(":checked")) {
                $(".pass").removeAttr('disabled');
            }else{
                $(".pass").attr('disabled','');
            }
        });
    });
</script>
@endsection