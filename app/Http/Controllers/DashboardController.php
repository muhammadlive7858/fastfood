<?php

namespace App\Http\Controllers;
use App\Models\User;

use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user()->id;
        $verify = User::find($user);

        // dd($verify);
        if($verify->verivied_phone == null){
            $phone = $verify->phone;
            $message = 'Siz yangi ro\'yxatdan o\'tgansiz 2 (ikki) kun ichida telefon raqamingiz tekshirishdan o\'tkazishingiz zarur yani raqam haqiqatdan sizga tegishli ekanligini tekshirish zarur!';
            return view('dashboard',compact('message','phone'));
        }else if($verify->country == null or $verify->description == null or $verify->address == null or $verify->company == null){
            $message = 'Foydalanuvchi malumotlari to\'liq to\'dirishingizni so\'raymiz bu dastur aniq ishlashiga yordam beradi!';
            return view('dashboard',compact('message'));
        }
        return view('tables');
    }
    public function verify_phone(){
        $phone = Auth::user()->phone;
        return view('verify_phone',compact('phone'));
    }
}
