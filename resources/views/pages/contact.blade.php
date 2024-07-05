@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')

@endsection
@section('content')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li>{{$data->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message content">
                    {!! $data->content !!}
                    <ul>
                        <li><i class="fa fa-fax"></i> Địa chỉ : {{$setting->address}}</li>
                        <li><i class="fa fa-phone"></i> <a href="#">{{$setting->email}}</a></li>
                        <li><i class="fa fa-envelope-o"></i><a href="tel:{{$setting->hotline}}">{{$setting->hotline}}</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact_message form">
                    <h3>Hãy cho chúng tôi biết vấn đề của bạn</h3>
                    <form id="validateForm" method="POST" action="{{ route('sendmail') }}">
                        @csrf  
                        @method('HEAD')
                        <div class="iteam_row">
                            <label> Họ & Tên <span class="red">(*)</span></label>
                            <input name="name" placeholder="Họ & Tên" type="text">
                        </div>
                        <div class="iteam_row">
                            <label> Số điện thoại</label>
                            <input name="phone" placeholder="Số điện thoại" type="text">
                        </div>
                        <div class="contact_textarea iteam_row">
                            <label> Nội dung <span class="red">(*)</span></label>
                            <textarea placeholder="Nội dung" name="note" class="form-control2"></textarea>
                        </div>
                        <button type="submit"> GỬI ĐI</button>
                        <p class="form-messege"></p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

@endsection