<div class="col-sm-12 col-md-3 col-lg-3">
    <!-- Nav tabs -->
    <div class="avatar">
        <img src="data/user/{{$user->img ? $user->img : 'user.jpg'}}">
    </div>
    <div class="dashboard sticky">
        <button onclick="location.href='{{route('account')}}';" class="btn acti" type="button"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Thông tin cá nhân</button>
        <button onclick="location.href='{{route('account_cart')}}';" class="btn" type="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> &nbsp; Đơn hàng</button>
        <button onclick="location.href='{{route('logout')}}';" class="btn" type="button"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; Đăng xuất</button>
    </div>
    
</div>