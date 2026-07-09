<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>CourtGlass | Riwayat Booking Saya</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0e0e0e;
            color: #e5e2e1;
            overflow-x: hidden;
        }

        .bg-mesh {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            background-image:
                radial-gradient(at 80% 0%, hsla(68,100%,48%,0.08) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(0,0%,100%,0.03) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(68,100%,48%,0.05) 0px, transparent 50%);
        }

        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.4;
            animation: float 20s infinite ease-in-out alternate;
        }
        .blob-1 { top: 10%; left: -10%; width: 400px; height: 400px; background: rgba(255,255,255,0.03); }
        .blob-2 { bottom: -20%; right: 10%; width: 500px; height: 500px; background: rgba(202,243,0,0.05); animation-delay: -5s; }

        @keyframes float {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(50px, 30px) scale(1.1); }
        }

        .glass-panel {
            background: rgba(20, 20, 20, 0.4);
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .glass-card {
            background: linear-gradient(145deg, rgba(35, 35, 35, 0.3) 0%, rgba(15, 15, 15, 0.5) 100%);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .glass-card:hover::before {
            opacity: 1;
        }

        .glow-lime {
            box-shadow: 0 0 30px rgba(202, 243, 0, 0.15), inset 0 0 20px rgba(202, 243, 0, 0.05);
            border-color: rgba(202, 243, 0, 0.2);
        }
        .glow-lime:hover {
            box-shadow: 0 0 40px rgba(202, 243, 0, 0.25), inset 0 0 30px rgba(202, 243, 0, 0.1);
            border-color: rgba(202, 243, 0, 0.4);
        }

        .liquid-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px currentColor;
        }

        .pulse-dot {
            animation: liquid-pulse 2s infinite ease-in-out;
        }

        @keyframes liquid-pulse {
            0%, 100% { transform: scale(1); opacity: 0.6; box-shadow: 0 0 8px currentColor; }
            50% { transform: scale(1.5); opacity: 1; box-shadow: 0 0 12px currentColor; }
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 200, 'GRAD' 0, 'opsz' 24;
        }

        .icon-glass {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.05);
            backdrop-filter: blur(8px);
        }

        .upload-portal {
            background: radial-gradient(circle at center, rgba(202,243,0,0.05) 0%, transparent 70%);
            border: 1px dashed rgba(202,243,0,0.3);
            transition: all 0.3s;
        }
        .upload-portal:hover {
            background: radial-gradient(circle at center, rgba(202,243,0,0.1) 0%, transparent 80%);
            border-color: rgba(202,243,0,0.6);
            transform: scale(1.02);
        }

        .text-gradient {
            background: linear-gradient(to right, #ffffff, #a0a0a0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .price-gradient {
            background: linear-gradient(135deg, #caf300, #98b600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-variant": "#353534",
                        "outline": "#8f9378",
                        "primary-container": "#caf300",
                        "on-surface": "#e5e2e1",
                        "on-primary-container": "#596c00",
                        "on-surface-variant": "#c5c9ac",
                        "primary": "#ffffff",
                        "primary-fixed": "#caf300",
                        "surface": "#131313",
                    },
                    "fontFamily": {
                        "sans": ["Inter", "sans-serif"],
                    }
                },
            },
        }
    </script>
</head>

<body class="bg-[#0e0e0e] text-on-surface selection:bg-primary-fixed selection:text-black">

    <div class="bg-mesh"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    {{-- TopAppBar --}}
    <header class="fixed top-0 w-full z-50 glass-panel border-b-0 border-white/5">
        <div class="flex items-center justify-between px-6 md:px-12 h-20 w-full max-w-[1440px] mx-auto">
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <span class="text-2xl font-black italic tracking-tighter text-white">
                    Court<span class="text-primary-fixed">YK</span>
                </span>
            </a>
            <nav class="hidden md:flex items-center gap-10">
                <a class="text-white/50 hover:text-white transition-colors text-sm font-medium tracking-wide uppercase" href="{{ url('/') }}">Home</a>
                <a class="text-white/50 hover:text-white transition-colors text-sm font-medium tracking-wide uppercase" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="text-primary-fixed font-bold text-sm tracking-wide uppercase drop-shadow-[0_0_10px_rgba(202,243,0,0.3)]" href="{{ route('bookings.index') }}">Bookings</a>
                <a class="text-white/50 hover:text-white transition-colors text-sm font-medium tracking-wide uppercase" href="{{ route('profile.edit') }}">Profile</a>
            </nav>
            <div class="flex items-center gap-5">
                <div class="flex items-center gap-4 pl-5 border-l border-white/10">
                    <div class="hidden md:block text-right">
                        <p class="text-sm font-bold text-white tracking-wide">{{ auth()->user()?->name ?? 'User' }}</p>
                        <p class="text-xs text-primary-fixed/80 font-medium">Pro Player</p>
                    </div>
                    <div class="w-11 h-11 rounded-full p-[2px] bg-gradient-to-tr from-primary-fixed/20 to-primary-fixed shadow-[0_0_15px_rgba(202,243,0,0.2)]">
                        <div class="w-full h-full rounded-full bg-[#2a2a2a] flex items-center justify-center text-white font-bold text-sm">
                            {{ substr(auth()->user()?->name ?? 'U', 0, 1) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-32 pb-32 px-4 md:px-12 max-w-[1440px] mx-auto min-h-screen relative z-10">

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mb-8 p-4 rounded-xl bg-primary-fixed/10 border border-primary-fixed/20 text-primary-fixed font-medium flex items-center gap-3 backdrop-blur-sm">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 font-medium flex items-center gap-3 backdrop-blur-sm">
                <span class="material-symbols-outlined text-[20px]">error</span>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 p-4 rounded-xl bg-red-500/10 border border-red-500/20 backdrop-blur-sm">
                <div class="flex items-center gap-3 mb-2 text-red-400 font-medium">
                    <span class="material-symbols-outlined text-[20px]">error</span>
                    Terjadi kesalahan:
                </div>
                <ul class="space-y-1 ml-9">
                    @foreach($errors->all() as $error)
                        <li class="text-red-400/80 text-sm">• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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

        {{-- Booking Cards --}}
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
                {{-- Paid Card (Half width) --}}
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
                {{-- Completed Card (Half width, dimmed) --}}
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
                {{-- Cancelled / Other Status --}}
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
                {{-- Previous Page --}}
                @if($bookings->onFirstPage())
                    <span class="w-10 h-10 flex items-center justify-center rounded-full icon-glass text-white/20 cursor-not-allowed">
                        <span class="material-symbols-outlined text-[18px]">arrow_back_ios_new</span>
                    </span>
                @else
                    <a href="{{ $bookings->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-full icon-glass text-white/40 hover:text-white hover:bg-white/10 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">arrow_back_ios_new</span>
                    </a>
                @endif

                <div class="flex items-center gap-1 bg-black/40 p-1 rounded-full border border-white/5 backdrop-blur-md">
                    @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                        @if ($page == $bookings->currentPage())
                            <span class="w-9 h-9 flex items-center justify-center rounded-full bg-primary-fixed text-black font-bold text-sm shadow-[0_0_15px_rgba(202,243,0,0.3)]">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="w-9 h-9 flex items-center justify-center rounded-full text-white/50 hover:text-white hover:bg-white/10 font-medium text-sm transition-colors">{{ $page }}</a>
                        @endif
                    @endforeach
                </div>

                {{-- Next Page --}}
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

    </main>

    {{-- BottomNavBar (Mobile only) --}}
    <nav class="md:hidden fixed bottom-0 w-full z-50 glass-panel border-t border-white/10 rounded-t-2xl shadow-[0px_-20px_40px_rgba(0,0,0,0.5)]">
        <div class="flex justify-around items-center pt-4 pb-8 px-4 w-full">
            <a class="flex flex-col items-center gap-1.5 text-white/40" href="{{ url('/') }}">
                <span class="material-symbols-outlined">stadium</span>
                <span class="text-[10px] font-medium tracking-wide uppercase">Home</span>
            </a>
            <a class="flex flex-col items-center gap-1.5 text-white/40" href="{{ route('venues.index') }}">
                <span class="material-symbols-outlined">grid_view</span>
                <span class="text-[10px] font-medium tracking-wide uppercase">Courts</span>
            </a>
            <a class="flex flex-col items-center gap-1.5 text-primary-fixed" href="{{ route('bookings.index') }}">
                <span class="material-symbols-outlined drop-shadow-[0_0_10px_rgba(202,243,0,0.5)]" style="font-variation-settings: 'FILL' 1;">confirmation_number</span>
                <span class="text-[10px] font-bold tracking-wide uppercase">Bookings</span>
            </a>
            <a class="flex flex-col items-center gap-1.5 text-white/40" href="{{ route('profile.edit') }}">
                <span class="material-symbols-outlined">account_circle</span>
                <span class="text-[10px] font-medium tracking-wide uppercase">Profile</span>
            </a>
        </div>
    </nav>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</body>
</html>
