<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-black">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Hệ thống Quản trị — MY CLOTHES ADMIN</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
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

        .font-mono-code {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Subtle technical grid background */
        .admin-grid-bg {
            background-color: #050505;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Vignette effect */
        .admin-vignette {
            background: radial-gradient(circle at 50% 50%, transparent 20%, rgba(0, 0, 0, 0.85) 100%);
        }

        /* Custom monochrome input focus */
        .admin-input:focus {
            outline: none;
            border-color: #ffffff;
            box-shadow: 0 0 0 1px #ffffff, 0 0 20px rgba(255, 255, 255, 0.15);
        }
    </style>
</head>

<body
    class="h-full text-neutral-100 antialiased selection:bg-white selection:text-black admin-grid-bg relative overflow-x-hidden flex flex-col justify-between min-h-screen">
    <!-- Vignette Overlay -->
    <div class="pointer-events-none fixed inset-0 admin-vignette z-0"></div>

    <!-- Top Technical Header / Status Ribbon -->
    <header class="relative z-10 w-full border-b border-neutral-900 bg-black/60 backdrop-blur-md px-6 py-3.5">
        <div class="max-w-7xl mx-auto flex items-center justify-between text-xs font-mono-code">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center justify-center w-2 h-2 rounded-full bg-white animate-ping"></span>
                <span class="text-neutral-400 uppercase tracking-widest text-[11px]">System Status: <span
                        class="text-white font-medium">Secured / Active</span></span>
                <span class="hidden sm:inline-block text-neutral-700">|</span>
                <span class="hidden sm:inline-block text-neutral-500 uppercase tracking-wider text-[11px]">Node:
                    AP-SOUTHEAST-1</span>
            </div>

            <div class="flex items-center gap-4 text-neutral-400 text-[11px]">
                <span id="live-clock" class="text-neutral-300 tracking-wider">--:--:-- UTC</span>
                <span class="text-neutral-700">|</span>
                <span
                    class="px-2 py-0.5 rounded border border-neutral-800 bg-neutral-900 text-neutral-300 uppercase tracking-widest text-[10px]">
                    v2.6.0
                </span>
            </div>
        </div>
    </header>

    <!-- Center Main Content -->
    <main class="relative z-10 flex-1 flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">

            <!-- Administration Gate Card -->
            <div
                class="relative bg-neutral-950/90 border border-neutral-800/90 rounded-2xl p-8 sm:p-10 shadow-2xl backdrop-blur-xl">
                <!-- Corner Technical Accents -->
                <div
                    class="absolute -top-[1px] -left-[1px] w-4 h-4 border-t-2 border-l-2 border-white pointer-events-none">
                </div>
                <div
                    class="absolute -bottom-[1px] -right-[1px] w-4 h-4 border-b-2 border-r-2 border-white pointer-events-none">
                </div>

                <!-- Brand / Gateway Header -->
                <div class="text-center mb-8">
                    <div
                        class="inline-flex items-center justify-center w-14 h-14 rounded-xl border border-neutral-800 bg-neutral-900/90 mb-4 shadow-inner">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>

                    <div
                        class="inline-block px-2.5 py-1 rounded bg-neutral-900 border border-neutral-800 text-[10px] font-mono-code uppercase tracking-[0.2em] text-neutral-400 mb-2">
                        Portal Quản Trị Hệ Thống
                    </div>

                    <h1 class="text-2xl font-bold tracking-tight text-white uppercase">
                        My Clothes Control Center
                    </h1>
                    <p class="mt-1.5 text-xs text-neutral-400">
                        Vui lòng nhập thông tin xác thực để truy cập bảng điều khiển
                    </p>
                </div>

                <!-- Flash / Session Alert -->
                @if (session('status'))
                    <div
                        class="mb-6 p-3.5 rounded-lg bg-neutral-900 border border-neutral-700 text-xs text-neutral-200 flex items-center gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div
                        class="mb-6 p-3.5 rounded-lg bg-neutral-900 border border-neutral-700 text-xs text-neutral-200 flex items-start gap-3">
                        <svg class="w-4 h-4 text-white shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Form: Only 2 fields (Email & Password) -->
                <form id="admin-login-form" action="{{ route('admin.login') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- FIELD 1: Email -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="email"
                                class="text-xs font-mono-code uppercase tracking-wider text-neutral-300 flex items-center gap-1.5">
                                <span class="text-neutral-500">[01]</span> Email Quản Trị
                            </label>
                            <span class="text-[10px] font-mono-code text-neutral-500">REQUIRED</span>
                        </div>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" required autofocus autocomplete="email"
                                value="{{ old('email') }}" placeholder="admin@myclothes.com"
                                class="admin-input w-full pl-10 pr-4 py-3 bg-neutral-900/90 border border-neutral-800 rounded-lg text-sm text-white placeholder-neutral-600 transition-all duration-200">
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-xs font-mono-code text-neutral-300 flex items-center gap-1">
                                <span class="text-white">✕</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- FIELD 2: Password -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password"
                                class="text-xs font-mono-code uppercase tracking-wider text-neutral-300 flex items-center gap-1.5">
                                <span class="text-neutral-500">[02]</span> Mật Khẩu
                            </label>
                            <span class="text-[10px] font-mono-code text-neutral-500">ENCRYPTED</span>
                        </div>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" required
                                autocomplete="current-password" placeholder="••••••••••••"
                                class="admin-input w-full pl-10 pr-11 py-3 bg-neutral-900/90 border border-neutral-800 rounded-lg text-sm text-white placeholder-neutral-600 transition-all duration-200">
                            <!-- Show/Hide Password Toggle -->
                            <button type="button" id="toggle-password" aria-label="Hiện hoặc ẩn mật khẩu"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-neutral-500 hover:text-white transition-colors cursor-pointer">
                                <svg id="eye-icon" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eye-slash-icon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs font-mono-code text-neutral-300 flex items-center gap-1">
                                <span class="text-white">✕</span> {{ $message }}
                            </p>
                        @enderror

                        <!-- Caps Lock Warning -->
                        <div id="caps-warning"
                            class="hidden mt-2 p-2 rounded bg-neutral-900 border border-neutral-700 text-[11px] font-mono-code text-neutral-300 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                            <span>CẢNH BÁO: Phím Caps Lock đang bật</span>
                        </div>
                    </div>

                    <!-- Remember & Security Options -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input type="checkbox" name="remember" id="remember"
                                class="w-4 h-4 rounded border-neutral-800 bg-neutral-900 text-white focus:ring-0 focus:ring-offset-0 accent-white cursor-pointer">
                            <span class="text-neutral-400 hover:text-neutral-300">Duy trì phiên đăng nhập</span>
                        </label>

                        <span class="text-[11px] font-mono-code text-neutral-500">2FA ENABLED</span>
                    </div>

                    <!-- Submit Button: Stark High-Contrast Monochrome -->
                    <div class="pt-2">
                        <button type="submit" id="submit-btn"
                            class="w-full py-3.5 px-4 bg-white text-black hover:bg-neutral-200 active:bg-neutral-300 rounded-lg text-xs font-bold uppercase tracking-[0.15em] transition-all duration-150 flex items-center justify-center gap-2 shadow-lg hover:shadow-white/10 cursor-pointer">
                            <span id="btn-text" class="flex items-center gap-2">
                                <span>Xác thực & Đăng nhập</span>
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                            <span id="btn-spinner" class="hidden items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-black" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                                <span>Đang xác thực...</span>
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Technical Footer of Card -->
                <div
                    class="mt-8 pt-6 border-t border-neutral-900 flex items-center justify-between text-[11px] font-mono-code text-neutral-500">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-neutral-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        AES-256 GCM
                    </span>
                    <span>ENTER ↵ TO SUBMIT</span>
                </div>
            </div>

            <!-- Back to user site link -->
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center gap-2 text-xs font-mono-code text-neutral-500 hover:text-white transition-colors duration-150">
                    <span>←</span>
                    <span class="underline underline-offset-4">Quay lại cửa hàng MY CLOTHES</span>
                </a>
            </div>

        </div>
    </main>

    <!-- Bottom System Footer -->
    <footer class="relative z-10 w-full border-t border-neutral-900 bg-black/60 backdrop-blur-md px-6 py-4">
        <div
            class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 text-xs font-mono-code text-neutral-500">
            <div>
                © {{ date('Y') }} MY CLOTHES INC. BẢO MẬT HỆ THỐNG CẤP ĐỘ QUẢN TRỊ.
            </div>
            <div class="flex items-center gap-4">
                <span>MỌI TRUY CẬP ĐỀU ĐƯỢC GHI NHẬN</span>
                <span class="w-1.5 h-1.5 rounded-full bg-neutral-700"></span>
                <span>SEC-ID: #{{ substr(md5(request()->ip() . date('Y-m-d')), 0, 8) }}</span>
            </div>
        </div>
    </footer>

    <!-- Interactive Scripts: Show/Hide Password, CapsLock, Realtime UTC Clock, Submitting State -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Live Clock
            function updateClock() {
                const now = new Date();
                const clockEl = document.getElementById('live-clock');
                if (clockEl) {
                    clockEl.textContent = now.toTimeString().split(' ')[0] + ' (LOCAL)';
                }
            }
            updateClock();
            setInterval(updateClock, 1000);

            // Password Toggle
            const togglePasswordBtn = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeSlashIcon = document.getElementById('eye-slash-icon');

            if (togglePasswordBtn && passwordInput) {
                togglePasswordBtn.addEventListener('click', function() {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    eyeIcon.classList.toggle('hidden', isPassword);
                    eyeSlashIcon.classList.toggle('hidden', !isPassword);
                });
            }

            // Caps Lock Warning
            const capsWarning = document.getElementById('caps-warning');
            if (passwordInput && capsWarning) {
                passwordInput.addEventListener('keyup', function(e) {
                    if (e.getModifierState && e.getModifierState('CapsLock')) {
                        capsWarning.classList.remove('hidden');
                    } else {
                        capsWarning.classList.add('hidden');
                    }
                });
            }

            // Button Submit State
            const loginForm = document.getElementById('admin-login-form');
            const submitBtn = document.getElementById('submit-btn');
            const btnText = document.getElementById('btn-text');
            const btnSpinner = document.getElementById('btn-spinner');

            if (loginForm && submitBtn) {
                loginForm.addEventListener('submit', function() {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-80', 'cursor-not-allowed');
                    btnText.classList.add('hidden');
                    btnSpinner.classList.remove('hidden');
                    btnSpinner.classList.add('flex');
                });
            }
        });
    </script>
</body>

</html>
