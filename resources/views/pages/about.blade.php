@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<div class="page-banner-simple bg-secondary py-0 background_black" style="background: url(frontend/img/8_3.jpg) no-repeat center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 category">
                <h3 class="banner-title text-white">{{$data->name}}</h3>
                <div class="banner-tagline font-medium text-white">Chúng tôi lập chiến lược, thiết kế & phát triển để tạo ra những sản phẩm có giá trị.</div>
            </div>
        </div>
    </div>
</div>

<div class="full-row pb-30 about_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-secondary mb-5">
                    {!!$data->content!!}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
@endsection