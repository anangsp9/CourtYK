<!DOCTYPE html>
<html class="dark" lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{{ $venue->name }} - CourtGlass</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed": "#caf300",
                        "outline-variant": "#444932",
                        "on-tertiary-fixed-variant": "#474746",
                        "on-tertiary-container": "#656464",
                        "on-background": "#e5e2e1",
                        "primary": "#ffffff",
                        "error-container": "#93000a",
                        "on-tertiary-fixed": "#1b1b1c",
                        "on-surface": "#e5e2e1",
                        "background": "#131313",
                        "surface-container": "#201f1f",
                        "secondary-fixed": "#dee1f7",
                        "surface-container-highest": "#353534",
                        "on-secondary-container": "#b0b4c9",
                        "tertiary": "#ffffff",
                        "primary-container": "#caf300",
                        "on-secondary-fixed-variant": "#414658",
                        "inverse-primary": "#536600",
                        "on-error": "#690005",
                        "surface-container-lowest": "#0e0e0e",
                        "on-primary-fixed": "#171e00",
                        "surface-container-high": "#2a2a2a",
                        "inverse-surface": "#e5e2e1",
                        "secondary": "#c2c6db",
                        "primary-fixed-dim": "#b0d500",
                        "tertiary-fixed": "#e5e2e1",
                        "on-surface-variant": "#c5c9ac",
                        "on-error-container": "#ffdad6",
                        "surface-tint": "#b0d500",
                        "secondary-container": "#414658",
                        "tertiary-container": "#e5e2e1",
                        "surface-bright": "#393939",
                        "on-primary-container": "#596c00",
                        "tertiary-fixed-dim": "#c8c6c5",
                        "outline": "#8f9378",
                        "on-tertiary": "#303030",
                        "on-primary": "#2a3400",
                        "surface-dim": "#131313",
                        "surface": "#131313",
                        "on-secondary-fixed": "#161b2b",
                        "on-secondary": "#2b3040",
                        "surface-variant": "#353534",
                        "secondary-fixed-dim": "#c2c6db",
                        "surface-container-low": "#1c1b1b",
                        "on-primary-fixed-variant": "#3e4c00",
                        "error": "#ffb4ab",
                        "inverse-on-surface": "#313030"
                    },
                    "borderRadius": {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "base-unit": "8px",
                        "gutter": "1.5rem",
                        "layer-gap": "2rem",
                        "container-padding-mobile": "1.25rem",
                        "container-padding-desktop": "2.5rem"
                    },
                    "fontFamily": {
                        "display-lg": ["Inter"],
                        "title-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "700"}],
                        "title-md": ["20px", {"lineHeight": "1.4", "fontWeight": "500"}],
                        "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "body-lg": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}]
                    }
                }
            }
        }
    </script>
<style>
        body {
            background-color: #131313;
            color: #e5e2e1;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        .liquid-glass {
            background: rgba(32, 31, 31, 0.4);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 0.5px solid rgba(255, 255, 255, 0.1);
            border-right: 0.5px solid rgba(255, 255, 255, 0.1);
            border-bottom: 0.5px solid rgba(255, 255, 255, 0.05);
        }
        .inner-glow {
            box-shadow: inset 0 0 12px rgba(202, 243, 0, 0.08);
        }
        .button-bloom {
            box-shadow: 0 0 20px rgba(202, 243, 0, 0.3);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        @keyframes pulse-subtle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        .animate-pulse-subtle {
            animation: pulse-subtle 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="pb-24 md:pb-0">

@php
    $facilities = config('facilities');
@endphp

<!-- Top AppBar -->
<header class="fixed top-0 w-full z-50 bg-surface/60 backdrop-blur-3xl border-b border-white/10 shadow-[0px_20px_40px_rgba(0,0,0,0.5)]">
<div class="flex items-center justify-between px-gutter h-16 w-full max-w-7xl mx-auto">
<div class="flex items-center gap-4">
<button onclick="history.back()" class="md:hidden text-on-surface-variant hover:bg-white/5 transition-colors p-2 rounded-full scale-95 active:scale-90 transition-transform">
<span class="material-symbols-outlined">arrow_back</span>
</button>
<h1 class="font-display-lg text-headline-lg-mobile italic tracking-tighter text-primary-fixed">CourtYK</h1>
</div>
<nav class="hidden md:flex items-center gap-8">
<a class="font-title-md text-title-md text-on-surface-variant hover:bg-white/5 transition-colors px-4 py-2 rounded-lg" href="{{ url('/') }}">Home</a>
<a class="font-title-md text-title-md text-primary-fixed hover:bg-white/5 transition-colors px-4 py-2 rounded-lg" href="{{ route('venues.index') }}">Venues</a>
<a class="font-title-md text-title-md text-on-surface-variant hover:bg-white/5 transition-colors px-4 py-2 rounded-lg" href="{{ route('bookings.index') }}">Bookings</a>
<a class="font-title-md text-title-md text-on-surface-variant hover:bg-white/5 transition-colors px-4 py-2 rounded-lg" href="{{ route('profile.edit') }}">Profile</a>
</nav>
<div class="flex items-center gap-2">
<button class="text-primary-fixed hover:bg-white/5 transition-colors p-2 rounded-full scale-95 active:scale-90 transition-transform">
<span class="material-symbols-outlined">notifications</span>
</button>
<a href="{{ route('profile.edit') }}" class="text-primary-fixed hover:bg-white/5 transition-colors p-2 rounded-full scale-95 active:scale-90 transition-transform">
<span class="material-symbols-outlined">person</span>
</a>
</div>
</div>
</header>

<main class="pt-24 pb-32 px-gutter min-h-screen max-w-7xl mx-auto">

<!-- Hero Section -->
<section class="relative w-full aspect-[16/9] md:aspect-[21/9] rounded-xl md:rounded-lg overflow-hidden shadow-2xl">
    @if ($venue->image)
        <img class="w-full h-full object-fill" src="{{ asset('storage/' . $venue->image) }}" alt="{{ $venue->name }}"/>
    @else
        <div class="w-full h-full bg-surface-container-highest flex items-center justify-center text-on-surface-variant font-body-lg text-body-lg">
            No Image
        </div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent opacity-60"></div>
</section>

<!-- Venue Info Card -->
<section class="-mt-16 md:-mt-24 relative z-10">
<div class="liquid-glass inner-glow p-6 md:p-10 rounded-xl shadow-[0px_20px_40px_rgba(0,0,0,0.5)]">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div class="space-y-3">
<div class="flex items-center gap-2 text-primary-fixed">
<span class="material-symbols-outlined">location_on</span>
<span class="font-label-sm text-label-sm tracking-widest uppercase">{{ $venue->address }}</span>
</div>
<h2 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white">{{ $venue->name }}</h2>
    @if ($venue->description)
        <p class="font-body-lg text-body-lg text-on-surface-variant italic max-w-2xl opacity-80 border-l-2 border-primary-fixed/30 pl-4">
            "{{ $venue->description }}"
        </p>
    @endif
</div>
<div class="liquid-glass border-white/5 bg-white/5 px-6 py-4 rounded-lg flex flex-col gap-1 min-w-[200px]">
<span class="font-label-sm text-label-sm text-on-surface-variant opacity-60">Operasional</span>
<div class="flex items-center gap-2 text-white">
<span class="material-symbols-outlined text-primary-fixed text-sm">schedule</span>
<span class="font-title-md text-title-md">{{ \Carbon\Carbon::parse($venue->open_time)->format('H:i') }} — {{ \Carbon\Carbon::parse($venue->close_time)->format('H:i') }}</span>
</div>
</div>
</div>
</div>
</section>

<!-- Facilities Section -->
@if (filled($venue->featured_facilities))
<section class="mt-layer-gap mb-16">
<h3 class="font-headline-lg-mobile text-headline-lg-mobile text-white mb-8">Fasilitas Unggulan</h3>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach ($venue->featured_facilities as $key)
        @php $facility = $facilities[$key] ?? null; @endphp
        @if ($facility)
            <div class="liquid-glass inner-glow p-6 rounded-lg flex flex-col items-center text-center gap-4 group hover:bg-primary-fixed/5 transition-all">
                <span class="material-symbols-outlined text-primary-fixed text-3xl">{{ $facility['icon'] }}</span>
                <span class="font-label-sm text-label-sm text-on-surface">{{ $facility['label'] }}</span>
            </div>
        @endif
    @endforeach
</div>
</section>
@endif

<!-- Courts Grid Section -->
<section class="mt-layer-gap">
<div class="flex items-center justify-between mb-8 px-2">
<h3 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white flex items-center gap-3">
                    Daftar Court Tersedia
                    <span class="w-2 h-2 rounded-full bg-primary-fixed animate-pulse shadow-[0_0_8px_#caf300]"></span>
</h3>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($venue->courts as $court)
        @php
            $floor = config('courts.floor_types.' . $court->floor_type);
            $type = config('courts.court_types.' . $court->court_type);
        @endphp
        <div class="liquid-glass inner-glow group overflow-hidden rounded-xl transition-all duration-500 hover:-translate-y-2 p-6 space-y-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="font-headline-lg-mobile text-headline-lg-mobile text-white">{{ $court->name }}</h4>
                        @if ($floor || $type)
                            <p class="font-label-sm text-label-sm text-on-surface-variant">
                                @if ($floor){{ $floor['label'] }}@endif
                                @if ($floor && $type) &bull; @endif
                                @if ($type){{ $type['label'] }}@endif
                            </p>
                        @endif
                    </div>
                    <span class="material-symbols-outlined text-primary-fixed opacity-40">sports_tennis</span>
                </div>
                <div class="flex items-center justify-between pt-4 border-t border-white/10">
                    <div class="flex flex-col">
                        <span class="font-label-sm text-label-sm text-on-surface-variant opacity-60">Mulai dari</span>
                        <span class="font-title-md text-title-md text-primary-fixed">Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}<span class="text-xs text-on-surface-variant font-normal">/jam</span></span>
                    </div>
                    <a href="{{ route('bookings.create', $court) }}" class="bg-primary-fixed text-on-primary-fixed px-6 py-2.5 rounded-full font-label-sm text-label-sm uppercase tracking-wider button-bloom transition-transform active:scale-95">
                        Booking Sekarang
                    </a>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 bg-surface-container rounded-xl border border-white/10">
            <span class="material-symbols-outlined text-4xl text-on-surface-variant opacity-40">sports_tennis</span>
            <p class="mt-4 font-body-lg text-body-lg text-on-surface-variant">Belum ada lapangan yang terdaftar di venue ini.</p>
        </div>
    @endforelse
</div>
</section>

</main>

<!-- Bottom NavBar (Mobile Only) -->
<nav class="md:hidden fixed bottom-0 w-full z-50 bg-surface-container-lowest/40 backdrop-blur-3xl border-t border-white/15 rounded-t-xl shadow-[0px_-10px_30px_rgba(0,0,0,0.3)]">
<div class="flex justify-around items-center pt-3 pb-8 px-4 w-full">
<a class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 hover:text-primary-fixed/80" href="{{ url('/') }}">
<span class="material-symbols-outlined">stadium</span>
<span class="font-label-sm text-label-sm">Home</span>
</a>
<a class="flex flex-col items-center gap-1 text-primary-fixed" href="{{ route('venues.index') }}">
<span class="material-symbols-outlined">grid_view</span>
<span class="font-label-sm text-label-sm">Venues</span>
</a>
<a class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 hover:text-primary-fixed/80" href="{{ route('bookings.index') }}">
<span class="material-symbols-outlined">confirmation_number</span>
<span class="font-label-sm text-label-sm">Bookings</span>
</a>
<a class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 hover:text-primary-fixed/80" href="{{ route('profile.edit') }}">
<span class="material-symbols-outlined">account_circle</span>
<span class="font-label-sm text-label-sm">Profile</span>
</a>
</div>
</nav>

<script>
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                if(!btn.classList.contains('cursor-not-allowed')) {
                    btn.style.transform = 'scale(1.02)';
                }
            });
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'scale(1)';
            });
        });

        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 20) {
                header.classList.add('bg-surface/90');
                header.classList.remove('bg-surface/60');
            } else {
                header.classList.add('bg-surface/60');
                header.classList.remove('bg-surface/90');
            }
        });
    </script>
</body>
</html>
