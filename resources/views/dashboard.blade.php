@php
    $user = auth()->user();
    $totalBookings = $user->bookings()->count();
    $pendingBookings = $user->bookings()->where('status', 'pending')->count();
    $paidBookings = $user->bookings()->where('status', 'paid')->count();
    $completedBookings = $user->bookings()->where('status', 'completed')->count();
    $upcomingBooking = $user->bookings()->whereIn('status', ['pending', 'paid'])->latest()->first();
@endphp

@extends('layouts.glass')

@section('title', 'CourtGlass | Dashboard')

@section('content')
<div class="mb-14 flex flex-col md:flex-row md:items-end justify-between gap-6">
    <div class="space-y-3">
        <h1 class="text-4xl md:text-5xl font-black text-gradient tracking-tight">Dashboard</h1>
        <p class="text-white/50 text-lg font-light max-w-xl leading-relaxed">Selamat datang kembali, <span class="text-white font-semibold">{{ $user->name }}</span>! Pantau aktivitas booking Anda.</p>
    </div>
    <a href="{{ route('venues.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-primary-fixed text-black font-bold text-sm hover:bg-white transition-all shadow-[0_0_20px_rgba(202,243,0,0.2)]">
        <span class="material-symbols-outlined text-[18px]">add</span>
        Booking Baru
    </a>
</div>

{{-- Stats Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-12">
    <div class="glass-card rounded-2xl p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full icon-glass flex items-center justify-center text-primary-fixed">
                <span class="material-symbols-outlined text-[20px]">confirmation_number</span>
            </div>
            <p class="text-[10px] text-white/40 uppercase tracking-widest font-semibold">Total</p>
        </div>
        <p class="text-3xl font-black text-white tracking-tight">{{ $totalBookings }}</p>
        <p class="text-xs text-white/30 mt-1">Semua booking</p>
    </div>

    <div class="glass-card rounded-2xl p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full icon-glass flex items-center justify-center text-yellow-400">
                <span class="material-symbols-outlined text-[20px]">hourglass_top</span>
            </div>
            <p class="text-[10px] text-white/40 uppercase tracking-widest font-semibold">Pending</p>
        </div>
        <p class="text-3xl font-black text-white tracking-tight">{{ $pendingBookings }}</p>
        <p class="text-xs text-white/30 mt-1">Menunggu pembayaran</p>
    </div>

    <div class="glass-card rounded-2xl p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full icon-glass flex items-center justify-center text-blue-400">
                <span class="material-symbols-outlined text-[20px]">payments</span>
            </div>
            <p class="text-[10px] text-white/40 uppercase tracking-widest font-semibold">Paid</p>
        </div>
        <p class="text-3xl font-black text-white tracking-tight">{{ $paidBookings }}</p>
        <p class="text-xs text-white/30 mt-1">Menunggu verifikasi</p>
    </div>

    <div class="glass-card rounded-2xl p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full icon-glass flex items-center justify-center text-green-400">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
            </div>
            <p class="text-[10px] text-white/40 uppercase tracking-widest font-semibold">Completed</p>
        </div>
        <p class="text-3xl font-black text-white tracking-tight">{{ $completedBookings }}</p>
        <p class="text-xs text-white/30 mt-1">Selesai</p>
    </div>
</div>

{{-- Upcoming Booking --}}
@if($upcomingBooking)
    @php
        $courtName = $upcomingBooking->court->name ?? 'Lapangan';
        $venueName = $upcomingBooking->court->venue->name ?? 'Venue';
        $venueImage = $upcomingBooking->court->venue->image ?? null;
        $dateFormatted = $upcomingBooking->booking_date instanceof \Carbon\Carbon
            ? $upcomingBooking->booking_date->format('d M Y')
            : \Carbon\Carbon::parse($upcomingBooking->booking_date)->format('d M Y');
        $start = substr($upcomingBooking->start_time, 0, 5);
        $end = substr($upcomingBooking->end_time, 0, 5);
        $price = number_format($upcomingBooking->total_price, 0, ',', '.');
    @endphp

    <div class="mb-10">
        <h2 class="text-xl font-bold text-white/80 tracking-tight mb-6 flex items-center gap-3">
            <span class="w-1 h-6 rounded-full bg-primary-fixed"></span>
            Booking Mendatang
        </h2>
        <div class="glass-card rounded-2xl glow-lime overflow-hidden p-1">
            <div class="bg-[#111]/80 rounded-xl p-6 md:p-8 flex flex-col md:flex-row gap-6 items-stretch">
                <div class="relative w-full md:w-56 h-40 rounded-xl overflow-hidden shrink-0 group">
                    @if($venueImage)
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ asset('storage/' . $venueImage) }}" alt="{{ $venueName }}" />
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#2a2a2a] to-[#111] flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-white/20">sports_tennis</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-3 left-3">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-primary-fixed/10 text-primary-fixed border border-primary-fixed/20 backdrop-blur-md flex items-center gap-2 w-max">
                            <span class="liquid-dot pulse-dot text-primary-fixed bg-primary-fixed"></span>
                            {{ ucfirst($upcomingBooking->status) }}
                        </span>
                    </div>
                </div>
                <div class="flex-1 flex flex-col justify-between py-1">
                    <div>
                        <h3 class="text-2xl font-bold text-white tracking-tight mb-1">{{ $courtName }}</h3>
                        <p class="text-white/50 text-base font-light">{{ $venueName }}</p>
                    </div>
                    <div class="flex flex-wrap gap-6 mt-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full icon-glass flex items-center justify-center text-primary-fixed">
                                <span class="material-symbols-outlined text-[16px]">calendar_month</span>
                            </div>
                            <div>
                                <p class="text-[10px] text-white/40 uppercase tracking-widest font-semibold mb-0.5">Tanggal</p>
                                <p class="text-sm text-white font-medium">{{ $dateFormatted }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full icon-glass flex items-center justify-center text-primary-fixed">
                                <span class="material-symbols-outlined text-[16px]">schedule</span>
                            </div>
                            <div>
                                <p class="text-[10px] text-white/40 uppercase tracking-widest font-semibold mb-0.5">Waktu</p>
                                <p class="text-sm text-white font-medium">{{ $start }} - {{ $end }} <span class="text-white/40">({{ $upcomingBooking->duration }} Jam)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-56 flex flex-col justify-between border-t md:border-t-0 md:border-l border-white/10 pt-6 md:pt-2 md:pl-8">
                    <div>
                        <p class="text-[10px] text-white/40 uppercase tracking-widest font-bold mb-1">Total</p>
                        <p class="text-3xl font-black price-gradient tracking-tighter">Rp {{ $price }}</p>
                    </div>
                    <a href="{{ route('bookings.index') }}" class="mt-4 w-full py-2.5 rounded-xl icon-glass text-white/70 hover:text-white hover:bg-white/10 text-sm font-medium flex items-center justify-center gap-2 transition-all">
                        <span class="material-symbols-outlined text-[16px]">visibility</span>
                        Detail
    </a>
</div>
@endsection
            </div>
        </div>
    </div>
@endif

