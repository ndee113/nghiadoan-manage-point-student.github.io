<?php

namespace App\Http\Controllers\Home\HoiDong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HDSignInController extends Controller
{
    public function index()
    {
        session(['link_user_hoidong' => url()->previous()]);
        return view('qldiemrenluyen.users.sign-in-hoidong',[
             'title' => 'Đăng Nhập Website chấm điểm rèn luyện'
        ]);
    }
    public function store(Request $request)
    {
     $this->validate($request, [
        'email' => 'required|email:filter',
        'password' => 'required'
     ]);

     if (Auth::guard('hoidong_users')->attempt([
        'email'=> $request->input('email'),
        'password'=>$request->input('password'),

        ],$request->input('remember'))){
            // dd('dang nhap thanh cong');
            return redirect(route('home-hoidong'));
           
     }

     Session::flash('error', 'Email hoặc mật khẩu không đúng !');
     return redirect()->back();
    }
    public function sign_out(){
        Auth::guard('hoidong_users')->logout();
        return redirect()->route('sign-in-hd');
    }
}
