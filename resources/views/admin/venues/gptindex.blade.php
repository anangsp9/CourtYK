<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>CourtYK Admin - Venue Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-error-container": "#ffdad6",
                        "surface-container-low": "#1c1b1b",
                        "on-primary-fixed-variant": "#3e4c00",
                        "surface-bright": "#393939",
                        "on-tertiary-container": "#656464",
                        "surface-container-high": "#2a2a2a",
                        "surface-variant": "#353534",
                        "surface-container-highest": "#353534",
                        "surface-tint": "#b0d500",
                        "primary-container": "#caf300",
                        "on-secondary-fixed": "#161b2b",
                        "on-surface-variant": "#c5c9ac",
                        "tertiary": "#ffffff",
                        "on-background": "#e5e2e1",
                        "surface-container": "#201f1f",
                        "inverse-surface": "#e5e2e1",
                        "secondary-fixed": "#dee1f7",
                        "background": "#131313",
                        "inverse-primary": "#536600",
                        "secondary-container": "#414658",
                        "on-tertiary-fixed-variant": "#474746",
                        "outline-variant": "#444932",
                        "surface-container-lowest": "#0e0e0e",
                        "secondary-fixed-dim": "#c2c6db",
                        "error-container": "#93000a",
                        "on-tertiary-fixed": "#1b1b1c",
                        "on-secondary-container": "#b0b4c9",
                        "on-primary-fixed": "#171e00",
                        "secondary": "#c2c6db",
                        "surface-dim": "#131313",
                        "on-secondary-fixed-variant": "#414658",
                        "on-primary-container": "#596c00",
                        "primary-fixed": "#caf300",
                        "inverse-on-surface": "#313030",
                        "tertiary-container": "#e5e2e1",
                        "on-tertiary": "#303030",
                        "tertiary-fixed": "#e5e2e1",
                        "primary-fixed-dim": "#b0d500",
                        "on-primary": "#2a3400",
                        "outline": "#8f9378",
                        "surface": "#131313",
                        "error": "#ffb4ab",
                        "on-surface": "#e5e2e1",
                        "on-error": "#690005",
                        "on-secondary": "#2b3040",
                        "tertiary-fixed-dim": "#c8c6c5",
                        "primary": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "layer-gap": "2rem",
                        "gutter": "1.5rem",
                        "container-padding-mobile": "1.25rem",
                        "container-padding-desktop": "2.5rem",
                        "base-unit": "8px"
                    },
                    "fontFamily": {
                        "headline-lg-mobile": ["Inter"],
                        "headline-lg": ["Inter"],
                        "display-lg": ["Inter"],
                        "body-lg": ["Inter"],
                        "title-md": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "700"}],
                        "body-lg": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "title-md": ["20px", {"lineHeight": "1.4", "fontWeight": "500"}],
                        "label-sm": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    <style>
        .inner-glow-lime {
            box-shadow: inset 0 0 12px rgba(202, 243, 0, 0.15);
        }
        .liquid-glass {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 0.5px solid rgba(255, 255, 255, 0.1);
            border-right: 0.5px solid rgba(255, 255, 255, 0.1);
            border-bottom: 0.5px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(30px);
        }
        .bloom-lime {
            box-shadow: 0 0 20px rgba(202, 243, 0, 0.4);
        }
        body {
            background-color: #131313;
            overflow-x: hidden;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #131313;
        }
        ::-webkit-scrollbar-thumb {
            background: #353534;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #b0d500;
        }
    </style>
</head>
<body class="bg-background text-on-surface">

    <aside class="fixed left-0 top-0 h-screen w-64 bg-surface-container dark:bg-surface-container-low/80 backdrop-blur-[30px] border-r border-white/15 z-50 flex flex-col py-8 shadow-[20px_0_40px_rgba(0,0,0,0.5)]">
        <div class="px-6 mb-10">
            <h1 class="font-display-lg text-display-lg text-primary-fixed drop-shadow-[0_0_10px_rgba(202,243,0,0.5)] leading-none">CourtYK</h1>
            <p class="font-label-sm text-label-sm text-on-surface-variant/60 tracking-widest mt-2">ADMIN CONSOLE</p>
        </div>
        <nav class="flex-1 space-y-2">
            <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:text-primary transition-colors hover:bg-white/5 hover:backdrop-blur-xl transition-all duration-300" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-title-md text-title-md">Overview</span>
            </a>
            <a class="flex items-center gap-3 px-6 py-3 text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime transition-all duration-300" href="#">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">location_on</span>
                <span class="font-title-md text-title-md">Venues</span>
            </a>
            <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:text-primary transition-colors hover:bg-white/5 hover:backdrop-blur-xl transition-all duration-300" href="#">
                <span class="material-symbols-outlined">sports_tennis</span>
                <span class="font-title-md text-title-md">Courts</span>
            </a>
            <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:text-primary transition-colors hover:bg-white/5 hover:backdrop-blur-xl transition-all duration-300" href="#">
                <span class="material-symbols-outlined">calendar_month</span>
                <span class="font-title-md text-title-md">Bookings</span>
            </a>
            <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:text-primary transition-colors hover:bg-white/5 hover:backdrop-blur-xl transition-all duration-300" href="#">
                <span class="material-symbols-outlined">payments</span>
                <span class="font-title-md text-title-md">Financials</span>
            </a>
        </nav>
        <div class="px-6 mt-auto">
            <a href="{{ route('admin.venues.create') }}" class="w-full flex items-center justify-center gap-2 py-4 bg-primary-container text-on-primary-fixed font-bold rounded-lg bloom-lime active:scale-95 transition-transform text-center block">
                <span class="material-symbols-outlined">add</span>
                <span>Tambah Venue</span>
            </a>
        </div>
    </aside>

    <main class="ml-64 min-h-screen relative z-10">
        <header class="sticky top-0 h-16 bg-transparent backdrop-blur-[20px] border-b border-white/15 flex justify-between items-center px-container-padding-desktop z-40">
            <div class="flex items-center gap-4 flex-1 max-w-2xl">
                <div class="relative w-full">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                    <input class="w-full bg-white/5 border border-white/10 rounded-full py-2 pl-10 pr-4 text-on-surface font-label-sm text-label-sm focus:outline-none focus:border-primary-fixed focus:bg-white/10 transition-all" placeholder="Search venues..." type="text"/>
                </div>
            </div>
        </header>

        <div class="p-container-padding-desktop">
            
            @if(session('success'))
                <div class="mb-6 p-4 rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-body-lg text-body-lg flex items-center gap-2">
                    <span class="material-symbols-outlined">check_circle</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">Venue Management</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant">Kelola daftar fasilitas lapangan yang terdaftar pada sistem.</p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('admin.venues.create') }}" class="px-6 py-3 bg-primary-container text-on-primary-fixed font-bold rounded-lg bloom-lime flex items-center gap-2 hover:scale-[1.02] active:scale-95 transition-all">
                        <span class="material-symbols-outlined">add</span>
                        Tambah Venue
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                @forelse($venues as $venue)
                    <div class="liquid-glass rounded-lg overflow-hidden flex flex-col group hover:shadow-[0_20px_40px_rgba(0,0,0,0.5)] transition-all duration-500">
                        <div class="h-44 relative overflow-hidden bg-white/5 flex items-center justify-center border-b border-white/5">
                            <span class="material-symbols-outlined text-6xl text-primary-fixed/20 group-hover:scale-110 transition-transform duration-500">sports_tennis</span>
                            <div class="absolute bottom-4 left-4">
                                <span class="text-xs font-mono px-2 py-1 bg-black/60 rounded border border-white/10 text-on-surface-variant">ID: {{ $venue->id }}</span>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-title-md text-title-md text-primary font-bold">{{ $venue->name }}</h3>
                                <div class="flex items-center gap-1 text-primary-fixed bg-primary-container/10 px-2 py-0.5 rounded text-[10px] font-bold border border-primary-fixed/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary-fixed animate-pulse"></span>
                                    ACTIVE
                                </div>
                            </div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1 mb-4">
                                <span class="material-symbols-outlined text-[16px]">location_on</span>
                                {{ $venue->address }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full border-2 border-dashed border-white/10 rounded-lg flex flex-col items-center justify-center p-12 text-center">
                        <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-4xl text-on-surface-variant">layers_clear</span>
                        </div>
                        <p class="font-title-md text-title-md text-on-surface-variant">Belum ada venue</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant/40 mt-2">Silakan klik tombol "Tambah Venue" untuk memasukkan data baru.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </main>

    <script>
        // Efek hover interaktif card
        document.querySelectorAll('.liquid-glass').forEach(card => {
            card.addEventListener('mousemove', (e) => {
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