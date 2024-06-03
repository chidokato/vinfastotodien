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
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shopping_cart_area pb-5">
    <div class="container cart_wrapper">
        @include('pages.iteam.cart')
    </div>
</div>

@endsection

@section('script')
@endsection