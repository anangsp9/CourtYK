@extends('layouts.admin')

@section('content')
    <div class="space-y-layer-gap">

        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                    <span class="material-symbols-outlined text-lg">analytics</span>
                </div>
                <div>
                    <h4 class="font-title-md text-title-md text-primary">Revenue Report</h4>
                    <p class="text-on-surface-variant font-label-sm text-sm">Income breakdown and completed transaction history</p>
                </div>
            </div>
            <div class="flex items-center gap-2 text-xs text-on-surface-variant">
                <span class="material-symbols-outlined text-[14px]">schedule</span>
                <span>Last updated {{ now()->format('d M Y H:i') }}</span>
            </div>
        </div>

        {{-- Revenue Metric Cards --}}
        <section class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <div class="glass-card p-6 rounded-lg flex flex-col justify-between group hover:border-primary-fixed/40 transition-colors duration-500 relative overflow-hidden">
                <div class="absolute -right-16 -top-16 w-32 h-32 bg-yellow-500/5 blur-[80px] rounded-full pointer-events-none"></div>
                <div class="flex justify-between items-start mb-4 relative">
                    <div class="p-2.5 bg-yellow-500/10 rounded-xl text-yellow-400">
                        <span class="material-symbols-outlined">today</span>
                    </div>
                </div>
                <div class="relative">
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Today</p>
                    <h3 class="font-display-lg text-headline-lg text-primary mt-1 tabular-nums">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h3>
                </div>
            </div>

            <div class="glass-card p-6 rounded-lg flex flex-col justify-between group hover:border-primary-fixed/40 transition-colors duration-500 relative overflow-hidden">
                <div class="absolute -right-16 -top-16 w-32 h-32 bg-primary-fixed/5 blur-[80px] rounded-full pointer-events-none"></div>
                <div class="flex justify-between items-start mb-4 relative">
                    <div class="p-2.5 bg-primary-container/10 rounded-xl text-primary-fixed">
                        <span class="material-symbols-outlined">date_range</span>
                    </div>
                </div>
                <div class="relative">
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">This Week</p>
                    <h3 class="font-display-lg text-headline-lg text-primary mt-1 tabular-nums">Rp {{ number_format($weeklyRevenue, 0, ',', '.') }}</h3>
                </div>
            </div>

            <div class="glass-card p-6 rounded-lg flex flex-col justify-between group hover:border-primary-fixed/40 transition-colors duration-500 relative overflow-hidden">
                <div class="absolute -right-16 -top-16 w-32 h-32 bg-blue-500/5 blur-[80px] rounded-full pointer-events-none"></div>
                <div class="flex justify-between items-start mb-4 relative">
                    <div class="p-2.5 bg-blue-500/10 rounded-xl text-blue-400">
                        <span class="material-symbols-outlined">calendar_month</span>
                    </div>
                </div>
                <div class="relative">
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">This Month</p>
                    <h3 class="font-display-lg text-headline-lg text-primary mt-1 tabular-nums">Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}</h3>
                </div>
            </div>
        </section>

        {{-- Summary Insights Row --}}
        @php
            $completedCount = $completedBookings->total();
            $avgTransaction = $completedCount > 0 ? $monthlyRevenue / $completedCount : 0;
        @endphp
        <section class="grid grid-cols-2 md:grid-cols-4 gap-gutter">
            <div class="glass-card p-4 rounded-lg flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-500/10 flex items-center justify-center text-green-400">
                    <span class="material-symbols-outlined">task_alt</span>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Completed</p>
                    <p class="text-xl font-bold text-primary mt-0.5 tabular-nums">{{ $completedCount }}</p>
                </div>
            </div>
            <div class="glass-card p-4 rounded-lg flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-primary-container/10 flex items-center justify-center text-primary-fixed">
                    <span class="material-symbols-outlined">receipt_long</span>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Monthly Total</p>
                    <p class="text-xl font-bold text-primary mt-0.5 tabular-nums">Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="glass-card p-4 rounded-lg flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-purple-500/10 flex items-center justify-center text-purple-400">
                    <span class="material-symbols-outlined">trending_up</span>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Avg / Transaction</p>
                    <p class="text-xl font-bold text-primary mt-0.5 tabular-nums">Rp {{ number_format($avgTransaction, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="glass-card p-4 rounded-lg flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-cyan-500/10 flex items-center justify-center text-cyan-400">
                    <span class="material-symbols-outlined">bar_chart</span>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Weekly Avg</p>
                    <p class="text-xl font-bold text-primary mt-0.5 tabular-nums">Rp {{ number_format($completedCount > 0 ? $weeklyRevenue / max(1, round($completedCount / 4.3)) : 0, 0, ',', '.') }}</p>
                </div>
            </div>
        </section>

        {{-- Completed Transactions Table --}}
        <section class="glass-card rounded-lg overflow-hidden">
            <div class="px-6 lg:px-8 py-5 lg:py-6 flex justify-between items-center border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="p-1.5 bg-green-500/10 rounded-lg text-green-400">
                        <span class="material-symbols-outlined text-lg">receipt_long</span>
                    </div>
                    <div>
                        <h4 class="font-title-md text-title-md text-primary">Completed Transactions</h4>
                        <p class="text-on-surface-variant text-xs">Detailed list of all successful bookings</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 text-xs text-on-surface-variant">
                    <span class="material-symbols-outlined text-[14px]">database</span>
                    <span>{{ $completedBookings->firstItem() ?? 0 }}–{{ $completedBookings->lastItem() ?? 0 }} of {{ $completedBookings->total() }}</span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-on-surface-variant font-label-sm uppercase tracking-widest bg-white/[0.03] text-xs">
                            <th class="px-4 lg:px-6 py-3.5 w-10">#</th>
                            <th class="px-4 lg:px-6 py-3.5">Customer</th>
                            <th class="px-4 lg:px-6 py-3.5 hidden sm:table-cell">Venue</th>
                            <th class="px-4 lg:px-6 py-3.5">Court</th>
                            <th class="px-4 lg:px-6 py-3.5 hidden md:table-cell">Play Date</th>
                            <th class="px-4 lg:px-6 py-3.5 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.04]">
                        @forelse($completedBookings as $i => $booking)
                            <tr class="group hover:bg-white/[0.04] transition-all duration-300">
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <span class="text-on-surface-variant/50 text-xs font-mono">{{ str_pad($completedBookings->firstItem() + $i, 2, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500/20 to-green-500/5 flex items-center justify-center border border-green-500/20 font-bold text-xs text-green-400 shrink-0 group-hover:border-green-500/40 transition-colors">
                                            {{ strtoupper(substr($booking->user->name ?? 'U', 0, 2)) }}
                                        </div>
                                        <span class="font-medium text-sm text-on-surface group-hover:text-green-400 transition-colors">{{ $booking->user->name ?? 'Unknown' }}</span>
                                    </div>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5 text-on-surface-variant text-sm hidden sm:table-cell">{{ $booking->court->venue->name ?? '-' }}</td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <span class="inline-flex items-center gap-1.5 text-sm text-on-surface bg-white/[0.04] px-2.5 py-1 rounded-lg border border-white/[0.06]">
                                        <span class="material-symbols-outlined text-[14px] text-primary-fixed/60">sports_tennis</span>
                                        {{ $booking->court->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5 text-on-surface-variant text-sm hidden md:table-cell">
                                    <span class="inline-flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-[14px] text-on-surface-variant/50">calendar_today</span>
                                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                                    </span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5 text-right">
                                    <span class="font-semibold text-sm text-green-400 tabular-nums">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-8 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <span class="material-symbols-outlined text-4xl text-on-surface-variant/30">receipt_long</span>
                                        <p class="text-on-surface-variant text-sm">No completed transactions yet</p>
                                        <p class="text-on-surface-variant/50 text-xs">Completed bookings will appear here as revenue</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($completedBookings->hasPages())
                <div class="px-6 lg:px-8 py-4 border-t border-white/[0.06] bg-white/[0.02]">
                    {{ $completedBookings->links() }}
                </div>
            @endif
        </section>

    </div>
@endSection
