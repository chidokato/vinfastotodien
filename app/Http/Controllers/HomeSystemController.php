<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;
use App\Models\Setting;

use Mail;

class HomeSystemController extends Controller
{
    public function sendmail(Request $request){
        $setting = Setting::find('1');
        $mail = $setting->email;
        $name = $request->name;
        $phone = $request->phone;
        $note = $request->note;
        Mail::send('emails.data', compact(
            'name',
            'phone',
            'note'
        ), function($email) use($mail){
            $email->subject('Data VinFast Ô Tô Điện');
            $email->to($mail, 'VinFast Ô Tô Điện');
        });
        return redirect()->route('home')->with('success','Gửi thành công');
    }

    // public function question(Request $request){
    //     $Customer = new Customer();
    //     $Customer->name = $request->name;
    //     $Customer->phone = $request->phone;
    //     $Customer->email = $request->email;
    //     $Customer->title = $request->title;
    //     $Customer->content = $request->content;
    //     $Customer->save();
    //     return redirect()->route('home')->with('success','Gửi thành công');
    // }
   
}
