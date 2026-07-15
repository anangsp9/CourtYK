<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourtYK Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0e0e0e;
            color: #e5e2e1;
            overflow-x: hidden;
        }
        .glass-card {
            backdrop-filter: blur(30px);
            background: rgba(32, 31, 31, 0.6);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 1px solid rgba(255, 255, 255, 0.05);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .inner-glow-lime {
            box-shadow: inset 0 0 12px rgba(202, 243, 0, 0.15);
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .custom-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.1);
            border-radius: 2px;
        }
        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.2);
        }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.08);
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.16);
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 1000px rgba(20, 20, 20, 0.95) inset !important;
            -webkit-text-fill-color: #e5e2e1 !important;
            caret-color: #e5e2e1;
        }

        input[type='number']::-webkit-outer-spin-button,
        input[type='number']::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type='number'] {
            -moz-appearance: textfield;
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
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
                    borderRadius: {
                        DEFAULT: "1rem",
                        lg: "2rem",
                        xl: "3rem",
                        full: "9999px"
                    },
                    spacing: {
                        "layer-gap": "2rem",
                        "gutter": "1.5rem",
                        "container-padding-mobile": "1.25rem",
                        "container-padding-desktop": "2.5rem",
                        "base-unit": "8px"
                    },
                    fontFamily: {
                        "display-lg": ["Inter"],
                        "headline-lg": ["Inter"],
                        "title-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    fontSize: {
                        "display-lg": ["48px", { lineHeight: "1.1", letterSpacing: "-0.04em", fontWeight: "700" }],
                        "headline-lg": ["32px", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "600" }],
                        "title-md": ["20px", { lineHeight: "1.4", fontWeight: "500" }],
                        "body-lg": ["16px", { lineHeight: "1.6", fontWeight: "400" }],
                        "label-sm": ["12px", { lineHeight: "1", letterSpacing: "0.05em", fontWeight: "600" }]
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-on-background min-h-screen flex overflow-hidden" x-data="{ sidebarOpen: false }">

    <div x-show="sidebarOpen" @@click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-cloak></div>

    <aside class="fixed inset-y-0 left-0 z-50 w-60 bg-surface-container backdrop-blur-[30px] border-r border-white/15 flex flex-col shadow-[20px_0_40px_rgba(0,0,0,0.5)] transition-transform duration-300 -translate-x-full lg:translate-x-0"
           :class="sidebarOpen && 'translate-x-0'">

        <div class="px-5 pt-6 pb-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative shrink-0">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-fixed/30 to-primary-fixed/5 border border-primary-fixed/25 flex items-center justify-center shadow-[0_0_15px_rgba(202,243,0,0.15)]">
                            <span class="material-symbols-outlined text-primary-fixed text-xl">sports_tennis</span>
                        </div>
                        <div class="absolute -inset-1 rounded-xl bg-primary-fixed/10 blur-md -z-10"></div>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold text-primary-fixed drop-shadow-[0_0_12px_rgba(202,243,0,0.6)] leading-tight">CourtYK</h1>
                        <div class="flex items-center gap-1.5 mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-fixed shadow-[0_0_6px_rgba(202,243,0,0.8)]"></span>
                            <p class="text-[10px] text-on-surface-variant tracking-[0.15em] uppercase font-medium">Admin Console</p>
                        </div>
                    </div>
                </div>
                <button @@click="sidebarOpen = false" class="lg:hidden relative flex items-center justify-center w-9 h-9 rounded-full bg-white/5 border border-white/10 text-on-surface-variant hover:text-primary-fixed hover:bg-primary/20 hover:border-primary/40 hover:scale-110 active:scale-95 transition-all duration-200 group">
                    <span class="material-symbols-outlined text-lg group-hover:rotate-90 transition-transform duration-300">close</span>
                    <div class="absolute inset-0 rounded-full bg-primary/10 opacity-0 group-hover:opacity-100 blur-md transition-opacity duration-300"></div>
                </button>
            </div>
            <div class="mt-4 h-px bg-gradient-to-r from-white/10 via-white/5 to-transparent"></div>
        </div>

        <nav class="flex-1 space-y-1 px-3 overflow-y-auto scrollbar-hide">
            <a href="{{ route('admin.dashboard') }}" @@click="sidebarOpen = false"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-[15px] transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime' : 'text-on-surface-variant hover:text-primary hover:bg-white/5' }}">
                <span class="material-symbols-outlined text-lg">dashboard</span>
                Dashboard
            </a>
            <a href="{{ route('admin.venues.index') }}" @@click="sidebarOpen = false"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-[15px] transition-all duration-200 {{ request()->routeIs('admin.venues.*') ? 'text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime' : 'text-on-surface-variant hover:text-primary hover:bg-white/5' }}">
                <span class="material-symbols-outlined text-lg">location_on</span>
                Venues
            </a>
            <a href="{{ route('admin.courts.index') }}" @@click="sidebarOpen = false"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-[15px] transition-all duration-200 {{ request()->routeIs('admin.courts.*') ? 'text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime' : 'text-on-surface-variant hover:text-primary hover:bg-white/5' }}">
                <span class="material-symbols-outlined text-lg">sports_tennis</span>
                Courts
            </a>
            <a href="{{ route('admin.bookings.index') }}" @@click="sidebarOpen = false"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-[15px] transition-all duration-200 {{ request()->routeIs('admin.bookings.*') ? 'text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime' : 'text-on-surface-variant hover:text-primary hover:bg-white/5' }}">
                <span class="material-symbols-outlined text-lg">calendar_month</span>
                Bookings
            </a>
            <a href="{{ route('admin.payments.index') }}" @@click="sidebarOpen = false"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-[15px] transition-all duration-200 {{ request()->routeIs('admin.payments.*') ? 'text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime' : 'text-on-surface-variant hover:text-primary hover:bg-white/5' }}">
                <span class="material-symbols-outlined text-lg">payments</span>
                Payments
            </a>
            <a href="{{ route('admin.reports.index') }}" @@click="sidebarOpen = false"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-[15px] transition-all duration-200 {{ request()->routeIs('admin.reports.*') ? 'text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime' : 'text-on-surface-variant hover:text-primary hover:bg-white/5' }}">
                <span class="material-symbols-outlined text-lg">analytics</span>
                Reports
            </a>
            <a href="{{ route('admin.users.index') }}" @@click="sidebarOpen = false"
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-[15px] transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime' : 'text-on-surface-variant hover:text-primary hover:bg-white/5' }}">
                <span class="material-symbols-outlined text-lg">group</span>
                Users
            </a>
        </nav>

        <div class="px-3 pb-5 pt-3">
            <div class="h-px bg-gradient-to-r from-transparent via-white/10 to-transparent mb-3"></div>
            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/[0.04] border border-white/[0.06] hover:bg-white/[0.06] transition-all duration-200 group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-primary-fixed/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                <div class="relative shrink-0">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-fixed/30 to-primary-fixed/10 flex items-center justify-center border border-primary-fixed/30 font-bold text-sm text-primary-fixed shadow-[0_0_12px_rgba(202,243,0,0.15)]">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}
                    </div>
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-400 border-2 border-surface-container shadow-[0_0_6px_rgba(52,211,153,0.6)]"></span>
                </div>
                <div class="overflow-hidden min-w-0 relative">
                    <p class="text-on-surface font-semibold truncate text-sm">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1 h-1 rounded-full bg-primary-fixed/60"></span>
                        <p class="text-on-surface-variant text-[10px] uppercase tracking-wider truncate font-medium">{{ Auth::user()->role ?? 'Admin' }}</p>
                    </div>
                </div>
                <a href="{{ route('profile.edit') }}" class="relative ml-auto shrink-0 w-7 h-7 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-on-surface-variant hover:text-primary-fixed hover:bg-primary/20 hover:border-primary/40 transition-all duration-200 opacity-0 group-hover:opacity-100" title="Settings">
                    <span class="material-symbols-outlined text-sm">settings</span>
                </a>
            </div>
        </div>
    </aside>

    <main class="flex-1 h-screen overflow-y-auto lg:ml-60">

        {{-- Mobile Top Navbar --}}
        <div class="sticky top-0 z-30 lg:hidden backdrop-blur-[30px] bg-surface-container/40 border-b border-white/[0.08]">
            <div class="flex items-center justify-between px-4 h-14">
                <button @@click="sidebarOpen = true"
                    class="p-2 -ml-2 text-on-surface-variant hover:text-primary hover:bg-white/5 rounded-lg transition-all">
                    <span class="material-symbols-outlined text-2xl">menu</span>
                </button>

                <div class="flex items-center gap-2">
                    <span class="text-sm font-bold text-primary-fixed">CourtYK</span>
                    <span class="text-[10px] text-on-surface-variant uppercase tracking-wider hidden xs:inline">Admin</span>
                </div>

                <div class="flex items-center gap-1">
                    <button class="p-2 text-on-surface-variant hover:text-primary hover:bg-white/5 rounded-lg transition-all">
                        <span class="material-symbols-outlined text-lg">notifications</span>
                    </button>
                    <div class="w-7 h-7 rounded-full bg-primary-container/20 flex items-center justify-center border border-primary-fixed/30 text-[10px] font-bold text-primary-fixed">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="p-4 sm:p-6 lg:p-8">

            @yield('content')

        </div>
    </main>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    <script>
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('nav a').forEach(l => {
                    l.classList.remove('text-primary-fixed', 'bg-primary-container/10', 'border-r-2', 'border-primary-fixed', 'inner-glow-lime');
                    l.classList.add('text-on-surface-variant');
                });
                this.classList.add('text-primary-fixed', 'bg-primary-container/10', 'border-r-2', 'border-primary-fixed', 'inner-glow-lime');
                this.classList.remove('text-on-surface-variant');
            });
        });
    </script>
</body>
</html>
