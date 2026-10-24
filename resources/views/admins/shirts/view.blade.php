<!DOCTYPE html>
<html lang="vi" class="h-full bg-neutral-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ isset($shirt) && isset($shirt->name) ? $shirt->name : 'Chi Tiết Mẫu Áo' }} — MY CLOTHES Admin</title>

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

        /* Technical monochrome grid background */
        .admin-grid-bg {
            background-color: #050505;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* Custom dark minimalist scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #000000;
        }

        ::-webkit-scrollbar-thumb {
            background: #262626;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #404040;
        }

        /* Print optimization */
        @media print {

            aside,
            header,
            .no-print {
                display: none !important;
            }

            body,
            main {
                background: white !important;
                color: black !important;
            }

            .admin-grid-bg {
                background: none !important;
            }

            .border-neutral-800,
            .border-neutral-900 {
                border-color: #d4d4d4 !important;
            }
        }
    </style>
</head>

<body
    class="h-full bg-neutral-950 text-neutral-100 antialiased flex flex-col md:flex-row min-h-screen selection:bg-white selection:text-black">

    @php
        $shirtImgUrl = $shirt->image ?? null;
    @endphp

    <!-- ========================================================================= -->
    <!-- 1. SIDEBAR NAVIGATION (Monochrome Minimalist - Đồng bộ hệ thống) -->
    <!-- ========================================================================= -->
    <aside
        class="w-full md:w-64 bg-black border-r border-neutral-900 flex flex-col shrink-0 md:h-screen md:sticky md:top-0 no-print">
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
            <a href="{{ route('admin.shirt.index') }}"
                class="flex items-center justify-between px-3 py-2.5 rounded-lg bg-white text-black text-xs font-bold uppercase tracking-wider shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Sản phẩm (Shirts)</span>
                </div>
                <span class="text-[9px] font-mono-code px-1.5 py-0.5 rounded bg-black text-white font-bold">
                    Chi tiết
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
    <!-- 2. MAIN CONTENT AREA (Trang Xem Chi Tiết Áo) -->
    <!-- ========================================================================= -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto admin-grid-bg">

        <!-- Top Header Navigation Bar -->
        <header
            class="h-16 px-6 lg:px-10 border-b border-neutral-900 bg-black/70 backdrop-blur-md sticky top-0 z-20 flex items-center justify-between no-print">

            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 sm:gap-3 text-xs overflow-hidden">
                <a href="{{ Route::has('admin.shirt.index') ? route('admin.shirt.index') : '/admin/shirts/index' }}"
                    class="inline-flex items-center gap-1.5 text-neutral-400 hover:text-white transition-colors shrink-0">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="hidden sm:inline font-medium">Danh sách áo</span>
                </a>
                <span class="text-neutral-700">/</span>
                <span class="text-neutral-400 font-mono-code uppercase text-[11px] truncate">
                    # {{ $shirt->id }}
                </span>
                <span class="text-neutral-700">/</span>
                <h1
                    class="text-xs font-bold font-display uppercase tracking-wider text-white truncate max-w-[200px] sm:max-w-xs md:max-w-md">
                    {{ $shirt->name ?? 'Chi tiết sản phẩm' }}
                </h1>
            </div>

            <!-- Top Actions Toolbar -->
            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <!-- In thông số kĩ thuật -->
                <button type="button" onclick="window.print()" title="In thông số áo"
                    class="p-2 sm:px-3 sm:py-2 rounded-xl border border-neutral-800 bg-neutral-900/60 hover:bg-neutral-900 hover:border-neutral-700 text-neutral-300 hover:text-white text-xs font-mono-code transition-all inline-flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span class="hidden md:inline">In Phiếu</span>
                </button>

                <!-- Quay lại danh sách button -->
                <a href="{{ Route::has('admin.shirt.index') ? route('admin.shirt.index') : '/admin/shirts/index' }}"
                    class="px-3.5 py-2 rounded-xl bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider transition-all inline-flex items-center gap-2 shadow-sm">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    <span>Về Kho Áo</span>
                </a>
            </div>
        </header>

        <!-- Main Body Content -->
        <div class="p-6 lg:p-10 space-y-8 flex-1 max-w-7xl w-full mx-auto">

            <!-- ========================================================================= -->
            <!-- 3. TOP BANNER / IDENTIFICATION STRIP -->
            <!-- ========================================================================= -->
            <div
                class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-5 rounded-2xl bg-black border border-neutral-900 shadow-xl">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-neutral-900 border border-neutral-800 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex flex-wrap items-center gap-2.5">
                            <span
                                class="px-2.5 py-0.5 rounded text-[10px] font-mono-code font-bold uppercase bg-white text-black tracking-wider">
                                Sẵn Hàng • In Stock
                            </span>
                            <span class="text-xs font-mono-code text-neutral-400">
                                SKU: <strong class="text-white">{{ $shirt->id }}</strong>
                            </span>
                            <button type="button" onclick="copyToClipboard('{{ $shirt->id }}')"
                                title="Sao chép SKU"
                                class="text-neutral-500 hover:text-white transition-colors cursor-pointer text-[11px] font-mono-code inline-flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span>Copy</span>
                            </button>
                        </div>
                        <h2 class="text-lg lg:text-xl font-bold font-display uppercase tracking-wide text-white mt-1">
                            {{ $shirt->name }}
                        </h2>
                    </div>
                </div>

                <!-- Right Quick Stats Pills -->
                <div
                    class="flex items-center gap-3 border-t md:border-t-0 md:border-l border-neutral-900 pt-3 md:pt-0 md:pl-6">
                    <div class="text-left md:text-right">
                        <span class="text-[10px] font-mono-code uppercase text-neutral-400 block">Đơn giá niêm
                            yết</span>
                        <span
                            class="text-xl font-extrabold font-mono-code text-white">{{ number_format($shirt->price, 0, ',') }}</span>
                    </div>
                    <div class="w-px h-8 bg-neutral-800"></div>
                    <div class="text-left md:text-right">
                        <span class="text-[10px] font-mono-code uppercase text-neutral-400 block">Đánh giá chung</span>
                        <div class="inline-flex items-center gap-1 text-white font-mono-code font-bold text-base">
                            <span class="text-white">★</span>
                            <span>{{ number_format($shirt->star, 1, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================================================= -->
            <!-- 4. CORE TWO-COLUMN SHOWCASE LAYOUT -->
            <!-- ========================================================================= -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- ----------------------------------------------------------------- -->
                <!-- LEFT COLUMN: Product Visual Studio Showcase (5 cols) -->
                <!-- ----------------------------------------------------------------- -->
                <div class="lg:col-span-5 space-y-6">

                    <!-- Main Image Frame Container -->
                    <div
                        class="rounded-3xl bg-black border border-neutral-900 p-4 shadow-2xl relative overflow-hidden group">

                        <!-- Top Tag Badges Over Image -->
                        <div class="absolute top-7 left-7 z-10 flex flex-col gap-2">
                            <span
                                class="px-3 py-1 rounded-full bg-black/80 backdrop-blur-md border border-neutral-800 text-[10px] font-mono-code uppercase tracking-wider text-white">
                                Noir Studio 2026
                            </span>
                            <span
                                class="px-3 py-1 rounded-full bg-white text-black font-bold text-[9px] font-mono-code uppercase tracking-widest shadow-lg">
                                100% Cotton
                            </span>
                        </div>

                        <!-- Zoom Lightbox Trigger Button -->
                        <button type="button" onclick="openLightboxModal()" title="Phóng to ảnh mẫu áo"
                            class="absolute top-7 right-7 z-10 p-2.5 rounded-full bg-black/80 backdrop-blur-md border border-neutral-800 text-neutral-300 hover:text-white hover:bg-neutral-900 transition-all cursor-pointer shadow-lg group-hover:scale-105">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
                            </svg>
                        </button>

                        <!-- Main Big Image Display -->
                        <div
                            class="w-full aspect-[4/5] rounded-2xl bg-neutral-950 border border-neutral-900 flex items-center justify-center overflow-hidden relative">
                            @if (isset($shirtImgUrl) && $shirtImgUrl)
                                <img id="hero-main-image" src="{{ asset('storage/' . $shirtImgUrl) }}"
                                    alt="{{ $shirt->name }}"
                                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            @else
                                <div class="flex flex-col items-center justify-center p-8 text-center space-y-4">
                                    <div
                                        class="w-20 h-20 rounded-2xl bg-neutral-900 border border-neutral-800 flex items-center justify-center text-white">
                                        <svg class="w-10 h-10 text-neutral-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-display font-bold text-sm text-white uppercase tracking-wider">
                                            {{ substr($shirt->name, 0, 2) }} • NOIR VISUAL
                                        </p>
                                        <p class="text-xs text-neutral-500 font-mono-code mt-1">
                                            Chưa tải ảnh thực tế cho sản phẩm này
                                        </p>
                                    </div>
                                </div>
                            @endif

                            <!-- Bottom Overlay Grid Label -->
                            <div
                                class="absolute bottom-0 inset-x-0 p-4 bg-gradient-to-t from-black via-black/60 to-transparent flex items-center justify-between text-[11px] font-mono-code text-neutral-400">
                                <span>Tỉ lệ: 4:5 Studio Ratio</span>
                                <span class="text-white">Hi-Res Archival</span>
                            </div>
                        </div>

                        <!-- Gallery Thumbnails & Multiple View Angles -->
                        <div class="mt-4 grid grid-cols-4 gap-2.5">
                            <div
                                class="p-1 rounded-xl border-2 border-white bg-black cursor-pointer transition-transform hover:scale-105">
                                <div
                                    class="w-full aspect-square rounded-lg bg-neutral-900 flex items-center justify-center overflow-hidden">
                                    @if (isset($shirtImgUrl) && $shirtImgUrl)
                                        <img src="{{ asset('storage/' . $shirtImgUrl) }}" alt="Mặt trước"
                                            class="w-full h-full object-cover">
                                    @else
                                        <span class="text-[10px] font-mono-code text-white font-bold">FRONT</span>
                                    @endif
                                </div>
                                <span
                                    class="block text-center text-[9px] font-mono-code text-white mt-1 font-semibold uppercase">Mặt
                                    trước</span>
                            </div>

                            <div
                                class="p-1 rounded-xl border border-neutral-800 bg-neutral-950 opacity-70 hover:opacity-100 cursor-pointer transition-all hover:border-neutral-600">
                                <div
                                    class="w-full aspect-square rounded-lg bg-neutral-900 flex items-center justify-center overflow-hidden text-neutral-500">
                                    <span class="text-[10px] font-mono-code font-bold">BACK</span>
                                </div>
                                <span
                                    class="block text-center text-[9px] font-mono-code text-neutral-400 mt-1 uppercase">Mặt
                                    sau</span>
                            </div>

                            <div
                                class="p-1 rounded-xl border border-neutral-800 bg-neutral-950 opacity-70 hover:opacity-100 cursor-pointer transition-all hover:border-neutral-600">
                                <div
                                    class="w-full aspect-square rounded-lg bg-neutral-900 flex items-center justify-center overflow-hidden text-neutral-500">
                                    <span class="text-[10px] font-mono-code font-bold">FABRIC</span>
                                </div>
                                <span
                                    class="block text-center text-[9px] font-mono-code text-neutral-400 mt-1 uppercase">Sợi
                                    vải</span>
                            </div>

                            <div
                                class="p-1 rounded-xl border border-neutral-800 bg-neutral-950 opacity-70 hover:opacity-100 cursor-pointer transition-all hover:border-neutral-600">
                                <div
                                    class="w-full aspect-square rounded-lg bg-neutral-900 flex items-center justify-center overflow-hidden text-neutral-500">
                                    <span class="text-[10px] font-mono-code font-bold">TAG</span>
                                </div>
                                <span
                                    class="block text-center text-[9px] font-mono-code text-neutral-400 mt-1 uppercase">Mác
                                    áo</span>
                            </div>
                        </div>

                    </div>

                    <!-- Barcode & Quick Warehouse Scan Widget -->
                    <div class="rounded-2xl bg-black border border-neutral-900 p-5 space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-neutral-900">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wider font-display text-white">Mã
                                    Vạch Kho Hàng</span>
                            </div>
                            <span class="text-[10px] font-mono-code text-neutral-400">Code 128 Standard</span>
                        </div>

                        <!-- Technical Visual Barcode Simulation -->
                        <div
                            class="p-4 rounded-xl bg-white text-black flex flex-col items-center justify-center space-y-2">
                            <div class="flex items-end justify-center gap-[3px] h-12 w-full px-4">
                                <span class="w-[3px] h-full bg-black"></span>
                                <span class="w-[1px] h-full bg-black"></span>
                                <span class="w-[4px] h-full bg-black"></span>
                                <span class="w-[2px] h-full bg-black"></span>
                                <span class="w-[1px] h-full bg-black"></span>
                                <span class="w-[3px] h-full bg-black"></span>
                                <span class="w-[2px] h-full bg-black"></span>
                                <span class="w-[4px] h-full bg-black"></span>
                                <span class="w-[1px] h-full bg-black"></span>
                                <span class="w-[2px] h-full bg-black"></span>
                                <span class="w-[3px] h-full bg-black"></span>
                                <span class="w-[1px] h-full bg-black"></span>
                                <span class="w-[4px] h-full bg-black"></span>
                                <span class="w-[2px] h-full bg-black"></span>
                                <span class="w-[3px] h-full bg-black"></span>
                                <span class="w-[1px] h-full bg-black"></span>
                                <span class="w-[2px] h-full bg-black"></span>
                                <span class="w-[4px] h-full bg-black"></span>
                            </div>
                            <span class="font-mono-code text-xs font-bold tracking-[0.25em] text-black">
                                * {{ $shirt->id }} *
                            </span>
                        </div>

                        <div
                            class="flex items-center justify-between text-[11px] font-mono-code text-neutral-400 pt-1">
                            <span>Vị trí kho: <strong class="text-white">Kệ A-04 • Tầng 2</strong></span>
                            <span class="text-white">Scan Ready</span>
                        </div>
                    </div>

                </div>

                <!-- ----------------------------------------------------------------- -->
                <!-- RIGHT COLUMN: Detailed Specifications, Pricing & Specs (7 cols) -->
                <!-- ----------------------------------------------------------------- -->
                <div class="lg:col-span-7 space-y-6">

                    <!-- Product Main Header & Title Card -->
                    <div class="rounded-3xl bg-black border border-neutral-900 p-6 lg:p-8 space-y-5 shadow-2xl">

                        <!-- Badges line -->
                        <div class="flex flex-wrap items-center gap-2">
                            <span
                                class="px-3 py-1 rounded-lg bg-neutral-900 border border-neutral-800 text-[10px] font-mono-code uppercase font-semibold text-neutral-300">
                                Danh Mục: Áo Phông / T-Shirt
                            </span>
                            <span
                                class="px-3 py-1 rounded-lg bg-neutral-900 border border-neutral-800 text-[10px] font-mono-code uppercase font-semibold text-neutral-300">
                                Định lượng: 280 GSM
                            </span>
                            <span
                                class="px-3 py-1 rounded-lg bg-neutral-900 border border-neutral-800 text-[10px] font-mono-code uppercase font-semibold text-white">
                                Phom: Boxy Relaxed
                            </span>
                        </div>

                        <!-- Product Title -->
                        <div>
                            <h1
                                class="text-2xl lg:text-3xl font-extrabold font-display uppercase tracking-tight text-white leading-tight">
                                {{ $shirt->name }}
                            </h1>
                            <p class="text-xs text-neutral-400 font-mono-code mt-1.5 flex items-center gap-2">
                                <span>Mã tham chiếu: <strong class="text-white">{{ $shirt->id }}</strong></span>
                                <span>•</span>
                                <span>ID cơ sở dữ liệu: <strong
                                        class="text-white">#{{ $shirt->id }}</strong></span>
                            </p>
                        </div>

                        <div class="h-px bg-neutral-900 w-full"></div>

                        <!-- Commercial Pricing & Financial Matrix -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="p-4 rounded-2xl bg-neutral-950 border border-neutral-800">
                                <span class="text-[10px] font-mono-code uppercase text-neutral-400">Giá bán lẻ
                                    (Retail)</span>
                                <p class="text-2xl font-extrabold font-mono-code text-white mt-1">
                                    {{ number_format($shirt->price, 0, ',') }}
                                </p>
                                <span class="text-[10px] text-neutral-500 font-mono-code mt-1 block">Đã gồm VAT
                                    8%</span>
                            </div>

                            <div class="p-4 rounded-2xl bg-neutral-950 border border-neutral-800">
                                <span class="text-[10px] font-mono-code uppercase text-neutral-400">Chi phí vốn dự
                                    tính</span>
                                <p class="text-2xl font-extrabold font-mono-code text-neutral-300 mt-1">
                                    {{ number_format(($shirt->price ?? 300000) * 0.38, 0, ',', '.') }}₫
                                </p>
                                <span class="text-[10px] text-neutral-500 font-mono-code mt-1 block">Vải + Công may +
                                    Tag</span>
                            </div>

                            <div class="p-4 rounded-2xl bg-neutral-950 border border-neutral-800">
                                <span class="text-[10px] font-mono-code uppercase text-neutral-400">Biên độ lợi
                                    nhuận</span>
                                <p class="text-2xl font-extrabold font-mono-code text-white mt-1">
                                    ~62.0%
                                </p>
                                <span class="text-[10px] text-white font-mono-code mt-1 block font-semibold">Tối ưu
                                    hiệu quả</span>
                            </div>
                        </div>

                        <!-- Rating & Social Proof Breakdown -->
                        <div
                            class="p-5 rounded-2xl bg-neutral-950 border border-neutral-800 flex flex-col sm:flex-row sm:items-center justify-between gap-5">
                            <div class="flex items-center gap-4">
                                <div class="text-center sm:text-left">
                                    <span
                                        class="text-3xl font-extrabold font-display text-white">{{ number_format($shirt->star, 1, ',', '.') }}</span>
                                    <span class="text-xs text-neutral-500 font-mono-code block">trên 5.0 sao</span>
                                </div>
                                <div class="space-y-1">
                                    <div class="flex items-center text-white text-sm tracking-widest">
                                        ★★★★★
                                    </div>
                                    <p class="text-xs text-neutral-400 font-mono-code">Dựa trên 128 lượt mua đã xác
                                        thực</p>
                                </div>
                            </div>

                            <!-- Rating Distribution Mini Bars -->
                            <div class="space-y-1.5 w-full sm:w-48 text-[10px] font-mono-code">
                                <div class="flex items-center gap-2">
                                    <span class="text-neutral-400 w-6">5★</span>
                                    <div class="flex-1 h-1.5 bg-neutral-900 rounded-full overflow-hidden">
                                        <div class="h-full bg-white rounded-full" style="width: 88%"></div>
                                    </div>
                                    <span class="text-neutral-400 w-6 text-right">88%</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-neutral-400 w-6">4★</span>
                                    <div class="flex-1 h-1.5 bg-neutral-900 rounded-full overflow-hidden">
                                        <div class="h-full bg-neutral-400 rounded-full" style="width: 10%"></div>
                                    </div>
                                    <span class="text-neutral-400 w-6 text-right">10%</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-neutral-400 w-6">3★</span>
                                    <div class="flex-1 h-1.5 bg-neutral-900 rounded-full overflow-hidden">
                                        <div class="h-full bg-neutral-600 rounded-full" style="width: 2%"></div>
                                    </div>
                                    <span class="text-neutral-400 w-6 text-right">2%</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Size Breakdown & Available Inventory -->
                    <div class="rounded-3xl bg-black border border-neutral-900 p-6 lg:p-8 space-y-5 shadow-2xl">
                        <div class="flex items-center justify-between pb-3 border-b border-neutral-900">
                            <div class="flex items-center gap-2.5">
                                <span class="w-2 h-2 rounded-full bg-white"></span>
                                <h3 class="text-xs font-bold uppercase tracking-wider font-display text-white">
                                    Bảng Kích Cỡ & Tồn Kho Thực Tế
                                </h3>
                            </div>
                            <span class="text-[10px] font-mono-code text-neutral-400">Tổng tồn: 320 chiếc</span>
                        </div>

                        <!-- Size Matrix Cards -->
                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 font-mono-code">
                            <div class="p-3 rounded-xl bg-neutral-950 border border-neutral-800 text-center space-y-1">
                                <span class="text-sm font-bold text-white block">SIZE S</span>
                                <span class="text-[10px] text-neutral-400 block">Dài 68 • Rộng 54</span>
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold bg-neutral-900 text-white inline-block">45
                                    chiếc</span>
                            </div>

                            <div class="p-3 rounded-xl bg-neutral-950 border border-neutral-800 text-center space-y-1">
                                <span class="text-sm font-bold text-white block">SIZE M</span>
                                <span class="text-[10px] text-neutral-400 block">Dài 71 • Rộng 56</span>
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold bg-neutral-900 text-white inline-block">112
                                    chiếc</span>
                            </div>

                            <div
                                class="p-3 rounded-xl bg-neutral-950 border border-white text-center space-y-1 bg-white/5">
                                <span class="text-sm font-bold text-white block">SIZE L</span>
                                <span class="text-[10px] text-neutral-300 block">Dài 74 • Rộng 59</span>
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold bg-white text-black inline-block">98
                                    chiếc</span>
                            </div>

                            <div class="p-3 rounded-xl bg-neutral-950 border border-neutral-800 text-center space-y-1">
                                <span class="text-sm font-bold text-white block">SIZE XL</span>
                                <span class="text-[10px] text-neutral-400 block">Dài 76 • Rộng 62</span>
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold bg-neutral-900 text-white inline-block">53
                                    chiếc</span>
                            </div>

                            <div
                                class="p-3 rounded-xl bg-neutral-950 border border-neutral-800 text-center space-y-1 col-span-2 sm:col-span-1">
                                <span class="text-sm font-bold text-white block">SIZE XXL</span>
                                <span class="text-[10px] text-neutral-400 block">Dài 79 • Rộng 65</span>
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold bg-neutral-900 text-white inline-block">12
                                    chiếc</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product Detailed Description -->
                    <div class="rounded-3xl bg-black border border-neutral-900 p-6 lg:p-8 space-y-5 shadow-2xl">
                        <div class="flex items-center justify-between pb-3 border-b border-neutral-900">
                            <div class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                <h3 class="text-xs font-bold uppercase tracking-wider font-display text-white">
                                    Mô Tả Sản Phẩm & Bản Thuyết Minh Thiết Kế
                                </h3>
                            </div>
                            <span class="text-[10px] font-mono-code text-neutral-400">Archival Copy</span>
                        </div>

                        <!-- Description Content Block -->
                        <div class="space-y-4 text-xs leading-relaxed text-neutral-300">
                            @if (!empty($shirt->description))
                                <p
                                    class="text-sm font-medium text-white/95 leading-relaxed bg-neutral-950 p-4 rounded-2xl border border-neutral-800">
                                    {{ $shirt->description }}
                                </p>
                            @else
                                <p class="text-neutral-500 italic font-mono-code">
                                    Chưa có văn bản mô tả cụ thể cho mẫu áo này.
                                </p>
                            @endif

                            <div class="pt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="p-4 rounded-2xl bg-neutral-950 border border-neutral-900 space-y-2">
                                    <h4
                                        class="text-xs font-bold font-display uppercase tracking-wider text-white flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                                        Tiêu Chuẩn Sợi Vải & Dệt
                                    </h4>
                                    <ul
                                        class="space-y-1.5 text-[11px] text-neutral-400 font-mono-code list-disc list-inside">
                                        <li>100% Sợi bông tự nhiên chải kỹ Compact</li>
                                        <li>Định lượng vải dày dặn 280 GSM</li>
                                        <li>Xử lý bề mặt chống bai xù Enzyme Wash</li>
                                        <li>Bo cổ 1x1 gân dày dặn chống dão gãy</li>
                                    </ul>
                                </div>

                                <div class="p-4 rounded-2xl bg-neutral-950 border border-neutral-900 space-y-2">
                                    <h4
                                        class="text-xs font-bold font-display uppercase tracking-wider text-white flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                                        Quy Trình Bảo Quản Khuyến Nghị
                                    </h4>
                                    <ul
                                        class="space-y-1.5 text-[11px] text-neutral-400 font-mono-code list-disc list-inside">
                                        <li>Giặt ở nhiệt độ thường dưới 30°C</li>
                                        <li>Lộn mặt trái khi giặt và phơi bóng râm</li>
                                        <li>Không dùng chất tẩy có gốc Clo mạnh</li>
                                        <li>Là ủi mặt trong ở mức nhiệt vừa < 110°C</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- System Audit Trail & Metadata -->
                    <div class="rounded-3xl bg-black border border-neutral-900 p-6 space-y-4 shadow-xl">
                        <div class="flex items-center justify-between pb-3 border-b border-neutral-900">
                            <span class="text-xs font-bold uppercase tracking-wider font-display text-white">
                                Nhật Ký Dữ Liệu Hệ Thống
                            </span>
                            <span class="text-[10px] font-mono-code text-neutral-400">Database Record</span>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-[11px] font-mono-code">
                            <div>
                                <span class="text-neutral-500 block uppercase text-[10px]">Ngày tạo mẫu</span>
                                <span class="text-white font-medium mt-0.5 block">
                                    {{ !empty($shirt->created_at) ? date('d/m/Y H:i', strtotime($shirt->created_at)) : '24/10/2026 09:30' }}
                                </span>
                            </div>

                            <div>
                                <span class="text-neutral-500 block uppercase text-[10px]">Cập nhật lần cuối</span>
                                <span class="text-white font-medium mt-0.5 block">
                                    {{ !empty($shirt->updated_at) ? date('d/m/Y H:i', strtotime($shirt->updated_at)) : 'Hôm nay' }}
                                </span>
                            </div>

                            <div>
                                <span class="text-neutral-500 block uppercase text-[10px]">Người khởi tạo</span>
                                <span class="text-white font-medium mt-0.5 block">Admin Studio</span>
                            </div>

                            <div>
                                <span class="text-neutral-500 block uppercase text-[10px]">Trạng thái hiển thị</span>
                                <span class="text-white font-bold mt-0.5 inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                                    Công khai web
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- ========================================================================= -->
        <!-- 5. LIGHTBOX MODAL CHO ẢNH CHI TIẾT (FULL RESOLUTION ZOOM) -->
        <!-- ========================================================================= -->
        <div id="modal-lightbox"
            class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-md flex items-center justify-center p-4">
            <div class="relative max-w-4xl max-h-[90vh] flex flex-col items-center">
                <button type="button" onclick="closeLightboxModal()"
                    class="absolute -top-12 right-0 text-white hover:text-neutral-300 text-2xl font-mono-code cursor-pointer flex items-center gap-2">
                    <span class="text-xs uppercase font-mono-code text-neutral-400">Đóng</span>
                    <span>&times;</span>
                </button>

                <div class="rounded-2xl border border-neutral-800 overflow-hidden bg-neutral-950 shadow-2xl">
                    @if (isset($shirtImgUrl) && $shirtImgUrl)
                        <img src="{{ asset('storage/' . $shirtImgUrl) }}" alt="{{ $shirt->name }}"
                            class="max-h-[80vh] w-auto object-contain">
                    @else
                        <div
                            class="w-96 h-96 flex flex-col items-center justify-center text-neutral-400 p-8 text-center">
                            <span class="font-display font-bold text-lg text-white">MY CLOTHES</span>
                            <span class="text-xs font-mono-code text-neutral-500 mt-2">{{ $shirt->name }}</span>
                        </div>
                    @endif
                </div>
                <p class="text-xs font-mono-code text-neutral-400 mt-3">{{ $shirt->name }} • {{ $shirt->id }}</p>
            </div>
        </div>

        <!-- Global Toast Alert Container -->
        <div id="toast-notification"
            class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none">
            <div
                class="px-4 py-3 rounded-xl bg-white text-black text-xs font-mono-code font-bold shadow-2xl flex items-center gap-2.5">
                <svg class="w-4 h-4 text-black shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
                <span id="toast-message">Đã sao chép!</span>
            </div>
        </div>

        <!-- Page Footer -->
        <footer
            class="h-14 px-6 lg:px-10 border-t border-neutral-900 bg-black text-[11px] text-neutral-500 font-mono-code flex items-center justify-between mt-auto no-print">
            <span>© {{ date('Y') }} MY CLOTHES Studio. Quản Lý Chi Tiết Sản Phẩm.</span>
            <span>Monochrome Architecture • Noir Edition</span>
        </footer>

    </main>

    <!-- Interactive Scripts -->
    <script>
        function openLightboxModal() {
            const modal = document.getElementById('modal-lightbox');
            if (modal) modal.classList.remove('hidden');
        }

        function closeLightboxModal() {
            const modal = document.getElementById('modal-lightbox');
            if (modal) modal.classList.add('hidden');
        }

        // Close on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightboxModal();
            }
        });

        // Copy SKU to clipboard
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                showToast('Đã sao chép mã SKU: ' + text);
            }).catch(err => {
                showToast('Không thể sao chép');
            });
        }

        // Show Toast helper
        function showToast(msg) {
            const toast = document.getElementById('toast-notification');
            const toastMsg = document.getElementById('toast-message');
            if (!toast || !toastMsg) return;

            toastMsg.innerText = msg;
            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 2500);
        }
    </script>
</body>

</html>
