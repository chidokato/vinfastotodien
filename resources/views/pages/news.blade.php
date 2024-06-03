@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

<div class="page-banner-simple bg-secondary py-0" style="background: url(data/category/{{$data->img}}) no-repeat center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 category">
                <h3 class="banner-title text-white">{{$data->name}}</h3>
                <div class="banner-tagline font-medium text-white">Chúng tôi lập chiến lược, thiết kế & phát triển để tạo ra những sản phẩm có giá trị.</div>
            </div>
        </div>
    </div>
</div>

<div class="full-row pb-10 content_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="text-secondary mb-5 news_1">
                    {!!$data->content!!}
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
<div class="full-row pb-30 cat_news pt-10">
    <div class="container-fluid ">
        <div class="row bg-light pt-20">
            <div class="col-lg-12 text-center mb-3 ggg44">
                <h2>Hội tụ 4 dòng sản phẩm</h2>
                <p>cao cấp và tinh tế</p>
            </div>
        </div>
        @foreach($post as $key => $val)
        @if($key % 2 == 0)
        <div class="row  pb-4 pt-4 bg-light">
            <div class="col-lg-6">
                <div class="owl-carousel home_slider news_slider">
                    <div class="item"><img alt="slide" src="data/news/{{$val->img}}"></div>
                    @foreach($val->Images as $img)
                    <div class="item"><img alt="slide" src="data/product/detail/{{$img->img}}"></div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-center">
                <div class="text-secondary mb-5">
                    <h2>{{$val->name}}</h2>
                    <div class="text-justify">{!!$val->detail!!}</div>
                    <div class="info-button">
                        <div class="button mr-10"><a href="{{$val->category->slug}}/{{$val->slug}}"><button>Xem thêm >> </button></a></div>
                        <div class="button"><button>Nhận tư vấn</button></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        @else
        <div class="row pb-4 pt-4 ">
            <div class="col-lg-2"></div>
            <div class="col-lg-4 d-flex flex-center">
                <div class="text-secondary mb-5">
                    <h2>{{$val->name}}</h2>
                    <div class="text-justify">{!!$val->detail!!}</div>
                    <div class="info-button">
                        <div class="button mr-10"><a href="{{$val->category->slug}}/{{$val->slug}}"><button>Xem thêm >> </button></a></div>
                        <div class="button"><button>Nhận tư vấn</button></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="owl-carousel home_slider news_slider">
                    <div class="item"><img alt="slide" src="data/news/{{$val->img}}"></div>
                    @foreach($val->Images as $img)
                    <div class="item"><img alt="slide" src="data/product/detail/{{$img->img}}"></div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection

@section('script')

@endsection