<!-- 1. SIDEBAR (Monochrome Minimalist) -->
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

        <!-- Tổng quan (Dashboard) -->
        <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : '/admin/dashboard' }}"
            class="flex items-center justify-between px-3 py-2.5 rounded-lg text-xs tracking-wider transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-white text-black font-bold uppercase shadow-sm' : 'text-neutral-400 hover:text-white hover:bg-neutral-900 font-medium' }}">
            <div class="flex items-center gap-3">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-black' : 'text-neutral-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span>Tổng quan</span>
            </div>
        </a>

        <p class="px-3 pt-5 text-[10px] uppercase font-bold tracking-widest text-neutral-500 mb-2 font-mono-code">
            Quản lý kho thời trang
        </p>

        <!-- Sản phẩm (Shirts) -->
        <a href="{{ Route::has('admin.shirt.index') ? route('admin.shirt.index') : '/admin/shirts/index' }}"
            class="flex items-center justify-between px-3 py-2.5 rounded-lg text-xs tracking-wider transition-all {{ request()->routeIs('admin.shirt.*') ? 'bg-white text-black font-bold uppercase shadow-sm' : 'text-neutral-400 hover:text-white hover:bg-neutral-900 font-medium' }}">
            <div class="flex items-center gap-3">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.shirt.*') ? 'text-black' : 'text-neutral-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>Sản phẩm (Shirts)</span>
            </div>
            @php
                $shirtCountDisplay = $totalShirts ?? (isset($shirts) ? (is_countable($shirts) ? count($shirts) : (method_exists($shirts, 'total') ? $shirts->total() : null)) : null);
            @endphp
            @if ($shirtCountDisplay !== null)
                <span
                    class="text-[10px] font-mono-code px-1.5 py-0.5 rounded {{ request()->routeIs('admin.shirt.*') ? 'bg-black text-white font-bold' : 'bg-neutral-900 text-neutral-400 border border-neutral-800' }}">
                    {{ $shirtCountDisplay }}
                </span>
            @endif
        </a>

        <!-- Giỏ hàng / Đơn -->
        <a href="#"
            class="flex items-center justify-between px-3 py-2.5 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 text-xs font-medium tracking-wider transition-colors">
            <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Giỏ hàng / Đơn</span>
            </div>
            @if (isset($totalCarts))
                <span
                    class="text-[10px] font-mono-code px-1.5 py-0.5 rounded bg-neutral-900 text-neutral-400 border border-neutral-800">
                    {{ $totalCarts }}
                </span>
            @endif
        </a>

        <!-- Khách hàng -->
        <a href="{{ Route::has('admin.user.index') ? route('admin.user.index') : '/admin/users/index' }}"
            class="flex items-center justify-between px-3 py-2.5 rounded-lg text-xs tracking-wider transition-all {{ request()->routeIs('admin.user.*') ? 'bg-white text-black font-bold uppercase shadow-sm' : 'text-neutral-400 hover:text-white hover:bg-neutral-900 font-medium' }}">
            <div class="flex items-center gap-3">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.user.*') ? 'text-black' : 'text-neutral-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span>Khách hàng</span>
            </div>
            @php
                $userCountDisplay = $totalUsers ?? (isset($users) && is_countable($users) ? count($users) : null);
            @endphp
            @if ($userCountDisplay !== null)
                <span
                    class="text-[10px] font-mono-code px-1.5 py-0.5 rounded {{ request()->routeIs('admin.user.*') ? 'bg-black text-white font-bold' : 'bg-neutral-900 text-neutral-400 border border-neutral-800' }}">
                    {{ $userCountDisplay }}
                </span>
            @endif
        </a>

        <!-- Đánh giá & Review -->
        <a href="#"
            class="flex items-center justify-between px-3 py-2.5 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 text-xs font-medium tracking-wider transition-colors">
            <div class="flex items-center gap-3">
                <svg class="w-4 h-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                <span>Đánh giá & Review</span>
            </div>
            @if (isset($totalRates))
                <span
                    class="text-[10px] font-mono-code px-1.5 py-0.5 rounded bg-neutral-900 text-neutral-400 border border-neutral-800">
                    {{ $totalRates }}
                </span>
            @endif
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
                        {{ Auth::user()->role ?? 'admin' }}
                    </p>
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

