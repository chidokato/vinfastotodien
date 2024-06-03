@extends('layout.index')

@section('title') Giỏ hàng @endsection
@section('description') Giỏ hàng @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li><a href="{{route('showCart')}}">Giỏ hàng</a></li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="post" action="{{route('order')}}" enctype="multipart/form-data">
@csrf
<div class="shop_area checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-7 dathang">
                <h3 class="title1">Thông tin đặt hàng</h3>
                <div class="form-group">
                    <label>Họ & Tên</label>
                    <input name="name" value="{{Auth::User()->yourname}}" placeholder="..." type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input name="phone" value="{{Auth::User()->phone}}" placeholder="..." type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa chỉ Email</label>
                    <input disabled name="email" value="{{Auth::User()->email}}" placeholder="..." type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input name="address" value="{{Auth::User()->address}}" placeholder="..." type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea class="form-control" rows="2" placeholder="Ghi chú của khách hàng khi đặt hàng !"></textarea>
                </div>
                <div class="form-group huongdangdathang">
                    {!! $setting->content_cart !!}

                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name=""> Tôi đã đọc kỹ và hoàn toàn đồng ý với quy định mua hàng ở trên
                    </label>
                </div>
                <div class="form-group">
                    <a href="{{route('checkout', ['uid' => Auth::User()->id])}}"><button class="btn btn-dark" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Đăt hàng</button></a>
                </div> 
            </div>
            <div class="col-md-5">
                <div class="carts sticky">
                    <h3 class="title1">Danh sách sản phẩm</h3>
                    @if(session()->has('cart') != null)
                    <?php $total = 0; ?>
                    @foreach($cart as $id => $val)
                        <table class="cart">
                            <tr>
                                <td class="img"><img src="data/news/{{$val['img']}}"></td>
                                <td class="info">
                                    <div class="name"><a href="{{$val['slug']}}">{{$val['name']}}</a></div>
                                    <div class="price" style="display: flex;">
                                        <div class="red"><span>{{$val['unit']}}</span>{{ number_format($val['price']) }} &nbsp;</div>
                                        @if($val['unit']=='¥')
                                        <div class="vnd">(~ <span>₫</span>{{ number_format($val['price']*$setting->exchange) }})</div>
                                        @endif
                                        <div>&nbsp; x {{ $val['quantity'] }}</div>
                                    </div>

                                </td>
                            </tr>
                        </table>
                        <?php
                            if($val['unit']=='¥'){
                                $total = $total + ($val['price'] * $val['quantity'] * $setting->exchange);
                            }else{
                                $total = $total + ($val['price'] * $val['quantity']);
                            }
                        ?>
                    @endforeach
                    @endif
                    <hr>
                    <div class="total">Tổng tiền: <span style="color:red">₫ {{ number_format($total) }}</span></div>
                    <input type="hidden" value="{{$total}}" name="all_price">
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection

@section('script')
@endsection