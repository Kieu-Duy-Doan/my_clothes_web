@extends('admins.layouts.main')

@section('title', 'Thêm Mới Người Dùng — MY CLOTHES Admin')

@section('header')
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.user.index') }}"
            class="p-2 -ml-2 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 border border-transparent hover:border-neutral-800 transition duration-150"
            title="Quay lại danh sách">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div class="h-5 w-px bg-neutral-800"></div>
        <div class="flex items-center gap-2">
            <span class="text-neutral-500 text-xs font-mono-code">Quản trị</span>
            <span class="text-neutral-700 text-xs font-mono-code">/</span>
            <a href="{{ route('admin.user.index') }}" class="text-neutral-400 hover:text-white text-xs font-mono-code transition-colors">Khách hàng</a>
            <span class="text-neutral-700 text-xs font-mono-code">/</span>
            <h1 class="text-sm font-bold font-display uppercase tracking-wider text-white">
                Thêm mới
            </h1>
        </div>
    </div>

    <!-- Header Quick Actions -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.user.index') }}"
            class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-lg border border-neutral-800 hover:border-neutral-700 bg-neutral-900 text-neutral-300 hover:text-white text-xs font-mono-code transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
            <span>Danh sách</span>
        </a>
    </div>
@endsection

@section('content')
    <div class="max-w-5xl mx-auto space-y-6">

        <!-- Page Heading -->
        <div class="pb-6 border-b border-neutral-900 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-display font-bold tracking-tight text-white">
                    Thêm Mới Người Dùng
                </h1>
                <p class="text-xs text-neutral-400 mt-1 font-mono-code">Khởi tạo tài khoản thành viên hoặc quản trị viên hệ thống</p>
            </div>

            <div class="flex items-center gap-2 text-xs font-mono-code text-neutral-500">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Bảo mật Bcrypt tự động</span>
            </div>
        </div>

        <!-- Global Alert on Errors -->
        @if ($errors->any())
            <div class="p-4 rounded-xl border border-red-900/60 bg-red-950/20 backdrop-blur-sm">
                <div class="flex items-start gap-3">
                    <div class="p-1 rounded-lg bg-red-900/40 text-red-400 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-red-300">Vui lòng kiểm tra lại thông tin nhập:</h3>
                        <ul class="mt-2 space-y-1 text-xs text-red-400/90 list-disc list-inside font-mono-code">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Create User Form -->
        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Left Column: Primary Information (2 cols) -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Basic Account Info Card -->
                    <div class="p-6 rounded-2xl border border-neutral-900 bg-black space-y-5">
                        <h2 class="text-sm font-display font-bold uppercase tracking-wider text-neutral-400 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            Thông Tin Tài Khoản
                        </h2>

                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                Họ và Tên <span class="text-white">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                placeholder="Ví dụ: Nguyễn Văn A"
                                class="w-full px-4 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white placeholder-neutral-600 text-sm focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                Địa chỉ Email <span class="text-white">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </span>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="user@example.com"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white placeholder-neutral-600 text-sm font-mono-code focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 @error('email') border-red-500 @enderror">
                            </div>
                            @error('email')
                                <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                Mật khẩu <span class="text-white">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                                <input type="password" id="password" name="password" required
                                    placeholder="••••••••••••"
                                    class="w-full pl-10 pr-11 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white placeholder-neutral-600 text-sm font-mono-code focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 @error('password') border-red-500 @enderror">
                                <button type="button" onclick="togglePasswordVisibility()"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-neutral-500 hover:text-white cursor-pointer transition-colors">
                                    <svg id="eye-icon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                            @enderror
                            <p class="mt-1.5 text-[11px] text-neutral-500 font-mono-code">Mật khẩu sẽ được mã hóa bằng thuật toán an toàn Bcrypt.</p>
                        </div>
                    </div>

                    <!-- Role & Address Card -->
                    <div class="p-6 rounded-2xl border border-neutral-900 bg-black space-y-5">
                        <h2 class="text-sm font-display font-bold uppercase tracking-wider text-neutral-400 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            Vai Trò & Nơi Cư Trú
                        </h2>

                        <!-- Role Selection -->
                        <div>
                            <label for="role" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                Vai trò người dùng <span class="text-white">*</span>
                            </label>
                            <div class="relative">
                                <select name="role" id="role" required
                                    class="w-full px-4 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white text-sm focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 cursor-pointer font-sans appearance-none @error('role') border-red-500 @enderror">
                                    <option value="user" @selected(old('role', 'user') == 'user')>Khách Hàng (User) — Quyền mua sắm, quản lý đơn hàng cá nhân</option>
                                    <option value="admin" @selected(old('role') == 'admin')>Quản Trị Viên (Admin) — Toàn quyền kiểm soát và vận hành hệ thống</option>
                                </select>
                                <span class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-neutral-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </div>
                            @error('role')
                                <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div>
                            <label for="address" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                Địa chỉ giao hàng / cư trú
                            </label>
                            <textarea id="address" name="address" rows="3"
                                placeholder="Nhập số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành phố..."
                                class="w-full px-4 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white placeholder-neutral-600 text-sm focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 resize-y font-sans @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                <!-- Right Column: Avatar Upload & Actions (1 col) -->
                <div class="space-y-6">

                    <!-- Avatar Upload Card -->
                    <div class="p-6 rounded-2xl border border-neutral-900 bg-black space-y-4">
                        <h2 class="text-sm font-display font-bold uppercase tracking-wider text-neutral-400 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            Ảnh Đại Diện (Avatar)
                        </h2>

                        <!-- Avatar Preview Frame -->
                        <div class="flex flex-col items-center justify-center pt-2 pb-4">
                            <div class="relative w-32 h-32 rounded-full overflow-hidden border-2 border-neutral-800 bg-neutral-950 flex items-center justify-center group shadow-xl">
                                <img id="avatarPreview" src="" alt="Avatar Preview" class="hidden w-full h-full object-cover">
                                
                                <div id="avatarPlaceholder" class="flex flex-col items-center justify-center text-neutral-600 p-2 text-center">
                                    <svg class="w-12 h-12 stroke-1 text-neutral-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-[10px] font-mono-code uppercase text-neutral-500 mt-1">Chưa có ảnh</span>
                                </div>
                            </div>

                            <p id="avatarFileName" class="text-xs text-neutral-300 font-mono-code mt-3 truncate max-w-full text-center hidden"></p>
                        </div>

                        <!-- File Input & Dropzone -->
                        <div id="avatarDropzone"
                            class="border border-dashed border-neutral-800 hover:border-neutral-600 rounded-xl p-4 text-center cursor-pointer transition-all bg-neutral-950 hover:bg-neutral-900/60 group">
                            <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg, image/webp"
                                onchange="previewAvatar(event)" class="hidden">
                            <div class="space-y-1">
                                <svg class="w-6 h-6 mx-auto text-neutral-500 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-xs text-neutral-300 font-medium group-hover:text-white">
                                    <span class="underline">Bấm để tải ảnh lên</span>
                                </p>
                                <p class="text-[10px] text-neutral-500 font-mono-code">PNG, JPG, WEBP (Tối đa 5MB)</p>
                            </div>
                        </div>

                        <div id="btnRemoveAvatarWrapper" class="hidden text-center pt-1">
                            <button type="button" onclick="removeAvatar()"
                                class="text-xs text-red-400 hover:text-red-300 font-mono-code underline cursor-pointer">
                                Xóa ảnh đã chọn
                            </button>
                        </div>

                        @error('avatar')
                            <p class="text-xs text-red-400 font-mono-code">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons Card -->
                    <div class="p-6 rounded-2xl border border-neutral-900 bg-black space-y-3">
                        <button type="submit"
                            class="w-full py-3.5 px-4 bg-white hover:bg-neutral-200 text-black font-display font-bold text-sm rounded-xl transition duration-200 flex items-center justify-center gap-2 shadow-lg shadow-white/5 active:scale-[0.99] cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Thêm Mới Người Dùng</span>
                        </button>

                        <a href="{{ route('admin.user.index') }}"
                            class="w-full py-3 px-4 bg-transparent hover:bg-neutral-900 text-neutral-400 hover:text-white border border-neutral-800 hover:border-neutral-700 font-display font-semibold text-xs rounded-xl transition duration-150 flex items-center justify-center">
                            Hủy bỏ & Quay lại
                        </a>
                    </div>

                    <!-- Security Note Box -->
                    <div class="p-4 rounded-xl border border-neutral-900 bg-neutral-950 text-xs font-mono-code text-neutral-500 space-y-2">
                        <div class="flex items-center gap-2 text-neutral-400 font-bold">
                            <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Ghi Chú Phân Quyền</span>
                        </div>
                        <p class="text-[11px] text-neutral-500 leading-relaxed">
                            Tài khoản sau khi tạo có thể đăng nhập ngay vào hệ thống. Phân quyền và thông tin có thể chỉnh sửa bất kỳ lúc nào.
                        </p>
                    </div>

                </div>

            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script>
        // Avatar File Preview Logic
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatarPreview');
        const avatarPlaceholder = document.getElementById('avatarPlaceholder');
        const avatarFileName = document.getElementById('avatarFileName');
        const btnRemoveAvatarWrapper = document.getElementById('btnRemoveAvatarWrapper');
        const avatarDropzone = document.getElementById('avatarDropzone');

        if (avatarDropzone) {
            avatarDropzone.addEventListener('click', function() {
                avatarInput.click();
            });
        }

        function previewAvatar(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (!file.type.startsWith('image/')) {
                    alert('Vui lòng chọn một định dạng ảnh hợp lệ (PNG, JPG, WEBP).');
                    input.value = '';
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    alert('Dung lượng tệp vượt quá 5MB. Vui lòng chọn tệp nhỏ hơn.');
                    input.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreview.src = e.target.result;
                    avatarPreview.classList.remove('hidden');
                    avatarPlaceholder.classList.add('hidden');
                    avatarFileName.innerText = file.name;
                    avatarFileName.classList.remove('hidden');
                    btnRemoveAvatarWrapper.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function removeAvatar() {
            avatarInput.value = '';
            avatarPreview.src = '';
            avatarPreview.classList.add('hidden');
            avatarPlaceholder.classList.remove('hidden');
            avatarFileName.innerText = '';
            avatarFileName.classList.add('hidden');
            btnRemoveAvatarWrapper.classList.add('hidden');
        }

        // Toggle Password Visibility
        function togglePasswordVisibility() {
            const pwdInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (pwdInput.type === 'password') {
                pwdInput.type = 'text';
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />`;
            } else {
                pwdInput.type = 'password';
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
@endpush
