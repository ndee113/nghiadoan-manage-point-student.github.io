<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    public function index()
    {
        session(['link_user' => url()->previous()]);
        return view('admin.users.login',[
             'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    public function store(Request $request)
    {
     $this->validate($request, [
        'email' => 'required|email:filter',
        'password' => 'required'
     ]);

     if (Auth::attempt([
        'email'=> $request->input('email'),
        'password'=>$request->input('password')
        ],$request->input('remember'))){
            
            return redirect()->route('admin');
     }

     Session::flash('error', 'Email hoặc mật khẩu không đúng!');
     return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
