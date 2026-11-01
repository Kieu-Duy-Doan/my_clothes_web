<!DOCTYPE html>
<html lang="vi" class="h-full bg-neutral-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Bảng Điều Khiển Quản Trị — MY CLOTHES')</title>

    <!-- Google Fonts: Plus Jakarta Sans, Syne, JetBrains Mono -->
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

        /* Print optimization */
        @media print {
            aside,
            header,
            footer,
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

    @stack('styles')
</head>

<body
    class="h-full bg-neutral-950 text-neutral-100 antialiased flex flex-col md:flex-row min-h-screen selection:bg-white selection:text-black">

    <!-- 1. SIDEBAR (Monochrome Minimalist) -->
    @include('admins.layouts.sidebar')

    <!-- 2. MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto admin-grid-bg">

        <!-- Top Header Bar -->
        @include('admins.layouts.header')

        <!-- Page Body Content -->
        <div class="p-6 lg:p-10 space-y-8 flex-1">

            <!-- Flash Alert Message -->
            @if (session('success'))
                <div
                    class="p-4 rounded-xl bg-white text-black text-xs font-medium flex items-center justify-between shadow-xl">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-black"></span>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()"
                        class="text-neutral-500 hover:text-black text-base leading-none cursor-pointer">&times;</button>
                </div>
            @endif

            @if (session('error'))
                <div
                    class="p-4 rounded-xl border border-red-900/60 bg-red-950/30 text-red-200 text-xs font-medium flex items-center justify-between shadow-xl">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-red-400"></span>
                        <span class="font-semibold">{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()"
                        class="text-red-400 hover:text-white text-base leading-none cursor-pointer">&times;</button>
                </div>
            @endif

            @yield('content')

        </div>

        <!-- Footer -->
        @include('admins.layouts.footer')

    </main>

    @stack('modals')
    @stack('scripts')

</body>

</html>
