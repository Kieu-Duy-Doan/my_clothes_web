<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY CLOTHES — Thời Trang Tối Giản Đương Đại</title>

    <!-- Google Fonts: Plus Jakarta Sans & Syne -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS / Vite -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                            display: ['"Syne"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-display {
            font-family: 'Syne', sans-serif;
        }
    </style>
</head>

<body class="min-h-full bg-white text-neutral-900 antialiased selection:bg-neutral-950 selection:text-white flex flex-col">

    <!-- 1. Top Utility Notification Bar -->
    <div class="bg-neutral-950 text-neutral-300 text-[11px] font-medium tracking-widest uppercase py-2 px-4 text-center border-b border-neutral-900 flex items-center justify-center gap-3">
        <span>Miễn phí vận chuyển toàn quốc cho đơn hàng từ 500.000₫</span>
        <span class="hidden sm:inline text-neutral-600">•</span>
        <span class="hidden sm:inline text-neutral-400">Bộ Sưu Tập Thu - Đông 2026</span>
    </div>

    <!-- 2. Sticky Main Header -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-neutral-200/80 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Brand Monogram & Logo -->
                <div class="flex items-center gap-8">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group">
                        <span class="w-9 h-9 rounded-lg bg-neutral-950 text-white font-bold flex items-center justify-center text-sm tracking-tighter group-hover:bg-neutral-800 transition-colors">
                            MC
                        </span>
                        <div class="flex flex-col">
                            <span class="text-xl font-bold tracking-widest font-display uppercase leading-tight">
                                MY CLOTHES
                            </span>
                            <span class="text-[9px] uppercase tracking-[0.25em] text-neutral-500 font-semibold">
                                Studio Apparel
                            </span>
                        </div>
                    </a>

                    <!-- Navigation Links -->
                    <nav class="hidden lg:flex items-center gap-7 text-xs font-semibold uppercase tracking-wider text-neutral-600">
                        <a href="#new-arrivals" class="hover:text-neutral-950 transition-colors">Mới Nhất</a>
                        <a href="#products" class="hover:text-neutral-950 transition-colors">Áo Thun Basic</a>
                        <a href="#products" class="hover:text-neutral-950 transition-colors">Áo Polo Knit</a>
                        <a href="#products" class="hover:text-neutral-950 transition-colors">Sơ Mi & Linen</a>
                        <a href="#lookbook" class="hover:text-neutral-950 transition-colors">Lookbook</a>
                    </nav>
                </div>

                <!-- Right Actions: Search, Auth, Cart -->
                <div class="flex items-center gap-4 sm:gap-6">
                    <!-- Quick Search Box (Desktop) -->
                    <div class="hidden md:flex items-center relative">
                        <input type="text" placeholder="Tìm kiếm áo thun, polo..."
                            class="w-48 lg:w-60 pl-8 pr-3 py-1.5 text-xs bg-neutral-100 hover:bg-neutral-50 focus:bg-white border border-neutral-200 focus:border-neutral-950 focus:outline-none rounded-full transition-all">
                        <svg class="w-3.5 h-3.5 text-neutral-500 absolute left-2.5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <!-- Auth State Actions -->
                    @auth
                        <div class="relative group">
                            <a href="#" class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-neutral-800 hover:text-black py-1">
                                <span class="w-7 h-7 rounded-full bg-neutral-200 flex items-center justify-center text-xs font-bold">
                                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                                </span>
                                <span class="hidden sm:inline max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                            </a>
                        </div>
                    @else
                        <div class="flex items-center gap-3 text-xs font-semibold tracking-wider uppercase">
                            <a href="{{ route('login') }}" class="text-neutral-700 hover:text-neutral-950 transition-colors">
                                Đăng nhập
                            </a>
                            <span class="text-neutral-300">/</span>
                            <a href="{{ route('register') }}" class="hidden sm:inline text-neutral-700 hover:text-neutral-950 transition-colors">
                                Đăng ký
                            </a>
                        </div>
                    @endauth

                    <!-- Cart Trigger Button -->
                    <button type="button" aria-label="Giỏ hàng" class="relative p-2 text-neutral-900 hover:text-neutral-600 transition-colors cursor-pointer">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="absolute top-1 right-1 w-4 h-4 rounded-full bg-neutral-950 text-white text-[10px] font-bold flex items-center justify-center">
                            0
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- 3. Flash Alert Message (Success / Error) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
        @session('success')
            <div class="p-4 rounded-xl bg-neutral-950 text-white text-xs font-medium flex items-center justify-between border border-neutral-800 shadow-lg animate-in fade-in duration-300">
                <div class="flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                    <span>{{ $value }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-neutral-400 hover:text-white text-base leading-none">&times;</button>
            </div>
        @endsession

        @if (session('error'))
            <div class="p-4 rounded-xl bg-red-600 text-white text-xs font-medium flex items-center justify-between shadow-lg">
                <span>{{ session('error') }}</span>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-200 hover:text-white">&times;</button>
            </div>
        @endif
    </div>

    <!-- 4. Hero Section: Editorial Monochrome Statement -->
    <section class="relative overflow-hidden bg-white border-b border-neutral-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Hero Left: Typography & CTAs -->
                <div class="lg:col-span-6 flex flex-col justify-center">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-neutral-300 text-[11px] font-bold uppercase tracking-widest text-neutral-700 w-fit mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-neutral-950"></span>
                        Phiên bản giới hạn 2026
                    </div>

                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold font-display uppercase tracking-tight text-neutral-950 leading-[0.95] mb-6">
                        THE ART <br>
                        OF MINIMAL <br>
                        <span class="text-neutral-400">APPAREL</span>
                    </h1>

                    <p class="text-sm sm:text-base text-neutral-600 max-w-lg mb-8 leading-relaxed font-normal">
                        Bộ sưu tập áo thun, sơ mi và polo đan dệt từ 100% sợi Cotton Compact 280GSM cao cấp. Thiết kế tối giản cấu trúc, giữ form bền bỉ và tạo sự tự do tối đa cho người mặc.
                    </p>

                    <!-- CTA Actions -->
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="#products" class="px-7 py-3.5 bg-neutral-950 hover:bg-neutral-800 text-white text-xs font-bold uppercase tracking-widest rounded-lg transition-all shadow-sm active:scale-95 inline-flex items-center gap-2">
                            <span>Khám phá bộ sưu tập</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <a href="#lookbook" class="px-7 py-3.5 border border-neutral-300 hover:border-neutral-950 text-neutral-900 text-xs font-bold uppercase tracking-widest rounded-lg transition-colors inline-flex items-center gap-2">
                            <span>Xem Lookbook</span>
                        </a>
                    </div>

                    <!-- Micro Feature List -->
                    <div class="grid grid-cols-3 gap-6 pt-12 mt-12 border-t border-neutral-200">
                        <div>
                            <p class="font-display text-lg font-bold text-neutral-950">100%</p>
                            <p class="text-[11px] text-neutral-500 uppercase tracking-wider mt-0.5">Cotton Compact</p>
                        </div>
                        <div>
                            <p class="font-display text-lg font-bold text-neutral-950">280 GSM</p>
                            <p class="text-[11px] text-neutral-500 uppercase tracking-wider mt-0.5">Dày dặn & đứng form</p>
                        </div>
                        <div>
                            <p class="font-display text-lg font-bold text-neutral-950">30 Ngày</p>
                            <p class="text-[11px] text-neutral-500 uppercase tracking-wider mt-0.5">Đổi trả miễn phí</p>
                        </div>
                    </div>
                </div>

                <!-- Hero Right: High Fashion Imagery Showcase -->
                <div class="lg:col-span-6 relative">
                    <div class="grid grid-cols-12 gap-4">
                        <!-- Main Card -->
                        <div class="col-span-8 rounded-2xl overflow-hidden border border-neutral-200 shadow-xl bg-neutral-100 aspect-[4/5] relative group">
                            <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=1000&q=80"
                                alt="Minimal White T-Shirt"
                                class="w-full h-full object-cover grayscale contrast-110 group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950/70 via-transparent to-transparent flex items-end p-6">
                                <div class="text-white">
                                    <span class="text-[10px] uppercase font-bold tracking-widest text-neutral-300">Best Seller #01</span>
                                    <h3 class="text-lg font-bold font-display uppercase tracking-wide">Signature Heavyweight Tee</h3>
                                    <p class="text-xs text-neutral-300 mt-1">420.000₫</p>
                                </div>
                            </div>
                        </div>

                        <!-- Secondary Stack Cards -->
                        <div class="col-span-4 flex flex-col gap-4">
                            <div class="rounded-2xl overflow-hidden border border-neutral-200 shadow-md bg-neutral-100 aspect-[3/4] relative group">
                                <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=600&q=80"
                                    alt="Black Oversized Shirt"
                                    class="w-full h-full object-cover grayscale contrast-115 group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute top-3 right-3 bg-white text-neutral-950 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">
                                    Mới
                                </div>
                            </div>
                            <div class="rounded-2xl overflow-hidden border border-neutral-200 shadow-md bg-neutral-950 text-white p-5 flex flex-col justify-between flex-1">
                                <span class="text-[10px] uppercase tracking-widest text-neutral-400 font-semibold">Tôn vinh sự tinh giản</span>
                                <p class="text-xs font-medium text-neutral-300 leading-snug">"Chiếc áo thun hoàn hảo là chiếc áo bạn muốn mặc mỗi ngày."</p>
                                <span class="text-[9px] uppercase tracking-widest text-neutral-500 font-bold">— Studio 2026</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. Value Props (Editorial Bar) -->
    <section class="border-b border-neutral-200 bg-neutral-50/60 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center md:text-left">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-neutral-950 text-white flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-neutral-950">Chất Liệu Tuyển Chọn</h4>
                        <p class="text-[11px] text-neutral-500 mt-0.5">Không xù lông, không co rút</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-neutral-950 text-white flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-neutral-950">Đóng Gói Tối Giản</h4>
                        <p class="text-[11px] text-neutral-500 mt-0.5">100% hộp giấy tái chế</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-neutral-950 text-white flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-neutral-950">Đổi Trả 30 Ngày</h4>
                        <p class="text-[11px] text-neutral-500 mt-0.5">Thủ tục nhanh chóng, tận nơi</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-neutral-950 text-white flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-neutral-950">Thanh Toán Linh Hoạt</h4>
                        <p class="text-[11px] text-neutral-500 mt-0.5">COD, Chuyển khoản, Thẻ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Category Selection & Products Grid -->
    <section id="products" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header & Filter Tabs -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-neutral-400">Danh Mục Chọn Lọc</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold font-display uppercase tracking-tight text-neutral-950 mt-1">
                        Áo Tuyển Chọn Cho Bạn
                    </h2>
                </div>

                <!-- Category Pills -->
                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" class="px-4 py-2 rounded-lg bg-neutral-950 text-white text-xs font-semibold uppercase tracking-wider">
                        Tất cả (24)
                    </button>
                    <button type="button" class="px-4 py-2 rounded-lg bg-neutral-100 hover:bg-neutral-200 text-neutral-800 text-xs font-semibold uppercase tracking-wider transition-colors">
                        Áo Thun Basic
                    </button>
                    <button type="button" class="px-4 py-2 rounded-lg bg-neutral-100 hover:bg-neutral-200 text-neutral-800 text-xs font-semibold uppercase tracking-wider transition-colors">
                        Polo Knit
                    </button>
                    <button type="button" class="px-4 py-2 rounded-lg bg-neutral-100 hover:bg-neutral-200 text-neutral-800 text-xs font-semibold uppercase tracking-wider transition-colors">
                        Sơ Mi Oxford
                    </button>
                    <button type="button" class="px-4 py-2 rounded-lg bg-neutral-100 hover:bg-neutral-200 text-neutral-800 text-xs font-semibold uppercase tracking-wider transition-colors">
                        Hoodie
                    </button>
                </div>
            </div>

            <!-- Products 4-Column Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Product 1 -->
                <div class="group flex flex-col">
                    <div class="relative aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200 mb-4">
                        <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=700&q=80" 
                            alt="Signature Heavyweight T-Shirt - Trắng"
                            class="w-full h-full object-cover grayscale contrast-110 group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-neutral-950 text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded">
                            Best Seller
                        </span>
                        <!-- Quick Add Action -->
                        <div class="absolute inset-x-3 bottom-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" class="w-full py-2.5 bg-neutral-950/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-neutral-950 transition-colors shadow-lg">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-neutral-500 uppercase tracking-wider mb-1">
                        <span>Áo Thun Basic</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-white border border-neutral-300"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-950"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-400"></span>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-neutral-950 group-hover:underline">Signature Heavyweight Tee</h3>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-semibold text-neutral-950">390.000₫</span>
                        <span class="text-xs text-neutral-400 line-through">450.000₫</span>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="group flex flex-col">
                    <div class="relative aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200 mb-4">
                        <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&fit=crop&w=700&q=80" 
                            alt="Boxy Minimalist Black T-Shirt"
                            class="w-full h-full object-cover grayscale contrast-115 group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-white text-neutral-950 border border-neutral-200 text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded">
                            Mới
                        </span>
                        <div class="absolute inset-x-3 bottom-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" class="w-full py-2.5 bg-neutral-950/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-neutral-950 transition-colors shadow-lg">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-neutral-500 uppercase tracking-wider mb-1">
                        <span>Áo Thun Oversize</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-950"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-200"></span>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-neutral-950 group-hover:underline">Boxy Fit Raw Charcoal Tee</h3>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-semibold text-neutral-950">420.000₫</span>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="group flex flex-col">
                    <div class="relative aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200 mb-4">
                        <img src="https://images.unsplash.com/photo-1620012253295-c15c429f66bf?auto=format&fit=crop&w=700&q=80" 
                            alt="Polo Knit Cao Cấp"
                            class="w-full h-full object-cover grayscale contrast-110 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-x-3 bottom-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" class="w-full py-2.5 bg-neutral-950/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-neutral-950 transition-colors shadow-lg">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-neutral-500 uppercase tracking-wider mb-1">
                        <span>Polo Knitwear</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-900"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-white border border-neutral-300"></span>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-neutral-950 group-hover:underline">Textured Ribbed Knit Polo</h3>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-semibold text-neutral-950">540.000₫</span>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="group flex flex-col">
                    <div class="relative aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200 mb-4">
                        <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&w=700&q=80" 
                            alt="Sơ Mi Relaxed Oxford"
                            class="w-full h-full object-cover grayscale contrast-110 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-x-3 bottom-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" class="w-full py-2.5 bg-neutral-950/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-neutral-950 transition-colors shadow-lg">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-neutral-500 uppercase tracking-wider mb-1">
                        <span>Sơ Mi & Linen</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-white border border-neutral-300"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-800"></span>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-neutral-950 group-hover:underline">Relaxed Minimalist Oxford Shirt</h3>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-semibold text-neutral-950">490.000₫</span>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="group flex flex-col">
                    <div class="relative aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200 mb-4">
                        <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=700&q=80" 
                            alt="Monochrome Graphic Tee"
                            class="w-full h-full object-cover grayscale contrast-115 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-x-3 bottom-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" class="w-full py-2.5 bg-neutral-950/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-neutral-950 transition-colors shadow-lg">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-neutral-500 uppercase tracking-wider mb-1">
                        <span>Graphic Studio</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-950"></span>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-neutral-950 group-hover:underline">Typography Edition Tee 01</h3>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-semibold text-neutral-950">410.000₫</span>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="group flex flex-col">
                    <div class="relative aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200 mb-4">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?auto=format&fit=crop&w=700&q=80" 
                            alt="Washed Drop-Shoulder Hoodie"
                            class="w-full h-full object-cover grayscale contrast-110 group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-neutral-950 text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded">
                            Thu Đông
                        </span>
                        <div class="absolute inset-x-3 bottom-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" class="w-full py-2.5 bg-neutral-950/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-neutral-950 transition-colors shadow-lg">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-neutral-500 uppercase tracking-wider mb-1">
                        <span>Hoodie & Áo Khoác</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-900"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-300"></span>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-neutral-950 group-hover:underline">Washed Drop-Shoulder Hoodie</h3>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-semibold text-neutral-950">690.000₫</span>
                    </div>
                </div>

                <!-- Product 7 -->
                <div class="group flex flex-col">
                    <div class="relative aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200 mb-4">
                        <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?auto=format&fit=crop&w=700&q=80" 
                            alt="Linen Camp Collar Shirt"
                            class="w-full h-full object-cover grayscale contrast-110 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-x-3 bottom-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" class="w-full py-2.5 bg-neutral-950/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-neutral-950 transition-colors shadow-lg">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-neutral-500 uppercase tracking-wider mb-1">
                        <span>Sơ Mi & Linen</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-white border border-neutral-300"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-600"></span>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-neutral-950 group-hover:underline">Camp Collar Linen Blend Shirt</h3>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-semibold text-neutral-950">520.000₫</span>
                    </div>
                </div>

                <!-- Product 8 -->
                <div class="group flex flex-col">
                    <div class="relative aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200 mb-4">
                        <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=700&q=80" 
                            alt="Pocket Heavyweight Tee - Đen"
                            class="w-full h-full object-cover grayscale contrast-125 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-x-3 bottom-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" class="w-full py-2.5 bg-neutral-950/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-neutral-950 transition-colors shadow-lg">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-neutral-500 uppercase tracking-wider mb-1">
                        <span>Áo Thun Basic</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-neutral-950"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-white border border-neutral-300"></span>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-neutral-950 group-hover:underline">Minimalist Pocket Tee</h3>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-sm font-semibold text-neutral-950">390.000₫</span>
                    </div>
                </div>

            </div>

            <!-- View More Button -->
            <div class="mt-14 text-center">
                <button type="button" class="inline-flex items-center gap-3 px-8 py-3.5 rounded-lg border border-neutral-950 text-neutral-950 hover:bg-neutral-950 hover:text-white text-xs font-bold uppercase tracking-widest transition-all">
                    <span>Xem tất cả sản phẩm</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>

        </div>
    </section>

    <!-- 7. Lookbook & Editorial Philosophy Bento Grid -->
    <section id="lookbook" class="py-20 bg-neutral-950 text-white border-y border-neutral-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="max-w-2xl mb-12">
                <span class="text-xs uppercase tracking-[0.25em] text-neutral-400 font-semibold">Lookbook Edition 2026</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold font-display uppercase tracking-tight text-white mt-2 leading-tight">
                    Less Is More: <br>Không Màu Mè, Chỉ Có Chất Lượng
                </h2>
                <p class="text-neutral-400 text-sm mt-4 leading-relaxed font-normal">
                    Chúng tôi loại bỏ hoàn toàn những chi tiết thừa thãi để tập trung vào điều quan trọng nhất: Form dáng chuẩn mực, đường may tỉ mỉ và cảm giác êm ái khi tiếp xúc trực tiếp với làn da.
                </p>
            </div>

            <!-- Asymmetrical Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <!-- Bento 1: Large Visual -->
                <div class="md:col-span-8 rounded-2xl overflow-hidden border border-neutral-800 bg-neutral-900 relative aspect-[16/9] group">
                    <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?auto=format&fit=crop&w=1200&q=80"
                        alt="Lookbook 2026 Collection" 
                        class="w-full h-full object-cover grayscale contrast-110 group-hover:scale-105 transition-transform duration-700 opacity-80">
                    <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/20 to-transparent flex flex-col justify-end p-8">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-neutral-400">Concept 01 / Monolith</span>
                        <h3 class="text-2xl font-bold font-display uppercase tracking-wide mt-1">Đường nét góc cạnh, tối giản trong từng chuyển động</h3>
                    </div>
                </div>

                <!-- Bento 2: Craftsmanship Detail -->
                <div class="md:col-span-4 rounded-2xl border border-neutral-800 bg-neutral-900/60 p-8 flex flex-col justify-between">
                    <div>
                        <span class="w-9 h-9 rounded-lg bg-white text-neutral-950 font-bold flex items-center justify-center text-sm font-display mb-6">
                            01
                        </span>
                        <h4 class="text-lg font-bold font-display uppercase tracking-wide">Cotton Compact 280GSM</h4>
                        <p class="text-xs text-neutral-400 mt-3 leading-relaxed">
                            Sợi bông dài được chải kỹ, loại bỏ hoàn toàn xơ ngắn giúp bề mặt vải mịn lì, đanh chắc và giữ form sau hàng chục lần giặt.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-neutral-800">
                        <span class="text-[11px] uppercase tracking-widest text-neutral-400 font-semibold">Độ bền form: 99.8%</span>
                    </div>
                </div>

                <!-- Bento 3: Minimal Silhouette -->
                <div class="md:col-span-4 rounded-2xl border border-neutral-800 bg-neutral-900/60 p-8 flex flex-col justify-between">
                    <div>
                        <span class="w-9 h-9 rounded-lg bg-white text-neutral-950 font-bold flex items-center justify-center text-sm font-display mb-6">
                            02
                        </span>
                        <h4 class="text-lg font-bold font-display uppercase tracking-wide">Form Dáng Drop-Shoulder</h4>
                        <p class="text-xs text-neutral-400 mt-3 leading-relaxed">
                            Cầu vai hạ nhẹ kết hợp bo cổ dệt 2 lớp chống dão, tạo vẻ ngoài phóng khoáng, trẻ trung nhưng vẫn giữ nét lịch lãm.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-neutral-800">
                        <span class="text-[11px] uppercase tracking-widest text-neutral-400 font-semibold">Fit: Relaxed & Oversized</span>
                    </div>
                </div>

                <!-- Bento 4: Visual Accent -->
                <div class="md:col-span-8 rounded-2xl overflow-hidden border border-neutral-800 bg-neutral-900 relative aspect-[16/9] md:aspect-auto group">
                    <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=1200&q=80"
                        alt="Minimal Texture Detail" 
                        class="w-full h-full object-cover grayscale contrast-125 group-hover:scale-105 transition-transform duration-700 opacity-70">
                    <div class="absolute inset-0 bg-neutral-950/40 p-8 flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-widest text-neutral-300">Cam Kết Chất Lượng</span>
                            <h3 class="text-xl sm:text-2xl font-bold font-display uppercase tracking-wide mt-1">Trải nghiệm phong cách thời trang bền vững</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 8. Newsletter Subscription (Club MY CLOTHES) -->
    <section class="py-16 bg-white border-b border-neutral-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-xs font-bold uppercase tracking-widest text-neutral-400">Exclusive Perks</span>
            <h2 class="text-2xl sm:text-4xl font-extrabold font-display uppercase tracking-tight text-neutral-950 mt-1 mb-3">
                Gia Nhập MY CLOTHES CLUB
            </h2>
            <p class="text-xs sm:text-sm text-neutral-600 max-w-md mx-auto mb-8">
                Đăng ký nhận thông báo về các đợt phát hành áo giới hạn và nhận ngay mã giảm giá <strong class="text-neutral-950 font-bold">15%</strong> cho đơn hàng đầu tiên.
            </p>

            <form action="#" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto" onsubmit="event.preventDefault(); alert('Cảm ơn bạn đã đăng ký!');">
                <input type="email" required placeholder="Nhập địa chỉ email của bạn..."
                    class="flex-1 px-4 py-3 text-xs text-neutral-900 placeholder:text-neutral-400 bg-neutral-50 rounded-lg border border-neutral-300 focus:bg-white focus:outline-none focus:border-neutral-950 transition-all">
                <button type="submit" class="px-6 py-3 bg-neutral-950 hover:bg-neutral-800 text-white text-xs font-bold uppercase tracking-widest rounded-lg transition-colors cursor-pointer shrink-0">
                    Đăng Ký
                </button>
            </form>
            <p class="text-[10px] text-neutral-400 uppercase tracking-widest mt-3">Không spam • Hủy đăng ký bất cứ lúc nào</p>
        </div>
    </section>

    <!-- 9. Modern Minimalist Footer -->
    <footer class="bg-neutral-950 text-neutral-400 text-xs py-16 border-t border-neutral-900 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 pb-12 border-b border-neutral-800/80">
                
                <!-- Brand Bio -->
                <div class="md:col-span-4">
                    <div class="inline-flex items-center gap-3 mb-4">
                        <span class="w-8 h-8 rounded-lg bg-white text-neutral-950 font-bold flex items-center justify-center text-sm font-display">
                            MC
                        </span>
                        <span class="text-lg font-bold tracking-widest text-white font-display uppercase">
                            MY CLOTHES
                        </span>
                    </div>
                    <p class="text-neutral-400 text-xs leading-relaxed max-w-sm mb-6">
                        Thương hiệu thời trang tối giản hướng đến chất lượng bền vững và cảm xúc tinh tế của người mặc. Được thiết kế và hoàn thiện tại Việt Nam.
                    </p>
                    <div class="flex items-center gap-4 text-white">
                        <a href="#" class="w-8 h-8 rounded-full border border-neutral-800 flex items-center justify-center hover:border-white transition-colors">
                            <span class="text-xs font-bold">IG</span>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full border border-neutral-800 flex items-center justify-center hover:border-white transition-colors">
                            <span class="text-xs font-bold">FB</span>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full border border-neutral-800 flex items-center justify-center hover:border-white transition-colors">
                            <span class="text-xs font-bold">TT</span>
                        </a>
                    </div>
                </div>

                <!-- Footer Nav 1 -->
                <div class="md:col-span-2">
                    <h5 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Sản Phẩm</h5>
                    <ul class="space-y-2.5">
                        <li><a href="#products" class="hover:text-white transition-colors">Áo Thun Basic</a></li>
                        <li><a href="#products" class="hover:text-white transition-colors">Áo Thun Oversize</a></li>
                        <li><a href="#products" class="hover:text-white transition-colors">Áo Polo Dệt Kim</a></li>
                        <li><a href="#products" class="hover:text-white transition-colors">Sơ Mi & Linen</a></li>
                        <li><a href="#products" class="hover:text-white transition-colors">Hoodie & Sweatshirt</a></li>
                    </ul>
                </div>

                <!-- Footer Nav 2 -->
                <div class="md:col-span-3">
                    <h5 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Hỗ Trợ Khách Hàng</h5>
                    <ul class="space-y-2.5">
                        <li><a href="#" class="hover:text-white transition-colors">Hướng dẫn chọn size chuẩn</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Chính sách vận chuyển toàn quốc</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Chính sách đổi trả 30 ngày</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kiểm tra tình trạng đơn hàng</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Câu hỏi thường gặp (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Footer Nav 3: Showroom & Contact -->
                <div class="md:col-span-3">
                    <h5 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Studio Store</h5>
                    <p class="text-neutral-400 text-xs leading-relaxed mb-2">
                        128 Đường Thời Trang, Quận 1, TP. Hồ Chí Minh
                    </p>
                    <p class="text-neutral-400 text-xs mb-1">Hotline: 1900 8888 (9:00 - 21:00)</p>
                    <p class="text-neutral-400 text-xs">Email: contact@myclothes.vn</p>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-neutral-500">
                <p>© {{ date('Y') }} MY CLOTHES Studio. All rights reserved.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-white transition-colors">Điều khoản dịch vụ</a>
                    <a href="#" class="hover:text-white transition-colors">Chính sách bảo mật</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
