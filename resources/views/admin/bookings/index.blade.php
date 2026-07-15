@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">Manage Bookings</h2>
            <p class="text-on-surface-variant text-sm mt-1">Review and manage player reservations across all venues.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative" x-data="{ focused: false }">
                <input type="text" placeholder="Search bookings..."
                    x-on:focus="focused = true" x-on:blur="focused = false"
                    :class="focused ? 'border-primary-fixed' : 'border-white/10'"
                    class="w-56 lg:w-64 bg-white/5 border rounded-full py-2 pl-10 pr-4 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none backdrop-blur-md transition-all">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/40 text-xl">search</span>
            </div>
            <button class="w-9 h-9 flex items-center justify-center rounded-full bg-white/5 border border-white/10 hover:bg-white/10 transition-all text-on-surface-variant hover:text-primary">
                <span class="material-symbols-outlined text-lg">notifications</span>
            </button>
            <button class="w-9 h-9 flex items-center justify-center rounded-full bg-white/5 border border-white/10 hover:bg-white/10 transition-all text-on-surface-variant hover:text-primary">
                <span class="material-symbols-outlined text-lg">settings</span>
            </button>
        </div>
    </div>

    {{-- Filters --}}
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="flex flex-wrap items-center gap-2">
            @php
                $currentStatus = request('status');
            @endphp
            <a href="{{ route('admin.bookings.index') }}"
                class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all
                    {{ !$currentStatus ? 'bg-primary-fixed text-on-primary-fixed bloom-lime' : 'bg-white/5 border border-white/10 text-on-surface-variant hover:bg-white/10' }}">
                All
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}"
                class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all
                    {{ $currentStatus === 'pending' ? 'bg-primary-fixed text-on-primary-fixed bloom-lime' : 'bg-white/5 border border-white/10 text-on-surface-variant hover:bg-white/10' }}">
                Pending
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'paid']) }}"
                class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all
                    {{ $currentStatus === 'paid' ? 'bg-primary-fixed text-on-primary-fixed bloom-lime' : 'bg-white/5 border border-white/10 text-on-surface-variant hover:bg-white/10' }}">
                Paid
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'completed']) }}"
                class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all
                    {{ $currentStatus === 'completed' ? 'bg-primary-fixed text-on-primary-fixed bloom-lime' : 'bg-white/5 border border-white/10 text-on-surface-variant hover:bg-white/10' }}">
                Completed
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'cancelled']) }}"
                class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all
                    {{ $currentStatus === 'cancelled' ? 'bg-primary-fixed text-on-primary-fixed bloom-lime' : 'bg-white/5 border border-white/10 text-on-surface-variant hover:bg-white/10' }}">
                Cancelled
            </a>
        </div>
    </div>

    {{-- Table --}}
    <div class="glass-card rounded-xl overflow-hidden border border-white/[0.06] shadow-[0_20px_40px_rgba(0,0,0,0.5)]">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/10 bg-white/[0.03]">
                        <th class="px-5 py-3.5 text-[10px] font-bold text-on-surface-variant/60 uppercase tracking-[0.15em]">Player</th>
                        <th class="px-5 py-3.5 text-[10px] font-bold text-on-surface-variant/60 uppercase tracking-[0.15em]">Venue &amp; Court</th>
                        <th class="px-5 py-3.5 text-[10px] font-bold text-on-surface-variant/60 uppercase tracking-[0.15em]">Schedule</th>
                        <th class="px-5 py-3.5 text-[10px] font-bold text-on-surface-variant/60 uppercase tracking-[0.15em]">Price</th>
                        <th class="px-5 py-3.5 text-[10px] font-bold text-on-surface-variant/60 uppercase tracking-[0.15em]">Status</th>
                        <th class="px-5 py-3.5 text-[10px] font-bold text-on-surface-variant/60 uppercase tracking-[0.15em] text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.04]">
                    @forelse($bookings as $booking)
                        <tr class="group hover:bg-white/[0.03] transition-all duration-200">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-fixed/30 to-primary-fixed/10 border border-primary-fixed/20 flex items-center justify-center text-xs font-bold text-primary-fixed shrink-0">
                                        {{ strtoupper(substr($booking->user->name, 0, 2)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-medium text-on-surface truncate">{{ $booking->user->name }}</p>
                                        <p class="text-[11px] text-on-surface-variant/50">#{{ $booking->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4">
                                <p class="text-sm text-on-surface">{{ $booking->court->venue->name }}</p>
                                <p class="text-[11px] text-primary-fixed/70">{{ $booking->court->name }}</p>
                            </td>
                            <td class="px-5 py-4">
                                <p class="text-sm text-on-surface">{{ $booking->booking_date->format('d M Y') }}</p>
                                <p class="text-[11px] text-on-surface-variant/50">
                                    {{ substr($booking->start_time, 0, 5) }} - {{ substr($booking->end_time, 0, 5) }}
                                    <span class="text-on-surface-variant/30">({{ $booking->duration }} hour)</span>
                                </p>
                            </td>
                            <td class="px-5 py-4">
                                <p class="text-sm font-bold text-primary-fixed">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            </td>
                            <td class="px-5 py-4">
                                @php
                                    $statusClasses = [
                                        'pending' => 'status-pending text-amber-400 bg-amber-400/10',
                                        'paid' => 'status-paid text-primary-fixed bg-primary-fixed/10',
                                        'completed' => 'status-completed text-blue-400 bg-blue-400/10',
                                        'cancelled' => 'status-cancelled text-red-400 bg-red-400/10',
                                    ][$booking->status] ?? 'text-on-surface-variant bg-white/5';
                                @endphp
                                <span class="inline-block px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $statusClasses }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    @if($booking->status === 'paid')
                                        <form action="{{ route('admin.bookings.complete', $booking) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold text-primary-fixed border border-primary-fixed/30 bg-primary-fixed/10 hover:bg-primary-fixed/20 transition-all"
                                                title="Complete Booking">
                                                <span class="material-symbols-outlined text-sm">check</span>
                                                Complete
                                            </button>
                                        </form>
                                    @endif

                                    @if(in_array($booking->status, ['pending', 'paid']))
                                        <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold text-error border border-error/30 bg-error/5 hover:bg-error/10 transition-all"
                                                title="Cancel Booking">
                                                <span class="material-symbols-outlined text-sm">close</span>
                                                Cancel
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <span class="material-symbols-outlined text-4xl text-on-surface-variant/20">calendar_month</span>
                                    <p class="text-on-surface-variant/50 text-sm">No bookings found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($bookings->hasPages())
            <div class="px-5 py-3 flex items-center justify-between bg-white/[0.02] border-t border-white/10">
                <p class="text-xs text-on-surface-variant/50">
                    Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} of {{ $bookings->total() }} bookings
                </p>
                <div class="flex items-center gap-1.5">
                    {{-- Previous --}}
                    @if ($bookings->onFirstPage())
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-on-surface-variant/30 bg-white/[0.02] border border-white/5 cursor-not-allowed">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </span>
                    @else
                        <a href="{{ $bookings->previousPageUrl() }}"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </a>
                    @endif

                    {{-- Pages --}}
                    @foreach ($bookings->getUrlRange(max(1, $bookings->currentPage() - 2), min($bookings->lastPage(), $bookings->currentPage() + 2)) as $page => $url)
                        @if ($page == $bookings->currentPage())
                            <span aria-current="page"
                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-sm font-bold text-on-primary-fixed bg-primary-fixed border border-primary-fixed/30 bloom-lime">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-sm text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($bookings->hasMorePages())
                        <a href="{{ $bookings->nextPageUrl() }}"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-on-surface-variant/30 bg-white/[0.02] border border-white/5 cursor-not-allowed">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </span>
                    @endif
                </div>
            </div>
        @endif
    </div>

</div>

<style>
    .status-pending {
        box-shadow: 0 0 10px rgba(251, 191, 36, 0.3);
        border: 1px solid rgba(251, 191, 36, 0.4);
    }
    .status-paid {
        box-shadow: 0 0 10px rgba(202, 243, 0, 0.3);
        border: 1px solid rgba(202, 243, 0, 0.4);
    }
    .status-completed {
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
        border: 1px solid rgba(59, 130, 246, 0.4);
    }
    .status-cancelled {
        box-shadow: 0 0 10px rgba(239, 68, 68, 0.3);
        border: 1px solid rgba(239, 68, 68, 0.4);
    }
</style>
@endsection
