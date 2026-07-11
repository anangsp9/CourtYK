<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ config('app.name', 'CourtYk') }} - Landing</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(2deg);
            }
        }

        @keyframes pulse-subtle {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-pulse-subtle {
            animation: pulse-subtle 3s ease-in-out infinite;
        }

        .glass-card {
            background: rgba(14, 14, 14, 0.4);
            backdrop-filter: blur(30px);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 0.5px solid rgba(255, 255, 255, 0.1);
            border-right: 0.5px solid rgba(255, 255, 255, 0.1);
            border-bottom: 0.5px solid rgba(255, 255, 255, 0.05);
        }

        .liquid-container {
            position: relative;
            overflow: hidden;
            border-radius: 3rem;
            mask-image: radial-gradient(white, black);
        }

        .electric-glow {
            box-shadow: 0 0 20px rgba(202, 243, 0, 0.4);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #131313;
        }

        ::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #caf300;
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

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

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body
    class="bg-background text-on-surface font-body-lg overflow-x-hidden selection:bg-primary-fixed selection:text-black">

    <x-navbar-landing />

    <main class="pt-16">
        <section class="relative min-h-[calc(100vh-4rem)] flex flex-col items-center justify-center px-gutter overflow-hidden py-12 lg:py-0">
            <div class="relative z-10 w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 px-4 py-2 glass-card rounded-full">
                        <span class="w-2 h-2 rounded-full bg-primary-fixed animate-pulse"></span>
                        <span class="text-label-sm font-label-sm uppercase tracking-widest text-primary-fixed">Pro-Level
                            Booking</span>
                    </div>
                    <h1 class="font-display-lg text-display-lg lg:text-[72px] leading-tight text-white">
                        Master the <br /><span class="text-primary-fixed italic">Momentum.</span>
                    </h1>
                    <p class="text-on-surface-variant text-title-md font-title-md max-w-lg">
                        Experience the world's most advanced badminton court booking system. Seamless refraction,
                        instant availability, and pro-grade venue management.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="{{ route('venues.index') }}"
                            class="inline-block bg-primary-fixed text-on-primary font-title-md text-title-md px-10 py-4 rounded-full electric-glow hover:scale-105 active:scale-95 transition-all">
                            Book Your Court
                        </a>
                        <a href="{{ route('venues.index') }}"
                            class="inline-block glass-card text-white font-title-md text-title-md px-10 py-4 rounded-full hover:bg-white/10 transition-all">
                            Explore Venues
                        </a>
                    </div>
                </div>

                <div class="relative flex items-center justify-center group">
                    <div
                        class="liquid-container w-full aspect-square max-w-[500px] glass-card flex items-center justify-center p-8 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-primary-fixed/20 to-transparent pointer-events-none">
                        </div>
                        <img class="w-full h-full object-contain animate-float drop-shadow-[0_0_50px_rgba(202,243,0,0.3)]"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBx1HJy4nLW2_m5NK_vZ3BIuncgeOSiDeimB5GypsyAIm3CYVy9Nu00Z7XxVnFJXvnzyDAGd47swzzHJSc3wRed9h2yFbBrKAPcJKCid27CEtLikX9IeMUPtflIP9sGhUOr2a-r6X7SDV5PwWCF0-D8Y4d3aBsr6G60KdXd-SCL-NF3Kgua1WBvKrgRcrhQ1Fnm96f5l60pVC57Mz9rJXSH41owOy1hWq5sqOneOSiDACR-k0Sa_UiBMM8jU-rUAYOO3Ji0ctHb-Q"
                            alt="Badminton Racket Cubical Design" />
                    </div>
                    <div
                        class="absolute -top-10 -right-10 w-32 h-32 glass-card rounded-full flex items-center justify-center animate-pulse-subtle">
                        <span class="material-symbols-outlined text-primary-fixed text-4xl"
                            style="font-variation-settings: 'FILL' 1;">shift_lock</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-gutter py-32 space-y-16">
            <div class="text-center space-y-4 reveal">
                <h2 class="font-headline-lg text-headline-lg lg:text-5xl">Engineered for Performance</h2>
                <p class="text-on-surface-variant max-w-2xl mx-auto">Precision tools for the modern athlete. Manage your
                    sessions with unparalled speed and visual clarity.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="md:col-span-2 glass-card rounded-xl p-8 flex flex-col justify-between group hover:border-primary-fixed/50 transition-colors reveal">
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-primary-fixed text-4xl">view_in_ar</span>
                        <h3 class="font-headline-lg text-headline-lg">Interactive 3D Map</h3>
                        <p class="text-on-surface-variant max-w-md">Visualize every angle of the court before you book.
                            Our immersive view ensures you pick the perfect spot for your game.</p>
                    </div>
                    <div class="mt-12 h-64 w-full rounded-lg overflow-hidden relative border border-white/5">
                        <div class="w-full h-full bg-cover bg-center group-hover:scale-110 transition-transform duration-700"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBLh1Wvq8rRsxCH076zH9RZOsbSBPnKAd2BF0c7JtohvotVctGaDyKK7osOt55qmwpm-xm2CCzrHGjYuLJQu3AIF0bcw7bNHi3GBgTWy2c7hFDl5m5eRjiGaXf2r4fKFFBnTpqUb6Ggl-IHeo7x12cMTRYz9YN1Ku136JE-dj-5S7K8goKeYQxcG2QEw5VDTgi-9IXvd17g7sX9ldHvtFpK-M3DX6YbuJbk1wSHd2zqX1i8lUQRErvzJ27i25N1rb285nZgxkXpKA')">
                        </div>
                    </div>
                </div>

                <div class="glass-card rounded-xl p-8 flex flex-col justify-between reveal"
                    style="transition-delay: 100ms">
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-primary-fixed text-4xl">bolt</span>
                        <h3 class="font-headline-lg text-headline-lg">Instant Match</h3>
                        <p class="text-on-surface-variant">AI-powered scheduling that finds the best time and partners
                            for your skill level in seconds.</p>
                    </div>
                    <div class="mt-8 flex flex-col gap-4">
                        <div class="flex items-center gap-3 p-3 glass-card rounded-lg border-white/5">
                            <div
                                class="w-10 h-10 rounded-full bg-primary-fixed/20 flex items-center justify-center text-primary-fixed">
                                AP</div>
                            <div>
                                <p class="text-sm font-bold">Adam Pro</p>
                                <p class="text-xs text-on-surface-variant">Level: Advanced</p>
                            </div>
                            <span
                                class="ml-auto material-symbols-outlined text-primary-fixed text-sm">check_circle</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 glass-card rounded-lg border-white/5 opacity-50">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white">
                                SK</div>
                            <div>
                                <p class="text-sm font-bold">Sarah K.</p>
                                <p class="text-xs text-on-surface-variant">Searching...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card rounded-xl p-8 flex items-center gap-6 reveal" style="transition-delay: 200ms">
                    <div
                        class="w-16 h-16 rounded-full border-2 border-primary-fixed flex items-center justify-center shadow-[0_0_15px_rgba(202,243,0,0.3)]">
                        <span class="text-2xl font-bold">98%</span>
                    </div>
                    <div>
                        <h4 class="font-title-md text-title-md">Uptime</h4>
                        <p class="text-sm text-on-surface-variant">Reliable live venue tracking</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl p-8 flex items-center gap-6 reveal" style="transition-delay: 300ms">
                    <div class="w-16 h-16 rounded-full bg-primary-fixed flex items-center justify-center text-black">
                        <span class="material-symbols-outlined text-3xl">groups</span>
                    </div>
                    <div>
                        <h4 class="font-title-md text-title-md">12k+</h4>
                        <p class="text-sm text-on-surface-variant">Active pro players monthly</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl p-8 flex items-center gap-6 reveal" style="transition-delay: 400ms">
                    <div class="w-16 h-16 rounded-full border border-white/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-3xl text-primary-fixed">verified_user</span>
                    </div>
                    <div>
                        <h4 class="font-title-md text-title-md">Premium</h4>
                        <p class="text-sm text-on-surface-variant">Only top-tier vetted venues</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-gutter py-24 reveal">
            <div class="relative rounded-xl p-12 lg:p-24 overflow-hidden border border-white/10 shadow-2xl glass-card">
                <div class="relative z-10 text-center space-y-8">
                    <h2 class="font-display-lg text-display-lg text-white">Ready to take the court?</h2>
                    <p class="text-on-surface-variant text-title-md max-w-xl mx-auto">
                        Join the elite community of CourtYK players and experience sports booking as it should be.
                    </p>
                    <div class="flex justify-center">
                        <button
                            class="bg-primary-fixed text-on-primary font-headline-lg text-headline-lg px-12 py-6 rounded-full electric-glow hover:scale-105 active:scale-95 transition-all">
                            Get Early Access
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="hidden md:block py-16 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-gutter flex justify-between items-center">
            <span class="font-display-lg text-title-md italic tracking-tighter text-primary-fixed">CourtYK</span>
            <div class="flex gap-8 text-on-surface-variant text-label-sm">
                <a class="hover:text-white transition-colors" href="#">Privacy</a>
                <a class="hover:text-white transition-colors" href="#">Terms</a>
                <a class="hover:text-white transition-colors" href="#">Support</a>
                <a class="hover:text-white transition-colors" href="#">Venue Partners</a>
            </div>
            <p class="text-on-surface-variant text-label-sm opacity-50">© 2026 CourtYK. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Scroll reveal animation handling
        const observerOptions = {
            threshold: 0.1
        };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // Mousemove liquid animation tracking
        document.addEventListener('mousemove', (e) => {
            const containers = document.querySelectorAll('.liquid-container');
            containers.forEach(container => {
                const rect = container.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width;
                const y = (e.clientY - rect.top) / rect.height;

                const img = container.querySelector('img');
                if (img) {
                    img.style.transform =
                        `translate(${(x - 0.5) * 20}px, ${(y - 0.5) * 20}px) rotate(${(x - 0.5) * 5}deg)`;
                }
            });
        });
    </script>
</body>

</html>
