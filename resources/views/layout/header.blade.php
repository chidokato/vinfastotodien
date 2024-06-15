<?php use App\Models\Menu; ?>
<!-- Main Wrapper Start -->
    <!--header area start-->
    <header class="header_area header_padding">
        <!--header middel start-->
        <!-- <div class="header_middle middle_two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="middel_right">
                            <div class="search-container search_two">
                                <form action="#">
                                    <div class="search_box">
                                        <input placeholder="Search entire store here ..." type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="middel_right_info">
                                <div class="header_wishlist">
                                    <a href="account.php"><span class="lnr lnr-user"></span> Account </a>
                                    <span class="wishlist_quantity">3</span>
                                </div>
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)"><span class="lnr lnr-cart"></span>My Cart </a>
                                    <span class="cart_quantity">2</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--header middel end-->
        
        <!--mini cart-->
        <!-- <div class="mini_cart">
            <div class="cart_close">
                <div class="cart_text">
                    <h3>cart</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">JBL Flip 3 Splasroof Portable Bluetooth 2</a>

                    <span class="quantity">Qty: 1</span>
                    <span class="price_cart">$60.00</span>

                </div>
                <div class="cart_remove">
                    <a href="#"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">Koss Porta Pro On Ear Headphones </a>
                    <span class="quantity">Qty: 1</span>
                    <span class="price_cart">$69.00</span>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="mini_cart_table">
                <div class="cart_total">
                    <span>Sub total:</span>
                    <span class="price">$138.00</span>
                </div>
                <div class="cart_total mt-10">
                    <span>total:</span>
                    <span class="price">$138.00</span>
                </div>
            </div>

            <div class="mini_cart_footer">
                <div class="cart_button">
                    <a href="cart.html">View cart</a>
                </div>
                <div class="cart_button">
                    <a class="active" href="checkout.html">Checkout</a>
                </div>

            </div>
        </div> -->
        <!--mini cart end-->
        
        <!--header bottom satrt-->
        <div class="header_bottom header_b_three sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="main_menu header_position">
                            <nav>
                                <ul>
                                    <li><a class="header_logo" href="."><img src="assets/img/logo/logo-vinfast.webp"></a></li>
                                    <li><a href=".">Trang chủ</a></li>
                                    @foreach($menu as $key => $val)
                                    @if($key==0)
                                    <?php $sub_menu = Menu::where('parent', $val->id)->get(); ?>
                                    <li class="mega_items"><a href="{{$val->slug}}">{{$val->name}}<i class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu">
                                            <div class="row mega_menu_inner">
                                                @foreach($sub_menu as $sub)
                                                <div class="col-lg-2">
                                                    <a href="{{$sub->slug}}">
                                                        <div class="img"><img src="data/menu/800/{{$sub->img}}"></div>
                                                        <div class="iteams">{{$sub->name}}</div>
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    <li><a href="{{$val->slug}}">{{$val->name}}</a></li>
                                    @endif
                                    @endforeach
                                    
                                    <!-- <li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="blog-details.html">blog details</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--header bottom end-->

    </header>
    <!--header area end-->


    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay"></div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href=""><img src="assets/img/logo/logo-vinfast.webp"></a>
                    <div class="canvas_open">
                        <span></span>
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">

                        <div class="canvas_close">
                            <a href="#"><i class="ion-android-close"></i></a>
                        </div>

                        <div class="top_right text-end">
                            <ul>
                                <li class="top_links"><a href="#"><i class="ion-android-person"></i> My Account<i class="ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="checkout.html">Checkout </a></li>
                                        <li><a href="my-account.html">My Account </a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="Offcanvas_follow">
                            <label>Follow Us:</label>
                            <ul class="follow_link">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="search-container">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="Search entire store here ..." type="text">
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children">
                                    <a href="index.html">Trang chủ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop Layouts</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">shop</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">other Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="cart.html">cart</a></li>
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Offcanvas menu area end-->