<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Post;
use App\Models\Images;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Mail;
use Image;
use File;

// $locale = App::currentLocale();

class HomeController extends Controller
{
    function __construct()
    {
        $setting = Setting::find('1');
        $menu = Menu::where('parent', 0)->orderBy('view', 'asc')->get();
        view()->share( [
            'setting'=>$setting,
            'menu'=>$menu,
        ]);
    }

    public function index()
    {
        $slider = Slider::orderBy('id', 'desc')->get();
        $cat_home_first = Category::where('parent', 99)->orderBy('id', 'desc')->first();
        $cat_home = Category::where('parent', 99)->where('id', '!=', Category::where('parent', 99)->max('id'))->orderBy('id', 'desc')->take(6)->get();
        $post = Post::where('sort_by', 'Product')->take(6)->orderBy('id', 'desc')->get();
        return view('pages.home', compact(
            'slider',
            'cat_home_first',
            'cat_home',
            'post',
        ));
    }

    public function category($slug)
    {
        $data = Category::where('slug', $slug)->first();
        
        // cat_array
        $cat_array = [$data["id"]];
        $cates = Category::where('parent', $data["id"])->get();
        foreach ($cates as $key => $cate) {
            $cat_array[] = $cate->id;
        }

        if ($slug == 'gioi-thieu') {
            return view('pages.about', compact(
                'data',
            ));
        }elseif($slug == 'lien-he'){
            return view('pages.contact', compact(
                'data',
            ));
        }else{
            if ($data->sort_by == 'Product') {
                $post = Post::whereIn('category_id', $cat_array)->orderBy('id', 'DESC')->paginate(30);
                return view('pages.category', compact(
                    'data',
                    'post',
                ));
            }
        }
    }

    public function post($catslug, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $images = Images::where('post_id', $post->id)->get();
        $related_post = Post::where('category_id', $post->category_id)->whereNotIn('id', [$post->id])->orderBy('id', 'desc')->take(10)->get();
        if ($post->sort_by == 'Product') {
            return view('pages.project', compact(
                'post',
                'images',
                'related_post',
            ));
        }elseif ($post->sort_by == 'News') {
            return view('pages.post', compact(
                'post',
                // 'related_post',
            ));
        }
    }
    // ============================
    // ============================
    // ============================
    // ============================
    // ============================
    // ============================
    // ============================
    // ============================
    // ============================
    // ============================
    // ============================

    public function search()
    {
        $posts = Post::where('sort_by', 'Product')->orderBy('id', 'DESC');
        if($key = request()->key){
            $posts->where('name', 'like', '%' . $key . '%');
        }
        $posts = $posts->paginate(30);

        return view('pages.search', compact(
            'posts',
            'key',
        ));
    }

    public function account()
    {
        if (Auth::check()) {
            $user = User::find(Auth::User()->id);
            return view('pages.account.account', compact(
                'user',
            ));
        }else{
            return redirect()->route('dangnhap');
        }
        
    }

    public function update_account(Request $request, $id)
    {
        $user = User::find($id);
        $user->yourname = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->facebook = $request->facebook;

        if($request->changepassword == "on")
        {
            $this->validate($request,
            [
                'password' => 'Required',
                'passwordagain' => 'Required|same:password'                
            ],
            [] );
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('img')) {
            if(File::exists('data/user/'.$user->img)) { File::delete('data/user/'.$user->img); } // xóa ảnh cũ
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/user/".$filename)){$filename = rand(0,99)."_".$filename;}
            $img = Image::make($file)->resize(500, 500, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/user/'.$filename));
            $user->img = $filename;
        }

        $user->save();
        return redirect()->route('account')->with('success','Sửa thành công');
    }

    public function account_cart()
    {
        if (Auth::check()) {
            $user = User::find(Auth::User()->id);
            $carts = Cart::where('user_id', Auth::User()->id)->get();
            return view('pages.account.cart', compact(
                'user',
                'carts',
            ));
        }else{
            return redirect()->route('dangnhap');
        }
        
    }

    public function account_order_dital($id)
    {
        if (Auth::check()) {
            $cart = Cart::find($id);
            $order = Order::where('cart_id', $id)->get();
            return view('pages.account.order', compact(
                'cart',
                'order'
            ));
        }else{
            return redirect()->route('dangnhap');
        }
        
    }

    public function dangnhap()
    {
        return view('pages.account.login');
    }

    public function dangky()
    {
        $setting = Setting::find(1);
        return view('pages.account.register', compact('setting'));
    }

    public function customknot()
    {
        $mat = Post::where('category_id', 75)->orderBy('id', 'desc')->get();
        $day = Post::where('category_id', 76)->orderBy('id', 'desc')->get();
        $khoa = Post::where('category_id', 90)->orderBy('id', 'desc')->get();

        $body = Post::where('id', 520)->first();
        $strap = Post::where('id', 538)->first();
        $buckle = Post::where('id', 464)->first();

        return view('pages.knot', compact(
            'mat',
            'day',
            'khoa',
            'body',
            'strap',
            'buckle',
        ));
    }

    public function addTocart_munti()
    {
        $mat = request()->mat;
        $product = Post::find($mat);
        $cart = session()->get('cart');
        if (isset($cart[$mat])) {
            $cart[$mat]['quantity'] = $cart[$mat]['quantity'] + 1;
        }else{
            $cart[$mat] = [
                'product_id' => $mat,
                'name' => $product->name,
                'price' => $product->price,
                'unit' => $product->unit,
                'img' => $product->img,
                'slug' => $product->category->slug.'/'.$product->slug,
                'quantity' => '1'
            ];
        }
        session()->put('cart', $cart);

        $day = request()->day;
        $product = Post::find($day);
        $cart = session()->get('cart');
        if (isset($cart[$day])) {
            $cart[$day]['quantity'] = $cart[$day]['quantity'] + 1;
        }else{
            $cart[$day] = [
                'product_id' => $day,
                'name' => $product->name,
                'price' => $product->price,
                'unit' => $product->unit,
                'img' => $product->img,
                'slug' => $product->category->slug.'/'.$product->slug,
                'quantity' => '1'
            ];
        }
        session()->put('cart', $cart);

        $khoa = request()->khoa;
        $product = Post::find($khoa);
        $cart = session()->get('cart');
        if (isset($cart[$khoa])) {
            $cart[$khoa]['quantity'] = $cart[$khoa]['quantity'] + 1;
        }else{
            $cart[$khoa] = [
                'product_id' => $khoa,
                'name' => $product->name,
                'price' => $product->price,
                'unit' => $product->unit,
                'img' => $product->img,
                'slug' => $product->category->slug.'/'.$product->slug,
                'quantity' => '1'
            ];
        }
        session()->put('cart', $cart);

        return response()->json([
            'quanlity_cart' => count($cart),
            'code' => 200,
            'message' => 'success'
        ], status: 200); 
    }

    public function addTocart($id)
    {
        // session()->flush('cart');
        $product = Post::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'product_id' => $id,
                'name' => $product->name,
                'price' => $product->price,
                'unit' => $product->unit,
                'img' => $product->img,
                'slug' => $product->category->slug.'/'.$product->slug,
                'quantity' => '1'
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'quanlity_cart' => count($cart),
            'code' => 200,
            'message' => 'success'
        ], status: 200); 
    }

    public function showCart(){
        $cart = session()->get('cart');
        // dd($cart);
        return view('pages.cart.cart', compact(
            'cart'
        ));
    }

    public function updateCart(Request $request){
        if(isset($request['id'])){
            foreach($request['id'] as $key => $id){
                $cart = session()->get('cart');
                $cart[$id]['quantity'] = $request['quantity'][$key];
                session()->put('cart', $cart);
            }
        }
        $cart = session()->get('cart');
        return redirect()->route('showCart');
    }

    public function delCart(Request $request){
        if ($request->id) {
            $cart = session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            $cart = session()->get('cart');
            $cartComponent = view('pages.iteam.cart', compact('cart'))->render();
            return response()->json([
                'quanlity_cart' => count($cart),
                'cart_component' => $cartComponent,
                'code' => 200
            ], status: 200);
        }
    }

    public function checkout(){
        if (Auth::check()) {
            $cart = session()->get('cart');
            return view('pages.cart.checkout', compact('cart'));
        }else{
            return redirect()->route('dangnhap');
        }
        
    }

    public function order(Request $request){
        $carts = new Cart();
        $carts->user_id = Auth::User()->id;
        $carts->all_price = $request->all_price;
        $carts->name = $request->name;
        $carts->address = $request->address;
        $carts->phone = $request->phone;
        $carts->email = $request->email;
        $carts->status = 'Chờ xác nhận';
        $carts->save();

        $cart = session()->get('cart');
        // $order = new Order();
        // $order->user_id = $uid;
        // $order->parent = 0;
        // $order->save();

        // $edit_order = Order::find($order->id);
        // $edit_order->sku = date('Ymd').$order->id;
        // $edit_order->save();
        
        foreach($cart as $id => $val){
            $orders = new Order();
            $orders->cart_id = $carts->id;
            $orders->product_id = $val['product_id'];
            $orders->price = $val['price'];
            $orders->unit = $val['unit'];
            $orders->quantity = $val['quantity'];
            $orders->save();
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect()->route('account_cart')->with('success','Đặt hàng thành công');
    }


    public function clik_body(Request $request, $id)
    {
        $body = Post::find($id);
        $mat_html = "<img class='a1' data-id='".$body->id."' src='data/product/knot/".$body->img_1."'>";
        $price_face = "<div class='price_face' data-id='".$body->price."'></div>";
        $tong = number_format($body->price + $request->price_strap + $request->price_rg);
        $body_load = view('pages.iteam.knot.body', compact('body'))->render();
        return response()->json([
            'mat_html' => $mat_html,
            'price_face' => $price_face,
            'tong' => $tong,
            'body' => $body_load,
            'code' => 200,
            'message' => 'success'
        ], status: 200);
    }
    public function clik_strap(Request $request, $id)
    {
        $strap = Post::find($id);
        $str_m = "<img class='a2' data-id='".$strap->id."' src='data/product/knot/".$strap->img_3."'>";
        $flat_top = "<img src='data/product/knot/".$strap->img_1."'>";
        $flat_bottom = "<img src='data/product/knot/".$strap->img_2."'>";
        $price_strap = "<div class='price_strap' data-id='".$strap->price."'></div>";
        $tong = number_format($strap->price + $request->price_face + $request->price_rg);
        $strap_load = view('pages.iteam.knot.strap', compact('strap'))->render();
        return response()->json([
            'str_m' => $str_m,
            'flat_top' => $flat_top,
            'flat_bottom' => $flat_bottom,
            'price_strap' => $price_strap,
            'tong' => $tong,
            'strap' => $strap_load,
            'code' => 200,
            'message' => 'success'
        ], status: 200);
    }

    public function clik_buckle(Request $request, $id)
    {
        $buckle = Post::find($id);
        $rg = "<img class='a3' data-id='".$buckle->id."' src='data/product/knot/".$buckle->img_1."'>";
        $price_rg = "<div class='price_rg' data-id='".$buckle->price."'></div>";
        $tong = number_format($buckle->price + $request->price_face + $request->price_strap);
        $buckle_load = view('pages.iteam.knot.buckle', compact('buckle'))->render();
        return response()->json([
            'rg' => $rg,
            'price_rg' => $price_rg,
            'tong' => $tong,
            'buckle' => $buckle_load,
            'code' => 200,
            'message' => 'success'
        ], status: 200);
    }

    

    

    

   
}
