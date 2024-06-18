<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Image;
use File;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::find('1');
        return view('admin.setting.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $setting = Setting::find($id);
        $setting->name = $data['name'];
        $setting->address = $data['address'];
        $setting->title = $data['title'];
        $setting->description = $data['description'];
        $setting->footer = $data['footer'];
        $setting->hotline = $data['hotline'];
        $setting->content_home = $data['content_home'];
        $setting->email = $data['email'];
        $setting->facebook = $data['facebook'];
        $setting->youtube = $data['youtube'];
        $setting->maps = $data['maps'];

        // thêm ảnh
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/home/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/home', $filename);
            $setting->img = $filename;
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/home/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/home', $filename);
            $setting->favicon = $filename;
        }
        // thêm ảnh
        
        $setting->save();

        return redirect()->back();
    }
    
}
