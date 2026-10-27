<!DOCTYPE html>
<html lang="vi" class="h-full bg-neutral-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <title>Chỉnh Sửa Sản Phẩm #{{ $shirt->id }} — MY CLOTHES Admin</title>

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
                linear-gradient(to right, rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* Custom scrollbar */
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

<body class="min-h-screen text-neutral-100 admin-grid-bg flex flex-col antialiased selection:bg-white selection:text-black">

    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-40 border-b border-neutral-800/80 bg-neutral-950/80 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.shirt.index') }}"
                    class="p-2 -ml-2 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 border border-transparent hover:border-neutral-800 transition duration-150">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div class="h-5 w-px bg-neutral-800"></div>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                    <span class="font-display font-bold tracking-wider text-sm uppercase text-white">MY CLOTHES</span>
                    <span class="text-neutral-500 text-xs font-mono-code px-1.5 py-0.5 border border-neutral-800 rounded bg-neutral-900">ADMIN</span>
                </div>
            </div>

            <!-- Header Quick Actions -->
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.shirt.view', $shirt->id) }}"
                    class="hidden sm:inline-flex items-center gap-2 px-3 py-1.5 text-xs font-mono-code text-neutral-300 hover:text-white bg-neutral-900 hover:bg-neutral-800 border border-neutral-800 rounded-lg transition duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Xem chi tiết
                </a>
                <a href="{{ route('admin.shirt.index') }}"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs text-neutral-400 hover:text-white transition duration-150">
                    Danh sách
                </a>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-1 max-w-5xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">

        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-neutral-900">
                <div>
                    <div class="flex items-center gap-2 text-xs font-mono-code text-neutral-500 uppercase tracking-widest mb-1.5">
                        <span>Sản phẩm</span>
                        <span>/</span>
                        <span class="text-neutral-300">#{{ $shirt->id }}</span>
                        <span>/</span>
                        <span class="text-white">Chỉnh sửa</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-display font-bold tracking-tight text-white">
                        Cập Nhật Sản Phẩm
                    </h1>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono-code text-neutral-500">Cập nhật lần cuối: {{ $shirt->updated_at ? $shirt->updated_at->format('d/m/Y H:i') : 'N/A' }}</span>
                </div>
            </div>
        </div>

        <!-- Global Alert on Errors -->
        @if ($errors->any())
            <div class="mb-8 p-4 rounded-xl border border-red-900/60 bg-red-950/20 backdrop-blur-sm">
                <div class="flex items-start gap-3">
                    <div class="p-1 rounded-lg bg-red-900/40 text-red-400 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-red-300">Vui lòng kiểm tra lại thông tin nhập:</h3>
                        <ul class="mt-2 space-y-1 text-xs text-red-400/90 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Edit Form -->
        <form action="{{ route('admin.shirt.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            <input type="hidden" name="shirtId" value="{{ $shirt->id }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Left Column: Primary Fields -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Basic Information Card -->
                    <div class="p-6 rounded-2xl border border-neutral-800 bg-neutral-900/60 backdrop-blur-sm">
                        <h2 class="text-sm font-display font-bold uppercase tracking-wider text-neutral-400 mb-6 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            Thông Tin Cơ Bản
                        </h2>

                        <div class="space-y-5">
                            <!-- Name Field -->
                            <div>
                                <label for="name" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                    Tên sản phẩm <span class="text-red-400">*</span>
                                </label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $shirt->name) }}"
                                    required
                                    placeholder="Ví dụ: Áo thun Oversize Premium Black"
                                    class="w-full px-4 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white placeholder-neutral-600 text-sm focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label for="description" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                    Mô tả sản phẩm <span class="text-red-400">*</span>
                                </label>
                                <textarea id="description" name="description" rows="5" required
                                    placeholder="Nhập mô tả chi tiết về chất liệu, kiểu dáng, phong cách..."
                                    class="w-full px-4 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white placeholder-neutral-600 text-sm focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 resize-y @error('description') border-red-500 @enderror">{{ old('description', $shirt->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Pricing & Rating Card -->
                    <div class="p-6 rounded-2xl border border-neutral-800 bg-neutral-900/60 backdrop-blur-sm">
                        <h2 class="text-sm font-display font-bold uppercase tracking-wider text-neutral-400 mb-6 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            Giá & Đánh Giá
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Price Field -->
                            <div>
                                <label for="price" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                    Giá sản phẩm ($) <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-500 font-mono-code text-sm">
                                        $
                                    </span>
                                    <input type="number" step="0.01" min="0" max="9999.99" id="price" name="price"
                                        value="{{ old('price', $shirt->price) }}"
                                        required
                                        placeholder="0.00"
                                        class="w-full pl-8 pr-4 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white font-mono-code text-sm placeholder-neutral-600 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 @error('price') border-red-500 @enderror">
                                </div>
                                @error('price')
                                    <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Star / Rating Field -->
                            <div>
                                <label for="star" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                    Đánh giá (0 - 5 sao) <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" step="1" min="0" max="5" id="star" name="star"
                                        value="{{ old('star', (int)$shirt->star) }}"
                                        required
                                        placeholder="5"
                                        class="w-full px-4 py-3 rounded-xl bg-neutral-950 border border-neutral-800 text-white font-mono-code text-sm placeholder-neutral-600 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition duration-150 @error('star') border-red-500 @enderror">
                                    <span class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-neutral-500 text-xs font-mono-code">
                                        ★ / 5
                                    </span>
                                </div>
                                @error('star')
                                    <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Image & Actions -->
                <div class="space-y-6">

                    <!-- Image Upload Card -->
                    <div class="p-6 rounded-2xl border border-neutral-800 bg-neutral-900/60 backdrop-blur-sm">
                        <h2 class="text-sm font-display font-bold uppercase tracking-wider text-neutral-400 mb-6 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            Hình Ảnh Sản Phẩm
                        </h2>

                        <!-- Preview Container -->
                        <div class="mb-4">
                            <div class="relative aspect-square w-full rounded-xl overflow-hidden border border-neutral-800 bg-neutral-950 flex items-center justify-center group">
                                @if ($shirt->image)
                                    <img id="imagePreview"
                                        src="{{ asset('storage/' . $shirt->image) }}"
                                        alt="{{ $shirt->name }}"
                                        class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                                    <div id="imagePlaceholder" class="hidden flex-col items-center justify-center text-neutral-600 p-4 text-center">
                                        <svg class="w-10 h-10 mb-2 stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-xs font-mono-code">Chưa có ảnh</span>
                                    </div>
                                @else
                                    <img id="imagePreview" src="" alt="Preview" class="hidden w-full h-full object-cover">
                                    <div id="imagePlaceholder" class="flex flex-col items-center justify-center text-neutral-600 p-4 text-center">
                                        <svg class="w-10 h-10 mb-2 stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-xs font-mono-code">Chưa có ảnh sản phẩm</span>
                                    </div>
                                @endif

                                <!-- Badge Current Image -->
                                <div class="absolute bottom-3 left-3 px-2 py-1 bg-black/80 backdrop-blur-md rounded border border-neutral-800 text-[10px] font-mono-code text-neutral-300">
                                    {{ $shirt->image ? 'Ảnh hiện tại' : 'Chưa có ảnh' }}
                                </div>
                            </div>
                        </div>

                        <!-- Upload Input -->
                        <div>
                            <label for="image" class="block text-xs font-mono-code uppercase tracking-wider text-neutral-400 mb-2">
                                Thay đổi ảnh mới
                            </label>
                            <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg"
                                onchange="previewSelectedImage(event)"
                                class="w-full text-xs text-neutral-400 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-mono-code file:bg-white file:text-black hover:file:bg-neutral-200 file:cursor-pointer cursor-pointer border border-neutral-800 rounded-xl bg-neutral-950 p-2 focus:outline-none focus:border-white">
                            <p class="mt-2 text-[11px] text-neutral-500 font-mono-code">Hỗ trợ JPG, PNG (tối đa 5MB). Để trống nếu không muốn thay đổi ảnh.</p>
                            @error('image')
                                <p class="mt-1.5 text-xs text-red-400 font-mono-code">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Sticky Action Controls -->
                    <div class="p-6 rounded-2xl border border-neutral-800 bg-neutral-900/60 backdrop-blur-sm space-y-3">
                        <button type="submit"
                            class="w-full py-3.5 px-4 bg-white hover:bg-neutral-200 text-black font-display font-bold text-sm rounded-xl transition duration-200 flex items-center justify-center gap-2 shadow-lg shadow-white/5 active:scale-[0.99]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Lưu & Cập Nhật
                        </button>

                        <a href="{{ route('admin.shirt.index') }}"
                            class="w-full py-3 px-4 bg-transparent hover:bg-neutral-900 text-neutral-400 hover:text-white border border-neutral-800 hover:border-neutral-700 font-display font-semibold text-xs rounded-xl transition duration-150 flex items-center justify-center">
                            Hủy bỏ & Quay lại
                        </a>
                    </div>

                    <!-- Meta Information Box -->
                    <div class="p-4 rounded-xl border border-neutral-900 bg-black/40 text-xs font-mono-code text-neutral-500 space-y-1.5">
                        <div class="flex justify-between">
                            <span>Mã định danh:</span>
                            <span class="text-neutral-300">#{{ $shirt->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Ngày tạo:</span>
                            <span class="text-neutral-300">{{ $shirt->created_at ? $shirt->created_at->format('d/m/Y') : 'N/A' }}</span>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t border-neutral-900 py-6 text-center text-xs font-mono-code text-neutral-600">
        MY CLOTHES &copy; {{ date('Y') }} — Hệ Thống Quản Trị Độc Quyền
    </footer>

    <!-- Interactive Script for Image Preview -->
    <script>
        function previewSelectedImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('imagePlaceholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) {
                        placeholder.classList.add('hidden');
                    }
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
