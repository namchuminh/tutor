<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
    public function login(){
        return view('web.auth.login');
    }

    public function submitLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role != 'phu_huynh') {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/phu-huynh');
            }
        }
    
        // Đăng nhập thất bại
        return redirect()->route('web.auth.login')->withErrors(['error' => 'Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('web.auth.login');
    }
}
