@php
    $facilities = config('facilities');
    $selectedFacilities = request('facilities', []);
@endphp

<!DOCTYPE html>
<html class="dark" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>CourtYK - Venue Discovery</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed": "#caf300",
                        "primary": "#ffffff",
                        "on-tertiary": "#303030",
                        "surface-container-high": "#2a2a2a",
                        "tertiary-container": "#e5e2e1",
                        "outline-variant": "#444932",
                        "secondary": "#c2c6db",
                        "on-surface-variant": "#c5c9ac",
                        "error-container": "#93000a",
                        "surface-container-highest": "#353534",
                        "tertiary-fixed-dim": "#c8c6c5",
                        "on-background": "#e5e2e1",
                        "on-secondary-fixed-variant": "#414658",
                        "background": "#131313",
                        "primary-container": "#caf300",
                        "surface-bright": "#393939",
                        "on-primary-container": "#596c00",
                        "on-tertiary-fixed-variant": "#474746",
                        "surface-container-lowest": "#0e0e0e",
                        "surface-dim": "#131313",
                        "secondary-fixed-dim": "#c2c6db",
                        "secondary-fixed": "#dee1f7",
                        "tertiary": "#ffffff",
                        "on-tertiary-fixed": "#1b1b1c",
                        "surface-tint": "#b0d500",
                        "inverse-on-surface": "#313030",
                        "on-error-container": "#ffdad6",
                        "on-secondary": "#2b3040",
                        "surface-container-low": "#1c1b1b",
                        "secondary-container": "#414658",
                        "surface-variant": "#353534",
                        "error": "#ffb4ab",
                        "on-secondary-container": "#b0b4c9",
                        "on-surface": "#e5e2e1",
                        "primary-fixed-dim": "#b0d500",
                        "on-secondary-fixed": "#161b2b",
                        "on-primary": "#2a3400",
                        "surface": "#131313",
                        "on-primary-fixed-variant": "#3e4c00",
                        "surface-container": "#201f1f",
                        "inverse-surface": "#e5e2e1",
                        "on-tertiary-container": "#656464",
                        "tertiary-fixed": "#e5e2e1",
                        "inverse-primary": "#536600",
                        "on-error": "#690005",
                        "on-primary-fixed": "#171e00",
                        "outline": "#8f9378"
                    },
                    "borderRadius": {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "gutter": "1.5rem",
                        "container-padding-desktop": "2.5rem",
                        "base-unit": "8px",
                        "container-padding-mobile": "1.25rem",
                        "layer-gap": "2rem"
                    },
                    "fontFamily": {
                        "title-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "display-lg": ["Inter"]
                    },
                    "fontSize": {
                        "title-md": ["20px", {
                            "lineHeight": "1.4",
                            "fontWeight": "500"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["48px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.04em",
                            "fontWeight": "700"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #131313;
            color: #e5e2e1;
            -webkit-font-smoothing: antialiased;
        }

        .liquid-glass {
            background: rgba(20, 20, 20, 0.4);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-top-color: rgba(255, 255, 255, 0.15);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .liquid-glass:hover {
            border-color: #caf300;
            box-shadow: 0 0 20px rgba(202, 243, 0, 0.2), inset 0 0 10px rgba(202, 243, 0, 0.1);
            transform: translateY(-4px);
        }

        @keyframes pulse-subtle {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.8;
            }
        }

        .animate-pulse-subtle {
            animation: pulse-subtle 3s infinite ease-in-out;
        }
    </style>
</head>

<body class="font-body-lg text-body-lg selection:bg-primary-fixed/30">
    <header
        class="fixed top-0 w-full z-50 bg-surface/60 backdrop-blur-3xl border-b border-white/10 shadow-[0px_20px_40px_rgba(0,0,0,0.5)]">
        <div class="flex items-center justify-between px-gutter h-16 w-full max-w-7xl mx-auto">
            <div class="flex items-center gap-2">
                <span
                    class="font-display-lg text-headline-lg-mobile italic tracking-tighter text-primary-fixed">CourtYK</span>
            </div>
            <div class="hidden md:flex items-center gap-8">
                <nav class="flex items-center gap-6">
                    <a class="text-on-surface-variant font-label-sm text-label-sm hover:bg-white/5 transition-colors px-3 py-1 rounded-full"
                        href="#">Home</a>
                    <a class="text-primary-fixed font-label-sm text-label-sm hover:bg-white/5 transition-colors px-3 py-1 rounded-full"
                        href="#">Courts</a>
                    <a class="text-on-surface-variant font-label-sm text-label-sm hover:bg-white/5 transition-colors px-3 py-1 rounded-full"
                        href="#">Bookings</a>
                </nav>
                <div class="h-6 w-px bg-white/10"></div>
                <div class="flex items-center gap-4">
                    <button
                        class="material-symbols-outlined text-on-surface-variant hover:bg-white/5 p-2 rounded-full transition-colors scale-95 active:scale-90 transition-transform">notifications</button>
                    <button
                        class="material-symbols-outlined text-on-surface-variant hover:bg-white/5 p-2 rounded-full transition-colors scale-95 active:scale-90 transition-transform">person</button>
                </div>
            </div>
            <div class="md:hidden flex items-center gap-3">
                <span class="material-symbols-outlined text-on-surface-variant">notifications</span>
                <span class="material-symbols-outlined text-on-surface-variant">person</span>
            </div>
        </div>
    </header>

    <main class="pt-24 pb-32 px-gutter min-h-screen max-w-7xl mx-auto">
        <div class="mb-layer-gap space-y-2">
            <h1
                class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary">
                Venues - Discovery</h1>
            <p class="text-on-surface-variant opacity-70">Experience premium badminton facilities in Yogyakarta's
                athletic heart.</p>
        </div>

        <!-- Wrapper utama -->
        <div class="sticky top-20 z-40 mb-10">

            <!-- 1. Tambahkan id="searchForm" pada tag form -->
            <form id="searchForm" action="{{ route('venues.index') }}" method="GET"
                class="liquid-glass rounded-xl p-3 md:p-4 flex flex-col md:flex-row items-center gap-4 shadow-xl">

                <div class="flex items-center gap-3 bg-white/5 rounded-lg px-4 py-2 w-full flex-1">
                    <span class="material-symbols-outlined text-primary-fixed text-sm">search</span>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama venue atau alamat..."
                        class="bg-transparent border-none focus:ring-0 text-sm w-full placeholder:text-on-surface-variant/50 text-white">
                </div>

                <button type="button" id="toggleFilter"
                    class="px-5 py-2 rounded-lg border border-white/10 hover:border-primary-fixed transition">
                    Filter
                </button>

                <button type="submit"
                    class="bg-primary-fixed text-on-primary px-6 py-2 rounded-lg font-label-sm hover:brightness-110 transition">
                    Cari
                </button>
            </form>

            <!-- 2. Panel Filter (di luar form) -->
            <div id="filterPanel" class="hidden mt-4 liquid-glass rounded-xl p-6 shadow-xl">
                <h3 class="text-lg font-semibold mb-4 text-primary">Filter Fasilitas</h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($facilities as $key => $facility)
                        <label class="flex items-center gap-3 cursor-pointer hover:bg-white/5 p-2 rounded transition">
                            <!-- Pastikan checkbox ini juga terhubung ke form jika ingin terbawa submit -->
                            <input type="checkbox" name="facilities[]" value="{{ $key }}" form="searchForm"
                                class="rounded border-gray-600 bg-transparent text-primary-fixed focus:ring-primary-fixed"
                                @checked(in_array($key, request('facilities', [])))>

                            <span class="material-symbols-outlined text-primary-fixed">
                                {{ $facility['icon'] }}
                            </span>
                            <span class="text-sm">{{ $facility['label'] }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="mt-6 flex justify-end gap-3 border-t border-white/10 pt-4">
                    <a href="{{ route('venues.index') }}"
                        class="px-5 py-2 rounded-lg border border-white/10 hover:bg-white/5 text-sm transition">
                        Reset
                    </a>

                    <!-- 3. Tambahkan atribut form="searchForm" pada tombol submit di dalam panel -->
                    <button type="submit" form="searchForm"
                        class="bg-primary-fixed text-on-primary px-5 py-2 rounded-lg font-semibold text-sm hover:brightness-110 transition">
                        Terapkan Filter
                    </button>
                </div>
            </div>
        </div>

        {{-- selected active filter --}}
        @if (request('search') || count($selectedFacilities))

            <div class="mb-8 space-y-3">

                <p class="text-sm font-medium text-on-surface-variant">
                    Filter Aktif
                </p>

                <div class="flex flex-wrap gap-3">

                    {{-- Search --}}
                    @if (request('search'))
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-fixed/15 border border-primary-fixed/20">

                            <span class="material-symbols-outlined text-sm text-primary-fixed">
                                search
                            </span>

                            <span class="text-sm">
                                {{ request('search') }}
                            </span>

                            <a href="{{ route('venues.index', request()->except('search')) }}"
                                class="material-symbols-outlined text-sm hover:text-red-400">

                                close

                            </a>

                        </span>
                    @endif

                    {{-- Facilities --}}
                    @foreach ($selectedFacilities as $selected)
                        @php
                            $facility = $facilities[$selected] ?? null;
                        @endphp

                        @if ($facility)
                            @php
                                $remaining = array_values(
                                    array_filter($selectedFacilities, fn($item) => $item !== $selected),
                                );
                            @endphp

                            <span
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-fixed/15 border border-primary-fixed/20">

                                <span class="material-symbols-outlined text-primary-fixed text-sm">

                                    {{ $facility['icon'] }}

                                </span>

                                <span class="text-sm">

                                    {{ $facility['label'] }}

                                </span>

                                <a href="{{ route('venues.index', array_merge(request()->except('facilities'), ['facilities' => $remaining])) }}"
                                    class="material-symbols-outlined text-sm hover:text-red-400">

                                    close

                                </a>

                            </span>
                        @endif
                    @endforeach

                </div>

            </div>

        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($venues as $venue)
                <div class="liquid-glass rounded-lg overflow-hidden group">
                    {{-- Gambar Venue dengan Validasi Storage --}}
                    <div class="relative h-56 overflow-hidden bg-surface-container-high">
                        @if ($venue->image)
                            <img src="{{ asset('storage/' . $venue->image) }}" alt="{{ $venue->name }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div
                                class="w-full h-full flex flex-col items-center justify-center text-on-surface-variant/40 gap-2">
                                <span class="material-symbols-outlined text-4xl">image_not_supported</span>
                                <span class="text-xs uppercase tracking-wider">No Image Available</span>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 flex gap-2">
                            <span
                                class="bg-background/80 backdrop-blur-md text-primary-fixed px-3 py-1 rounded-full font-label-sm text-label-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">star</span> 4.8
                            </span>
                        </div>
                    </div>

                    {{-- Konten Informasi Card --}}
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3
                                    class="font-title-md text-title-md text-primary group-hover:text-primary-fixed transition-colors line-clamp-1">
                                    {{ $venue->name }}
                                </h3>
                                <p class="text-on-surface-variant text-sm flex items-center gap-1 mt-1 line-clamp-1">
                                    <span
                                        class="material-symbols-outlined text-xs text-primary-fixed">location_on</span>
                                    {{ $venue->address }}
                                </p>
                            </div>
                        </div>

                        {{-- Lapangan & Waktu Operasional Terintegrasi Sistem --}}
                        <div class="flex items-center justify-between py-2 border-y border-white/5 text-sm">
                            <div class="flex flex-col">
                                <span
                                    class="text-on-surface-variant text-[10px] uppercase tracking-wider mb-0.5">Courts</span>
                                <span class="font-medium text-primary flex items-center gap-1">
                                    <span
                                        class="material-symbols-outlined text-sm text-primary-fixed">sports_tennis</span>
                                    {{ $venue->courts_count }} Lapangan
                                </span>
                            </div>
                            <div class="flex flex-col items-end border-l border-white/10 pl-6 w-1/2">
                                <span
                                    class="text-on-surface-variant text-[10px] uppercase tracking-wider mb-0.5">Operational</span>
                                <span class="font-medium text-primary flex items-center gap-1 text-xs md:text-sm">
                                    <span class="material-symbols-outlined text-sm text-primary-fixed">schedule</span>
                                    {{ \Carbon\Carbon::parse($venue->open_time)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($venue->close_time)->format('H:i') }}
                                </span>
                            </div>
                        </div>

                        {{-- Action Button Dynamic Route --}}
                        <a href="{{ route('venues.show', $venue) }}"
                            class="inline-block w-full text-center py-3 rounded-lg border border-primary-fixed/30 hover:bg-primary-fixed hover:text-on-primary transition-all font-label-sm text-label-sm text-white">
                            Lihat Detail & Booking
                        </a>
                    </div>
                </div>
            @empty
                {{-- State Jika Data Kosong --}}
                <div
                    class="col-span-full text-center py-16 liquid-glass rounded-xl flex flex-col items-center justify-center gap-4">
                    <span
                        class="material-symbols-outlined text-6xl text-primary-fixed animate-pulse-subtle">sports_scores</span>
                    <p class="text-on-surface-variant text-lg">Belum ada venue yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links Laravel --}}
        <div class="mt-12 bg-white/5 p-4 rounded-xl border border-white/5">
            {{ $venues->links() }}
        </div>
    </main>

    <nav
        class="md:hidden fixed bottom-0 w-full z-50 bg-surface-container-lowest/40 backdrop-blur-3xl border-t border-white/15 rounded-t-xl shadow-[0px_-10px_30px_rgba(0,0,0,0.3)]">
        <div class="flex justify-around items-center pt-3 pb-8 px-4 w-full">
            <button
                class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 font-label-sm text-label-sm hover:text-primary-fixed/80">
                <span class="material-symbols-outlined">home</span>
                <span>Home</span>
            </button>
            <button
                class="flex flex-col items-center gap-1 text-primary-fixed drop-shadow-[0_0_8px_rgba(202,243,0,0.5)] font-label-sm text-label-sm animate-pulse-subtle">
                <span class="material-symbols-outlined">grid_view</span>
                <span>Courts</span>
            </button>
            <button
                class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 font-label-sm text-label-sm hover:text-primary-fixed/80">
                <span class="material-symbols-outlined">confirmation_number</span>
                <span>Bookings</span>
            </button>
            <button
                class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 font-label-sm text-label-sm hover:text-primary-fixed/80">
                <span class="material-symbols-outlined">account_circle</span>
                <span>Profile</span>
            </button>
        </div>
    </nav>

    <script>
        const toggleFilter = document.getElementById('toggleFilter');
        const filterPanel = document.getElementById('filterPanel');

        toggleFilter.addEventListener('click', () => {
            filterPanel.classList.toggle('hidden');
        });

        document.querySelectorAll('.liquid-glass').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            });
        });
    </script>
</body>

</html>
