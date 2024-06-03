@if(session()->has('cart') != null)
<div class="row custom-cart">
    <div class="col-12 bg-234 pt-3 mb-3">
        <form action="{{route('updateCart')}}" method="POST">
            @csrf
            <div class="cart" data-url="{{route('delCart')}}">
                <?php $total = 0; ?>
                <div style="overflow: auto;">
                    <table class="list-cart">
                        @foreach($cart as $id => $val)
                        <input type="hidden" name="id[]" value="{{$id}}">
                        <tr class="iteam_row">
                            <td class="img"><a href="{{$val['slug']}}"><img src="data/news/{{$val['img']}}"></a></td>
                            <td class="info">
                                <div class="name"><a href="{{$val['slug']}}">{{$val['name']}}</a></div>
                                <div class="price">
                                    <div class="red"><span>{{$val['unit']}}</span>{{ number_format($val['price']) }}</div>
                                    @if($val['unit']=='¥')
                                    <div class="vnd">(~ <span>₫</span>{{ number_format($val['price']*$setting->exchange) }})</div>
                                    @endif
                                </div>
                                
                                <a href="#" data-id="{{$id}}" class="del_cart"><i class="fa fa-trash-o"></i> Xóa</a>
                            </td>
                            <td class="quantity"><input min="1" max="100" name="quantity[]" value="{{$val['quantity']}}" type="number"></td>
                            <td class="total">
                                    <span class="bold red">{{$val['unit']}} {{ number_format( $val['price'] * $val['quantity']) }} </span>
                                    @if($val['unit']=='¥')
                                    <span> &nbsp; &nbsp;(~ <span style="font-size:.8rem">₫</span> {{ number_format( $val['price'] * $val['quantity'] * $setting->exchange ) }})</span>
                                    @endif
                            </td>
                        </tr>
                        <?php
                            if($val['unit']=='¥'){
                                $total = $total + ($val['price'] * $val['quantity'] * $setting->exchange);
                            }else{
                                $total = $total + ($val['price'] * $val['quantity']);
                            }
                        ?>
                        @endforeach
                    </table>
                </div>
                <div class="cart_submit">
                    <button type="submit">Cập nhật giỏ hàng</button>
                </div>
                <hr>
                <div class=" footer">
                    <div class="flex">
                        <h3>Tổng số tiền cần thanh toán: </h3>
                        <h3><span style="color:red">₫ {{ number_format($total) }}</span></h3>
                    </div>
                    <hr>
                    <p style="font-size:.9rem; color: red"><i>* Tỷ giá yên nhật thay đổi liên tục, quý khách hàng mua hàng với giá yên vui lòng liên hệ bộ phận hỗ trợ để có giá chính xác nhất ! </i></p>
                </div>

            </div>
        </form>
    </div>
    <div class="col-12 mb-5">
        <div style="text-align: right;">
            <button onclick="location.href='{{asset('')}}';" class="btn btn-dark" type="button"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
 Tiếp tục mua hàng</button>
 @if($total > 0)
            <button onclick="location.href='{{route("checkout")}}';" class="btn btn-dark" type="button"> Mua hàng <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
            @endif
        </div>
    </div>

    @if(Auth::check())
    <!--  -->
    @else
    <!-- <h2 style="text-align: center;">Vui lòng đăng nhập để tiến hành thanh toán</h2>
    <div class="col-4"></div>
    <div class="col-4">
        
        <div class="form-group mb-3">
            <a href="{{route('dangnhap')}}"><button class="form-control">Đăng Nhập</button></a>
        </div>
        <div class="form-group">
            <a href="{{route('dangky')}}"><button class="form-control">Đăng ký tài khoản</button></a>
        </div>
    </div>
    <div class="col-4"></div> -->
    @endif
</div>

@else
<div class="row">
    <div class="col-lg-12 col-md-12">
        <h2>Giỏ hàng trống !</h2>
    </div>
</div>
@endif

<script type="text/javascript">
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
                        // alert('Thêm vào giỏ hàng thành công')
                    }
                },
                error: function(){

                }
            });
        }

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
        
    </script>