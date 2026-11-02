@extends('admins.layouts.main')

@section('title', 'Quản Lý Khách Hàng — MY CLOTHES Admin')

@section('header')
    <div class="flex items-center gap-3">
        <span class="text-neutral-500 text-xs font-mono-code">Quản trị</span>
        <span class="text-neutral-700 text-xs font-mono-code">/</span>
        <h1 class="text-sm font-bold font-display uppercase tracking-wider text-white">
            Quản Lý Khách Hàng (Users)
        </h1>
    </div>

    <!-- Header Quick Actions -->
    <div class="flex items-center gap-3">
        <span class="text-xs font-mono-code text-neutral-400 hidden sm:inline">
            Tổng cộng: <strong class="text-white">{{ count($users ?? []) }}</strong> tài khoản
        </span>
        <a href="{{ route('admin.user.create') }}"
            class="px-4 py-2 rounded-lg bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider transition-colors inline-flex items-center gap-2 shadow-sm cursor-pointer">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
            <span>Thêm Người Dùng</span>
        </a>
        <button type="button" onclick="window.location.reload()"
            class="px-3 py-1.5 rounded-lg border border-neutral-800 hover:border-neutral-700 bg-neutral-900 text-neutral-200 text-xs font-medium transition-colors inline-flex items-center gap-2 cursor-pointer">
            <svg class="w-3.5 h-3.5 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span>Làm mới</span>
        </button>
    </div>
@endsection

@section('content')
    <!-- Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="p-6 rounded-2xl bg-black border border-neutral-900">
            <div class="flex items-center justify-between text-neutral-500 mb-3">
                <span class="text-xs uppercase tracking-wider font-semibold">Tài Khoản Khách Hàng</span>
                <div
                    class="w-8 h-8 rounded-lg bg-neutral-900 border border-neutral-800 flex items-center justify-center text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <p class="text-3xl font-extrabold font-display text-white tracking-tight">
                    {{ count($users ?? []) }}
                </p>
                <span class="text-[11px] text-neutral-400 font-mono-code">thành viên</span>
            </div>
            <div
                class="mt-4 pt-4 border-t border-neutral-900 flex items-center justify-between text-[11px] text-neutral-400">
                <span>Vai trò:</span>
                <span class="text-white font-mono-code uppercase font-semibold">Client User</span>
            </div>
        </div>

        <div class="p-6 rounded-2xl bg-black border border-neutral-900">
            <div class="flex items-center justify-between text-neutral-500 mb-3">
                <span class="text-xs uppercase tracking-wider font-semibold">Đã Cập Nhật Địa Chỉ</span>
                <div
                    class="w-8 h-8 rounded-lg bg-neutral-900 border border-neutral-800 flex items-center justify-center text-white">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <p class="text-3xl font-extrabold font-display text-white tracking-tight">
                    {{ isset($users) ? $users->filter(fn($u) => !empty($u->address))->count() : 0 }}
                </p>
                <span class="text-[11px] text-neutral-400 font-mono-code">có địa chỉ giao hàng</span>
            </div>
            <div
                class="mt-4 pt-4 border-t border-neutral-900 flex items-center justify-between text-[11px] text-neutral-400">
                <span>Tỉ lệ hoàn tất hồ sơ</span>
                <span class="text-white font-mono-code font-bold">
                    {{ isset($users) && count($users) > 0 ? round(($users->filter(fn($u) => !empty($u->address))->count() / count($users)) * 100) : 0 }}%
                </span>
            </div>
        </div>

        <div class="p-6 rounded-2xl bg-black border border-neutral-900">
            <div class="flex items-center justify-between text-neutral-500 mb-3">
                <span class="text-xs uppercase tracking-wider font-semibold">Trạng Thái An Ninh</span>
                <div
                    class="w-8 h-8 rounded-lg bg-neutral-900 border border-neutral-800 flex items-center justify-center text-emerald-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <p class="text-3xl font-extrabold font-display text-emerald-400 tracking-tight">
                    Active
                </p>
                <span class="text-[11px] text-neutral-400 font-mono-code">bảo mật mật khẩu</span>
            </div>
            <div
                class="mt-4 pt-4 border-t border-neutral-900 flex items-center justify-between text-[11px] text-neutral-400">
                <span>Thuật toán mã hóa</span>
                <span class="text-white font-mono-code font-bold">Bcrypt Hashing</span>
            </div>
        </div>
    </div>

    <!-- Action Section Bar -->
    <div
        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 rounded-2xl bg-black border border-neutral-900">
        <div>
            <h2 class="text-sm font-bold font-display uppercase tracking-wider text-white">Quản Lý Danh Sách</h2>
            <p class="text-xs text-neutral-400 mt-0.5 font-mono-code">Khởi tạo và quản lý quyền hạn thành viên hệ thống</p>
        </div>
        <a href="{{ route('admin.user.create') }}"
            class="px-4 py-2.5 rounded-xl bg-white text-black hover:bg-neutral-200 text-xs font-bold uppercase tracking-wider transition-all inline-flex items-center justify-center gap-2 shadow-lg shadow-white/5 active:scale-[0.99] cursor-pointer">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
            <span>Thêm Người Dùng Mới</span>
        </a>
    </div>

    <!-- Users Table Container -->
    <div class="rounded-2xl bg-black border border-neutral-900 overflow-hidden shadow-2xl">
        <div class="p-5 border-b border-neutral-900 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-white"></span>
                <h3 class="text-xs font-bold uppercase tracking-wider font-display text-white">
                    Danh Sách Tài Khoản Khách Hàng
                </h3>
                <span
                    class="px-2 py-0.5 rounded text-[11px] font-mono-code bg-neutral-900 text-neutral-400 border border-neutral-800">
                    {{ count($users ?? []) }} tài khoản
                </span>
            </div>

            <!-- Instant Search Input -->
            <div class="w-64">
                <input type="text" id="user-search" placeholder="Tìm kiếm tên, email, địa chỉ..."
                    class="w-full px-3.5 py-1.5 bg-neutral-950 border border-neutral-800 rounded-lg text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-white transition-colors font-sans">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-neutral-300">
                <thead
                    class="bg-neutral-950/80 text-[11px] uppercase tracking-wider text-neutral-400 font-mono-code border-b border-neutral-900">
                    <tr>
                        <th class="px-6 py-4 w-20">ID</th>
                        <th class="px-6 py-4">Họ và Tên</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Địa chỉ giao hàng</th>
                        <th class="px-6 py-4">Vai trò</th>
                        <th class="px-6 py-4">Ngày đăng ký</th>
                        <th class="px-6 py-4 text-right">Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-900" id="users-tbody">
                    @forelse($users as $user)
                        <tr class="hover:bg-neutral-900/40 transition-colors user-row"
                            data-search="{{ strtolower(($user->name ?? '') . ' ' . ($user->email ?? '') . ' ' . ($user->address ?? '')) }}">
                            <td class="px-6 py-4 font-mono-code text-neutral-400">
                                #{{ $user->id }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if (!empty($user->avatar))
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                                            class="w-8 h-8 rounded-full object-cover border border-neutral-700 shrink-0 bg-neutral-900">
                                    @else
                                        <span
                                            class="w-8 h-8 rounded-full bg-neutral-900 border border-neutral-800 text-white flex items-center justify-center text-xs font-bold font-mono-code shrink-0">
                                            {{ mb_strtoupper(mb_substr($user->name ?? 'U', 0, 1)) }}
                                        </span>
                                    @endif
                                    <div>
                                        <p class="font-bold text-white uppercase tracking-wide">{{ $user->name }}</p>
                                        <span class="text-[10px] text-neutral-400 font-mono-code">ID:
                                            {{ $user->id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-mono-code text-neutral-300">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 text-neutral-400">
                                @if (!empty($user->address))
                                    <span>{{ $user->address }}</span>
                                @else
                                    <span class="text-neutral-600 italic font-mono-code">Chưa thiết lập</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if (($user->role ?? '') === 'admin')
                                    <span
                                        class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-white text-black font-mono-code">
                                        Admin
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-0.5 rounded text-[10px] font-mono-code uppercase font-semibold bg-neutral-900 text-neutral-400 border border-neutral-800">
                                        {{ $user->role ?? 'user' }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-mono-code text-neutral-400 text-xs">
                                {{ !empty($user->created_at) ? date('d/m/Y H:i', strtotime($user->created_at)) : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <!-- Xem chi tiết -->
                                    <a href="#"
                                        class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 transition-colors cursor-pointer"
                                        title="Xem chi tiết người dùng">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <!-- Chỉnh sửa -->
                                    <a href="#"
                                        class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-900 transition-colors cursor-pointer"
                                        title="Chỉnh sửa thông tin">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <!-- Xóa -->
                                    <button type="button"
                                        class="p-2 rounded-lg text-neutral-400 hover:text-red-400 hover:bg-neutral-900 transition-colors cursor-pointer"
                                        title="Xóa tài khoản">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-neutral-500 font-mono-code">
                                Chưa có khách hàng nào trong hệ thống.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Phân trang -->
            <div>
                @if (isset($users) && method_exists($users, 'links'))
                    {{ $users->withQueryString()->links('components.pagination') }}
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const userSearch = document.getElementById('user-search');
        const userRows = document.querySelectorAll('.user-row');

        if (userSearch) {
            userSearch.addEventListener('input', function() {
                const query = this.value.trim().toLowerCase();
                userRows.forEach(row => {
                    const searchData = row.getAttribute('data-search') || '';
                    if (!query || searchData.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    </script>
@endpush
