<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->back()->with(['message'=>'Số điện thoại đăng nhập hoặc mật khẩu không chính xác']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function change_password()
    {
        return view('change-password');
    }

    public function post_change_password(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required',
            'new_password'=>'required|string',
            'confirm_password'=>'required|string'
        ],[
            'old_password.required'=>'Nhập mật khẩu hiện tại',
            'new_password.required'=>'Nhập mật khẩu mới',
            'new_password.string'=>'Mật khẩu mới không hợp lệ',
            'confirm_password.required'=>'Nhập mật khẩu xác nhận',
            'confirm_password.string'=>'Mật khẩu xác nhận không hợp lệ',
        ]);
        if(Hash::check($request->old_password,Auth::user()->password))
        {
            if($request->new_password != $request->confirm_password)
            {
                return redirect()->back()->with('message_confirm_password', 'Mật khẩu xác nhận không đúng');
            }
            else
            {
                $id = Auth::user()->id;
                User::where('id',$id)->update([
                    'password'=>bcrypt($request->new_password)
                ]);
                Auth::logout();
                return redirect()->route('login')->with('message','Đổi mật khẩu thành công, vui lòng đăng nhập lại');
            }
        }
        else
        {
            return redirect()->back()->with('message', 'Mật khẩu hiện tại không đúng');
        }
    }

    public function index()
    {
        $model = User::where('permission','!=','0')->get();
        return view('user.user-index',[
            'model'=>$model
        ]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }

    public function reset_password($id)
    {
        User::find($id)->update(['password'=>bcrypt('123')]);
        return redirect()->back()->with(['message'=>'Mật khẩu được đặt lại thành 123']);
    }

    public function insert(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'nullable|email',
            'phone'=>'required|string|unique:users,phone'
        ],[
            'name.required'=>'Họ tên không được để trống',
            'name.string'=>'Họ tên không hợp lệ',
            'email.email'=>'Email không hợp lệ',
            'phone.required'=>'Số điện thoại không được để trống',
            'phone.string'=>'Số điện thoại không hợp lệ',
            'phone.unique'=>'Số điện thoại đã tồn tại',
        ]);
        User::create($request->all());
        return redirect()->back();
    }
}
