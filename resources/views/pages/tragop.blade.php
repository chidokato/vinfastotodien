@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<style type="text/css">
    .content { margin-bottom:40px }
    .content *{ margin-bottom:15px }
    .content h1{ font-size:1.7rem; color:#288ad6 }
    .content h2{ font-size:1.2rem; color:#0066ff; margin-top:-100px; padding-top:100px }
    .content h3{ font-size:1.1rem }
    .content ul{}
    .content ul li{ position:relative; padding-left:24px }
    .content ul li:after{ position:absolute; content:url(assets/img/icon/icon-li-1040318j26543.webp); left:0; top:3px;  }
    .product_d_inner{ border:2px dashed #ddd; padding:20px }
    .product_d_inner h3{ font-size:1.1rem; color:#e74c3c; font-weight:bold; text-align:center; }
    .product_d_inner h4{ font-size:1rem; color:#288ad6;text-align:center; margin-bottom:30px }
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
        <div class="col-md-8">
            <div class="content product_info_content page-content">
                {!! $data->content !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="fix-sticky">
                <div class="product_d_inner ">
                    <h3>Thủ tục cho vay mua xe VinFast trả góp</h3>
                    <h4>Lãi suất cho vay tại các ngân hàng 2024</h4>
                    <div class="js-table-of-content table-of-content "></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
// tạo menu tự động từ h2 h3
(function ($) {});
setList();
function setList() {
var tabId = 0;
var segments = [],
arrayId = [],
html = '<div class="menu-titile">';
$(".page-content h2").each(function () {
var data = getData(this, segments),
hId = "tab" + tabId + "_h" + data.hLevel + segments.join("_");
arrayId.push(data.hLevel);
segments = data.segments;
html +=
'<p class="heading-' +
data.hLevel +
'"><a href="{{$data->slug}}#' +
hId +
'">' +
data.hText +
"</a></p>";
$(this).attr("id", hId);
});
html += "</div>";
console.log(html);

if (arrayId.length) {
$(".js-table-of-content").append(html);
}
}
function getData(element, segments) {
var hLevel = parseInt(element.nodeName.substring(1), 10),
hIndex = parseInt(element.nodeName.substring(1)) - 1,
hText = $(element).text();
if (segments.length - 1 > hIndex) {
segments = segments.slice(0, hIndex + 1);
}
if (segments[hIndex] == undefined) {
segments[hIndex] = 0;
}
segments[hIndex]++;
return {
hLevel: hLevel,
hIndex: hIndex,
hText: hText,
segments: segments
};
}
// tạo menu tự động từ h2 h3
</script>
@endsection