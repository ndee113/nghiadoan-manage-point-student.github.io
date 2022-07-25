<?php

namespace App\Http\Controllers\Home\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GVSignInController extends Controller
{
    public function index()
    {
        session(['link_user_giaovien' => url()->previous()]);
        
        return view('qldiemrenluyen.users.sign-in-giaovien',[
             'title' => 'Đăng Nhập Website chấm điểm rèn luyện'
        ]);
    }
    public function store(Request $request)
    {
     $this->validate($request, [
        'email' => 'required|email:filter',
        'password' => 'required'
     ]);

     if (Auth::guard('giaovien_users')->attempt([
        'email'=> $request->input('email'),
        'password'=>$request->input('password'),

        ],$request->input('remember'))){
            
            return redirect(route('home-teacher'));
            // dd('dang nhap thanh cong');
     }

     Session::flash('error', 'Email hoặc mật khẩu không đúng !');
     return redirect()->back();
    }
    public function sign_out(){
        Auth::guard('giaovien_users')->logout();
        return redirect()->route('sign-in-gv');
    }
}
