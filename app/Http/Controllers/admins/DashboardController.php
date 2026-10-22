<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Thống kê tổng quan từ cơ sở dữ liệu
        $totalUsers = DB::table('users')->count();
        $totalAdmins = DB::table('users')->where('role', 'admin')->count();
        $totalShirts = DB::table('shirts')->count();
        $totalCarts = DB::table('cart')->count();
        $totalRates = DB::table('rates')->count();

        // Người dùng và sản phẩm mới nhất
        $recentUsers = DB::table('users')->latest('id')->take(5)->get();
        $recentShirts = DB::table('shirts')->latest('id')->take(5)->get();

        return view('admins.dashboard.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalShirts',
            'totalCarts',
            'totalRates',
            'recentUsers',
            'recentShirts'
        ));
    }
}
