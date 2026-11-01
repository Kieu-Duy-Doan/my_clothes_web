@extends('admins.layouts.main')

@section('title', 'Bảng Điều Khiển Quản Trị — MY CLOTHES')

@section('header')
    <div class="flex items-center gap-4">
        <h1 class="text-base font-bold font-display uppercase tracking-wider text-white">
            Tổng Quan Hệ Thống
        </h1>
        <span
            class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-mono-code font-medium bg-neutral-900 text-neutral-300 border border-neutral-800">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
            Hệ thống hoạt động bình thường
        </span>
    </div>

    <!-- Header Quick Actions -->
    <div class="flex items-center gap-3">
        <span class="text-xs font-mono-code text-neutral-400 hidden md:inline">
            {{ date('d/m/Y') }} • {{ date('H:i') }}
        </span>
        <a href="{{ route('home') }}" target="_blank"
            class="px-3 py-1.5 rounded-lg border border-neutral-800 hover:border-neutral-700 bg-neutral-900 text-neutral-200 text-xs font-medium transition-colors inline-flex items-center gap-2">
            <span>Ghé cửa hàng</span>
            <svg class="w-3.5 h-3.5 text-neutral-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
@endsection

@section('content')
    <!-- 1. KPI STATS CARDS (4 Cards Grid) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <!-- Stat 1: Total Shirts (Sản phẩm áo) -->
        <div
            class="p-6 rounded-2xl bg-black border border-neutral-900 relative overflow-hidden group hover:border-neutral-800 transition-colors">
            <div class="flex items-center justify-between text-neutral-500 mb-3">
                <span class="text-xs uppercase tracking-wider font-semibold">Mẫu Áo (Shirts)</span>
                <div
                    class="w-8 h-8 rounded-lg bg-neutral-900 border border-neutral-800 flex items-center justify-center text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <p class="text-3xl font-extrabold font-display text-white tracking-tight">
                    {{ $totalShirts ?? 0 }}
                </p>
                <span class="text-[11px] text-neutral-400 font-mono-code">mẫu trong kho</span>
            </div>
            <div
                class="mt-4 pt-4 border-t border-neutral-900 flex items-center justify-between text-[11px] text-neutral-400">
                <span>Chất liệu Cotton Compact</span>
                <span class="text-white font-mono-code">280 GSM</span>
            </div>
        </div>

        <!-- Stat 2: Total Users (Khách hàng) -->
        <div
            class="p-6 rounded-2xl bg-black border border-neutral-900 relative overflow-hidden group hover:border-neutral-800 transition-colors">
            <div class="flex items-center justify-between text-neutral-500 mb-3">
                <span class="text-xs uppercase tracking-wider font-semibold">Tài Khoản (Users)</span>
                <div
                    class="w-8 h-8 rounded-lg bg-neutral-900 border border-neutral-800 flex items-center justify-center text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <p class="text-3xl font-extrabold font-display text-white tracking-tight">
                    {{ $totalUsers ?? 0 }}
                </p>
                <span class="text-[11px] text-neutral-400 font-mono-code">thành viên</span>
            </div>
            <div
                class="mt-4 pt-4 border-t border-neutral-900 flex items-center justify-between text-[11px] text-neutral-400">
                <span>Quản trị viên (Admin)</span>
                <span class="text-white font-mono-code font-bold">{{ $totalAdmins ?? 1 }}</span>
            </div>
        </div>

        <!-- Stat 3: Total Cart Orders -->
        <div
            class="p-6 rounded-2xl bg-black border border-neutral-900 relative overflow-hidden group hover:border-neutral-800 transition-colors">
            <div class="flex items-center justify-between text-neutral-500 mb-3">
                <span class="text-xs uppercase tracking-wider font-semibold">Giỏ Hàng (Cart)</span>
                <div
                    class="w-8 h-8 rounded-lg bg-neutral-900 border border-neutral-800 flex items-center justify-center text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <p class="text-3xl font-extrabold font-display text-white tracking-tight">
                    {{ $totalCarts ?? 0 }}
                </p>
                <span class="text-[11px] text-neutral-400 font-mono-code">mục đang chọn</span>
            </div>
            <div
                class="mt-4 pt-4 border-t border-neutral-900 flex items-center justify-between text-[11px] text-neutral-400">
                <span>Trạng thái giỏ</span>
                <span class="text-emerald-400 font-mono-code">Đang hoạt động</span>
            </div>
        </div>

        <!-- Stat 4: Reviews & Ratings -->
        <div
            class="p-6 rounded-2xl bg-black border border-neutral-900 relative overflow-hidden group hover:border-neutral-800 transition-colors">
            <div class="flex items-center justify-between text-neutral-500 mb-3">
                <span class="text-xs uppercase tracking-wider font-semibold">Đánh Giá (Rates)</span>
                <div
                    class="w-8 h-8 rounded-lg bg-neutral-900 border border-neutral-800 flex items-center justify-center text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <p class="text-3xl font-extrabold font-display text-white tracking-tight">
                    {{ $totalRates ?? 0 }}
                </p>
                <span class="text-[11px] text-neutral-400 font-mono-code">lượt phản hồi</span>
            </div>
            <div
                class="mt-4 pt-4 border-t border-neutral-900 flex items-center justify-between text-[11px] text-neutral-400">
                <span>Điểm trung bình</span>
                <span class="text-white font-mono-code">5.0 / 5.0 ★</span>
            </div>
        </div>

    </div>

    <!-- 2. TWO-COLUMN CONTENT GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- Left Column (8 cols): Recent Users Table & Store Analytics -->
        <div class="lg:col-span-8 space-y-8">

            <!-- Recent Users Table -->
            <div class="rounded-2xl bg-black border border-neutral-900 overflow-hidden">
                <div class="p-6 border-b border-neutral-900 flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-bold uppercase tracking-wider font-display text-white">
                            Thành Viên Mới Nhất
                        </h3>
                        <p class="text-xs text-neutral-400 mt-0.5">Danh sách các tài khoản vừa đăng ký trên hệ
                            thống</p>
                    </div>
                    <span
                        class="text-xs font-mono-code text-neutral-400 px-2.5 py-1 rounded bg-neutral-900 border border-neutral-800">
                        {{ count($recentUsers ?? []) }} tài khoản gần đây
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-neutral-300">
                        <thead
                            class="bg-neutral-950/70 text-[11px] uppercase tracking-wider text-neutral-400 font-mono-code border-b border-neutral-900">
                            <tr>
                                <th class="px-6 py-3.5">ID</th>
                                <th class="px-6 py-3.5">Họ và Tên</th>
                                <th class="px-6 py-3.5">Email</th>
                                <th class="px-6 py-3.5">Vai trò</th>
                                <th class="px-6 py-3.5">Địa chỉ</th>
                                <th class="px-6 py-3.5 text-right">Ngày tham gia</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-900">
                            @forelse($recentUsers as $user)
                                <tr class="hover:bg-neutral-900/50 transition-colors">
                                    <td class="px-6 py-4 font-mono-code text-neutral-400">#{{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-white flex items-center gap-2.5">
                                        <span
                                            class="w-6 h-6 rounded-full bg-neutral-800 text-white flex items-center justify-center text-[10px] font-bold">
                                            {{ mb_strtoupper(mb_substr($user->name ?? 'A', 0, 1)) }}
                                        </span>
                                        <span>{{ $user->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 font-mono-code text-neutral-300">{{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if (($user->role ?? '') === 'admin')
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-white text-black font-mono-code">
                                                Admin
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-medium uppercase tracking-wider bg-neutral-900 text-neutral-400 border border-neutral-800 font-mono-code">
                                                User
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-neutral-400 truncate max-w-[150px]">
                                        {{ $user->address ?? 'Chưa cập nhật' }}
                                    </td>
                                    <td class="px-6 py-4 text-right font-mono-code text-neutral-400">
                                        {{ !empty($user->created_at) ? date('d/m/Y', strtotime($user->created_at)) : 'Vừa xong' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-neutral-500">
                                        Chưa có tài khoản nào được tạo trong cơ sở dữ liệu.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Products in Stock Preview -->
            <div class="rounded-2xl bg-black border border-neutral-900 overflow-hidden">
                <div class="p-6 border-b border-neutral-900 flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-bold uppercase tracking-wider font-display text-white">
                            Danh Sách Áo Tuyển Chọn (Shirts)
                        </h3>
                        <p class="text-xs text-neutral-400 mt-0.5">Sản phẩm áo thun, polo, sơ mi hiển thị trên
                            storefront</p>
                    </div>
                    <span
                        class="text-xs font-mono-code text-neutral-400 px-2.5 py-1 rounded bg-neutral-900 border border-neutral-800">
                        Bảng: `shirts`
                    </span>
                </div>

                <div class="p-6">
                    @if (count($recentShirts ?? []) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($recentShirts as $shirt)
                                <div
                                    class="p-4 rounded-xl border border-neutral-900 bg-neutral-950 flex items-center justify-between">
                                    <div>
                                        <h4 class="text-xs font-bold text-white uppercase">{{ $shirt->name }}
                                        </h4>
                                        <p class="text-[11px] text-neutral-400 mt-1 font-mono-code">
                                            {{ number_format($shirt->price, 0, ',', '.') }}₫</p>
                                    </div>
                                    <span
                                        class="text-xs font-mono-code text-white px-2 py-1 bg-neutral-900 rounded border border-neutral-800">
                                        ★ {{ $shirt->star ?? 5.0 }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-neutral-400 text-xs">
                            <p class="mb-2">Chưa có sản phẩm nào trong bảng `shirts`.</p>
                            <p class="text-[11px] text-neutral-400">Trang chủ hiện đang trình diễn danh mục sản
                                phẩm mẫu Minimalist 2026.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <!-- Right Column (4 cols): System Specifications & Store Info -->
        <div class="lg:col-span-4 space-y-6">

            <!-- System Specifications Box -->
            <div class="p-6 rounded-2xl bg-black border border-neutral-900">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <h3 class="text-xs font-bold uppercase tracking-wider font-display text-white">
                        Thông Số Hệ Thống
                    </h3>
                </div>

                <ul class="space-y-3 text-xs">
                    <li class="flex items-center justify-between py-2 border-b border-neutral-900">
                        <span class="text-neutral-400">Framework</span>
                        <span class="font-mono-code font-bold text-white">Laravel
                            {{ app()->version() }}</span>
                    </li>
                    <li class="flex items-center justify-between py-2 border-b border-neutral-900">
                        <span class="text-neutral-400">PHP Version</span>
                        <span class="font-mono-code font-bold text-white">PHP {{ PHP_VERSION }}</span>
                    </li>
                    <li class="flex items-center justify-between py-2 border-b border-neutral-900">
                        <span class="text-neutral-400">Môi trường (Env)</span>
                        <span
                            class="font-mono-code uppercase text-white font-bold">{{ app()->environment() }}</span>
                    </li>
                    <li class="flex items-center justify-between py-2 border-b border-neutral-900">
                        <span class="text-neutral-400">Session Driver</span>
                        <span class="font-mono-code text-white">{{ config('session.driver') }}</span>
                    </li>
                    <li class="flex items-center justify-between py-2 border-b border-neutral-900">
                        <span class="text-neutral-400">Cơ sở dữ liệu</span>
                        <span class="font-mono-code text-white">{{ config('database.default') }}
                            (web_clothes)</span>
                    </li>
                    <li class="flex items-center justify-between py-2">
                        <span class="text-neutral-400">Bảo mật Cookie</span>
                        <span class="font-mono-code text-emerald-400 font-bold">Active</span>
                    </li>
                </ul>
            </div>

            <!-- Brand & Studio Philosophy Note -->
            <div class="p-6 rounded-2xl bg-black border border-neutral-900 text-xs">
                <span class="text-[10px] font-mono-code uppercase tracking-widest text-neutral-400 block mb-2">
                    Thương Hiệu
                </span>
                <h4 class="text-sm font-bold font-display uppercase tracking-wider text-white mb-2">
                    MY CLOTHES Studio
                </h4>
                <p class="text-neutral-400 leading-relaxed text-[11px] mb-4">
                    Định hướng phong cách tối giản (Minimalist Monochrome), tập trung vào chất lượng sợi dệt
                    Cotton Compact 280GSM và form dáng đứng bền bỉ.
                </p>
                <div
                    class="pt-4 border-t border-neutral-900 flex items-center justify-between text-[11px] text-neutral-400 font-mono-code">
                    <span>Admin Mode:</span>
                    <span class="text-white font-bold">Active Security Guard</span>
                </div>
            </div>

            <!-- Quick Operations Card -->
            <div class="p-6 rounded-2xl bg-black border border-neutral-900 text-xs">
                <h3 class="text-xs font-bold uppercase tracking-wider font-display text-white mb-4">
                    Lối Tắt Thao Tác Nhanh
                </h3>
                <div class="space-y-2">
                    <a href="{{ route('home') }}"
                        class="w-full py-2.5 px-4 rounded-lg bg-neutral-900 hover:bg-neutral-800 text-white font-medium flex items-center justify-between transition-colors">
                        <span>Xem trang chủ giao diện</span>
                        <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                    <a href="{{ route('admin.getLogin') }}"
                        class="w-full py-2.5 px-4 rounded-lg bg-neutral-900 hover:bg-neutral-800 text-white font-medium flex items-center justify-between transition-colors">
                        <span>Trang Đăng Nhập Quản Trị</span>
                        <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
@endsection
