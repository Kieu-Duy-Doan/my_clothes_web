<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    // Đăng ký

    public function register(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        if (!$user) {
            return redirect()->back()->with('error', 'Đăng ký thất bại. Vui lòng thử lại.');
        }

        return redirect()->route('getLogin')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
    }

    // Đăng nhập
    public function login(LoginUserRequest $request)
    {
        // Vừa validate vừa lấy dữ liệu luôn
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // attempt() sẽ tự động hash password và so sánh với password đã hash trong database
        // Auth::attempt() lưu id người dùng vào session
        if (Auth::attempt($credentials, $remember)) {
            // regenerate() sẽ tạo session mới, thay thế session cũ khi chưa đăng nhập (mặc định truy cập vào trang web đã được cấp 1 session id). 
            // Việc này giúp tránh bị tấn công session fixation.
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Đăng nhập thành công.');
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng.');
    }

    public function logout(Request $request)
    {
        // thay đổi giá trị remember token trong bảng user
        // Vô hiệu hóa token cũ
        Auth::logout();

        $request->session()->invalidate();
        // xóa bỏ bản ghi trong bảng session.

        $request->session()->regenerateToken();
        // Tạo lại csrf token
    }
}
