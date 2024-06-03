@extends('layout.index')

@section('title') Người dùng @endsection
@section('description') Người dùng @endsection
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
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li><a href="{{route('account_cart')}}">Đơn hàng</a></li>
                        <li>Chi tiết đơn hàng</li>
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
                        <h3 class="title1"><span>Đơn hàng: ĐH00{{$cart->id}}</span></h3>
                        <div class="carts">
                            <?php $total = 0; ?>
                            @foreach($order as $id => $val)
                                <table class="cart">
                                    <tr>
                                        <td class="img"><img src="data/news/{{$val->Post->img}}"></td>
                                        <td class="info">
                                            <div class="name"><a href="{{$val->Post->Category->slug}}/{{$val->Post->slug}}">{{$val->Post->name}}</a></div>
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

                            <hr>
                            <table class="cart_1">
                                <tr>
                                    <td>Mã đơn hàng:</td>
                                    <td>ĐH00{{$cart->id}}</td>
                                </tr>
                                <tr>
                                    <td>Tổng tiền:</td>
                                    <td class="red">{{number_format($cart->all_price)}}đ</td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng:</td>
                                    <td>{{$cart->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Tình trạng:</td>
                                    <td>{{$cart->status}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account end   -->

@endsection

@section('script')
@endsection