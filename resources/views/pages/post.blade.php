@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<div class="page-banner-simple bg-secondary py-0" style="background: url(data/category/{{$cat->img}}) no-repeat center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 category">
                <h3 class="banner-title text-white">{{$post->name}}</h3>
                <div class="banner-tagline font-medium text-white">Chúng tôi lập chiến lược, thiết kế & phát triển để tạo ra những sản phẩm có giá trị.</div>
            </div>
        </div>
    </div>
</div>

<div class="full-row pb-30 content_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="text-secondary mb-5 post">
                    <h1>{{$post->name}}</h1>
                    {!!$post->content!!}
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection