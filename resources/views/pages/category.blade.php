@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
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
                        <li>{{$data->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop_area shop_reverse category">
    <div class="container">
        <div class="row">
            @include('layout.sibar')
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                @if(isset($data->img))
                <div class="shop_banner">
                    <img src="{{ $data->img? 'data/category/800/'.$data->img :''}}" alt="">
                </div>
                @endif
                <div class="shop_title">
                    <h1>{{$data->name}}</h1>
                </div>
                @if(count($post) > 0)
                <div class="shop_toolbar_wrapper">
                    <div class="page_amount">
                        <p>Hiển thị 1–{{count($post)}} of {{$total}} kết quả</p>
                    </div>
                    <div class="flex">
                        <input type="hidden" value="{{$data->id}}" name="idcat" id="idcat">
                        <select class="control" id="arrange_cat">
                            <option value="new">Mới nhất</option>
                            <option value="asc">Giá từ thấp -> cao</option>
                            <option value="desc">Giá từ cao -> thấp</option>
                        </select>
                    </div>
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper" id="list_cat">
                    @foreach($post as $val)
                        <div class="col-lg-4 col-md-4 col-6 ">
                            @include('pages.iteam.product')
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    {{ $post->links() }}
                </div>
                @else
                Danh sách trống !
                @endif
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>

@endsection
