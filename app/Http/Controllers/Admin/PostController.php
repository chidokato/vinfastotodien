<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Image;
use File;

use App\Models\Category;
use App\Models\Option;
use App\Models\Post;
use App\Models\Images;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $update = Post::get();
        // foreach($update as $val){
        //     $data = Post::find($val->id);
        //     if ($data->unit == 'JPY') {
        //         $data->unit = '¥';
        //     }elseif($data->unit == 'VNĐ'){
        //         $data->unit = '₫';
        //     }
        //     $data->save();
        // }

        $category = Category::where('sort_by', 'Product')->where('parent', '0')->orderBy('view', 'DESC')->get();

        $posts = Post::where('sort_by', 'Product')->orderBy('id', 'DESC');
        if($key = request()->key){
            $posts->where('name', 'like', '%' . $key . '%');
        }
        if($cid = request()->cid){
            $posts->where('category_id', $cid);
        }
        $posts = $posts->paginate(30);

        return view('admin.post.index', compact(
            'posts',
            'category'
        ));
    }

    public function post_up($id)
    {
        $id_max = Post::max('id');
        $data = Post::find($id);
        $data->id = $id_max+1;
        $data->save();
        return redirect()->back()->with('Success','Success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $category = Category::where('sort_by', 'Product')->orderBy('view', 'DESC')->get();
        $option = Option::where('category_id', '74')->where('parent', '0')->orderBy('view', 'DESC')->get();
        return view('admin.post.create')->with(compact('category', 'option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $post = new Post();
        $post->user_id = Auth::User()->id;
        $post->status = 'true';
        $post->sort_by = 'Product';
        $post->slug = Str::slug($data['name'], '-');
        $post->name = $data['name'];
        $post->category_id = $data['category_id'];
        $post->detail = $data['detail'];
        $post->content = $data['content'];
        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->price = $data['price'];
        $post->unit = $data['unit'];

        // thêm ảnh
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/".$filename)){$filename = rand(0,99)."_".$filename;}
            $img = Image::make($file)->resize(1000, 1000, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/'.$filename));
            // $file->move('data/news', $filename);
            $post->img = $filename;
        }
        // ---------------------
        $post->save();

        if($request->hasFile('imgdetail')){
            foreach ($request->file('imgdetail') as $file) {
                if(isset($file)){
                    $Images = new Images();
                    $Images->post_id = $post->id;
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/product/detail/".$filename)){$filename = rand(0,99)."_".$filename;}
                    $img = Image::make($file)->resize(1000, 1000, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/'.$filename));
                    // $file->move('data/product/detail', $filename);
                    $Images->img = $filename;
                    $Images->save();
                }
            }
        }
        return redirect('admin/post')->with('Success','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('sort_by', 'Product')->get();
        $data = Post::find($id);
        $images = Images::where('post_id', $data->id)->get();
        $option = Option::where('category_id', $data->category_id)->where('parent', '0')->orderBy('view', 'DESC')->get();
        return view('admin.post.edit')->with(compact('category', 'data', 'images', 'option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id);
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->category_id = $data['category_id'];
        $post->detail = $data['detail'];
        if (isset($data['info'])) {
            $post->info = $data['info'];
        }
        $post->content = $data['content'];
        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->price = $data['price'];
        $post->unit = $data['unit'];


        // thêm ảnh
        if ($request->hasFile('img')) {
            if(File::exists('data/product/'.$post->img)) { File::delete('data/product/'.$post->img);} // xóa ảnh cũ
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/".$filename)){$filename = rand(0,99)."_".$filename;}
            $img = Image::make($file)->resize(1000, 1000, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/'.$filename));
            // $file->move('data/news', $filename);
            $post->img = $filename;
        }
        
        $post->save();

        if($request->hasFile('imgdetail')){
            foreach ($request->file('imgdetail') as $file) {
                if(isset($file)){
                    $Images = new Images();
                    $Images->post_id = $post->id;
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/product/detail/".$filename)){$filename = rand(0,99)."_".$filename;}
                    // $file->move('data/product/detail', $filename);
                    $img = Image::make($file)->resize(1000, 1000, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/detail/'.$filename));
                    $Images->img = $filename;
                    $Images->save();
                }
            }
        }

        
        return redirect()->back()->with('Success','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Post::find($id);
        if(File::exists('data/news/'.$Post->img)) { File::delete('data/news/'.$Post->img);} // xóa ảnh cũ
        $Post->delete();
        return redirect()->back()->with('Success','Success');
    }
}
