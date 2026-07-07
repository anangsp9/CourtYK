<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'CourtGlass')</title>

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

        .icon-glass {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.05);
            backdrop-filter: blur(8px);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 200, 'GRAD' 0, 'opsz' 24;
        }

        .input-glass {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(8px);
            transition: all 0.3s;
        }
        .input-glass:focus {
            background: rgba(255,255,255,0.06);
            border-color: rgba(202, 243, 0, 0.4);
            box-shadow: 0 0 20px rgba(202, 243, 0, 0.1);
            outline: none;
        }
        .input-glass:hover {
            border-color: rgba(255,255,255,0.2);
        }

        .btn-lime {
            background: #caf300;
            color: #000;
            font-weight: 700;
            transition: all 0.3s;
        }
        .btn-lime:hover {
            background: #fff;
            box-shadow: 0 0 20px rgba(202, 243, 0, 0.4);
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

        .glass-overlay {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .glass-modal {
            background: linear-gradient(145deg, rgba(30, 30, 30, 0.95) 0%, rgba(15, 15, 15, 0.98) 100%);
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.6);
        }

        select.input-glass {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff' stroke-opacity='0.5' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
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
                <a class="text-white/50 hover:text-white transition-colors text-sm font-medium tracking-wide uppercase @if(request()->routeIs('bookings.*')) text-primary-fixed font-bold drop-shadow-[0_0_10px_rgba(202,243,0,0.3)] @endif" href="{{ route('bookings.index') }}">Bookings</a>
                <a class="text-white/50 hover:text-white transition-colors text-sm font-medium tracking-wide uppercase @if(request()->routeIs('profile.*') || request()->routeIs('dashboard')) text-primary-fixed font-bold drop-shadow-[0_0_10px_rgba(202,243,0,0.3)] @endif" href="{{ route('profile.edit') }}">Profile</a>
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

        @yield('content')

    </main>

    {{-- BottomNavBar (Mobile only) --}}
    <nav class="md:hidden fixed bottom-0 w-full z-50 glass-panel border-t border-white/10 rounded-t-2xl shadow-[0px_-20px_40px_rgba(0,0,0,0.5)]">
        <div class="flex justify-around items-center pt-4 pb-8 px-4 w-full">
            <a class="flex flex-col items-center gap-1.5 text-white/40 @if(request()->routeIs('dashboard')) text-primary-fixed @endif" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined">stadium</span>
                <span class="text-[10px] font-medium tracking-wide uppercase">Home</span>
            </a>
            <a class="flex flex-col items-center gap-1.5 text-white/40 @if(request()->routeIs('venues.*')) text-primary-fixed @endif" href="{{ route('venues.index') }}">
                <span class="material-symbols-outlined">grid_view</span>
                <span class="text-[10px] font-medium tracking-wide uppercase">Courts</span>
            </a>
            <a class="flex flex-col items-center gap-1.5 text-white/40 @if(request()->routeIs('bookings.*')) text-primary-fixed @endif" href="{{ route('bookings.index') }}">
                <span class="material-symbols-outlined @if(request()->routeIs('bookings.*')) drop-shadow-[0_0_10px_rgba(202,243,0,0.5)] @endif" style="font-variation-settings: 'FILL' 1;">confirmation_number</span>
                <span class="text-[10px] font-bold tracking-wide uppercase">Bookings</span>
            </a>
            <a class="flex flex-col items-center gap-1.5 text-white/40 @if(request()->routeIs('profile.*')) text-primary-fixed @endif" href="{{ route('profile.edit') }}">
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
