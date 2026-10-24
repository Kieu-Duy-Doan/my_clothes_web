@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center gap-1.5 font-mono-code text-xs">
        {{-- Nút Previous --}}
        @if ($paginator->onFirstPage())
            <span
                class="px-3 py-1.5 rounded-lg border border-neutral-900 bg-neutral-950 text-neutral-600 cursor-not-allowed select-none">
                ← Trước
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="px-3 py-1.5 rounded-lg border border-neutral-800 bg-neutral-950 text-neutral-300 hover:text-white hover:border-neutral-700 transition-colors">
                ← Trước
            </a>
        @endif

        {{-- Danh sách các số trang --}}
        @foreach ($elements as $element)
            {{-- Dấu "..." nếu nhiều trang --}}
            @if (is_string($element))
                <span class="px-3 py-1.5 text-neutral-600 select-none">{{ $element }}</span>
            @endif

            {{-- Mảng các link trang --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page"
                            class="px-3 py-1.5 rounded-lg bg-white text-black font-bold border border-white">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-1.5 rounded-lg border border-neutral-800 bg-neutral-950 text-neutral-300 hover:text-white hover:border-neutral-700 transition-colors">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Nút Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="px-3 py-1.5 rounded-lg border border-neutral-800 bg-neutral-950 text-neutral-300 hover:text-white hover:border-neutral-700 transition-colors">
                Sau →
            </a>
        @else
            <span
                class="px-3 py-1.5 rounded-lg border border-neutral-900 bg-neutral-950 text-neutral-600 cursor-not-allowed select-none">
                Sau →
            </span>
        @endif
    </nav>
@endif
