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
            <div class="col-lg-12 col-md-12">
                <!--shop wrapper start-->
                <div class="shop_title">
                    <h1>{{$data->name}}</h1>
                </div>
                @if(count($post) > 0)
                <!--shop toolbar end-->
                <div class="row shop_wrapper" id="list_cat">
                    @foreach($post as $val)
                        <div class="col-lg-6 col-md-6 col-6 ">
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
