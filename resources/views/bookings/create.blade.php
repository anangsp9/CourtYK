<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Booking {{ $court->name }} &mdash; CourtYK</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-panel {
            background: rgba(19, 19, 19, 0.4);
            backdrop-filter: blur(30px);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 0.5px solid rgba(255, 255, 255, 0.05);
            border-right: 0.5px solid rgba(255, 255, 255, 0.05);
            border-bottom: 0.5px solid rgba(255, 255, 255, 0.05);
        }

        .electric-glow {
            box-shadow: 0 0 20px rgba(202, 243, 0, 0.3);
        }

        .neon-text-glow {
            text-shadow: 0 0 10px rgba(202, 243, 0, 0.5);
        }

        .glass-card {
            background: rgba(14, 14, 14, 0.4);
            backdrop-filter: blur(30px);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 0.5px solid rgba(255, 255, 255, 0.1);
            border-right: 0.5px solid rgba(255, 255, 255, 0.1);
            border-bottom: 0.5px solid rgba(255, 255, 255, 0.05);
        }

        @keyframes pulse-subtle {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .animate-pulse-subtle {
            animation: pulse-subtle 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        ::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
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
                    borderRadius: {
                        DEFAULT: "1rem",
                        lg: "2rem",
                        xl: "3rem",
                        full: "9999px"
                    },
                    spacing: {
                        "base-unit": "8px",
                        "gutter": "1.5rem",
                        "layer-gap": "2rem",
                        "container-padding-mobile": "1.25rem",
                        "container-padding-desktop": "2.5rem"
                    },
                    fontFamily: {
                        "display-lg": ["Inter"],
                        "title-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    fontSize: {
                        "display-lg": ["48px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.04em",
                            "fontWeight": "700"
                        }],
                        "title-md": ["20px", {
                            "lineHeight": "1.4",
                            "fontWeight": "500"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }]
                    }
                }
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-background text-on-background min-h-screen font-body-lg selection:bg-primary-fixed selection:text-on-primary-fixed">

    @php
        $floor = config('courts.floor_types.' . $court->floor_type);
        $type = config('courts.court_types.' . $court->court_type);
    @endphp

    <header
        class="fixed top-0 w-full z-50 bg-surface/60 backdrop-blur-3xl border-b border-white/10 shadow-[0px_20px_40px_rgba(0,0,0,0.5)]">
        <div class="flex items-center justify-between px-gutter h-16 w-full max-w-7xl mx-auto">
            <span class="text-2xl font-black italic tracking-tighter text-white">
                Court<span class="text-primary-fixed">YK</span>
            </span>
            <div class="hidden md:flex gap-8 items-center">
                <a href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'text-primary-fixed' : 'text-on-surface-variant hover:text-primary-fixed' }} font-label-sm uppercase tracking-widest transition-colors">Dashboard</a>
                <a href="{{ route('bookings.index') }}"
                    class="text-on-surface-variant hover:text-primary-fixed font-label-sm uppercase tracking-widest transition-colors">My
                    Bookings</a>
            </div>
            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <div class="flex items-center">
                            <div
                                class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/5 bg-white/[0.03] inner-glow m-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#d4ff00] animate-pulse"></span>
                                <span class="text-on-surface text-xs font-semibold tracking-wide">
                                    {{ Auth::user()->name }}
                                </span>
                            </div>
                            <div class="relative" x-data="{ open: false }" @scroll.window="open = false">
                                <div @click="open = !open">
                                    <button
                                        class="bg-primary-fixed text-on-primary p-2 rounded-full electric-glow hover:scale-105 active:scale-95 transition-all flex items-center justify-center focus:outline-none"
                                        title="{{ Auth::user()->name }}">
                                        <span class="material-symbols-outlined">person</span>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="absolute right-0 top-full mt-5 w-56 glass-card rounded-2xl p-2 z-50"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95">
                                    <div class="block px-4 py-2 text-xs text-white/50 border-b border-white/10">
                                        Hi, <strong class="text-white/90">{{ Auth::user()->name }}</strong> 👋
                                    </div>

                                    <a href="{{ route('dashboard') }}" @click="open = false"
                                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/5 hover:text-white transition-all text-sm">
                                        <span class="material-symbols-outlined text-[18px]">dashboard</span>
                                        Dashboard
                                    </a>

                                    <a href="{{ route('profile.edit') }}" @click="open = false"
                                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/5 hover:text-white transition-all text-sm">
                                        <span class="material-symbols-outlined text-[18px]">account_circle</span>
                                        Profile
                                    </a>

                                    <hr class="border-white/10 my-1">

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" @click="open = false"
                                            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition-all text-sm mt-1">
                                            <span class="material-symbols-outlined text-[18px]">logout</span>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-white font-title-md text-sm px-5 py-2 rounded-full border border-white/20 hover:bg-white/10 hover:border-primary-fixed/50 hover:text-primary-fixed active:scale-95 transition-all max-md:hidden">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="bg-primary-fixed/90 text-black font-title-md text-sm px-5 py-2 rounded-full hover:bg-primary-fixed active:scale-95 transition-all max-md:hidden">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <main class="pt-24 pb-32 px-gutter max-w-7xl mx-auto">

        <section class="mb-layer-gap relative overflow-hidden rounded-lg">
            <div class="absolute inset-0 z-0">
                @if ($court->venue->image)
                    <div class="w-full h-full bg-cover bg-center opacity-40 scale-105"
                        style="background-image: url('{{ asset('storage/' . $court->venue->image) }}')"></div>
                @else
                    <div
                        class="w-full h-full bg-gradient-to-br from-surface-container-highest to-background opacity-60">
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
            </div>
            <div class="relative z-10 p-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span
                        class="inline-block px-3 py-1 rounded-full bg-primary-fixed/20 text-primary-fixed font-label-sm uppercase tracking-widest mb-4 border border-primary-fixed/30">Premium
                        Court</span>
                    <h1 class="font-display-lg text-display-lg text-primary mb-2">{{ $court->name }}</h1>
                    <p class="text-on-surface-variant font-body-lg max-w-xl">
                        @if ($floor)
                            {{ $floor['label'] }}
                        @endif
                        @if ($floor && $type)
                            &bull;
                        @endif
                        @if ($type)
                            {{ $type['label'] }}
                        @endif
                    </p>
                </div>
                <div class="glass-panel p-6 rounded-lg text-left md:text-right min-w-[200px]">
                    <p class="text-on-surface-variant font-label-sm uppercase mb-1">Hourly Rate</p>
                    <div class="text-primary-fixed font-display-lg text-headline-lg-mobile neon-text-glow">Rp
                        {{ number_format($court->price_per_hour, 0, ',', '.') }}<span
                            class="text-title-md opacity-60">/hr</span></div>
                </div>
            </div>
        </section>

        @if (session('success'))
            <div class="glass-panel p-4 rounded-lg border-primary-fixed/50 text-primary-fixed mb-6">
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-primary-fixed">check_circle</span>
                    <div>
                        <p class="font-title-md">Success</p>
                        <p class="text-label-sm text-on-surface-variant">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="glass-panel p-4 rounded-lg border-red-500/50 text-red-400 mb-6">
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-red-400">error</span>
                    <div>
                        <p class="font-title-md">Error</p>
                        <p class="text-label-sm text-on-surface-variant">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <div class="lg:col-span-8 space-y-8">

                <div class="glass-panel p-8 rounded-lg">
                    <h3 class="font-title-md text-title-md text-primary mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary-fixed">calendar_today</span>
                        Pilih Tanggal
                    </h3>
                    <form method="GET" id="date-form">
                        <input type="date" name="date" value="{{ $date }}"
                            min="{{ now()->format('Y-m-d') }}" onchange="this.form.submit()"
                            class="w-full bg-white/5 border border-white/10 rounded-lg p-4 font-body-lg text-on-background focus:outline-none focus:border-primary-fixed focus:ring-1 focus:ring-primary-fixed transition-all">
                    </form>
                </div>

                <div class="glass-panel p-8 rounded-lg">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-3">
                        <h3 class="font-title-md text-title-md text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary-fixed">schedule</span>
                            Slot Waktu
                            <span
                                class="text-label-sm text-on-surface-variant font-normal">({{ \Carbon\Carbon::parse($date)->format('d M Y') }})</span>
                        </h3>
                        <div class="flex gap-4">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-primary-fixed electric-glow"></div>
                                <span class="text-label-sm text-on-surface-variant">Available</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-surface-container-highest"></div>
                                <span class="text-label-sm text-on-surface-variant">Booked</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-4">
                        @foreach ($slots as $slot)
                            @if (in_array($slot, $bookedSlots))
                                <div
                                    class="flex flex-col items-center justify-center p-4 rounded-lg bg-surface-container-highest/40 border border-white/5 text-on-surface-variant opacity-40 cursor-not-allowed">
                                    <span class="font-title-md">{{ $slot }}</span>
                                </div>
                            @else
                                <button type="button" data-time="{{ $slot }}"
                                    class="time-slot flex flex-col items-center justify-center p-4 rounded-lg bg-primary-fixed/10 border border-primary-fixed text-primary-fixed hover:bg-primary-fixed hover:text-on-primary-fixed transition-all scale-95 active:scale-90">
                                    <span class="font-title-md">{{ $slot }}</span>
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 sticky top-24">
                <div class="glass-panel p-8 rounded-lg space-y-6">
                    <h3 class="font-title-md text-title-md text-primary">Detail Booking</h3>

                    <form action="{{ route('bookings.store', $court) }}" method="POST" id="booking-form">
                        @csrf
                        <input type="hidden" name="booking_date" value="{{ $date }}">
                        <input type="hidden" name="start_time" id="start_time_hidden" value="">

                        <div class="space-y-4">
                            <div>
                                <label
                                    class="block text-label-sm text-on-surface-variant uppercase tracking-widest mb-2">Jam
                                    Mulai</label>
                                <select name="start_time_select" id="start_time_select"
                                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-on-background focus:border-primary-fixed transition-all">
                                    <option class="bg-surface" value="">-- Pilih Jam Mulai --</option>
                                    @foreach ($slots as $slot)
                                        @if (!in_array($slot, $bookedSlots))
                                            <option class="bg-surface" value="{{ $slot }}">
                                                {{ $slot }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-label-sm text-on-surface-variant uppercase tracking-widest mb-2">Durasi
                                    Main</label>
                                <select name="duration"
                                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-on-background focus:border-primary-fixed transition-all">
                                    <option class="bg-surface" value="1">1 Jam</option>
                                    <option class="bg-surface" value="2">2 Jam</option>
                                    <option class="bg-surface" value="3">3 Jam</option>
                                    <option class="bg-surface" value="4">4 Jam</option>
                                </select>
                            </div>
                        </div>

                        <hr class="border-white/10 mt-6">

                        <div class="space-y-3 mt-6">
                            <div class="flex justify-between text-body-lg">
                                <span class="text-on-surface-variant">Sewa Lapangan</span>
                                <span>Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-headline-lg-mobile font-headline-lg-mobile pt-2">
                                <span>Total</span>
                                <span class="text-primary-fixed neon-text-glow" id="total-display">Rp
                                    {{ number_format($court->price_per_hour, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-4 mt-6 bg-primary-fixed text-on-primary-fixed font-title-md text-title-md rounded-lg electric-glow hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                            Konfirmasi Booking
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </form>

                    @if ($errors->any())
                        <div class="p-4 rounded-lg bg-red-500/20 border border-red-500/40 text-red-400">
                            <ul class="text-label-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <nav
        class="md:hidden fixed bottom-0 w-full z-50 rounded-t-xl bg-surface-container-lowest/40 backdrop-blur-3xl border-t border-white/15 shadow-[0px_-10px_30px_rgba(0,0,0,0.3)]">
        <div class="flex justify-around items-center pt-3 pb-8 px-4 w-full">
            <a href="{{ route('dashboard') }}"
                class="flex flex-col items-center gap-1 {{ request()->routeIs('dashboard') ? 'text-primary-fixed drop-shadow-[0_0_8px_rgba(202,243,0,0.5)]' : 'text-on-surface-variant opacity-60' }}">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-label-sm text-label-sm">Dashboard</span>
            </a>
            <a href="{{ route('bookings.index') }}"
                class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60">
                <span class="material-symbols-outlined">confirmation_number</span>
                <span class="font-label-sm text-label-sm">Bookings</span>
            </a>
            <a href="{{ route('profile.edit') }}"
                class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60">
                <span class="material-symbols-outlined">account_circle</span>
                <span class="font-label-sm text-label-sm">Profile</span>
            </a>
        </div>
    </nav>

    <script>
        const startTimeHidden = document.getElementById('start_time_hidden');
        const startTimeSelect = document.getElementById('start_time_select');
        const durationSelect = document.querySelector('select[name="duration"]');
        const totalDisplay = document.getElementById('total-display');
        const pricePerHour = {{ $court->price_per_hour }};

        function updateTotal() {
            const dur = parseInt(durationSelect.value) || 1;
            const total = pricePerHour * dur;
            totalDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        function syncTime(time) {
            startTimeHidden.value = time;
            startTimeSelect.value = time;
        }

        document.querySelectorAll('.time-slot').forEach(slot => {
            slot.addEventListener('click', function() {
                document.querySelectorAll('.time-slot').forEach(s => {
                    s.classList.remove('border-2', 'bg-primary-fixed/20', 'electric-glow');
                    s.classList.add('bg-primary-fixed/10', 'border');
                });
                this.classList.remove('bg-primary-fixed/10', 'border');
                this.classList.add('bg-primary-fixed/20', 'border-2', 'electric-glow');
                syncTime(this.dataset.time);
            });
        });

        startTimeSelect.addEventListener('change', function() {
            startTimeHidden.value = this.value;
            document.querySelectorAll('.time-slot').forEach(s => {
                s.classList.remove('border-2', 'bg-primary-fixed/20', 'electric-glow');
                s.classList.add('bg-primary-fixed/10', 'border');
            });
            if (this.value) {
                const match = document.querySelector(`.time-slot[data-time="${this.value}"]`);
                if (match) {
                    match.classList.remove('bg-primary-fixed/10', 'border');
                    match.classList.add('border-2', 'bg-primary-fixed/20', 'electric-glow');
                }
            }
        });

        durationSelect.addEventListener('change', updateTotal);

        document.getElementById('booking-form').addEventListener('submit', function(e) {
            if (!startTimeHidden.value) {
                e.preventDefault();
                alert('Silakan pilih jam mulai terlebih dahulu.');
            }
        });
    </script>
</body>

</html>
