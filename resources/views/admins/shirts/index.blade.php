<!DOCTYPE html>
<html lang="vi" class="h-full bg-neutral-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <title>Quản Lý Danh Sách Áo — MY CLOTHES Admin</title>

    <!-- Google Fonts: Plus Jakarta Sans & Syne & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Syne:wght@600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS / Vite -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-display {
            font-family: 'Syne', sans-serif;
        }

        .font-mono-code {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Subtle technical grid background */
        .admin-grid-bg {
            background-color: #050505;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* Custom dark scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #000;
        }

        ::-webkit-scrollbar-thumb {
            background: #262626;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #404040;
        }
    </style>
</head>

<body
    class="h-full bg-neutral-950 text-neutral-100 antialiased flex flex-col md:flex-row min-h-screen selection:bg-white selection:text-black">

    <!-- ========================================================================= -->
    <!-- 1. SIDEBAR NAVIGATION (Monochrome Minimalist) -->
    <!-- ========================================================================= -->
    <aside
        class="w-full md:w-64 bg-black border-r border-neutral-900 flex flex-col shrink-0 md:h-screen md:sticky md:top-0">
        <!-- Brand Header -->
        <div class="h-16 px-6 border-b border-neutral-900 flex items-center justify-between">
            <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : '/admin/dashboard' }}"
                class="flex items-center gap-3 group">
                <span
                    class="w-8 h-8 rounded-lg bg-white text-black font-extrabold flex items-center justify-center text-xs tracking-tighter shadow-sm font-display group-hover:scale-105 transition-transform">
                    MC
                </span>
                <div class="flex flex-col">
                    <span class="text-sm font-bold tracking-widest uppercase font-display text-white">
                        MY CLOTHES
                    </span>
                    <span class="text-[9px] uppercase tracking-[0.2em] text-neutral-500 font-semibold font-mono-code">
                        Admin Studio
                    </span>
                </div>
            </a>
            <span
                class="px-2 py-0.5 rounded text-[10px] font-mono-code bg-neutral-900 text-neutral-400 border border-neutral-800">
                v1.0
            </span>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4 space-y-1.5 flex-1 overflow-y-auto">
            <p class="px-3 text-[10px] uppercase font-bold tracking-widest text-neutral-500 mb-2 font-mono-code">
                Bảng điều khiển
            </p>

            <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : '/admin/dashboard' }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 text-xs font-medium tracking-wider transition-all">
                <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span>Tổng quan</span>
            </a>

            <p class="px-3 pt-5 text-[10px] uppercase font-bold tracking-widest text-neutral-500 mb-2 font-mono-code">
                Quản lý kho thời trang
            </p>

            <!-- Active Menu Item: Sản phẩm (Shirts) -->
            <a href="{{ Route::has('admin.shirts.index') ? route('admin.shirts.index') : '/admin/shirts' }}"
                class="flex items-center justify-between px-3 py-2.5 rounded-lg bg-white text-black text-xs font-bold uppercase tracking-wider shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Sản phẩm (Shirts)</span>
                </div>
                <span class="text-[10px] font-mono-code px-1.5 py-0.5 rounded bg-black text-white font-bold">
                    {{ isset($shirts) ? (is_countable($shirts) ? count($shirts) : $shirts->total()) : '8' }}
                </span>
            </a>

            <a href="#"
                class="flex items-center justify-between px-3 py-2.5 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 text-xs font-medium tracking-wider transition-colors">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Giỏ hàng / Đơn</span>
                </div>
            </a>

            <a href="#"
                class="flex items-center justify-between px-3 py-2.5 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 text-xs font-medium tracking-wider transition-colors">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span>Khách hàng</span>
                </div>
            </a>

            <a href="#"
                class="flex items-center justify-between px-3 py-2.5 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 text-xs font-medium tracking-wider transition-colors">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    <span>Đánh giá & Review</span>
                </div>
            </a>

            <div class="pt-6 border-t border-neutral-900">
                <a href="{{ Route::has('home') ? route('home') : '/' }}" target="_blank"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 text-xs font-medium tracking-wider transition-colors">
                    <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    <span>Xem website chính</span>
                </a>
            </div>
        </nav>

        <!-- Current Admin Footer Profile -->
        <div class="p-4 border-t border-neutral-900 bg-neutral-950/80">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 truncate">
                    <span
                        class="w-8 h-8 rounded-full bg-neutral-800 border border-neutral-700 flex items-center justify-center text-xs font-bold text-white shrink-0">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </span>
                    <div class="truncate">
                        <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name ?? 'Quản Trị Viên' }}</p>
                        <p class="text-[10px] text-neutral-400 font-mono-code uppercase">
                            {{ Auth::user()->role ?? 'admin' }}</p>
                    </div>
                </div>

                @if (Route::has('admin.logout'))
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" title="Đăng xuất"
                            class="p-2 text-neutral-400 hover:text-white hover:bg-neutral-900 rounded-lg transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </aside>

    <!-- ========================================================================= -->
    <!-- 2. MAIN CONTENT AREA -->
    <!-- ========================================================================= -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto admin-grid-bg">

        <!-- Top Header Bar -->
        <header
            class="h-16 px-6 lg:px-10 border-b border-neutral-900 bg-black/60 backdrop-blur-md sticky top-0 z-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="text-neutral-500 text-xs font-mono-code">Quản trị</span>
                <span class="text-neutral-700 text-xs font-mono-code">/</span>
                <h1 class="text-sm font-bold font-display uppercase tracking-wider text-white">
                    Quản Lý Danh Sách Áo (Shirts)
                </h1>
            </div>

            <!-- Top Actions -->
            <div class="flex items-center gap-3">
                <button type="button" onclick="openCreateModal()"
                    class="px-4 py-2 rounded-lg bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider transition-colors inline-flex items-center gap-2 shadow-sm cursor-pointer">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Thêm áo mới</span>
                </button>
            </div>
        </header>

        <!-- Page Body Content -->
        <div class="p-6 lg:p-10 space-y-6 flex-1">

            <!-- Flash Alert (If any) -->
            @if (session('error'))
                <div
                    class="p-4 rounded-xl bg-white text-black text-xs font-medium flex items-center justify-between shadow-xl">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-black"></span>
                        <span class="font-semibold text-red-500">{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()"
                        class="text-neutral-500 hover:text-black text-base leading-none">&times;</button>
                </div>
            @endif
            @if (session('success'))
                <div
                    class="p-4 rounded-xl bg-white text-black text-xs font-medium flex items-center justify-between shadow-xl">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-black"></span>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()"
                        class="text-neutral-500 hover:text-black text-base leading-none">&times;</button>
                </div>
            @endif

            @if ($errors->any())
                <div
                    class="p-4 rounded-xl bg-neutral-900 border border-neutral-700 text-white text-xs font-medium space-y-1 shadow-xl">
                    <div class="flex items-center gap-2 text-white font-bold">
                        <span class="w-2 h-2 rounded-full bg-white"></span>
                        <span>Đã có lỗi xảy ra khi lưu dữ liệu:</span>
                    </div>
                    <ul class="list-disc list-inside text-neutral-300 pl-4 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Metric Highlights (Quick Stats) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="p-5 rounded-2xl bg-black border border-neutral-900">
                    <span class="text-[10px] font-mono-code uppercase tracking-wider text-neutral-400">Tổng Mẫu
                        Áo</span>
                    <p class="text-2xl font-extrabold font-display text-white mt-1">
                        {{ isset($shirts) ? (is_countable($shirts) ? count($shirts) : $shirts->total()) : '8' }}
                    </p>
                    <span class="text-[11px] text-neutral-500 font-mono-code mt-1 block">Trong cơ sở dữ liệu</span>
                </div>
                <div class="p-5 rounded-2xl bg-black border border-neutral-900">
                    <span class="text-[10px] font-mono-code uppercase tracking-wider text-neutral-400">Đánh Giá
                        TB</span>
                    <p class="text-2xl font-extrabold font-display text-white mt-1">
                        {{ number_format($rateAvg, 1, ',', '.') }} ★</p>
                    <span class="text-[11px] text-neutral-500 font-mono-code mt-1 block">Thang điểm 5.0</span>
                </div>
                <div class="p-5 rounded-2xl bg-black border border-neutral-900">
                    <span class="text-[10px] font-mono-code uppercase tracking-wider text-neutral-400">Giá Trung
                        Bình</span>
                    <p class="text-2xl font-extrabold font-display text-white mt-1">
                        {{ number_format($priceAvg, 0, ',') }}₫</p>
                    <span class="text-[11px] text-neutral-500 font-mono-code mt-1 block">Mức phổ biến</span>
                </div>
                <div class="p-5 rounded-2xl bg-black border border-neutral-900">
                    <span class="text-[10px] font-mono-code uppercase tracking-wider text-neutral-400">Chất Liệu
                        Chính</span>
                    <p class="text-2xl font-extrabold font-display text-white mt-1">280 GSM</p>
                    <span class="text-[11px] text-neutral-500 font-mono-code mt-1 block">Cotton Compact</span>
                </div>
            </div>

            <!-- ========================================================================= -->
            <!-- 3. COMPREHENSIVE FILTER SYSTEM (BỘ LỌC ĐEN TRẮNG) -->
            <!-- ========================================================================= -->
            <div class="rounded-2xl bg-black border border-neutral-900 p-5 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-neutral-900">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <h2 class="text-xs font-bold uppercase tracking-wider font-display text-white">
                            Bộ Lọc Sản Phẩm Áo
                        </h2>
                    </div>

                    <!-- Reset Filter Button -->
                    <button type="button" id="btn-reset-filters"
                        class="text-xs font-mono-code text-neutral-400 hover:text-white transition-colors inline-flex items-center gap-1.5 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span>Đặt lại bộ lọc</span>
                    </button>
                </div>

                <!-- Filter Controls Grid -->
                <form id="filter-form" method="GET" action="{{ url()->current() }}" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4">

                        <!-- Filter 1: Search by Name / Keyword (4 cols) -->
                        <div class="lg:col-span-4">
                            <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                                Tìm kiếm theo tên / từ khóa
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                                <input type="text" name="search" id="filter-search"
                                    value="{{ request('search') }}"
                                    placeholder="Nhập tên áo (Vd: Basic Tee, Polo, Linen...)"
                                    class="w-full pl-9 pr-4 py-2.5 bg-neutral-950 border border-neutral-800 rounded-xl text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-white transition-colors font-sans">
                            </div>
                        </div>

                        <!-- Filter 2: Price Range Filter (3 cols) -->
                        <div class="lg:col-span-3">
                            <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                                Khoảng Giá (VNĐ)
                            </label>
                            <select name="price_range" id="filter-price-range"
                                class="w-full px-3.5 py-2.5 bg-neutral-950 border border-neutral-800 rounded-xl text-xs text-white focus:outline-none focus:border-white transition-colors cursor-pointer font-sans">
                                <option value="" {{ request('price_range') == '' ? 'selected' : '' }}>Tất cả mức
                                    giá</option>
                                <option value="under_200"
                                    {{ request('price_range') == 'under_200' ? 'selected' : '' }}>Dưới 200.000₫
                                </option>
                                <option value="200_400" {{ request('price_range') == '200_400' ? 'selected' : '' }}>Từ
                                    200.000₫ - 400.000₫</option>
                                <option value="over_400" {{ request('price_range') == 'over_400' ? 'selected' : '' }}>
                                    Trên 400.000₫</option>
                            </select>
                        </div>

                        <!-- Filter 3: Rating Star Filter (2 cols) -->
                        <div class="lg:col-span-2">
                            <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                                Điểm Đánh Giá
                            </label>
                            <select name="star" id="filter-star"
                                class="w-full px-3.5 py-2.5 bg-neutral-950 border border-neutral-800 rounded-xl text-xs text-white focus:outline-none focus:border-white transition-colors cursor-pointer font-sans">
                                <option value="" {{ request('star') == '' ? 'selected' : '' }}>Tất cả sao
                                </option>
                                <option value="5" {{ request('star') == '5' ? 'selected' : '' }}>5.0 ★ hoàn hảo
                                </option>
                                <option value="4_up" {{ request('star') == '4_up' ? 'selected' : '' }}>Từ 4.0 ★ trở
                                    lên</option>
                                <option value="under_4" {{ request('star') == 'under_4' ? 'selected' : '' }}>Dưới 4.0
                                    ★</option>
                            </select>
                        </div>

                        <!-- Filter 4: Sorting Order (3 cols) -->
                        <div class="lg:col-span-3">
                            <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                                Sắp xếp theo
                            </label>
                            <div class="flex items-center gap-2">
                                <select name="sort" id="filter-sort"
                                    class="w-full px-3.5 py-2.5 bg-neutral-950 border border-neutral-800 rounded-xl text-xs text-white focus:outline-none focus:border-white transition-colors cursor-pointer font-sans">
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới
                                        nhất</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Cũ nhất
                                    </option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                        Giá: Thấp đến Cao</option>
                                    <option value="price_desc"
                                        {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao xuống Thấp
                                    </option>
                                    <option value="star_desc" {{ request('sort') == 'star_desc' ? 'selected' : '' }}>
                                        Đánh giá cao nhất</option>
                                </select>
                                <button type="submit"
                                    class="px-4 py-2.5 rounded-xl bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider shrink-0 transition-colors cursor-pointer">
                                    Lọc
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Active Filter Chips Tag Bar -->
                    <div id="filter-tags-container"
                        class="flex flex-wrap items-center gap-2 pt-2 text-[11px] font-mono-code">
                        <span class="text-neutral-500">Đang lọc:</span>
                        <span id="tag-indicator"
                            class="px-2.5 py-1 rounded bg-neutral-900 border border-neutral-800 text-neutral-300">
                            Hiển thị toàn bộ mẫu áo
                        </span>
                    </div>
                </form>
            </div>

            <!-- ========================================================================= -->
            <!-- 4. SHIRTS DATA TABLE (DANH SÁCH ÁO) -->
            <!-- ========================================================================= -->
            <div class="rounded-2xl bg-black border border-neutral-900 overflow-hidden shadow-2xl">

                <!-- Table Header Actions Bar -->
                <div class="p-5 border-b border-neutral-900 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-white"></span>
                        <h3 class="text-xs font-bold uppercase tracking-wider font-display text-white">
                            Danh Sách Mẫu Áo
                        </h3>
                        <span id="item-count-badge"
                            class="px-2 py-0.5 rounded text-[11px] font-mono-code bg-neutral-900 text-neutral-400 border border-neutral-800">
                            8 mẫu
                        </span>
                    </div>

                    <!-- Batch Actions -->
                    <div class="flex items-center gap-2 text-xs font-mono-code">
                        <button type="button" onclick="alert('Đã tải danh sách mẫu áo dạng CSV!')"
                            class="px-3 py-1.5 rounded-lg border border-neutral-800 hover:border-neutral-700 bg-neutral-950 text-neutral-400 hover:text-white transition-colors cursor-pointer inline-flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <span>Xuất CSV</span>
                        </button>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-neutral-300" id="shirts-table">
                        <thead
                            class="bg-neutral-950/80 text-[11px] uppercase tracking-wider text-neutral-400 font-mono-code border-b border-neutral-900">
                            <tr>
                                <th class="px-6 py-4 w-12 text-center">
                                    <input type="checkbox" id="check-all"
                                        class="rounded bg-neutral-900 border-neutral-700 text-white focus:ring-0 focus:ring-offset-0 cursor-pointer">
                                </th>
                                <th class="px-6 py-4 w-20">Mã Áo</th>
                                <th class="px-6 py-4">Tên Sản Phẩm</th>
                                <th class="px-6 py-4">Mô Tả Sản Phẩm</th>
                                <th class="px-6 py-4">Giá Bán</th>
                                <th class="px-6 py-4">Đánh Giá</th>
                                <th class="px-6 py-4">Ngày Cập Nhật</th>
                                <th class="px-6 py-4 text-right">Thao Tác</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-neutral-900" id="shirts-table-body">
                            @if (isset($shirts) && count($shirts) > 0)
                                @foreach ($shirts as $shirt)
                                    @php
                                        $shirtImgUrl = $shirt->image ?? null;
                                    @endphp
                                    <tr class="hover:bg-neutral-900/40 transition-colors shirt-row"
                                        data-id="{{ $shirt->id }}" data-name="{{ strtolower($shirt->name) }}"
                                        data-price="{{ $shirt->price }}" data-star="{{ $shirt->star }}"
                                        data-image="{{ $shirtImgUrl }}">
                                        <!-- Checkbox -->
                                        <td class="px-6 py-4 text-center">
                                            <input type="checkbox"
                                                class="row-checkbox rounded bg-neutral-900 border-neutral-700 text-white focus:ring-0 focus:ring-offset-0 cursor-pointer">
                                        </td>

                                        <!-- ID -->
                                        <td class="px-6 py-4 font-mono-code text-neutral-400">
                                            #{{ $shirt->id }}
                                        </td>

                                        <!-- tên hoặc ảnh sản phẩm -->
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                @if (isset($shirtImgUrl))
                                                    <img src="{{ asset('storage' . '/' . $shirtImgUrl) }}"
                                                        alt="{{ $shirt->name }}"
                                                        class="w-10 h-10 rounded-lg object-cover border border-neutral-800 shrink-0 bg-neutral-900">
                                                @else
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-neutral-900 border border-neutral-800 flex items-center justify-center shrink-0 text-white font-mono-code font-bold text-xs uppercase">
                                                        {{ substr($shirt->name, 0, 2) }}
                                                    </div>
                                                @endif
                                                <div>
                                                    <h4
                                                        class="font-bold text-white uppercase tracking-wide shirt-item-name">
                                                        {{ $shirt->name }}
                                                    </h4>
                                                    <span class="text-[10px] text-neutral-400 font-mono-code">
                                                        SKU: MC-{{ $shirt->id }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Description -->
                                        <td
                                            class="px-6 py-4 max-w-xs text-neutral-400 text-[11px] leading-relaxed truncate">
                                            {{ $shirt->description ?? 'Không có mô tả' }}
                                        </td>

                                        <!-- Price -->
                                        <td class="px-6 py-4 font-mono-code font-bold text-white text-xs">
                                            {{ number_format($shirt->price, 0, ',', '.') }}₫
                                        </td>

                                        <!-- Star Rating -->
                                        <td class="px-6 py-4">
                                            <div
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-neutral-900 border border-neutral-800 font-mono-code text-white text-xs">
                                                <span class="text-white">★</span>
                                                <span>{{ number_format($shirt->star, 1) }}</span>
                                            </div>
                                        </td>

                                        <!-- Created Date -->
                                        <td class="px-6 py-4 font-mono-code text-neutral-400 text-[11px]">
                                            {{ !empty($shirt->created_at) ? date('d/m/Y', strtotime($shirt->created_at)) : 'Gần đây' }}
                                        </td>

                                        <!-- Actions Buttons -->
                                        <td class="px-6 py-4 text-right">
                                            <div class="inline-flex items-center gap-1">
                                                <!-- Xem chi tiết -->
                                                <a href="{{ route('admin.shirt.view', $shirt->id) }}"
                                                    class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 transition-colors cursor-pointer">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>

                                                <!-- Chỉnh sửa -->
                                                <a href="{{ route('admin.shirt.edit', $shirt->id) }}"
                                                    class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 transition-colors cursor-pointer">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Button -->
                                                <button type="button"
                                                    onclick="openDeleteModal({{ $shirt->id }}, '{{ addslashes($shirt->name) }}')"
                                                    title="Xóa mẫu áo"
                                                    class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 transition-colors cursor-pointer">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center text-neutral-500 font-mono-code">
                                        Không tìm thấy mẫu áo nào phù hợp với điều kiện lọc.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Phân trang -->
                <div
                    class="p-5 border-t border-neutral-900 flex flex-col sm:flex-row items-center justify-between gap-4 bg-neutral-950/60">
                    <p class="text-xs text-neutral-400 font-mono-code">
                        Hiển thị <span class="text-white font-bold">{{ $shirts->firstItem() }} -
                            {{ $shirts->lastItem() }}</span> trong tổng số <span
                            class="text-white font-bold">{{ $shirts->total() }}</span> mẫu áo
                    </p>

                    <!-- Phân trang -->
                    <div>
                        {{ $shirts->withQueryString()->links('components.pagination') }}
                    </div>
                </div>

            </div>

        </div>

        <!-- Footer -->
        <footer
            class="h-14 px-6 lg:px-10 border-t border-neutral-900 bg-black text-[11px] text-neutral-500 font-mono-code flex items-center justify-between mt-auto">
            <span>© {{ date('Y') }} MY CLOTHES Studio. Quản Lý Danh Mục Áo.</span>
            <span>Monochrome Architecture • Noir Edition</span>
        </footer>

    </main>

    <!-- ========================================================================= -->
    <!-- 5. MODAL: THÊM MỚI ÁO (CREATE SHIRT MODAL) -->
    <!-- ========================================================================= -->
    <div id="modal-create"
        class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div
            class="w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-2xl bg-neutral-950 border border-neutral-800 p-6 shadow-2xl relative">
            <div class="flex items-center justify-between pb-4 border-b border-neutral-900">
                <div class="flex items-center gap-2.5">
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <h3 class="text-sm font-bold uppercase tracking-wider font-display text-white">
                        Thêm Mẫu Áo Mới
                    </h3>
                </div>
                <button type="button" onclick="closeCreateModal()"
                    class="text-neutral-400 hover:text-white text-xl leading-none cursor-pointer">
                    &times;
                </button>
            </div>

            <!-- Form Thêm Áo -->
            <form id="form-create-shirt" method="POST" action="{{ route('admin.shirt.store') }}"
                enctype="multipart/form-data" class="mt-5 space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                        Tên Mẫu Áo <span class="text-white">*</span>
                    </label>
                    <input type="text" name="name" required placeholder="Vd: Signature Heavyweight Tee"
                        class="w-full px-3.5 py-2.5 bg-black border border-neutral-800 rounded-xl text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-white transition-colors">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                            Giá Bán (VNĐ) <span class="text-white">*</span>
                        </label>
                        <input type="number" name="price" step="1000" min="0" required
                            placeholder="Vd: 350000"
                            class="w-full px-3.5 py-2.5 bg-black border border-neutral-800 rounded-xl text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-white transition-colors font-mono-code">
                    </div>
                    <div>
                        <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                            Điểm Đánh Giá (Star)
                        </label>
                        <input type="number" name="star" step="0.1" min="1.0" max="5.0"
                            value="5.0"
                            class="w-full px-3.5 py-2.5 bg-black border border-neutral-800 rounded-xl text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-white transition-colors font-mono-code">
                    </div>
                </div>

                <!-- Upload File Ảnh Mẫu Áo -->
                <div>
                    <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                        Hình Ảnh Mẫu Áo
                    </label>
                    <div id="create-dropzone"
                        class="border border-dashed border-neutral-800 hover:border-neutral-600 rounded-xl p-4 text-center cursor-pointer transition-all bg-neutral-900/30 hover:bg-neutral-900/60 group">
                        <input type="file" name="image" id="create-shirt-image" accept="image/*"
                            class="hidden">

                        <!-- Placeholder trạng thái chưa chọn ảnh -->
                        <div id="create-placeholder" class="py-2 space-y-2">
                            <div
                                class="w-10 h-10 mx-auto rounded-full bg-neutral-900 border border-neutral-800 flex items-center justify-center text-neutral-400 group-hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-neutral-300 font-medium group-hover:text-white">
                                    <span class="underline">Bấm để tải ảnh lên</span> hoặc kéo thả vào đây
                                </p>
                                <p class="text-[10px] text-neutral-500 font-mono-code mt-0.5">PNG, JPG, WEBP, GIF (Tối
                                    đa 5MB)</p>
                            </div>
                        </div>

                        <!-- Preview khi đã chọn file -->
                        <div id="create-preview-wrapper" class="hidden flex items-center gap-3 text-left">
                            <img id="create-preview-img" src="" alt="Preview"
                                class="w-16 h-16 rounded-lg object-cover border border-neutral-700 bg-black shrink-0">
                            <div class="flex-1 min-w-0">
                                <span
                                    class="px-2 py-0.5 text-[9px] font-mono-code uppercase rounded bg-white text-black font-bold">Ảnh
                                    đã chọn</span>
                                <p id="create-file-name" class="text-xs font-semibold text-white truncate mt-1"></p>
                                <p id="create-file-size" class="text-[10px] font-mono-code text-neutral-400 mt-0.5">
                                </p>
                                <div class="flex items-center gap-2 mt-2">
                                    <button type="button"
                                        onclick="document.getElementById('create-shirt-image').click(); event.stopPropagation();"
                                        class="text-[10px] text-neutral-300 hover:text-white underline cursor-pointer">
                                        Đổi ảnh khác
                                    </button>
                                    <span class="text-neutral-600">•</span>
                                    <button type="button" onclick="removeCreateImage(event)"
                                        class="text-[10px] text-red-400 hover:text-red-300 underline cursor-pointer">
                                        Hủy ảnh
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                        Mô Tả Sản Phẩm
                    </label>
                    <textarea name="description" rows="3" placeholder="Nhập chất liệu sợi, phom dáng, định lượng GSM..."
                        class="w-full px-3.5 py-2.5 bg-black border border-neutral-800 rounded-xl text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-white transition-colors resize-none"></textarea>
                </div>

                <div class="pt-4 border-t border-neutral-900 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeCreateModal()"
                        class="px-4 py-2 rounded-xl border border-neutral-800 text-neutral-400 hover:text-white hover:border-neutral-700 text-xs font-mono-code transition-colors cursor-pointer">
                        Hủy Bỏ
                    </button>
                    <button type="submit"
                        class="px-5 py-2 rounded-xl bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider transition-colors cursor-pointer shadow-sm">
                        Lưu Mẫu Áo
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 6. MODAL: CHỈNH SỬA ÁO (EDIT SHIRT MODAL) -->
    <!-- ========================================================================= -->
    <div id="modal-edit"
        class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div
            class="w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-2xl bg-neutral-950 border border-neutral-800 p-6 shadow-2xl relative">
            <div class="flex items-center justify-between pb-4 border-b border-neutral-900">
                <div class="flex items-center gap-2.5">
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <h3 class="text-sm font-bold uppercase tracking-wider font-display text-white">
                        Chỉnh Sửa Mẫu Áo
                    </h3>
                </div>
                <button type="button" onclick="closeEditModal()"
                    class="text-neutral-400 hover:text-white text-xl leading-none cursor-pointer">
                    &times;
                </button>
            </div>

            <!-- Form Sửa Áo -->
            <form id="form-edit-shirt" method="POST" action="#" enctype="multipart/form-data"
                class="mt-5 space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="shirt_id" id="edit-shirt-id">

                <div>
                    <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                        Tên Mẫu Áo
                    </label>
                    <input type="text" name="name" id="edit-shirt-name" required
                        class="w-full px-3.5 py-2.5 bg-black border border-neutral-800 rounded-xl text-xs text-white focus:outline-none focus:border-white transition-colors">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                            Giá Bán (VNĐ)
                        </label>
                        <input type="number" name="price" id="edit-shirt-price" step="1000" min="0"
                            required
                            class="w-full px-3.5 py-2.5 bg-black border border-neutral-800 rounded-xl text-xs text-white focus:outline-none focus:border-white transition-colors font-mono-code">
                    </div>
                    <div>
                        <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                            Đánh Giá (Star)
                        </label>
                        <input type="number" name="star" id="edit-shirt-star" step="0.1" min="1.0"
                            max="5.0"
                            class="w-full px-3.5 py-2.5 bg-black border border-neutral-800 rounded-xl text-xs text-white focus:outline-none focus:border-white transition-colors font-mono-code">
                    </div>
                </div>

                <!-- Upload & Thay Đổi File Ảnh Mẫu Áo -->
                <div>
                    <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                        Hình Ảnh Mẫu Áo
                    </label>
                    <div id="edit-dropzone"
                        class="border border-dashed border-neutral-800 hover:border-neutral-600 rounded-xl p-4 text-center cursor-pointer transition-all bg-neutral-900/30 hover:bg-neutral-900/60 group">
                        <input type="file" name="image" id="edit-shirt-image" accept="image/*" class="hidden">

                        <!-- Khi sản phẩm đã có ảnh hiện tại và chưa chọn ảnh mới -->
                        <div id="edit-current-image-wrapper" class="hidden flex items-center gap-3 text-left">
                            <img id="edit-current-img" src="" alt="Ảnh hiện tại"
                                class="w-16 h-16 rounded-lg object-cover border border-neutral-700 bg-black shrink-0">
                            <div class="flex-1 min-w-0">
                                <span
                                    class="px-2 py-0.5 text-[9px] font-mono-code uppercase rounded bg-neutral-800 text-neutral-300 border border-neutral-700">Ảnh
                                    hiện tại</span>
                                <p class="text-xs text-neutral-300 mt-1">Bấm vào đây để tải ảnh mới thay thế</p>
                                <p class="text-[10px] text-neutral-500 font-mono-code mt-0.5">PNG, JPG, WEBP, GIF (Tối
                                    đa 5MB)</p>
                            </div>
                        </div>

                        <!-- Khi sản phẩm chưa có ảnh và chưa chọn ảnh mới -->
                        <div id="edit-placeholder" class="py-2 space-y-2">
                            <div
                                class="w-10 h-10 mx-auto rounded-full bg-neutral-900 border border-neutral-800 flex items-center justify-center text-neutral-400 group-hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-neutral-300 font-medium group-hover:text-white">
                                    <span class="underline">Bấm để tải ảnh lên</span> hoặc kéo thả vào đây
                                </p>
                                <p class="text-[10px] text-neutral-500 font-mono-code mt-0.5">PNG, JPG, WEBP, GIF (Tối
                                    đa 5MB)</p>
                            </div>
                        </div>

                        <!-- Preview khi người dùng vừa chọn ảnh mới -->
                        <div id="edit-new-preview-wrapper" class="hidden flex items-center gap-3 text-left">
                            <img id="edit-new-preview-img" src="" alt="Ảnh mới"
                                class="w-16 h-16 rounded-lg object-cover border border-white bg-black shrink-0">
                            <div class="flex-1 min-w-0">
                                <span
                                    class="px-2 py-0.5 text-[9px] font-mono-code uppercase rounded bg-white text-black font-bold">Ảnh
                                    mới đã chọn</span>
                                <p id="edit-file-name" class="text-xs font-semibold text-white truncate mt-1"></p>
                                <p id="edit-file-size" class="text-[10px] font-mono-code text-neutral-400 mt-0.5"></p>
                                <div class="flex items-center gap-2 mt-2">
                                    <button type="button"
                                        onclick="document.getElementById('edit-shirt-image').click(); event.stopPropagation();"
                                        class="text-[10px] text-neutral-300 hover:text-white underline cursor-pointer">
                                        Chọn ảnh khác
                                    </button>
                                    <span class="text-neutral-600">•</span>
                                    <button type="button" onclick="removeEditNewImage(event)"
                                        class="text-[10px] text-red-400 hover:text-red-300 underline cursor-pointer">
                                        Giữ ảnh cũ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-mono-code uppercase text-neutral-400 mb-1.5">
                        Mô Tả Sản Phẩm
                    </label>
                    <textarea name="description" id="edit-shirt-description" rows="3"
                        class="w-full px-3.5 py-2.5 bg-black border border-neutral-800 rounded-xl text-xs text-white focus:outline-none focus:border-white transition-colors resize-none"></textarea>
                </div>

                <div class="pt-4 border-t border-neutral-900 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 rounded-xl border border-neutral-800 text-neutral-400 hover:text-white hover:border-neutral-700 text-xs font-mono-code transition-colors cursor-pointer">
                        Hủy Bỏ
                    </button>
                    <button type="submit"
                        class="px-5 py-2 rounded-xl bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider transition-colors cursor-pointer shadow-sm">
                        Cập Nhật
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 7. MODAL: XEM CHI TIẾT ÁO (VIEW MODAL) -->
    <!-- ========================================================================= -->
    <div id="modal-view"
        class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div
            class="w-full max-w-md max-h-[90vh] overflow-y-auto rounded-2xl bg-neutral-950 border border-neutral-800 p-6 shadow-2xl relative">
            <div class="flex items-center justify-between pb-4 border-b border-neutral-900">
                <span class="text-[10px] font-mono-code uppercase text-neutral-500" id="view-shirt-sku">SKU:
                    MC-0000</span>
                <button type="button" onclick="closeViewModal()"
                    class="text-neutral-400 hover:text-white text-xl leading-none cursor-pointer">
                    &times;
                </button>
            </div>

            <div class="mt-5 space-y-4">
                <!-- Vùng hiển thị ảnh sản phẩm -->
                <div id="view-shirt-image-container"
                    class="w-full h-48 rounded-xl bg-black border border-neutral-900 flex items-center justify-center text-neutral-600 overflow-hidden relative">
                    <img id="view-shirt-img" src="" alt="Shirt Preview"
                        class="w-full h-full object-cover hidden">
                    <div id="view-shirt-placeholder" class="flex flex-col items-center gap-2 text-neutral-600">
                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="text-[10px] font-mono-code uppercase text-neutral-600">Chưa có ảnh</span>
                    </div>
                </div>

                <div>
                    <h4 class="text-base font-bold uppercase text-white font-display" id="view-shirt-name">Tên Áo</h4>
                    <p class="text-lg font-extrabold font-mono-code text-white mt-1" id="view-shirt-price">0₫</p>
                </div>

                <div class="p-3.5 rounded-xl bg-black border border-neutral-900 text-xs text-neutral-300 leading-relaxed"
                    id="view-shirt-description">
                    Mô tả mẫu áo...
                </div>

                <div
                    class="flex items-center justify-between text-xs font-mono-code text-neutral-400 pt-2 border-t border-neutral-900">
                    <span>Đánh giá từ khách hàng:</span>
                    <span class="text-white font-bold" id="view-shirt-star">5.0 ★</span>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-neutral-900 flex justify-end">
                <button type="button" onclick="closeViewModal()"
                    class="px-5 py-2 rounded-xl bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider transition-colors cursor-pointer">
                    Đóng
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 8. MODAL: XÁC NHẬN XÓA ÁO (DELETE MODAL) -->
    <!-- ========================================================================= -->
    <div id="modal-delete"
        class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="w-full max-w-sm rounded-2xl bg-neutral-950 border border-neutral-800 p-6 shadow-2xl relative">
            <div class="text-center space-y-3">
                <div
                    class="w-12 h-12 rounded-full bg-neutral-900 border border-neutral-800 mx-auto flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-wider font-display text-white">
                    Xác Nhận Xóa Mẫu Áo
                </h3>
                <p class="text-xs text-neutral-400 leading-relaxed">
                    Bạn có chắc chắn muốn xóa mẫu áo <span class="text-white font-bold"
                        id="delete-shirt-name"></span>? Thao tác này sẽ xóa bản ghi khỏi hệ thống.
                </p>
            </div>

            @if (isset($shirts) && count($shirts) > 0)
                <!-- Form Xóa Áo -->
                <form id="form-delete-shirt" method="POST" action="{{ route('admin.shirt.delete', $shirt->id) }}"
                    class="mt-6 flex items-center justify-center gap-3">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="closeDeleteModal()"
                        class="px-4 py-2 rounded-xl border border-neutral-800 text-neutral-400 hover:text-white text-xs font-mono-code transition-colors cursor-pointer">
                        Hủy Bỏ
                    </button>
                    <button type="submit"
                        class="px-5 py-2 rounded-xl bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider transition-colors cursor-pointer">
                        Xác Nhận Xóa
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 9. JAVASCRIPT: FILTER LOGIC & INTERACTION UI -->
    <!-- ========================================================================= -->
    <script>
        // Check All Checkboxes
        const checkAll = document.getElementById('check-all');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        if (checkAll) {
            checkAll.addEventListener('change', function() {
                rowCheckboxes.forEach(cb => cb.checked = checkAll.checked);
            });
        }

        // Helper format file size
        function formatFileSize(bytes) {
            if (!bytes || bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
        }

        // --- Create Modal Image Handlers ---
        const createFileInput = document.getElementById('create-shirt-image');
        const createDropzone = document.getElementById('create-dropzone');
        const createPlaceholder = document.getElementById('create-placeholder');
        const createPreviewWrapper = document.getElementById('create-preview-wrapper');
        const createPreviewImg = document.getElementById('create-preview-img');
        const createFileName = document.getElementById('create-file-name');
        const createFileSize = document.getElementById('create-file-size');

        function handleCreateFile(file) {
            if (!file) return;
            if (!file.type.startsWith('image/')) {
                alert('Vui lòng chỉ chọn tệp hình ảnh (PNG, JPG, WEBP, GIF)!');
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                alert('Kích thước ảnh không được vượt quá 5MB!');
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                createPreviewImg.src = e.target.result;
                createFileName.innerText = file.name;
                createFileSize.innerText = formatFileSize(file.size);
                createPlaceholder.classList.add('hidden');
                createPreviewWrapper.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        if (createFileInput) {
            createFileInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    handleCreateFile(this.files[0]);
                }
            });
        }

        if (createDropzone) {
            createDropzone.addEventListener('click', function(e) {
                if (e.target.closest('button')) return;
                createFileInput.click();
            });

            createDropzone.addEventListener('dragover', function(e) {
                e.preventDefault();
                createDropzone.classList.add('border-white', 'bg-neutral-900');
            });

            createDropzone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                createDropzone.classList.remove('border-white', 'bg-neutral-900');
            });

            createDropzone.addEventListener('drop', function(e) {
                e.preventDefault();
                createDropzone.classList.remove('border-white', 'bg-neutral-900');
                if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                    createFileInput.files = e.dataTransfer.files;
                    handleCreateFile(e.dataTransfer.files[0]);
                }
            });
        }

        function removeCreateImage(e) {
            if (e) e.stopPropagation();
            if (createFileInput) createFileInput.value = '';
            if (createPreviewImg) createPreviewImg.src = '';
            if (createFileName) createFileName.innerText = '';
            if (createFileSize) createFileSize.innerText = '';
            if (createPreviewWrapper) createPreviewWrapper.classList.add('hidden');
            if (createPlaceholder) createPlaceholder.classList.remove('hidden');
        }

        // --- Edit Modal Image Handlers ---
        const editFileInput = document.getElementById('edit-shirt-image');
        const editDropzone = document.getElementById('edit-dropzone');
        const editPlaceholder = document.getElementById('edit-placeholder');
        const editCurrentWrapper = document.getElementById('edit-current-image-wrapper');
        const editCurrentImg = document.getElementById('edit-current-img');
        const editNewWrapper = document.getElementById('edit-new-preview-wrapper');
        const editNewImg = document.getElementById('edit-new-preview-img');
        const editFileName = document.getElementById('edit-file-name');
        const editFileSize = document.getElementById('edit-file-size');
        let currentEditImageUrl = '';

        function handleEditFile(file) {
            if (!file) return;
            if (!file.type.startsWith('image/')) {
                alert('Vui lòng chỉ chọn tệp hình ảnh (PNG, JPG, WEBP, GIF)!');
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                alert('Kích thước ảnh không được vượt quá 5MB!');
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                editNewImg.src = e.target.result;
                editFileName.innerText = file.name;
                editFileSize.innerText = formatFileSize(file.size);

                editCurrentWrapper.classList.add('hidden');
                editPlaceholder.classList.add('hidden');
                editNewWrapper.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        if (editFileInput) {
            editFileInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    handleEditFile(this.files[0]);
                }
            });
        }

        if (editDropzone) {
            editDropzone.addEventListener('click', function(e) {
                if (e.target.closest('button')) return;
                editFileInput.click();
            });

            editDropzone.addEventListener('dragover', function(e) {
                e.preventDefault();
                editDropzone.classList.add('border-white', 'bg-neutral-900');
            });

            editDropzone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                editDropzone.classList.remove('border-white', 'bg-neutral-900');
            });

            editDropzone.addEventListener('drop', function(e) {
                e.preventDefault();
                editDropzone.classList.remove('border-white', 'bg-neutral-900');
                if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                    editFileInput.files = e.dataTransfer.files;
                    handleEditFile(e.dataTransfer.files[0]);
                }
            });
        }

        function removeEditNewImage(e) {
            if (e) e.stopPropagation();
            if (editFileInput) editFileInput.value = '';
            if (editNewImg) editNewImg.src = '';
            if (editFileName) editFileName.innerText = '';
            if (editFileSize) editFileSize.innerText = '';
            if (editNewWrapper) editNewWrapper.classList.add('hidden');

            if (currentEditImageUrl) {
                editCurrentWrapper.classList.remove('hidden');
                editPlaceholder.classList.add('hidden');
            } else {
                editCurrentWrapper.classList.add('hidden');
                editPlaceholder.classList.remove('hidden');
            }
        }

        // Modal Controls
        function openCreateModal() {
            removeCreateImage();
            document.getElementById('modal-create').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('modal-create').classList.add('hidden');
        }

        function openEditModal(id, name, price, star, description, imageUrl = '') {
            document.getElementById('edit-shirt-id').value = id;
            document.getElementById('edit-shirt-name').value = name;
            document.getElementById('edit-shirt-price').value = price;
            document.getElementById('edit-shirt-star').value = star;
            document.getElementById('edit-shirt-description').value = description || '';

            // Update form action route for update
            document.getElementById('form-edit-shirt').action = '/admin/shirts/' + id;

            // Reset selected file
            if (editFileInput) editFileInput.value = '';
            if (editNewImg) editNewImg.src = '';
            if (editNewWrapper) editNewWrapper.classList.add('hidden');

            currentEditImageUrl = imageUrl || '';
            if (currentEditImageUrl) {
                editCurrentImg.src = currentEditImageUrl;
                editCurrentWrapper.classList.remove('hidden');
                editPlaceholder.classList.add('hidden');
            } else {
                editCurrentImg.src = '';
                editCurrentWrapper.classList.add('hidden');
                editPlaceholder.classList.remove('hidden');
            }

            document.getElementById('modal-edit').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('modal-edit').classList.add('hidden');
        }

        function openViewModal(id, name, price, star, description, imageUrl = '') {
            document.getElementById('view-shirt-sku').innerText = 'SKU: MC-' + String(id).padStart(4, '0');
            document.getElementById('view-shirt-name').innerText = name;
            document.getElementById('view-shirt-price').innerText = price;
            document.getElementById('view-shirt-star').innerText = star + ' ★';
            document.getElementById('view-shirt-description').innerText = description || 'Không có mô tả sản phẩm.';

            const viewImg = document.getElementById('view-shirt-img');
            const viewPlaceholder = document.getElementById('view-shirt-placeholder');
            if (imageUrl) {
                viewImg.src = imageUrl;
                viewImg.classList.remove('hidden');
                viewPlaceholder.classList.add('hidden');
            } else {
                viewImg.src = '';
                viewImg.classList.add('hidden');
                viewPlaceholder.classList.remove('hidden');
            }

            document.getElementById('modal-view').classList.remove('hidden');
        }

        function closeViewModal() {
            document.getElementById('modal-view').classList.add('hidden');
        }

        function openDeleteModal(id, name) {
            document.getElementById('delete-shirt-name').innerText = '"' + name + '"';
            document.getElementById('modal-delete').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('modal-delete').classList.add('hidden');
        }

        // Client-side instant filter preview helper (cho phép trải nghiệm lọc tức thì ngay trên giao diện)
        const filterSearch = document.getElementById('filter-search');
        const filterPriceRange = document.getElementById('filter-price-range');
        const filterStar = document.getElementById('filter-star');
        const filterSort = document.getElementById('filter-sort');
        const btnResetFilters = document.getElementById('btn-reset-filters');
        const shirtRows = document.querySelectorAll('.shirt-row');
        const tagIndicator = document.getElementById('tag-indicator');
        const itemCountBadge = document.getElementById('item-count-badge');

        function applyClientFilter() {
            const query = filterSearch.value.trim().toLowerCase();
            const priceVal = filterPriceRange.value;
            const starVal = filterStar.value;
            let visibleCount = 0;

            shirtRows.forEach(row => {
                const name = row.getAttribute('data-name');
                const price = parseFloat(row.getAttribute('data-price'));
                const star = parseFloat(row.getAttribute('data-star'));

                let matchQuery = !query || name.includes(query);
                let matchPrice = true;
                if (priceVal === 'under_200') matchPrice = price < 200000;
                else if (priceVal === '200_400') matchPrice = price >= 200000 && price <= 400000;
                else if (priceVal === 'over_400') matchPrice = price > 400000;

                let matchStar = true;
                if (starVal === '5') matchStar = star >= 5.0;
                else if (starVal === '4_up') matchStar = star >= 4.0;
                else if (starVal === 'under_4') matchStar = star < 4.0;

                if (matchQuery && matchPrice && matchStar) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (itemCountBadge) itemCountBadge.innerText = visibleCount + ' mẫu';
            if (tagIndicator) {
                if (!query && !priceVal && !starVal) {
                    tagIndicator.innerText = 'Hiển thị toàn bộ mẫu áo (' + visibleCount + ')';
                } else {
                    tagIndicator.innerText = 'Tìm: "' + (query || 'Tất cả') + '" • Đang hiển thị ' + visibleCount +
                        ' kết quả';
                }
            }
        }

        if (filterSearch) filterSearch.addEventListener('input', applyClientFilter);
        if (filterPriceRange) filterPriceRange.addEventListener('change', applyClientFilter);
        if (filterStar) filterStar.addEventListener('change', applyClientFilter);

        if (btnResetFilters) {
            btnResetFilters.addEventListener('click', function() {
                if (filterSearch) filterSearch.value = '';
                if (filterPriceRange) filterPriceRange.value = '';
                if (filterStar) filterStar.value = '';
                if (filterSort) filterSort.value = 'newest';
                applyClientFilter();
            });
        }
    </script>

</body>

</html>
