<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('admins.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if ($user->role !== 'admin') {
                abort(403, 'Bạn không có quyền truy cập');
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            $request->session()->regenerate();

            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu sai');
    }
}
