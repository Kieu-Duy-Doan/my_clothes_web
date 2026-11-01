<!-- Top Header Bar -->
<header
    class="h-16 px-6 lg:px-10 border-b border-neutral-900 bg-black/60 backdrop-blur-md sticky top-0 z-20 flex items-center justify-between no-print">
    @hasSection('header')
        @yield('header')
    @else
        <!-- Default Breadcrumbs / Title -->
        <div class="flex items-center gap-3">
            @hasSection('breadcrumbs')
                @yield('breadcrumbs')
            @else
                <span class="text-neutral-500 text-xs font-mono-code">Quản trị</span>
                <span class="text-neutral-700 text-xs font-mono-code">/</span>
                <h1 class="text-sm font-bold font-display uppercase tracking-wider text-white">
                    @yield('header_title', 'MY CLOTHES ADMIN')
                </h1>
            @endif
        </div>

        <!-- Default or Custom Quick Actions -->
        <div class="flex items-center gap-3">
            @hasSection('header_actions')
                @yield('header_actions')
            @else
                <span class="text-xs font-mono-code text-neutral-400 hidden md:inline">
                    {{ date('d/m/Y') }} • {{ date('H:i') }}
                </span>
                <a href="{{ Route::has('home') ? route('home') : '/' }}" target="_blank"
                    class="px-3 py-1.5 rounded-lg border border-neutral-800 hover:border-neutral-700 bg-neutral-900 text-neutral-200 text-xs font-medium transition-colors inline-flex items-center gap-2">
                    <span>Ghé cửa hàng</span>
                    <svg class="w-3.5 h-3.5 text-neutral-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            @endif
        </div>
    @endif
</header>

