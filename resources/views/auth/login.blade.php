<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ config('app.name', 'CourtYK') }} - Sign In</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#ffffff",
                        "on-primary": "#2a3400",
                        "on-surface": "#e5e2e1",
                        "on-error": "#690005",
                        "surface-container-highest": "#353534",
                        "error": "#ffb4ab",
                        "surface-tint": "#b0d500",
                        "primary-container": "#caf300",
                        "on-primary-fixed": "#171e00",
                        "on-tertiary-fixed-variant": "#474746",
                        "on-secondary-fixed": "#161b2b",
                        "tertiary-fixed-dim": "#c8c6c5",
                        "on-secondary": "#2b3040",
                        "on-primary-fixed-variant": "#3e4c00",
                        "secondary-fixed-dim": "#c2c6db",
                        "surface": "#131313",
                        "surface-container": "#201f1f",
                        "surface-container-low": "#1c1b1b",
                        "tertiary-fixed": "#e5e2e1",
                        "primary-fixed": "#caf300",
                        "inverse-on-surface": "#313030",
                        "primary-fixed-dim": "#b0d500",
                        "surface-dim": "#131313",
                        "surface-variant": "#353534",
                        "outline-variant": "#444932",
                        "surface-container-lowest": "#0e0e0e",
                        "on-tertiary-container": "#656464",
                        "on-secondary-container": "#b0b4c9",
                        "on-surface-variant": "#c5c9ac",
                        "on-secondary-fixed-variant": "#414658",
                        "on-primary-container": "#596c00",
                        "on-error-container": "#ffdad6",
                        "on-background": "#e5e2e1",
                        "error-container": "#93000a",
                        "background": "#131313",
                        "tertiary": "#ffffff",
                        "surface-bright": "#393939",
                        "on-tertiary-fixed": "#1b1b1c",
                        "inverse-surface": "#e5e2e1",
                        "secondary": "#c2c6db",
                        "outline": "#8f9378",
                        "secondary-fixed": "#dee1f7",
                        "surface-container-high": "#2a2a2a",
                        "tertiary-container": "#e5e2e1",
                        "secondary-container": "#414658",
                        "inverse-primary": "#536600",
                        "on-tertiary": "#303030"
                    },
                    "borderRadius": {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "container-padding-mobile": "1.25rem",
                        "base-unit": "8px",
                        "gutter": "1.5rem",
                        "container-padding-desktop": "2.5rem",
                        "layer-gap": "2rem"
                    },
                    "fontFamily": {
                        "title-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-lg": ["Inter"],
                        "display-lg": ["Inter"]
                    },
                    "fontSize": {
                        "title-md": ["20px", { "lineHeight": "1.4", "fontWeight": "500" }],
                        "label-sm": ["12px", { "lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600" }],
                        "body-lg": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "headline-lg": ["32px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "display-lg": ["48px", { "lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "700" }]
                    }
                }
            }
        };
    </script>

    <style>
        body {
            background-color: #0e0e0e;
            overflow: hidden;
            perspective: 1000px;
        }

        .glass-card {
            backdrop-filter: blur(40px);
            background: rgba(255, 255, 255, 0.03);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 0.5px solid rgba(255, 255, 255, 0.05);
            border-right: 0.5px solid rgba(255, 255, 255, 0.05);
            border-bottom: 0.5px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0px 40px 80px rgba(0, 0, 0, 0.7);
            transition: transform 0.1s ease-out;
        }

        .inner-glow {
            box-shadow: inset 0 0 20px rgba(212, 255, 0, 0.05);
        }

        .electric-glow {
            box-shadow: 0 0 20px rgba(212, 255, 0, 0.3);
            transition: all 0.3s ease;
        }

        .electric-glow:hover {
            box-shadow: 0 0 35px rgba(212, 255, 0, 0.5);
            transform: translateY(-2px);
        }

        .liquid-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.25;
            pointer-events: none;
        }

        .input-glass {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
        }

        .input-glass:focus {
            border-color: #d4ff00;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 10px rgba(212, 255, 0, 0.15);
            outline: none;
        }

        .input-glass:-webkit-autofill,
        .input-glass:-webkit-autofill:hover,
        .input-glass:-webkit-autofill:focus,
        .input-glass:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 1000px rgba(20, 20, 20, 0.95) inset !important;
            -webkit-text-fill-color: #ffffff !important;
            caret-color: #ffffff;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .court-pattern {
            background-image: radial-gradient(circle at 2px 2px, rgba(255, 255, 255, 0.03) 1px, transparent 0);
            background-size: 40px 40px;
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1) translate(0px, 0px); }
            50% { opacity: 0.6; transform: scale(1.08) translate(10px, -10px); }
        }

        .pulse-element {
            animation: pulse-slow 12s infinite ease-in-out;
        }
    </style>
</head>

<body class="font-body-lg text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed h-dvh w-screen flex flex-col justify-between overflow-hidden court-pattern bg-background">

    <!-- Navbar Container -->
    <div class="shrink-0 w-full z-10">
        <x-navbar-landing />
    </div>

    <!-- Main Content Area -->
    <main class="flex-1 flex items-center justify-center p-4 relative z-0 w-full min-h-0">
        <!-- Liquid Glow Background Shapes -->
        <div class="liquid-bg overflow-hidden flex items-center justify-center">
            <div class="pulse-element w-[450px] h-[450px] rounded-full bg-[#d4ff00]/10 blur-[100px] absolute -top-10 -right-10"></div>
            <div class="pulse-element w-[400px] h-[400px] rounded-full bg-secondary-container/20 blur-[80px] absolute -bottom-20 -left-20" style="animation-delay: -4s;"></div>
        </div>

        <!-- Main Form Card Wrapper -->
        <div class="w-full max-w-[440px] flex flex-col min-h-0">
            <!-- Flash Session Status Alerts -->
            <div class="mb-3 empty:hidden shrink-0">
                <x-auth-session-status :status="session('status')" />
            </div>

            <!-- Content Card -->
            <div class="glass-card inner-glow p-6 sm:p-8 rounded-3xl flex flex-col w-full max-h-[80vh] md:max-h-[75vh]">
                
                <!-- Header Titles -->
                <div class="text-center mb-6 shrink-0">
                    <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white mb-1">Welcome Back</h1>
                    <p class="text-xs sm:text-sm text-on-tertiary-container/80 font-normal">Precision in every play starts here.</p>
                </div>

                <!-- Form Scroll Area (Protects layout if screen height is very small) -->
                <div class="flex-1 overflow-y-auto pr-1 -mr-2 space-y-4 min-h-0">
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <!-- Email Group -->
                        <div class="flex flex-col gap-1.5">
                            <label for="email" class="font-label-sm text-[10px] tracking-widest text-on-surface-variant/80">EMAIL ADDRESS</label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-3 text-lg opacity-40 transition-all pointer-events-none select-none">mail</span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="name@domain.com" required autofocus autocomplete="username" 
                                    class="input-glass bg-transparent w-full pl-10 pr-4 py-2.5 rounded-xl text-sm text-white focus:ring-0 placeholder:text-white/20" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" />
                        </div>

                        <!-- Password Group -->
                        <div class="flex flex-col gap-1.5">
                            <label for="password" class="font-label-sm text-[10px] tracking-widest text-on-surface-variant/80">PASSWORD</label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-3 text-lg opacity-40 transition-all pointer-events-none select-none">lock</span>
                                <input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password" 
                                    class="input-glass bg-transparent w-full pl-10 pr-4 py-2.5 rounded-xl text-sm text-white focus:ring-0 placeholder:text-white/20" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" />
                        </div>

                        <!-- Form Options Row -->
                        <div class="flex items-center justify-between text-xs pt-1">
                            <label for="remember_me" class="flex items-center gap-2 cursor-pointer select-none text-on-surface/70 hover:text-white transition-colors">
                                <div class="relative flex items-center">
                                    <input id="remember_me" type="checkbox" name="remember" class="peer rounded bg-white/5 border-white/10 text-primary-fixed focus:ring-0 focus:ring-offset-0 h-4 w-4 transition-all" />
                                </div>
                                <span>Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary-fixed hover:underline font-medium transition-colors">Forgot Password?</a>
                            @endif
                        </div>

                        <!-- Submit CTA Button -->
                        <button type="submit" class="electric-glow w-full py-3 mt-2 bg-primary-fixed text-on-primary-fixed font-semibold rounded-xl text-sm tracking-wide">
                            Sign In
                        </button>
                    </form>

                    <!-- Form Section Divider -->
                    <div class="flex items-center gap-3 py-2 text-[10px] font-semibold tracking-widest text-white/30">
                        <div class="h-px flex-1 bg-white/5"></div>
                        <span>OR CONTINUE WITH</span>
                        <div class="h-px flex-1 bg-white/5"></div>
                    </div>

                    <!-- Third-Party OAuth Buttons Block -->
                    <div class="grid grid-cols-2 gap-3">
                        <button class="flex items-center justify-center gap-2 py-2.5 rounded-xl border border-white/5 bg-white/[0.02] hover:bg-white/[0.06] text-sm text-white transition-colors font-medium">
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"></path>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"></path>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"></path>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 12-4.53z"></path>
                            </svg>
                            <span>Google</span>
                        </button>
                        <button class="flex items-center justify-center gap-2 py-2.5 rounded-xl border border-white/5 bg-white/[0.02] hover:bg-white/[0.06] text-sm text-white transition-colors font-medium">
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                <path d="M17.05 20.28c-.98.95-2.05.88-3.08.4c-1.09-.5-2.08-.48-3.24 0-1.44.62-2.2.44-3.06-.4C4.1 16.78 3.07 10.45 5.72 6.55c1.32-1.95 3.35-3.08 5.26-3.04 1.44.03 2.5 1.02 3.38 1.02.83 0 2.28-1.2 3.94-1.02 1.72.18 3.06.84 3.9 2.13-3.4 2.02-2.86 6.36.43 7.73-.72 1.83-1.68 3.63-3.58 6.91zM14.53 3.16c-.08-2.22 1.82-4.14 3.92-4.16.24 2.4-2.13 4.45-3.92 4.16z"></path>
                            </svg>
                            <span>Apple</span>
                        </button>
                    </div>

                    <!-- Footer Registration Link -->
                    @if (Route::has('register'))
                        <div class="text-center pt-2 text-xs text-on-surface-variant">
                            <p>
                                Don't have an account?
                                <a href="{{ route('register') }}" class="text-primary-fixed hover:underline font-semibold ml-1 transition-colors">Sign Up</a>
                            </p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </main>

    <!-- Global Footer -->
    <footer class="hidden md:block shrink-0 py-3 border-t border-white/5 bg-surface-container-lowest/80 z-10 w-full">
        <div class="grid grid-cols-3 items-center px-6 max-w-7xl mx-auto w-full">
            <div class="font-title-md text-xs text-primary opacity-80 justify-self-start">CourtYK</div>
            <div class="flex gap-4 opacity-60 justify-self-center">
                <a class="font-label-sm text-[11px] text-on-tertiary-container hover:text-primary transition-opacity" href="#">Privacy Policy</a>
                <a class="font-label-sm text-[11px] text-on-tertiary-container hover:text-primary transition-opacity" href="#">Terms of Service</a>
                <a class="font-label-sm text-[11px] text-on-tertiary-container hover:text-primary transition-opacity" href="#">Support</a>
            </div>
            <div class="font-label-sm text-[11px] text-on-tertiary-container opacity-40 justify-self-end">
                © 2026 CourtYK. Precision in every play.
            </div>
        </div>
    </footer>

    <script>
        const inputs = document.querySelectorAll('.input-glass');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                const icon = input.parentElement.querySelector('.material-symbols-outlined');
                if (icon) {
                    icon.style.color = '#d4ff00';
                    icon.style.opacity = '1';
                }
            });
            input.addEventListener('blur', () => {
                const icon = input.parentElement.querySelector('.material-symbols-outlined');
                if (icon) {
                    icon.style.color = '';
                    icon.style.opacity = '0.4';
                }
            });
        });

        const card = document.querySelector('.glass-card');
        document.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768 && card) {
                const xAxis = (window.innerWidth / 2 - e.pageX) / 60;
                const yAxis = (window.innerHeight / 2 - e.pageY) / 60;
                card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
            }
        });

        document.addEventListener('mouseleave', () => {
            if (card) card.style.transform = `rotateY(0deg) rotateX(0deg)`;
        });
    </script>
</body>

</html>