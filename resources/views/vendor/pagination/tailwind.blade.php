@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm text-on-surface-variant">
                    @if ($paginator->firstItem())
                        <span class="font-medium text-on-surface">{{ $paginator->firstItem() }}</span>
                        {{ __('to') }}
                        <span class="font-medium text-on-surface">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {{ __('of') }}
                    <span class="font-medium text-on-surface">{{ $paginator->total() }}</span>
                    {{ __('results') }}
                </p>
            </div>

            <div class="flex items-center gap-1.5">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-on-surface-variant/40 bg-white/[0.02] border border-white/5 cursor-not-allowed">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-on-surface-variant/50 text-sm bg-white/[0.02] border border-white/5 cursor-default">
                            {{ $element }}
                        </span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page"
                                      class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-sm font-bold text-on-primary-fixed bg-primary-fixed border border-primary-fixed/30 lime-bloom transition-all">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                   class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-sm text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all"
                                   aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                       class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </a>
                @else
                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-on-surface-variant/40 bg-white/[0.02] border border-white/5 cursor-not-allowed">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif
