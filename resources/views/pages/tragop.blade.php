@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<style type="text/css">
    .content { margin-bottom:40px }
    .content h1{ font-size:1.7rem; }
    .content h1{  }
</style>
@endsection
@section('content')
<?php use App\Models\Post; ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li><a href="{{$data->slug}}">{{$data->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="content">
                {!! $data->content !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection