<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ config('app.name', 'CourtYK') }} - Reset Password</title>

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
        }

        .glass-card {
            backdrop-filter: blur(40px);
            background: rgba(255, 255, 255, 0.03);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 0.5px solid rgba(255, 255, 255, 0.05);
            border-right: 0.5px solid rgba(255, 255, 255, 0.05);
            border-bottom: 0.5px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0px 40px 80px rgba(0, 0, 0, 0.7);
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
            opacity: 0.3;
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
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.06); }
        }

        .pulse-element {
            animation: pulse-slow 10s infinite ease-in-out;
        }
    </style>
</head>

<body class="font-body-lg text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed h-dvh w-screen flex flex-col justify-between overflow-hidden bg-background">

    <!-- Top Navbar Wrapper -->
    <div class="shrink-0 w-full z-10">
        <x-navbar-landing />
    </div>

    <!-- Main Dynamic Layout Context -->
    <main class="flex-1 flex items-center justify-center p-4 relative z-0 w-full min-h-0">
        <!-- Structural Abstract Canvas Background -->
        <div class="liquid-bg court-pattern overflow-hidden">
            <div class="absolute -top-[10%] -left-[10%] w-[50vw] h-[50vw] rounded-full bg-[#d4ff00]/5 blur-[120px] pulse-element"></div>
            <div class="absolute -bottom-[10%] -right-[10%] w-[40vw] h-[40vw] rounded-full bg-white/5 blur-[100px] pulse-element" style="animation-delay: -4s"></div>
        </div>

        <!-- Inner Frame Wrapper -->
        <div class="w-full max-w-[440px] flex flex-col min-h-0 px-2">
            
            <!-- Contextual Status Bar Notifications -->
            <div class="mb-3 empty:hidden text-center shrink-0">
                <x-auth-session-status class="text-sm" :status="session('status')" />
            </div>

            <!-- Content Card Body -->
            <div class="glass-card inner-glow p-6 md:p-8 rounded-2xl flex flex-col w-full max-h-[80vh] md:max-h-[75vh]">
                
                <!-- Headline Headers -->
                <div class="text-center mb-5 shrink-0">
                    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-2 tracking-tight">
                        Reset Password
                    </h1>
                    <p class="text-on-surface/60 text-xs sm:text-sm leading-relaxed font-normal px-1">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
                    </p>
                </div>

                <!-- Scrollable Form Vault Area -->
                <div class="flex-1 overflow-y-auto px-8 -mx-8 space-y-5 min-h-0">
                    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                        @csrf

                        <!-- Custom Boxed Email Control Group -->
                        <div class="flex flex-col gap-1.5">
                            <label class="block font-label-sm text-[10px] tracking-widest text-on-surface/70 ml-1 uppercase" for="email">
                                EMAIL ADDRESS
                            </label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-4 text-lg opacity-40 transition-all pointer-events-none select-none">mail</span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="name@domain.com" required autofocus autocomplete="email"
                                    class="input-glass bg-transparent w-full pl-12 pr-4 py-3 rounded-xl text-sm text-primary placeholder:text-on-surface/30 focus:ring-0 focus:ring-offset-0" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-400 px-2" />
                        </div>

                        <!-- CTA Interface Button -->
                        <button type="submit" class="w-full bg-primary-fixed text-on-primary-fixed font-semibold py-3.5 rounded-xl electric-glow flex items-center justify-center gap-2 group transition-all text-sm tracking-wide">
                            <span>Send Reset Link</span>
                            <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                        </button>
                    </form>

                    <!-- Safe Area Back Route Wrapper -->
                    <div class="pt-2 text-center">
                        <p class="text-xs text-on-surface/50 font-normal">
                            Remember your password?
                            <a href="{{ route('login') }}" class="text-primary-fixed font-bold hover:underline underline-offset-4 ml-1 transition-colors">
                                Sign In
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Global Layout Base Footer -->
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
    </script>
</body>

</html>