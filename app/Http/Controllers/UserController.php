<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    
    public function login()
    {
        return view('login');
    }

    public function post_login(Request $request)
    {
        if(Auth::attempt($request->only('phone','password'),false))
        {
            return redirect()->route('home');
        }
        else
        {
            return view('login',[
                'message'=>'Tên đăng nhập hoặc mật khẩu không chính xác'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
