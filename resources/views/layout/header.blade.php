<?php use App\Models\Menu; ?>
<!-- Main Wrapper Start -->
    <!--header area start-->
    <header class="header_area header_padding">
        <!--header bottom satrt-->
        <div class="header_bottom header_b_three sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="main_menu header_position">
                            <nav>
                                <ul>
                                    <li><a class="header_logo" href="{{asset('')}}"><img src="assets/img/logo/logo-vinfast.webp"></a></li>
                                    <li><a href="asset('')">Trang chủ</a></li>
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
                    <a class="logo" href="{{asset('')}}"><img src="assets/img/logo/logo-vinfast.webp"></a>
                    <div class="canvas_open">
                        <span></span>
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">

                        <div class="canvas_close">
                            <a href="#"><i class="ion-android-close"></i></a>
                        </div>

                        <div class="Offcanvas_follow">
                            <label>Follow Us:</label>
                            <ul class="follow_link">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                        <!-- <div class="search-container">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="Search entire store here ..." type="text">
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div> -->
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children">
                                    <a href="{{asset('')}}">Trang chủ</a>
                                </li>
                                @foreach($menu as $key => $val)
                                @if($key==0)
                                <?php $sub_menu = Menu::where('parent', $val->id)->get(); ?>
                                <li class="menu-item-has-children">
                                    <a href="{{$val->slug}}">{{$val->name}}</a>
                                    <ul class="sub-menu">
                                        @foreach($sub_menu as $sub)
                                        <li><a href="{{$sub->slug}}">{{$sub->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li class="menu-item-has-children">
                                    <a href="{{$val->slug}}">{{$val->name}}</a>
                                </li>
                                @endif
                                @endforeach

                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Offcanvas menu area end-->