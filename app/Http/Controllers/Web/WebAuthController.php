<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\GiaSu;
use App\Models\PhuHuynh;
use Illuminate\Support\Facades\Hash;

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
            if (auth()->user()->role == 'phu_huynh') {
                return redirect()->intended('/phu-huynh');
            } else if(auth()->user()->role == 'gia_su') {
                return redirect()->route('web.giasu.show', auth()->user()->id);
            }else{
                return redirect()->intended('/admin');
            }
        }
    
        // Đăng nhập thất bại
        return redirect()->route('web.auth.login')->withErrors(['error' => 'Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.']);
    }

    public function parentRegister(){
        return view('web.auth.parentRegister'); 
    }

    public function parentRegisterSubmit(Request $request)
    {
        // 1. Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.unique' => 'Email này đã được sử dụng.',
            'password.required' => 'Vui lòng nhập mật khẩu.'
        ]);

        // 2. Tạo người dùng mới
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'phu_huynh', // Đặt vai trò là "phu_huynh"
            'phone' => $validatedData['phone']
        ]);

        PhuHuynh::create([
            'user_id' => $user->id,
            'vip_package' => '', // Giá trị mặc định hoặc tuỳ chỉnh
            'balance' => 0, // Giá trị mặc định hoặc tuỳ chỉnh
            'phone_number' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'status' => 1, // Giá trị mặc định hoặc tuỳ chỉnh
        ]);

        // 3. Đăng nhập người dùng mới (nếu cần)
        Auth::login($user);

        // 4. Redirect đến trang phụ huynh hoặc trang khác
        return redirect('/phu-huynh')->with('success', 'Đăng ký thành công. Bạn đã được đăng nhập.');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('web.auth.login');
    }
}
