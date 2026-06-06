@php
    // Gunakan prefix yang dikirim, jika tidak ada default ke 'ps-'
    $pfx = $prefix ?? 'ps-';
@endphp

@if ($paginator->hasPages())
    <div class="{{ $pfx }}pagination-wrap">
        <p class="{{ $pfx }}pagination-info">Menampilkan {{ $paginator->firstItem() }} – {{ $paginator->lastItem() }} dari {{ $paginator->total() }} data</p>
        <div class="{{ $pfx }}pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="{{ $pfx }}page-btn {{ $pfx }}page-btn--nav" disabled>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="{{ $pfx }}page-btn {{ $pfx }}page-btn--nav" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="{{ $pfx }}page-ellipsis">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="{{ $pfx }}page-btn {{ $pfx }}page-btn--active">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="{{ $pfx }}page-btn" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="{{ $pfx }}page-btn {{ $pfx }}page-btn--nav" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </a>
            @else
                <button class="{{ $pfx }}page-btn {{ $pfx }}page-btn--nav" disabled>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            @endif
        </div>
    </div>
@endif
