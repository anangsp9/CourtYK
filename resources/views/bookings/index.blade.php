@extends('layouts.glass')

@section('title', 'CourtGlass | Riwayat Booking Saya')

@section('content')
    {{-- Header Section --}}
    <div class="mb-14 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-3">
            <h1 class="text-4xl md:text-5xl font-black text-gradient tracking-tight">Riwayat Booking Saya</h1>
            <p class="text-white/50 text-lg font-light max-w-xl leading-relaxed">Pantau jadwal latihan dan pertandingan Anda. Kelola pembayaran dengan mudah dalam satu dashboard transparan.</p>
        </div>
        <div>
            <button class="flex items-center gap-2 px-6 py-3 rounded-full icon-glass text-white/80 hover:text-white hover:bg-white/10 transition-all text-sm font-medium tracking-wide">
                <span class="material-symbols-outlined text-[18px]">filter_list</span>
                Semua Status
            </button>
        </div>
    </div>

    {{-- Booking Cards Loop --}}
    @forelse($bookings as $booking)
        @php
            $status = $booking->status;
            $courtName = $booking->court->name ?? 'Lapangan';
            $venueName = $booking->court->venue->name ?? 'Venue';
            $venueImage = $booking->court->venue->image ?? null;
            $dateFormatted = $booking->booking_date instanceof \Carbon\Carbon
                ? $booking->booking_date->format('d M Y')
                : \Carbon\Carbon::parse($booking->booking_date)->format('d M Y');
            $start = substr($booking->start_time, 0, 5);
            $end = substr($booking->end_time, 0, 5);
            $price = number_format($booking->total_price, 0, ',', '.');
        @endphp

        @if($status === 'pending')
            {{-- Pending Card (Full width, prominent) --}}
            <div class="mb-8 glass-card rounded-2xl glow-lime overflow-hidden p-1">
                <div class="bg-[#111]/80 rounded-xl p-6 md:p-8 flex flex-col lg:flex-row gap-8 items-stretch">
                    <div class="relative w-full lg:w-72 h-48 lg:h-auto rounded-xl overflow-hidden shrink-0 group">
                        @if($venueImage)
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ asset('storage/' . $venueImage) }}" alt="{{ $venueName }}" />
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#2a2a2a] to-[#111] flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-white/20">sports_tennis</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 backdrop-blur-md flex items-center gap-2 w-max">
                                <span class="liquid-dot pulse-dot text-yellow-400 bg-yellow-400"></span> Pending
                            </span>
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col justify-between py-2">
                        <div>
                            <h3 class="text-3xl font-bold text-white tracking-tight mb-1">{{ $courtName }}</h3>
                            <p class="text-white/50 text-base font-light">{{ $venueName }}</p>
                        </div>
                        <div class="flex flex-wrap gap-8 mt-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full icon-glass flex items-center justify-center text-primary-fixed">
                                    <span class="material-symbols-outlined text-[18px]">calendar_month</span>
                                </div>
                                <div>
                                    <p class="text-[10px] text-white/40 uppercase tracking-widest font-semibold mb-0.5">Tanggal</p>
                                    <p class="text-sm text-white font-medium">{{ $dateFormatted }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full icon-glass flex items-center justify-center text-primary-fixed">
                                    <span class="material-symbols-outlined text-[18px]">schedule</span>
                                </div>
                                <div>
                                    <p class="text-[10px] text-white/40 uppercase tracking-widest font-semibold mb-0.5">Waktu</p>
                                    <p class="text-sm text-white font-medium">{{ $start }} - {{ $end }} <span class="text-white/40">({{ $booking->duration }} Jam)</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-80 flex flex-col justify-between border-t lg:border-t-0 lg:border-l border-white/10 pt-6 lg:pt-2 lg:pl-8">
                        <div>
                            <p class="text-[10px] text-white/40 uppercase tracking-widest font-bold mb-1">Total Pembayaran</p>
                            <p class="text-4xl font-black price-gradient tracking-tighter">Rp {{ $price }}</p>
                        </div>
                        <div class="mt-6 space-y-4">
                            @if(!$booking->payment)
                                <form action="{{ route('payments.store', $booking) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    <div class="flex items-start gap-2 text-xs text-white/50 bg-white/5 p-3 rounded-lg border border-white/5">
                                        <span class="material-symbols-outlined text-[16px] text-yellow-400 shrink-0 mt-0.5">info</span>
                                        <p class="leading-relaxed">Upload bukti transfer untuk konfirmasi pembayaran.</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <div class="relative group flex-1">
                                            <input type="file" name="proof_image" required onchange="this.nextElementSibling.querySelector('span.file-label').textContent = this.files[0]?.name || 'Pilih File'" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                                            <div class="w-full h-full py-2.5 px-4 rounded-lg upload-portal text-white/60 text-xs font-medium flex items-center justify-center gap-2">
                                                <span class="material-symbols-outlined text-[18px]">cloud_upload</span>
                                                <span class="file-label truncate max-w-[100px] block">Pilih File</span>
                                            </div>
                                        </div>
                                        <button type="submit" class="px-6 py-2.5 rounded-lg bg-primary-fixed text-black font-bold text-sm hover:bg-white hover:shadow-[0_0_20px_rgba(202,243,0,0.4)] transition-all">
                                            Upload
                                        </button>
                                    </div>
                                    @error('proof_image')
                                        <p class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">warning</span>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </form>
                            @else
                                <div class="flex items-start gap-2 text-xs text-white/70 bg-blue-500/5 p-3 rounded-lg border border-blue-500/10">
                                    <span class="material-symbols-outlined text-[16px] text-blue-400 shrink-0 mt-0.5">hourglass_top</span>
                                    <p class="leading-relaxed">Bukti pembayaran sudah diupload. <strong class="text-blue-400">Menunggu verifikasi admin.</strong></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        @elseif($status === 'paid')
            {{-- Paid Card (Half width style in layout block) --}}
            <div class="mb-8 glass-card rounded-2xl flex flex-col overflow-hidden">
                <div class="relative h-48 w-full shrink-0">
                    @if($venueImage)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $venueImage) }}" alt="{{ $venueName }}" />
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#2a2a2a] to-[#111] flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-white/20">sports_tennis</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-blue-500/10 text-blue-400 border border-blue-500/20 backdrop-blur-md flex items-center gap-2">
                            <span class="liquid-dot pulse-dot text-blue-400 bg-blue-400"></span> Paid
                        </span>
                    </div>
                    <div class="absolute bottom-4 left-6">
                        <h3 class="text-2xl font-bold text-white tracking-tight">{{ $courtName }}</h3>
                        <p class="text-white/60 text-sm font-light">{{ $venueName }}</p>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-6 pb-6 border-b border-white/5">
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 text-white/70">
                                <span class="material-symbols-outlined text-[16px] text-primary-fixed">event</span>
                                <span class="text-sm font-medium">{{ $dateFormatted }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-white/70">
                                <span class="material-symbols-outlined text-[16px] text-primary-fixed">schedule</span>
                                <span class="text-sm font-medium">{{ $start }} - {{ $end }} <span class="text-white/40 text-xs">({{ $booking->duration }} Jam)</span></span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-white/40 uppercase tracking-widest font-bold mb-1">Total</p>
                            <p class="text-2xl font-black text-white tracking-tighter">Rp {{ $price }}</p>
                        </div>
                    </div>
                    <div class="bg-primary-fixed/5 border border-primary-fixed/10 rounded-xl p-4 flex items-center gap-4 backdrop-blur-sm">
                        <div class="w-8 h-8 rounded-full bg-primary-fixed/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[16px] text-primary-fixed animate-spin" style="animation-duration: 4s;">sync</span>
                        </div>
                        <p class="text-xs text-white/70 leading-relaxed">Bukti pembayaran telah diunggah. <strong class="text-primary-fixed/90 font-medium">Menunggu verifikasi admin (estimasi 10-15 menit).</strong></p>
                    </div>
                </div>
            </div>

        @elseif($status === 'completed')
            {{-- Completed Card (Dimmed style) --}}
            <div class="mb-8 glass-card rounded-2xl flex flex-col overflow-hidden opacity-70 hover:opacity-100 transition-opacity">
                <div class="relative h-48 w-full shrink-0">
                    @if($venueImage)
                        <img class="w-full h-full object-cover grayscale-[30%]" src="{{ asset('storage/' . $venueImage) }}" alt="{{ $venueName }}" />
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#2a2a2a] to-[#111] flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-white/20">sports_tennis</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-white/5 text-white/60 border border-white/10 backdrop-blur-md flex items-center gap-2">
                            <span class="liquid-dot text-white/60 bg-white/60"></span> Completed
                        </span>
                    </div>
                    <div class="absolute bottom-4 left-6">
                        <h3 class="text-2xl font-bold text-white tracking-tight">{{ $courtName }}</h3>
                        <p class="text-white/60 text-sm font-light">{{ $venueName }}</p>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-6">
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 text-white/50">
                                <span class="material-symbols-outlined text-[16px]">event</span>
                                <span class="text-sm font-medium">{{ $dateFormatted }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-white/50">
                                <span class="material-symbols-outlined text-[16px]">schedule</span>
                                <span class="text-sm font-medium">{{ $start }} - {{ $end }} <span class="text-white/30 text-xs">({{ $booking->duration }} Jam)</span></span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-white/30 uppercase tracking-widest font-bold mb-1">Total</p>
                            <p class="text-2xl font-black text-white/70 tracking-tighter">Rp {{ $price }}</p>
                        </div>
                    </div>
                    <button class="w-full py-3 rounded-xl icon-glass text-white/60 text-sm font-medium hover:text-white hover:bg-white/10 flex items-center justify-center gap-2 transition-all">
                        <span class="material-symbols-outlined text-[18px]">receipt_long</span>
                        Lihat E-Receipt
                    </button>
                </div>
            </div>

        @else
            {{-- Cancelled / Other Status Card --}}
            <div class="mb-8 glass-card rounded-2xl flex flex-col overflow-hidden opacity-50">
                <div class="relative h-48 w-full shrink-0">
                    @if($venueImage)
                        <img class="w-full h-full object-cover grayscale-[50%]" src="{{ asset('storage/' . $venueImage) }}" alt="{{ $venueName }}" />
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#2a2a2a] to-[#111] flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-white/10">sports_tennis</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-red-500/10 text-red-400 border border-red-500/20 backdrop-blur-md flex items-center gap-2">
                            <span class="liquid-dot text-red-400 bg-red-400"></span> {{ ucfirst($status) }}
                        </span>
                    </div>
                    <div class="absolute bottom-4 left-6">
                        <h3 class="text-2xl font-bold text-white tracking-tight">{{ $courtName }}</h3>
                        <p class="text-white/60 text-sm font-light">{{ $venueName }}</p>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 text-white/50">
                                <span class="material-symbols-outlined text-[16px]">event</span>
                                <span class="text-sm font-medium">{{ $dateFormatted }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-white/50">
                                <span class="material-symbols-outlined text-[16px]">schedule</span>
                                <span class="text-sm font-medium">{{ $start }} - {{ $end }} <span class="text-white/30 text-xs">({{ $booking->duration }} Jam)</span></span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-white/30 uppercase tracking-widest font-bold mb-1">Total</p>
                            <p class="text-2xl font-black text-white/50 tracking-tighter">Rp {{ $price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    @empty
        {{-- Empty State Card --}}
        <div class="glass-card rounded-2xl p-16 text-center">
            <span class="material-symbols-outlined text-6xl text-white/20 mb-4">confirmation_number</span>
            <p class="text-white/50 text-xl font-medium">Kamu belum memiliki riwayat booking lapangan.</p>
            <a href="{{ route('venues.index') }}" class="mt-6 inline-flex items-center gap-2 px-6 py-3 rounded-full bg-primary-fixed text-black font-bold text-sm hover:bg-white transition-all">
                <span class="material-symbols-outlined text-[18px]">search</span>
                Cari Venue
            </a>
        </div>
    @endforelse

    {{-- Premium Pagination --}}
    @if($bookings->hasPages())
        <nav class="mt-20 flex items-center justify-center gap-3">
            {{-- Previous Page Link --}}
            @if($bookings->onFirstPage())
                <span class="w-10 h-10 flex items-center justify-center rounded-full icon-glass text-white/20 cursor-not-allowed">
                    <span class="material-symbols-outlined text-[18px]">arrow_back_ios_new</span>
                </span>
            @else
                <a href="{{ $bookings->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-full icon-glass text-white/40 hover:text-white hover:bg-white/10 transition-colors">
                    <span class="material-symbols-outlined text-[18px]">arrow_back_ios_new</span>
                </a>
            @endif

            {{-- Numbers List --}}
            <div class="flex items-center gap-1 bg-black/40 p-1 rounded-full border border-white/5 backdrop-blur-md">
                @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                    @if ($page == $bookings->currentPage())
                        <span class="w-9 h-9 flex items-center justify-center rounded-full bg-primary-fixed text-black font-bold text-sm shadow-[0_0_15px_rgba(202,243,0,0.3)]">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="w-9 h-9 flex items-center justify-center rounded-full text-white/50 hover:text-white hover:bg-white/10 font-medium text-sm transition-colors">{{ $page }}</a>
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if($bookings->hasMorePages())
                <a href="{{ $bookings->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-full icon-glass text-white/40 hover:text-white hover:bg-white/10 transition-colors">
                    <span class="material-symbols-outlined text-[18px]">arrow_forward_ios</span>
                </a>
            @else
                <span class="w-10 h-10 flex items-center justify-center rounded-full icon-glass text-white/20 cursor-not-allowed">
                    <span class="material-symbols-outlined text-[18px]">arrow_forward_ios</span>
                </span>
            @endif
        </nav>
    @endif
@endsection