<?php

namespace App\Http\Controllers\Home\Sinhvien;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SignInController extends Controller
{
    public function index()
    {
        session(['link_user_sinhvien' => url()->previous()]);
        return view('qldiemrenluyen.users.sign-in',[
             'title' => 'Đăng Nhập Website chấm điểm rèn luyện'
        ]);
    }
    public function store(Request $request)
    {
     $this->validate($request, [
        'email' => 'required|email:filter',
        'password' => 'required'
     ]);

     if (Auth::guard('sinhvien_users')->attempt([
        'email'=> $request->input('email'),
        'password'=>$request->input('password'),

        ],$request->input('remember'))){
            
            return redirect('/');
            // dd('dang nhap thanh cong');
     }

     Session::flash('error', 'Email hoặc mật khẩu không đúng !');
     return redirect()->back();
    }
    public function sign_out(){
        Auth::guard('sinhvien_users')->logout();
        return redirect()->route('sign-in');
    }
  
}
