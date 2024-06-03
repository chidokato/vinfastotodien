@if(isset($mat))
    @foreach($mat as $val)
        @if($val->img_1 != null)
        <div class="col-lg-4 col-md-4">
            <a class="clik_body" data-url="{{route('clik_body', ['id' => $val->id])}}" href="">
                <div class="iteam">
                    <img src="data/product/knot/{{$val->img_1}}">
                    <div class="info"><span class="text-truncate-set text-truncate-set-1">{{$val->name}}</span> <span>¥ {{number_format($val->price)}}</span></div>
                </div>
            </a>
        </div>
        @endif
    @endforeach
@endif

@if(isset($day))
    @foreach($day as $val)
        @if($val->img_1 != null)
        <div class="col-lg-4 col-md-4">
            <a class="clik_strap" data-url="{{route('clik_strap', ['id' => $val->id])}}" href="">
                <div class="iteam">
                    <img src="data/news/{{$val->img}}">
                    <div class="info">{{$val->name}} <br> <span>¥ {{$val->price}}</span></div>
                </div>
            </a>
        </div>
        @endif
    @endforeach
@endif

@if(isset($khoa))
    @foreach($khoa as $val)
        @if($val->img_1 != null)
        <div class="col-lg-4 col-md-4">
            <a class="clik_buckle" href="" data-url="{{route('clik_buckle', ['id' => $val->id])}}">
                <div class="iteam">
                    <img src="data/news/{{$val->img}}">
                    <div class="info">{{$val->name}} <br> <span>¥ {{$val->price}}</span></div>
                </div>
            </a>
        </div>
        @endif
    @endforeach
@endif

<script type="text/javascript">
function body(event){
    event.preventDefault();
    let urlbody = $(this).data('url');
    let price_face = $('.price_face').data('id');
    let price_strap = $('.price_strap').data('id');
    let price_rg = $('.price_rg').data('id');
    $.ajax({
        type: 'GET',
        url: urlbody,
        data: {price_face: price_face, price_strap: price_strap, price_rg: price_rg},
        // dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.mat').html(data.mat_html)
                $('.load-body').html(data.body)
                $('.face').html(data.mat_html)
                $('.price_face_parent').html(data.price_face)
                $('.tong').html(data.tong)
            }
        },
        error: function(){

        }
    });
}
function strap(event){
    event.preventDefault();
    let urlstrap = $(this).data('url');
    let price_face = $('.price_face').data('id');
    let price_strap = $('.price_strap').data('id');
    let price_rg = $('.price_rg').data('id');
    $.ajax({
        type: 'GET',
        url: urlstrap,
        data: {price_face: price_face, price_strap: price_strap, price_rg: price_rg},
        // dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.str_m').html(data.str_m)
                $('.flat_top').html(data.flat_top)
                $('.flat_bottom').html(data.flat_bottom)
                $('.price_strap_parent').html(data.price_strap)
                $('.tong').html(data.tong)
                $('.load-strap').html(data.strap)
            }
        },
        error: function(){

        }
    });
}

function buckle(event){
    event.preventDefault();
    let urlbuckle = $(this).data('url');
    let price_face = $('.price_face').data('id');
    let price_strap = $('.price_strap').data('id');
    let price_rg = $('.price_rg').data('id');
    $.ajax({
        type: 'GET',
        url: urlbuckle,
        data: {price_face: price_face, price_strap: price_strap, price_rg: price_rg},
        // dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.rg').html(data.rg)
                $('.price_rg_parent').html(data.price_rg)
                $('.tong').html(data.tong)
                $('.load-buckle').html(data.buckle)
            }
        },
        error: function(){

        }
    });
}


$(document).ready(function(){
    $('.clik_body').on('click', body);
    $('.clik_strap').on('click', strap);
    $('.clik_buckle').on('click', buckle);
});


// function calculateSum() {
//     // Lấy giá trị của hai input
//     var input1 = parseFloat(document.getElementById('input1').value);
//     var input2 = parseFloat(document.getElementById('input2').value);

//     // Kiểm tra nếu giá trị nhập vào không phải là số
//     if (isNaN(input1) || isNaN(input2)) {
//         document.getElementById('result').textContent = 'Vui lòng nhập số hợp lệ trong cả hai ô';
//         return;
//     }

//     // Tính tổng
//     var sum = input1 + input2;

//     // Hiển thị kết quả
//     document.getElementById('result').textContent = 'Tổng của hai số là: ' + sum;
// }



function addTocart(event){
    event.preventDefault();
    let urlcart = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: urlcart,
        dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.cart_quantity').text(data.quanlity_cart)
                alertify.message('Thêm vào giỏ hàng thành công !');
            }
        },
        error: function(){

        }
    });
}

$(document).ready(function(){
    $("button.add_cart_munti").click(function(){
        let mat = $('.a1').data('id');
        let day = $('.a2').data('id');
        let khoa = $('.a3').data('id');
        $.ajax({
            url: 'product/addtocart_munti',
            type: 'GET',
            cache: false,
            data: {
                "mat":mat,
                "day":day,
                "khoa":khoa,
            },
            success: function (data){
                if(data.code === 200){
                    $('.cart_quantity').text(data.quanlity_cart)
                    alertify.message('Thêm vào giỏ hàng thành công !');
                }
            },
        });
    });
}); // xóa ảnh trong db


function delcart(event){
    event.preventDefault();
    let urldelcart = $('.cart').data('url');
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: urldelcart,
        data: {id: id},
        success: function (data){
            if(data.code === 200){
                $('.cart_wrapper').html(data.cart_component);
                $('.cart_quantity').text(data.quanlity_cart)
                alertify.message('Xóa xản phẩm thành công !');
            }
        },
        error: function(){

        }
    });
}

$(document).ready(function(){
    $('.add_cart').on('click', addTocart);
    $('.del_cart').on('click', delcart);
});


$(document).ready(function(){
    $("#arrange_mat").change(function(){
        var id = $(this).val();
        $.get("ajax/change_arrange_mat/"+id,function(data){
            $("#list-mat").html(data);
        });
    });
    $("#arrange_day").change(function(){
        var id = $(this).val();
        // alert(id);
        $.get("ajax/change_arrange_day/"+id,function(data){
            $("#list-day").html(data);
        });
    });
    $("#arrange_khoa").change(function(){
        var id = $(this).val();
        $.get("ajax/change_arrange_khoa/"+id,function(data){
            $("#list-khoa").html(data);
        });
    });

    $("#arrange_cat").change(function(){
        var catid = $(this).parents('.flex').find('input[name="idcat"]').val();
        var id = $(this).val();
        $.get("ajax/change_arrange_cat/"+id+"/"+catid,function(data){
            $("#list_cat").html(data);
        });
    });
});





</script>