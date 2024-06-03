<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;
use Mail;

// $locale = App::currentLocale();

class HomeSystemController extends Controller
{
    public function sendmail(){
        $name = 'Nguyễn Văn Tuấn';
        Mail::send('emails.test', compact('name'), function($email) use($name){
            $email->subject('demo test mail');
            $email->to('tuan.pn92@gmail.com', 'web rinlisa');
        });
    }

    public function question(Request $request){
        $Customer = new Customer();
        $Customer->name = $request->name;
        $Customer->phone = $request->phone;
        $Customer->email = $request->email;
        $Customer->title = $request->title;
        $Customer->content = $request->content;
        $Customer->save();
        return redirect()->route('home')->with('success','Gửi thành công');
    }
   
}
