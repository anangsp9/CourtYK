    <!DOCTYPE html>
    <html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>{{ config('app.name', 'CourtYK') }} - Reset Password</title>

        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet" />

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
                            "title-md": ["20px", {
                                "lineHeight": "1.4",
                                "fontWeight": "500"
                            }],
                            "label-sm": ["12px", {
                                "lineHeight": "1",
                                "letterSpacing": "0.05em",
                                "fontWeight": "600"
                            }],
                            "body-lg": ["16px", {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
                            }],
                            "headline-lg-mobile": ["24px", {
                                "lineHeight": "1.2",
                                "letterSpacing": "-0.01em",
                                "fontWeight": "600"
                            }],
                            "headline-lg": ["32px", {
                                "lineHeight": "1.2",
                                "letterSpacing": "-0.02em",
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
                box-shadow: 0 0 20px rgba(212, 255, 0, 0.4);
                transition: all 0.3s ease;
            }

            .electric-glow:hover {
                box-shadow: 0 0 35px rgba(212, 255, 0, 0.6);
                transform: translateY(-2px);
            }

            .liquid-bg {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                opacity: 0.4;
            }

            .input-glass {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                transition: all 0.3s ease;
            }

            .input-glass:focus {
                border-color: #d4ff00;
                background: rgba(255, 255, 255, 0.08);
                box-shadow: 0 0 10px rgba(212, 255, 0, 0.2);
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
                background-image: radial-gradient(circle at 2px 2px, rgba(255, 255, 255, 0.05) 1px, transparent 0);
                background-size: 40px 40px;
            }

            @keyframes pulse-slow {

                0%,
                100% {
                    opacity: 0.5;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.8;
                    transform: scale(1.05);
                }
            }

            .pulse-element {
                animation: pulse-slow 8s infinite ease-in-out;
            }
        </style>
    </head>

    <body
        class="font-body-lg text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed h-dvh flex flex-col overflow-hidden">

        <x-navbar-landing />

        <div class="flex-1 flex items-center justify-center relative min-h-0 pt-16">
            <div class="liquid-bg court-pattern"></div>
            <div
                class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] rounded-full bg-[#d4ff00]/5 blur-[120px] pulse-element">
            </div>
            <div class="absolute -bottom-[10%] -right-[10%] w-[30%] h-[30%] rounded-full bg-white/5 blur-[100px] pulse-element"
                style="animation-delay: -4s"></div>

            <div class="relative z-10 w-full max-w-[420px] px-4 py-4">

                <x-auth-session-status class="mb-3 text-center text-sm" :status="session('status')" />

                <div class="glass-card inner-glow rounded-lg p-6 md:p-8">
                    <div class="text-center mb-5">
                        <h1
                            class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-1">
                            Reset Password</h1>
                        <p class="text-on-surface/60 font-body-lg text-sm">
                            Forgot your password? No problem. Just let us know your email address and we will email you a
                            password reset link.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface/80 mb-1.5 ml-1"
                                for="email">EMAIL ADDRESS</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface/40">mail</span>
                                <input
                                    class="input-glass bg-transparent w-full pl-12 pr-4 py-3 rounded-full text-primary placeholder:text-on-surface/30 focus:ring-0 focus:ring-offset-0"
                                    id="email" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="name@domain.com" required autofocus autocomplete="email" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-400 px-2" />
                        </div>

                        <button
                            class="w-full bg-primary-fixed text-on-primary-fixed font-title-md text-title-md py-3.5 rounded-full electric-glow flex items-center justify-center gap-3 group"
                            type="submit">
                            <span>Send Reset Link</span>
                            <span class="material-symbols-outlined text-[20px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                        </button>
                    </form>

                    <div class="mt-5 text-center">
                        <p class="font-body-lg text-body-lg text-on-surface/50 text-sm">
                            Remember your password?
                            <a class="text-primary-fixed font-bold hover:underline underline-offset-4 ml-1"
                                href="{{ route('login') }}">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="hidden md:block py-3 border-t border-white/5 bg-surface-container-lowest/80">
            <div class="grid grid-cols-3 items-center px-4 max-w-7xl mx-auto">
                <div class="font-title-md text-sm text-primary opacity-80 justify-self-start">CourtYK</div>
                <div class="flex gap-4 opacity-60 justify-self-center">
                    <a class="font-label-sm text-xs text-on-tertiary-container hover:text-primary transition-opacity"
                        href="#">Privacy Policy</a>
                    <a class="font-label-sm text-xs text-on-tertiary-container hover:text-primary transition-opacity"
                        href="#">Terms of Service</a>
                    <a class="font-label-sm text-xs text-on-tertiary-container hover:text-primary transition-opacity"
                        href="#">Support</a>
                </div>
                <div class="font-label-sm text-xs text-on-tertiary-container opacity-40 justify-self-end">
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
