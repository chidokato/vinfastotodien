@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<link rel="stylesheet" href="assets/css/project.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@endsection

@section('content')

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li><a href="{{$post->category->slug}}">{{$post->category->name}}</a></li>
                        <li>{{$post->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details variable_product">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="product-details-tab">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="data/product/{{$post->img}}" />
                            </div>
                            @foreach($images as $val)
                            <div class="swiper-slide">
                                <img src="data/product/detail/{{$val->img}}" />
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    

                    <!-- <div class="main-carousel owl-carousel">
                        <div> <img src="data/product/{{$post->img}}" alt="Image 1"> </div>
                        @foreach($images as $val)
                        <div> <img src="data/product/detail/{{$val->img}}" alt="Image 1"> </div>
                        @endforeach
                    </div>
                    <div class="thumbnail-carousel owl-carousel">
                        <img src="data/product/{{$post->img}}" alt="Thumbnail 1" data-index="0">
                        @foreach($images as $key => $val)
                        <img src="data/product/detail/{{$val->img}}" alt="Thumbnail 1" data-index="{{$key+1}}">
                        @endforeach
                    </div> -->
                
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="product_d_right">
                    <h1>{{$post->name}}</h1>
                    <div class="product_ratings d-flex" style="align-items: center;">
                        <ul>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                        </ul>
                    </div>
                    
                    <div class="price_box">
                        <span class="current_price">
                            <span>{{ $post->price ? number_format($post->price) : 'Giá bán: Liên hệ' }}</span>
                            <small>{{ $post->price ? $post->unit : '' }}</small> 
                        </span>
                    </div>
                    <!-- <div class="product_desc">
                        {!! $post->detail !!}
                    </div> -->
                    
                    <div class="row btn-group-product">
                        <div class="col-12">
                            <a class="btn btn-big btn-seller" href="tel:{{$setting->hotline}}">
                                <span>Phụ trách kinh doanh</span>
                                <span class="info-text">{{$setting->hotline}}</span>
                            </a>
                            <div class="click_popup">
                                <a class="btn btn-big btn-request" href="javascript:void(0)">
                                    <span>Gửi liên hệ</span>
                                    <span class="info-text">Yêu cầu báo giá</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="click_popup">
                                <a class="btn btn-big btn-test-driver" href="javascript:void(0)">
                                    <span>Gửi liên hệ</span>
                                    <span class="info-text">Đăng ký lái thử</span>
                                </a>
                            </div>
                            <a class="btn btn-big btn-calculator" href="bang-gia-xe-vinfast">
                                <span>Tham khảo</span>
                                <span class="info-text">Bảng giá xe</span>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="product_d_inner">
                    <div class="">
                        <div class="">
                            <div class="product_info_content page-content">
                                <!-- h2>Giá lăn bánh (<strong>Chưa</strong> bao gồm PIN)</h2>
                                <p>Giá tạm tính tại thời điểm này. Mức phí có thể khác nhau ở các tỉnh. Vui lòng liên hệ hotline <a href="tel:{{$setting->hotline}}">{{$setting->hotline}} </a> để được tư vấn và gửi báo giá xe lăn bánh chính sách nhất.</p>
                                <div style="overflow: auto;">
                                    <table>
                                        <tr style="background: #135EAC; color: #fff;">
                                            <th>Phí</th>
                                            <th>Hà Nội</th>
                                            <th>Hồ Chí Minh</th>
                                            <th>Hồ Chí Minh</th>
                                            <th>Các tỉnh khác</th>
                                        </tr>
                                        <tr>
                                            <td>Giá niêm yết</td>
                                            <td>{{number_format($post->price)}}</td>
                                            <td>{{number_format($post->price)}}</td>
                                            <td>{{number_format($post->price)}}</td>
                                            <td>{{number_format($post->price)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phí trước bạ</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Phí đăng kiểm</td>
                                            <td>340.000</td>
                                            <td>340.000</td>
                                            <td>340.000</td>
                                            <td>340.000</td>
                                        </tr>
                                        <tr>
                                            <td>Phí bảo trì đường bộ</td>
                                            <td>1.560.000</td>
                                            <td>1.560.000</td>
                                            <td>1.560.000</td>
                                            <td>1.560.000</td>
                                        </tr>
                                        <tr>
                                            <td>Bảo hiểm trách nhiệm dân sự</td>
                                            <td>437.000</td>
                                            <td>437.000</td>
                                            <td>437.000</td>
                                            <td>437.000</td>
                                        </tr>
                                        <tr>
                                            <td>Phí biển số</td>
                                            <td>20.000.000</td>
                                            <td>20.000.000</td>
                                            <td>1.000.000</td>
                                            <td>1.000.000</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng</th>
                                            <th>{{number_format($post->price + 340000 + 1560000 + 437000 + 20000000)}}</th>
                                            <th>{{number_format($post->price + 340000 + 1560000 + 437000 + 20000000)}}</th>
                                            <th>{{number_format($post->price + 340000 + 1560000 + 437000 + 1000000)}}</th>
                                            <th>{{number_format($post->price + 340000 + 1560000 + 437000 + 1000000)}}</th>
                                        </tr>
                                    </table>
                                </div>
                                <h2>Giá lăn bánh (<strong>Đã</strong> bao gồm PIN)</h2>
                                <p>Giá tạm tính tại thời điểm này. Mức phí có thể khác nhau ở các tỉnh. Vui lòng liên hệ hotline <a href="tel:{{$setting->hotline}}">{{$setting->hotline}} </a> để được tư vấn và gửi báo giá xe lăn bánh chính sách nhất.</p>
                                <div style="overflow: auto;">
                                    <table>
                                        <tr style="background: #135EAC; color: #fff;">
                                            <th>Phí</th>
                                            <th>Hà Nội</th>
                                            <th>Hồ Chí Minh</th>
                                            <th>Hồ Chí Minh</th>
                                            <th>Các tỉnh khác</th>
                                        </tr>
                                        <tr>
                                            <td>Giá niêm yết</td>
                                            <td>{{number_format($post->price)}}</td>
                                            <td>{{number_format($post->price)}}</td>
                                            <td>{{number_format($post->price)}}</td>
                                            <td>{{number_format($post->price)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phí trước bạ</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Phí đăng kiểm</td>
                                            <td>340.000</td>
                                            <td>340.000</td>
                                            <td>340.000</td>
                                            <td>340.000</td>
                                        </tr>
                                        <tr>
                                            <td>Phí bảo trì đường bộ</td>
                                            <td>1.560.000</td>
                                            <td>1.560.000</td>
                                            <td>1.560.000</td>
                                            <td>1.560.000</td>
                                        </tr>
                                        <tr>
                                            <td>Bảo hiểm trách nhiệm dân sự</td>
                                            <td>437.000</td>
                                            <td>437.000</td>
                                            <td>437.000</td>
                                            <td>437.000</td>
                                        </tr>
                                        <tr>
                                            <td>Phí biển số</td>
                                            <td>20.000.000</td>
                                            <td>20.000.000</td>
                                            <td>1.000.000</td>
                                            <td>1.000.000</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng</th>
                                            <th>{{number_format($post->price + 340000 + 1560000 + 437000 + 20000000)}}</th>
                                            <th>{{number_format($post->price + 340000 + 1560000 + 437000 + 20000000)}}</th>
                                            <th>{{number_format($post->price + 340000 + 1560000 + 437000 + 1000000)}}</th>
                                            <th>{{number_format($post->price + 340000 + 1560000 + 437000 + 1000000)}}</th>
                                        </tr>
                                    </table>
                            </div -->
                                {!! $post->detail !!}
                                <hr>
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="fix-sticky">
                    <!-- <div class="product_d_inner ">
                        <div class="js-table-of-content table-of-content "></div>
                    </div>
                    <br> -->
                    <div class="product_d_inner ">
                        <div class="form">
                            <h3>Nhận báo giá & Ưu đãi trong tháng</h3>
                            <p>Ngay sau khi nhận được yêu cầu Chúng tôi sẽ gửi Báo giá Ưu đãi đến Quý khách ngay!</p>
                            <form id="validateForm" method="POST" action="{{route('sendmail')}}">
                                @csrf  
                                @method('HEAD')
                                <div class="iteam_row">
                                    <label>Họ & Tên</label>
                                    <input required type="text" class="" name="name" placeholder="Họ & Tên">
                                </div>
                                <div class="iteam_row">
                                    <label>Số điện thoại</label>
                                    <input required type="text" class="" name="phone" placeholder="Số điện thoại">
                                </div>
                                <div class="iteam_row">
                                    <label>Dòng xe quan tâm</label>
                                    <select name="note">
                                        <option>== Dòng xe quan tâm ==</option>
                                        @foreach($dongxe as $val)
                                        <option value="{{$val->name}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="Submit">Đăng ký ngay</button>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!--product area start-->
<section class="shop_area shop_reverse category mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> <strong>Sản phẩm</strong>Liên quan</span></h2>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    @foreach($related_post as $val)
                        @include('pages.iteam.product')
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
<!--product area end-->
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
$(".page-content h2, .page-content h3").each(function () {
var data = getData(this, segments),
hId = "tab" + tabId + "_h" + data.hLevel + segments.join("_");
arrayId.push(data.hLevel);
segments = data.segments;
html +=
'<p class="heading-' +
data.hLevel +
'"><a class="nav-link" href="{{$post->category->slug}}/{{$post->slug}}#' +
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
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const sections = document.querySelectorAll('h2[id]');
        const navLinks = document.querySelectorAll('.nav-link');
        // alert(navLinks);
        function onScroll() {
            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                const sectionHeight = section.clientHeight;
                
                if (sectionTop <= window.innerHeight / 2 && sectionTop + sectionHeight >= 0) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').substring(1) === currentSection) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', onScroll);
        onScroll(); // Call onScroll to set the initial state
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>

@endsection
