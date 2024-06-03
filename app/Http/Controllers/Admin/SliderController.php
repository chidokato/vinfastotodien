<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Image;
use File;

use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::orderBy('id', 'DESC')->get();
        return view('admin.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
        $slider = new Slider();
        $slider->user_id = Auth::User()->id;
        $slider->name = $data['name'];
        $slider->note = $data['note'];
        $slider->link = $data['link'];
        $slider->content = $data['content'];

        // thêm ảnh
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/home/800/".$filename)){$filename = rand(0,99)."_".$filename;}
            $img = Image::make($file)->resize(800, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/home/800/'.$filename));
            // $file->move('data/home', $filename);
            $slider->img = $filename;
        }
        // thêm ảnh

        $slider->save();
        // return redirect('admin/slider')->with('Success','Thành công');
        return redirect()->back()->with('Success','Thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Slider::where('note', 'like', '%' . $id . '%')->orderBy('id', 'DESC')->get();
        return view('admin.slider.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slider::find($id);
        return view('admin.slider.edit')->with(compact('data'));
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
        $slider = Slider::find($id);
        $slider->name = $data['name'];
        $slider->note = $data['note'];
        $slider->link = $data['link'];
        $slider->content = $data['content'];
        
        // thêm ảnh
        if ($request->hasFile('img')) {
            if(File::exists('data/home/'.$slider->img)) { File::delete('data/home/800/'.$slider->img);} // xóa ảnh cũ
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/home/800/".$filename)){$filename = rand(0,99)."_".$filename;}
            $img = Image::make($file)->resize(800, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/home/800/'.$filename));
            // $file->move('data/home', $filename);
            $slider->img = $filename;
        }
        // thêm ảnh
        $slider->save();
        // return redirect('admin/slider')->with('Success','Thành công');
        return redirect()->back()->with('Success','Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(File::exists('data/home/'.$slider->img)) { File::delete('data/home/'.$slider->img);} // xóa ảnh cũ
        $slider->delete();
        return redirect()->back()->with('Success','Thành công');
    }
}
