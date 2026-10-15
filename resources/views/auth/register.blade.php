<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký tài khoản — MY CLOTHES</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback Tailwind CSS qua CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body class="h-full bg-neutral-100 text-neutral-900 antialiased selection:bg-neutral-900 selection:text-white">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <!-- Main Container -->
        <div
            class="sm:mx-auto sm:w-full sm:max-w-[1000px] bg-white shadow-2xl rounded-2xl overflow-hidden border border-neutral-200/80">
            <div class="grid grid-cols-1 lg:grid-cols-12 min-h-[640px]">

                <!-- Left Column: Editorial Brand Showcase (Desktop) -->
                <div
                    class="hidden lg:flex lg:col-span-5 bg-neutral-950 text-white p-10 flex-col justify-between relative overflow-hidden">
                    <!-- Subtle geometric backdrop accent -->
                    <div
                        class="absolute -right-16 -top-16 w-64 h-64 rounded-full border border-neutral-800/60 pointer-events-none">
                    </div>
                    <div
                        class="absolute -left-20 -bottom-20 w-80 h-80 rounded-full border border-neutral-800/40 pointer-events-none">
                    </div>
                    <div
                        class="absolute inset-0 bg-radial-[at_top_right] from-neutral-900/50 via-transparent to-transparent pointer-events-none">
                    </div>

                    <!-- Brand Top -->
                    <div class="relative z-10">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group">
                            <span
                                class="w-9 h-9 rounded-lg bg-white text-black font-bold flex items-center justify-center text-lg tracking-tighter group-hover:scale-105 transition-transform">
                                MC
                            </span>
                            <span class="text-xl font-semibold tracking-widest uppercase">
                                MY CLOTHES
                            </span>
                        </a>
                        <p class="mt-2 text-xs uppercase tracking-widest text-neutral-400 font-medium">
                            Contemporary Fashion & Lifestyle
                        </p>
                    </div>

                    <!-- Editorial Quote / Aesthetic Message -->
                    <div class="relative z-10 my-auto py-8">
                        <span
                            class="inline-block px-3 py-1 text-[11px] font-semibold uppercase tracking-widest rounded-full bg-neutral-900 text-neutral-300 border border-neutral-800 mb-6">
                            Đặc quyền thành viên
                        </span>
                        <blockquote class="text-2xl font-light leading-snug tracking-tight text-neutral-100">
                            “Khám phá phong cách độc bản cùng những thiết kế may đo đương đại.”
                        </blockquote>
                        <p class="mt-4 text-xs tracking-wider text-neutral-400 uppercase font-mono">
                            — Create Your Identity
                        </p>
                    </div>

                    <!-- Bottom Status / Guarantees -->
                    <div
                        class="relative z-10 pt-6 border-t border-neutral-800/80 flex items-center justify-between text-xs text-neutral-400">
                        <span class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Bảo mật thông tin SSL 256-bit
                        </span>
                        <span>© 2026 MY CLOTHES</span>
                    </div>
                </div>

                <!-- Right Column: Register Form -->
                <div class="lg:col-span-7 p-8 sm:p-12 lg:p-14 flex flex-col justify-center bg-white">
                    <!-- Mobile Brand Header (Visible on small screens) -->
                    <div class="lg:hidden flex items-center justify-between pb-6 mb-6 border-b border-neutral-100">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5">
                            <span
                                class="w-8 h-8 rounded-md bg-neutral-950 text-white font-bold flex items-center justify-center text-sm tracking-tighter">
                                MC
                            </span>
                            <span class="text-lg font-bold tracking-wider uppercase text-neutral-950">
                                MY CLOTHES
                            </span>
                        </a>
                        <span class="text-xs uppercase tracking-wider text-neutral-500 font-medium">
                            Đăng ký
                        </span>
                    </div>

                    <div class="max-w-md w-full mx-auto">
                        <!-- Heading -->
                        <div class="mb-8">
                            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-950">
                                Đăng ký tài khoản
                            </h1>
                            <p class="mt-2 text-sm text-neutral-500">
                                Tạo tài khoản thành viên để tận hưởng trải nghiệm mua sắm độc quyền.
                            </p>
                        </div>

                        <!-- Session / Error Alerts -->
                        @if (session('status'))
                            <div
                                class="mb-5 p-3.5 rounded-lg bg-neutral-50 border border-neutral-200 text-xs font-medium text-neutral-800 flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-neutral-700 shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ session('status') }}</span>
                            </div>
                        @endif

                        @if (isset($errors) && $errors->any())
                            <div
                                class="mb-5 p-3.5 rounded-lg bg-neutral-50 border border-neutral-900 text-xs text-neutral-900">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form -->
                        <form method="POST" action="{{ route('register') }}" class="space-y-5" novalidate>
                            @csrf

                            <!-- Name Input -->
                            <div>
                                <label for="name"
                                    class="block text-xs font-semibold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Họ và tên
                                </label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        required autocomplete="name" placeholder="Nguyễn Văn A"
                                        class="block w-full pl-10 pr-3.5 py-3 text-sm text-neutral-900 placeholder:text-neutral-400 bg-neutral-50/60 hover:bg-neutral-50 rounded-lg border border-neutral-300 focus:bg-white focus:outline-none focus:border-neutral-950 focus:ring-1 focus:ring-neutral-950 transition-all duration-150">
                                </div>
                                @error('name')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div>
                                <label for="email"
                                    class="block text-xs font-semibold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Địa chỉ Email
                                </label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        required autocomplete="email" placeholder="tenban@domain.com"
                                        class="block w-full pl-10 pr-3.5 py-3 text-sm text-neutral-900 placeholder:text-neutral-400 bg-neutral-50/60 hover:bg-neutral-50 rounded-lg border border-neutral-300 focus:bg-white focus:outline-none focus:border-neutral-950 focus:ring-1 focus:ring-neutral-950 transition-all duration-150">
                                </div>
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div>
                                <label for="password"
                                    class="block text-xs font-semibold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Mật khẩu
                                </label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input type="password" id="password" name="password" required
                                        autocomplete="new-password" placeholder="Tối thiểu 8 ký tự"
                                        class="block w-full pl-10 pr-10 py-3 text-sm text-neutral-900 placeholder:text-neutral-400 bg-neutral-50/60 hover:bg-neutral-50 rounded-lg border border-neutral-300 focus:bg-white focus:outline-none focus:border-neutral-950 focus:ring-1 focus:ring-neutral-950 transition-all duration-150">
                                    <!-- Toggle Password Visibility -->
                                    <button type="button" id="toggle-password" aria-label="Hiện hoặc ẩn mật khẩu"
                                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-neutral-400 hover:text-neutral-700 transition-colors cursor-pointer">
                                        <!-- Eye open -->
                                        <svg id="eye-open" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <!-- Eye closed -->
                                        <svg id="eye-closed" class="w-4 h-4 hidden" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Terms & Privacy Agreement -->
                            <div class="flex items-start">
                                <label class="relative flex items-start gap-2.5 cursor-pointer select-none">
                                    <input type="checkbox" name="terms" id="terms" required
                                        class="mt-0.5 w-4 h-4 rounded border-neutral-300 text-neutral-950 focus:ring-neutral-950 focus:ring-offset-0 cursor-pointer accent-neutral-950">
                                    <span class="text-xs text-neutral-600 leading-snug">
                                        Tôi đồng ý với <a href="#terms"
                                            class="font-medium text-neutral-950 hover:underline">Điều khoản dịch vụ</a>
                                        và <a href="#privacy"
                                            class="font-medium text-neutral-950 hover:underline">Chính sách bảo mật</a>
                                    </span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-lg bg-neutral-950 hover:bg-neutral-800 text-white text-sm font-semibold tracking-wider uppercase transition-all duration-200 shadow-md active:scale-[0.99] cursor-pointer">
                                <span>Tạo tài khoản</span>
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="relative my-7">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-neutral-200"></div>
                            </div>
                            <div class="relative flex justify-center text-xs uppercase tracking-wider">
                                <span class="bg-white px-3 text-neutral-400 font-medium">Hoặc tiếp tục với</span>
                            </div>
                        </div>

                        <!-- Social Register (Google & Apple) -->
                        <div class="grid grid-cols-2 gap-3">
                            <!-- Google Button -->
                            <a href="#google"
                                class="flex items-center justify-center gap-2 py-2.5 px-4 rounded-lg border border-neutral-300 hover:border-neutral-900 bg-white hover:bg-neutral-50 text-xs font-semibold text-neutral-800 transition-all duration-150">
                                <svg class="w-4 h-4" viewBox="0 0 24 24">
                                    <path fill="#4285F4"
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                    <path fill="#34A853"
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                    <path fill="#FBBC05"
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                                    <path fill="#EA4335"
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                                </svg>
                                <span>Google</span>
                            </a>

                            <!-- Apple Button -->
                            <a href="#apple"
                                class="flex items-center justify-center gap-2 py-2.5 px-4 rounded-lg border border-neutral-300 hover:border-neutral-900 bg-white hover:bg-neutral-50 text-xs font-semibold text-neutral-800 transition-all duration-150">
                                <svg class="w-4 h-4 fill-current text-neutral-950" viewBox="0 0 170 170">
                                    <path
                                        d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.69-3.08-7.7-7.94-12.04-14.57-6.06-9.33-10.82-20.08-14.28-32.26-3.46-12.18-5.19-23.75-5.19-34.72 0-14.88 3.73-27.17 11.19-36.88 7.46-9.71 16.94-14.67 28.44-14.88 4.92 0 10.45 1.25 16.6 3.75 6.15 2.5 10.15 3.81 12.01 3.93 1.63 0 5.86-1.42 12.69-4.27 6.83-2.85 12.63-4.14 17.41-3.86 13.48.81 24.08 5.76 31.8 14.85-11.95 7.24-17.79 17.2-17.52 29.89.28 9.94 4.09 18.23 11.44 24.88 7.35 6.64 16.03 10.43 26.04 11.36-2.58 7.82-5.74 15.34-9.48 22.56zM119.22 33.09c0-7.38 2.65-14.28 7.95-20.69 5.3-6.42 11.83-10.59 19.59-12.52.12 1.07.18 1.99.18 2.76 0 7.37-2.82 14.44-8.46 21.2-5.64 6.76-12.37 10.74-20.19 11.95-.27-.9-.45-1.55-.54-1.94-.36-1.74-.53-2.87-.53-3.76z" />
                                </svg>
                                <span>Apple</span>
                            </a>
                        </div>

                        <!-- Login Redirect -->
                        <div class="mt-8 pt-6 border-t border-neutral-100 text-center">
                            <p class="text-sm text-neutral-600">
                                Đã có tài khoản?
                                <a href="{{ route('getLogin') }}"
                                    class="font-semibold text-neutral-950 hover:underline tracking-tight transition-colors ml-1">
                                    Đăng nhập ngay
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Minimal Footnote -->
        <div class="mt-8 text-center text-xs text-neutral-400">
            <p>MY CLOTHES — Tối giản, Đẳng cấp và Trường tồn</p>
        </div>
    </div>

    <!-- Toggle Password Visibility Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function() {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    eyeOpen.classList.toggle('hidden', isPassword);
                    eyeClosed.classList.toggle('hidden', !isPassword);
                });
            }
        });
    </script>
</body>

</html>
