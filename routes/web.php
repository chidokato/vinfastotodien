<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PromotionController;

use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\WardController;

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeSystemController;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Route::get('admin', [LoginController::class, 'index'])->name('login');
Route::post('admin', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('account/register', [LoginController::class, 'register'])->name('register');





// ajax
Route::group(['prefix'=>'ajax'],function(){
    Route::get('change_cate_lang/{id}', [AjaxController::class, 'change_cate_lang']);
    Route::get('change_province/{id}', [AjaxController::class, 'change_province']);
    Route::get('change_province_lang/{id}', [AjaxController::class, 'change_province_lang']);
    Route::get('change_district/{id}', [AjaxController::class, 'change_district']);
    Route::get('change_district_lang/{id}', [AjaxController::class, 'change_district_lang']);
    Route::get('change_ward_lang/{id}', [AjaxController::class, 'change_ward_lang']);
    Route::get('change_SortBy/{id}', [AjaxController::class, 'change_SortBy']);
    Route::get('change_parent/{id}', [AjaxController::class, 'change_parent']);
    Route::get('update_category_view/{id}/{view}', [AjaxController::class, 'update_category_view']);
    Route::get('update_menu_view/{id}/{view}', [AjaxController::class, 'update_menu_view']);
    Route::get('del_img_detail/{id}', [AjaxController::class, 'del_img_detail']);
    Route::get('del_section/{id}', [AjaxController::class, 'del_section']);
    Route::get('update_status_category/{id}/{status}', [AjaxController::class, 'update_status_category']);
    Route::get('update_status_post/{id}/{status}', [AjaxController::class, 'update_status_post']);
    Route::get('update_hot_post/{id}/{hot}', [AjaxController::class, 'update_hot_post']);
    Route::get('change_category/{id}', [AjaxController::class, 'change_category']);
    Route::get('change_arrange_mat/{id}', [AjaxController::class, 'change_arrange_mat']);
    Route::get('change_arrange_day/{id}', [AjaxController::class, 'change_arrange_day']);
    Route::get('change_arrange_khoa/{id}', [AjaxController::class, 'change_arrange_khoa']);
    Route::get('change_arrange_cat/{id}/{catid}', [AjaxController::class, 'change_arrange_cat']);
});




Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        // main
        Route::get('main', [MainController::class, 'index'])->name('admin');

        Route::resource('province',ProvinceController::class);
        Route::resource('district',DistrictController::class);
        Route::resource('ward',WardController::class);

        Route::resource('menu',MenuController::class);
        Route::resource('category',CategoryController::class);
        
        Route::resource('cart',CartController::class);

        Route::resource('option',OptionController::class);
        Route::get('option/double/{id}', [OptionController::class, 'double']);

        Route::resource('post',PostController::class);
        Route::get('post/post_up/{id}', [PostController::class, 'post_up'])->name('post_up');

        Route::resource('product',ProductController::class);
        Route::resource('customer',CustomerController::class);
        Route::resource('promotion',PromotionController::class);

        Route::resource('setting',SettingController::class);
        Route::resource('slider',SliderController::class);

        Route::resource('users',UserController::class);

        Route::group(['prefix'=>'section'],function(){
            Route::get('index/{pid}', [SectionController::class, 'index']);
        });
    });
});

// home view
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('search', [HomeController::class, 'search'])->name('search');

// home system
Route::get('sendmail', [HomeSystemController::class, 'sendmail'])->name('sendmail');
Route::post('question', [HomeSystemController::class, 'question'])->name('question');

// add to cart
Route::prefix('product')->group(function () {
    Route::get('add-to-cart/{id}', [HomeController::class, 'addTocart'])->name('addTocart'); // thêm sản phẩm vào giỏ hàng
    Route::get('addtocart_munti', [HomeController::class, 'addTocart_munti'])->name('addTocart_munti'); // thêm sản phẩm vào giỏ hàng
    Route::get('showCart', [HomeController::class, 'showCart'])->name('showCart'); // show giỏ hàng
    Route::POST('updateCart', [HomeController::class, 'updateCart'])->name('updateCart'); // update giỏ hàng
    Route::get('delCart', [HomeController::class, 'delCart'])->name('delCart'); // delete sản phẩm trong giỏ hàng
    Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout'); // thanh toán
    Route::get('get_checkout', [HomeController::class, 'checkout'])->name('get_checkout'); // thanh toán
    Route::POST('order', [HomeController::class, 'order'])->name('order'); // thanh toán
});

// account
Route::get('dangnhap', [HomeController::class, 'dangnhap'])->name('dangnhap');
Route::get('dangky', [HomeController::class, 'dangky'])->name('dangky');
Route::prefix('account')->group(function () {
    Route::get('info', [HomeController::class, 'account'])->name('account');
    Route::POST('update/{id}', [HomeController::class, 'update_account'])->name('update_account'); // cập nhật thông tin người dùng
    Route::get('order', [HomeController::class, 'account_cart'])->name('account_cart');
    Route::get('order/{id}', [HomeController::class, 'account_order_dital'])->name('account_order_dital');
});

// knot
Route::get('knot/clik_body/{id}', [HomeController::class, 'clik_body'])->name('clik_body');
Route::get('knot/clik_strap/{id}', [HomeController::class, 'clik_strap'])->name('clik_strap');
Route::get('knot/clik_buckle/{id}', [HomeController::class, 'clik_buckle'])->name('clik_buckle');


Route::get('custom-knot', [HomeController::class, 'customknot'])->name('customknot');
Route::get('{slug}', [HomeController::class, 'category']);
Route::get('{catslug}/{slug}', [HomeController::class, 'post']);
