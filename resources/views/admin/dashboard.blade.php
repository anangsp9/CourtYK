@extends('layouts.admin')

@section('content')
    <div class="space-y-layer-gap">

        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                    <span class="material-symbols-outlined text-lg">dashboard</span>
                </div>
                <div>
                    <h4 class="font-title-md text-title-md text-primary">Dashboard</h4>
                    <p class="text-on-surface-variant font-label-sm text-sm">Overview of your venue &amp; booking analytics</p>
                </div>
            </div>
        </div>

        {{-- Metric Bento Grid --}}
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
            <div class="glass-card p-6 rounded-lg flex flex-col justify-between group hover:border-primary-fixed/40 transition-colors duration-500">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-primary-container/10 rounded-lg text-primary-fixed">
                        <span class="material-symbols-outlined">domain</span>
                    </div>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total Venues</p>
                    <h3 class="font-display-lg text-headline-lg text-primary mt-1">{{ $totalVenues }}</h3>
                </div>
            </div>

            <div class="glass-card p-6 rounded-lg flex flex-col justify-between group hover:border-primary-fixed/40 transition-colors duration-500">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-primary-container/10 rounded-lg text-primary-fixed">
                        <span class="material-symbols-outlined">sports_tennis</span>
                    </div>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total Courts</p>
                    <h3 class="font-display-lg text-headline-lg text-primary mt-1">{{ $totalCourts }}</h3>
                </div>
            </div>

            <div class="glass-card p-6 rounded-lg flex flex-col justify-between group hover:border-primary-fixed/40 transition-colors duration-500">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-primary-container/10 rounded-lg text-primary-fixed">
                        <span class="material-symbols-outlined">event_available</span>
                    </div>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total Bookings</p>
                    <h3 class="font-display-lg text-headline-lg text-primary mt-1">{{ $totalBookings }}</h3>
                </div>
            </div>

            <div class="glass-card p-6 rounded-lg flex flex-col justify-between group hover:border-primary-fixed/40 transition-colors duration-500">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-primary-container/10 rounded-lg text-primary-fixed">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total Revenue</p>
                    <h3 class="font-display-lg text-headline-lg text-primary mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                </div>
            </div>
        </section>

        {{-- Booking Status Row --}}
        <section class="grid grid-cols-2 md:grid-cols-4 gap-gutter">
            <div class="glass-card p-4 rounded-lg flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-yellow-500/10 flex items-center justify-center text-yellow-400">
                    <span class="material-symbols-outlined">hourglass_top</span>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Pending</p>
                    <p class="text-xl font-bold text-primary mt-0.5">{{ $pendingBookings }}</p>
                </div>
            </div>
            <div class="glass-card p-4 rounded-lg flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-400">
                    <span class="material-symbols-outlined">check_circle</span>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Paid</p>
                    <p class="text-xl font-bold text-primary mt-0.5">{{ $paidBookings }}</p>
                </div>
            </div>
            <div class="glass-card p-4 rounded-lg flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-500/10 flex items-center justify-center text-green-400">
                    <span class="material-symbols-outlined">task_alt</span>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Completed</p>
                    <p class="text-xl font-bold text-primary mt-0.5">{{ $completedBookings }}</p>
                </div>
            </div>
            <div class="glass-card p-4 rounded-lg flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-red-500/10 flex items-center justify-center text-red-400">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Cancelled</p>
                    <p class="text-xl font-bold text-primary mt-0.5">{{ $cancelledBookings }}</p>
                </div>
            </div>
        </section>

        {{-- Revenue + Top Venues --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
            <section class="lg:col-span-2 glass-card rounded-lg p-6 lg:p-8 relative overflow-hidden">
                {{-- Ambient glow --}}
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-primary-fixed/5 blur-[120px] rounded-full pointer-events-none"></div>
                <div class="absolute -left-20 -top-20 w-60 h-60 bg-blue-500/5 blur-[100px] rounded-full pointer-events-none"></div>

                {{-- Header --}}
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 relative z-10">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                                <span class="material-symbols-outlined text-lg">trending_up</span>
                            </div>
                            <div>
                                <h4 class="font-title-md text-title-md text-primary">Revenue Growth</h4>
                                <p class="text-on-surface-variant font-label-sm text-sm">Booking Revenue Overview</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-1.5 bg-white/5 rounded-lg p-1">
                        <button class="px-3 py-1.5 rounded-md text-xs font-medium bg-primary-fixed text-on-primary-fixed transition-all">Week</button>
                        <button class="px-3 py-1.5 rounded-md text-xs font-medium text-on-surface-variant hover:text-primary transition-all">Month</button>
                        <button class="px-3 py-1.5 rounded-md text-xs font-medium text-on-surface-variant hover:text-primary transition-all">Year</button>
                    </div>
                </div>

                {{-- Revenue Summary Row --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8 relative z-10">
                    <div class="bg-white/[0.03] rounded-lg p-4 border border-white/[0.06]">
                        <p class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-1">Total Revenue</p>
                        <p class="text-xl font-bold text-primary-fixed tabular-nums">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-white/[0.03] rounded-lg p-4 border border-white/[0.06]">
                        <p class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-1">Paid</p>
                        <p class="text-xl font-bold text-blue-400 tabular-nums">{{ $paidBookings }}</p>
                    </div>
                    <div class="bg-white/[0.03] rounded-lg p-4 border border-white/[0.06]">
                        <p class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-1">Completed</p>
                        <p class="text-xl font-bold text-green-400 tabular-nums">{{ $completedBookings }}</p>
                    </div>
                    <div class="bg-white/[0.03] rounded-lg p-4 border border-white/[0.06]">
                        <p class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-1">Avg / Booking</p>
                        <p class="text-xl font-bold text-primary tabular-nums">
                            Rp {{ number_format($totalBookings > 0 ? $totalRevenue / $totalBookings : 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                {{-- Chart Area --}}
                <div class="relative z-10">
                    {{-- Y-axis labels --}}
                    <div class="absolute left-0 top-0 bottom-8 w-10 flex flex-col justify-between pointer-events-none">
                        @php $yMax = max($pendingBookings, $paidBookings, $completedBookings, $cancelledBookings, 4); @endphp
                        <span class="text-[9px] text-on-surface-variant/40 tabular-nums">{{ $yMax }}</span>
                        <span class="text-[9px] text-on-surface-variant/40 tabular-nums">{{ round($yMax / 2) }}</span>
                        <span class="text-[9px] text-on-surface-variant/40 tabular-nums">0</span>
                    </div>

                    {{-- Grid lines --}}
                    <div class="absolute left-10 right-0 top-0 bottom-8 pointer-events-none">
                        <div class="w-full h-full flex flex-col justify-between">
                            <div class="w-full h-[1px] bg-white/[0.03]"></div>
                            <div class="w-full h-[1px] bg-white/[0.03]"></div>
                            <div class="w-full h-[1px] bg-white/[0.05]"></div>
                        </div>
                    </div>

                    {{-- Bars --}}
                    <div class="ml-10 h-48 lg:h-56 relative">
                        <div class="absolute inset-0 flex items-end justify-around pb-6">
                            @php
                                $bars = [
                                    ['label' => 'Pending', 'count' => $pendingBookings, 'color' => 'bg-yellow-400', 'icon' => 'hourglass_top'],
                                    ['label' => 'Paid', 'count' => $paidBookings, 'color' => 'bg-blue-400', 'icon' => 'check_circle'],
                                    ['label' => 'Completed', 'count' => $completedBookings, 'color' => 'bg-green-400', 'icon' => 'task_alt'],
                                    ['label' => 'Cancelled', 'count' => $cancelledBookings, 'color' => 'bg-red-400', 'icon' => 'cancel'],
                                ];
                                $maxCount = max($pendingBookings, $paidBookings, $completedBookings, $cancelledBookings, 1);
                                $maxPx = 140;
                            @endphp
                            @foreach($bars as $i => $bar)
                                @php
                                    $h = max(round(($bar['count'] / $maxCount) * $maxPx), 6);
                                    $gradients = [
                                        'bg-yellow-400' => 'from-yellow-400/80 to-yellow-500/40',
                                        'bg-blue-400' => 'from-blue-400/80 to-blue-500/40',
                                        'bg-green-400' => 'from-green-400/80 to-green-500/40',
                                        'bg-red-400' => 'from-red-400/80 to-red-500/40',
                                    ];
                                @endphp
                                <div class="flex flex-col items-center gap-2 flex-1 max-w-[64px] group">
                                    <div class="relative w-full flex flex-col items-center">
                                        {{-- Value label --}}
                                        <span class="text-[10px] font-bold text-on-surface tabular-nums mb-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                            {{ $bar['count'] }}
                                        </span>
                                        {{-- Bar with gradient overlay --}}
                                        <div class="w-full rounded-t-md relative overflow-hidden"
                                             style="height: {{ $h }}px; margin-top: auto;">
                                            <div class="absolute inset-0 {{ $bar['color'] }} opacity-60"></div>
                                            <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b {{ $gradients[$bar['color']] }}"></div>
                                            {{-- Glow on hover --}}
                                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                                 style="box-shadow: 0 0 20px {{ match($bar['label']) {
                                                    'Pending' => 'rgba(250,204,21,0.3)',
                                                    'Paid' => 'rgba(96,165,250,0.3)',
                                                    'Completed' => 'rgba(74,222,128,0.3)',
                                                    'Cancelled' => 'rgba(248,113,113,0.3)',
                                                    default => 'rgba(255,255,255,0.1)'
                                                 } }}"></div>
                                        </div>
                                    </div>
                                    {{-- Label --}}
                                    <span class="text-[10px] text-on-surface-variant text-center leading-tight">{{ $bar['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Bottom stats row --}}
                <div class="flex flex-wrap items-center justify-between gap-4 mt-6 pt-5 border-t border-white/[0.06] relative z-10">
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                            <span class="text-xs text-on-surface-variant">Pending: <span class="text-on-surface font-medium">{{ $pendingBookings }}</span></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                            <span class="text-xs text-on-surface-variant">Paid: <span class="text-on-surface font-medium">{{ $paidBookings }}</span></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-400"></span>
                            <span class="text-xs text-on-surface-variant">Completed: <span class="text-on-surface font-medium">{{ $completedBookings }}</span></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-red-400"></span>
                            <span class="text-xs text-on-surface-variant">Cancelled: <span class="text-on-surface font-medium">{{ $cancelledBookings }}</span></span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                        Updated real-time
                    </div>
                </div>
            </section>

            <section class="glass-card rounded-lg p-6 lg:p-8">
                <h4 class="font-title-md text-title-md text-primary mb-6">Top Venues</h4>
                <div class="space-y-4 lg:space-y-5">
                    @forelse($topVenues as $venue)
                        <div class="flex items-center justify-between group cursor-pointer">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-lg bg-cover bg-center border border-white/10 shrink-0"
                                     style="background-image: url('{{ $venue->image ? asset('storage/' . $venue->image) : '' }}'); background-color: rgba(32,31,31,0.8)">
                                    @unless($venue->image)
                                        <div class="w-full h-full flex items-center justify-center text-primary-fixed font-bold text-sm">
                                            {{ strtoupper(substr($venue->name, 0, 2)) }}
                                        </div>
                                    @endunless
                                </div>
                                <div class="min-w-0">
                                    <p class="font-bold text-on-surface group-hover:text-primary-fixed transition-colors text-sm lg:text-base truncate">{{ $venue->name }}</p>
                                    <p class="text-xs text-on-surface-variant">{{ $venue->bookings_count }} Bookings</p>
                                </div>
                            </div>
                            <span class="material-symbols-outlined text-primary-fixed group-hover:translate-x-1 transition-transform shrink-0">arrow_forward</span>
                        </div>
                    @empty
                        <p class="text-on-surface-variant text-sm">No venues yet</p>
                    @endforelse
                </div>
                <a href="{{ route('admin.venues.index') }}"
                   class="block w-full mt-6 lg:mt-8 py-3 rounded-lg border border-white/10 text-on-surface-variant font-label-sm uppercase tracking-widest text-center hover:bg-white/5 transition-all text-sm">
                    View All Venues
                </a>
            </section>
        </div>

        {{-- Recent Bookings Table --}}
        <section class="glass-card rounded-lg overflow-hidden">
            <div class="px-6 lg:px-8 py-5 lg:py-6 flex justify-between items-center border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                        <span class="material-symbols-outlined text-lg">calendar_month</span>
                    </div>
                    <h4 class="font-title-md text-title-md text-primary">Recent Bookings</h4>
                </div>
                <a href="{{ route('admin.bookings.index') }}"
                   class="text-primary-fixed font-label-sm uppercase tracking-widest flex items-center gap-2 hover:opacity-80 text-xs lg:text-sm transition-opacity">
                    History
                    <span class="material-symbols-outlined text-sm">open_in_new</span>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-on-surface-variant font-label-sm uppercase tracking-widest bg-white/[0.03] text-xs">
                            <th class="px-4 lg:px-6 py-3.5 w-10">#</th>
                            <th class="px-4 lg:px-6 py-3.5">User</th>
                            <th class="px-4 lg:px-6 py-3.5 hidden sm:table-cell">Venue</th>
                            <th class="px-4 lg:px-6 py-3.5">Court</th>
                            <th class="px-4 lg:px-6 py-3.5 hidden md:table-cell">Date/Time</th>
                            <th class="px-4 lg:px-6 py-3.5">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.04]">
                        @forelse($recentBookings as $i => $booking)
                            <tr class="group hover:bg-white/[0.04] transition-all duration-300 relative">
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <span class="text-on-surface-variant/50 text-xs font-mono">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-container/30 to-primary-container/5 flex items-center justify-center border border-primary-fixed/20 font-bold text-xs text-primary-fixed shrink-0 group-hover:border-primary-fixed/40 transition-colors">
                                            {{ strtoupper(substr($booking->user->name ?? 'U', 0, 2)) }}
                                        </div>
                                        <span class="font-medium text-sm text-on-surface group-hover:text-primary-fixed transition-colors">{{ $booking->user->name ?? 'Unknown' }}</span>
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
                                        <span class="material-symbols-outlined text-[14px] text-on-surface-variant/50">schedule</span>
                                        {{ $booking->booking_date ? $booking->booking_date->format('M d, H:i') : '-' }}
                                    </span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    @php
                                        $statusClasses = [
                                            'paid' => 'bg-primary-container/15 text-primary-fixed border-primary-fixed/30 shadow-[0_0_12px_rgba(202,243,0,0.15)]',
                                            'pending' => 'bg-yellow-500/10 text-yellow-400 border-yellow-400/25',
                                            'completed' => 'bg-green-500/10 text-green-400 border-green-400/25 shadow-[0_0_12px_rgba(74,222,128,0.1)]',
                                            'cancelled' => 'bg-red-500/10 text-red-400 border-red-400/25',
                                        ];
                                        $class = $statusClasses[$booking->status] ?? 'bg-white/5 text-on-surface-variant border-white/20';
                                    @endphp
                                    <span class="inline-flex items-center gap-1 px-2.5 lg:px-3 py-1 rounded-full text-[10px] font-bold border tracking-wider uppercase {{ $class }}">
                                        @if($booking->status === 'paid')
                                            <span class="material-symbols-outlined text-[12px]">check_circle</span>
                                        @elseif($booking->status === 'pending')
                                            <span class="material-symbols-outlined text-[12px]">hourglass_empty</span>
                                        @elseif($booking->status === 'completed')
                                            <span class="material-symbols-outlined text-[12px]">task_alt</span>
                                        @elseif($booking->status === 'cancelled')
                                            <span class="material-symbols-outlined text-[12px]">cancel</span>
                                        @endif
                                        {{ $booking->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-8 py-10 text-center text-on-surface-variant">
                                    <span class="material-symbols-outlined text-3xl mb-2 block opacity-50">event_busy</span>
                                    No bookings yet
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Top Courts --}}
        <section class="glass-card rounded-lg overflow-hidden">
            <div class="px-6 lg:px-8 py-5 lg:py-6 flex items-center gap-3 border-b border-white/10">
                <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                    <span class="material-symbols-outlined text-lg">leaderboard</span>
                </div>
                <h4 class="font-title-md text-title-md text-primary">Top Courts</h4>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-on-surface-variant font-label-sm uppercase tracking-widest bg-white/[0.03] text-xs">
                            <th class="px-4 lg:px-6 py-3.5 w-10">Rank</th>
                            <th class="px-4 lg:px-6 py-3.5">Court</th>
                            <th class="px-4 lg:px-6 py-3.5">Bookings</th>
                            <th class="px-4 lg:px-6 py-3.5 hidden sm:table-cell">Performance</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.04]">
                        @forelse($topCourts as $i => $court)
                            @php
                                $rank = $i + 1;
                                $maxBookings = $topCourts->max('bookings_count') ?: 1;
                                $pct = round(($court->bookings_count / $maxBookings) * 100);
                                $rankColors = ['text-yellow-400', 'text-gray-300', 'text-amber-600', 'text-on-surface-variant/60', 'text-on-surface-variant/40'];
                                $rankClass = $rankColors[min($rank - 1, 4)];
                            @endphp
                            <tr class="group hover:bg-white/[0.04] transition-all duration-300">
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <span class="font-bold text-sm {{ $rankClass }}">{{ $rank }}</span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary-container/20 to-primary-container/5 flex items-center justify-center border border-white/10">
                                            <span class="material-symbols-outlined text-[16px] text-primary-fixed/70">sports_tennis</span>
                                        </div>
                                        <span class="font-medium text-sm text-on-surface group-hover:text-primary-fixed transition-colors">{{ $court->name }}</span>
                                    </div>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <span class="text-primary-fixed font-bold text-lg tabular-nums">{{ $court->bookings_count }}</span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5 hidden sm:table-cell">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1 h-1.5 bg-white/5 rounded-full overflow-hidden max-w-[120px]">
                                            <div class="h-full rounded-full bg-gradient-to-r from-primary-container/60 to-primary-fixed transition-all duration-500"
                                                 style="width: {{ $pct }}%"></div>
                                        </div>
                                        <span class="text-xs text-on-surface-variant/60 tabular-nums">{{ $pct }}%</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-10 text-center text-on-surface-variant">
                                    <span class="material-symbols-outlined text-3xl mb-2 block opacity-50">stadia_controller</span>
                                    No courts yet
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </div>
@endsection
