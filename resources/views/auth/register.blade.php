<!DOCTYPE html>
    <html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>{{ config('app.name', 'CourtYK') }} - High-Performance Registration</title>
        
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
        
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        "colors": {
                            "secondary": "#c2c6db",
                            "surface-dim": "#131313",
                            "on-secondary-fixed-variant": "#414658",
                            "on-tertiary-fixed": "#1b1b1c",
                            "on-primary-fixed": "#171e00",
                            "secondary-fixed-dim": "#c2c6db",
                            "secondary-container": "#414658",
                            "surface-container": "#201f1f",
                            "on-tertiary-fixed-variant": "#474746",
                            "inverse-primary": "#536600",
                            "surface-variant": "#353534",
                            "tertiary-fixed-dim": "#c8c6c5",
                            "on-tertiary": "#303030",
                            "on-surface-variant": "#c5c9ac",
                            "tertiary": "#ffffff",
                            "on-error-container": "#ffdad6",
                            "surface-bright": "#393939",
                            "on-secondary-fixed": "#161b2b",
                            "on-primary-fixed-variant": "#3e4c00",
                            "surface-container-highest": "#353534",
                            "primary-fixed": "#caf300",
                            "on-surface": "#e5e2e1",
                            "background": "#131313",
                            "surface": "#131313",
                            "error-container": "#93000a",
                            "inverse-on-surface": "#313030",
                            "surface-container-lowest": "#0e0e0e",
                            "outline-variant": "#444932",
                            "secondary-fixed": "#dee1f7",
                            "on-background": "#e5e2e1",
                            "on-secondary-container": "#b0b4c9",
                            "outline": "#8f9378",
                            "surface-container-high": "#2a2a2a",
                            "on-primary-container": "#596c00",
                            "on-error": "#690005",
                            "primary": "#ffffff",
                            "primary-container": "#caf300",
                            "on-secondary": "#2b3040",
                            "tertiary-container": "#e5e2e1",
                            "inverse-surface": "#e5e2e1",
                            "error": "#ffb4ab",
                            "primary-fixed-dim": "#b0d500",
                            "on-tertiary-container": "#656464",
                            "tertiary-fixed": "#e5e2e1",
                            "surface-tint": "#b0d500",
                            "on-primary": "#2a3400",
                            "surface-container-low": "#1c1b1b"
                        },
                        "borderRadius": {
                            "DEFAULT": "1rem",
                            "lg": "2rem",
                            "xl": "3rem",
                            "full": "9999px"
                        },
                        "spacing": {
                            "gutter": "1.5rem",
                            "container-padding-mobile": "1.25rem",
                            "layer-gap": "2rem",
                            "base-unit": "8px",
                            "container-padding-desktop": "2.5rem"
                        },
                        "fontFamily": {
                            "body-lg": ["Inter"],
                            "title-md": ["Inter"],
                            "display-lg": ["Inter"],
                            "headline-lg-mobile": ["Inter"],
                            "headline-lg": ["Inter"],
                            "label-sm": ["Inter"]
                        },
                        "fontSize": {
                            "body-lg": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                            "title-md": ["20px", { "lineHeight": "1.4", "fontWeight": "500" }],
                            "display-lg": ["48px", { "lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "700" }],
                            "headline-lg-mobile": ["24px", { "lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                            "headline-lg": ["32px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                            "label-sm": ["12px", { "lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600" }]
                        }
                    }
                }
            }
        </script>
        
        <style>
            body {
                background-color: #131313;
                color: #e5e2e1;
                overflow-x: hidden;
            }

            .glass-card {
                background: rgba(20, 20, 20, 0.4);
                backdrop-filter: blur(40px);
                -webkit-backdrop-filter: blur(40px);
                border-top: 1px solid rgba(255, 255, 255, 0.15);
                border-left: 0.5px solid rgba(255, 255, 255, 0.08);
                border-right: 0.5px solid rgba(255, 255, 255, 0.08);
                border-bottom: 0.5px solid rgba(255, 255, 255, 0.05);
            }

            .input-glass {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .input-glass:focus {
                background: rgba(255, 255, 255, 0.05);
                border-color: #caf300;
                box-shadow: 0 0 15px rgba(202, 243, 0, 0.2);
                outline: none;
            }

            .btn-glow {
                box-shadow: 0 0 20px rgba(202, 243, 0, 0.4);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .btn-glow:hover {
                transform: translateY(-2px);
                box-shadow: 0 0 30px rgba(202, 243, 0, 0.6);
            }

            .liquid-bg {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                filter: brightness(0.4);
            }

            .social-btn {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                transition: background 0.3s ease;
            }

            .social-btn:hover {
                background: rgba(255, 255, 255, 0.1);
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            }
        </style>
    </head>
    <body class="font-body-lg">
        
        <header class="fixed top-0 w-full z-50 bg-surface/30 backdrop-blur-[30px] border-b border-white/15 shadow-[0px_20px_40px_rgba(0,0,0,0.5)] h-20 flex justify-between items-center px-container-padding-mobile md:px-container-padding-desktop">
            <div class="font-display-lg text-[28px] md:text-display-lg tracking-tighter text-primary-fixed">
                CourtYK
            </div>
            <nav class="hidden md:flex gap-8">
                <a class="text-on-surface/70 hover:text-primary-container transition-colors font-title-md text-title-md" href="#">Explore</a>
                <a class="text-on-surface/70 hover:text-primary-container transition-colors font-title-md text-title-md" href="#">Venues</a>
                <a class="text-on-surface/70 hover:text-primary-container transition-colors font-title-md text-title-md" href="#">Community</a>
            </nav>
            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    <a class="text-primary font-bold hover:text-primary-container transition-colors font-title-md text-title-md" href="{{ route('login') }}">Sign In</a>
                @endif
            </div>
        </header>

        <div class="liquid-bg">
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-black/80 z-10"></div>
            <div class="w-full h-full opacity-60 scale-110 blur-xl" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB94oxW0mLuPsXO44Gf_TP-qDILOYCZzfTmh890dSNmtxXFCdIk8e8UBfF-Fehc2OVhODEiWdOmp3A4hsVxqAu45leC1velBywS3TMYZRg9bBPyOZLqtLHkKSYeCEgoZ2drpm44H6futpR55aAtGH7vds7sloHfirli56ructMcxlpOlhYmaIYOq-k1oM_VZCOLWPdUk334uuGzb8ijb0JIUgjESiV4U9N5C3XQ3_qDiTp_PHquzxhKJgkmq9rBMI9m0MgXJqXNeQ')"></div>
        </div>

        <main class="min-h-screen flex items-center justify-center pt-24 pb-12 px-container-padding-mobile">
            <div class="glass-card w-full max-w-[520px] rounded-xl p-8 md:p-12 relative overflow-hidden">
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-primary-container/10 blur-[100px] rounded-full"></div>
                <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-secondary/5 blur-[100px] rounded-full"></div>
                
                <div class="text-center mb-10 relative z-10">
                    <h1 class="font-display-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-2">Join CourtYK</h1>
                    <p class="text-on-surface/60 font-body-lg">Start your journey to the perfect match.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6 relative z-10">
                    @csrf

                    <div class="space-y-2">
                        <label class="block font-label-sm text-label-sm text-on-surface/50 ml-1 uppercase" for="name">Full Name</label>
                        <input class="input-glass w-full h-14 px-5 rounded-lg text-primary placeholder:text-on-surface/30 focus:ring-0 focus:ring-offset-0" 
                               id="name" 
                               type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Roger Federer" 
                               required 
                               autofocus 
                               autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-400 px-1" />
                    </div>

                    <div class="space-y-2">
                        <label class="block font-label-sm text-label-sm text-on-surface/50 ml-1 uppercase" for="email">Email Address</label>
                        <input class="input-glass w-full h-14 px-5 rounded-lg text-primary placeholder:text-on-surface/30 focus:ring-0 focus:ring-offset-0" 
                               id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="roger@courtyk.pro" 
                               required 
                               autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400 px-1" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="block font-label-sm text-label-sm text-on-surface/50 ml-1 uppercase" for="password">Password</label>
                            <input class="input-glass w-full h-14 px-5 rounded-lg text-primary placeholder:text-on-surface/30 focus:ring-0 focus:ring-offset-0" 
                                   id="password" 
                                   type="password" 
                                   name="password" 
                                   placeholder="••••••••" 
                                   required 
                                   autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400 px-1" />
                        </div>

                        <div class="space-y-2">
                            <label class="block font-label-sm text-label-sm text-on-surface/50 ml-1 uppercase" for="password_confirmation">Confirm</label>
                            <input class="input-glass w-full h-14 px-5 rounded-lg text-primary placeholder:text-on-surface/30 focus:ring-0 focus:ring-offset-0" 
                                   id="password_confirmation" 
                                   type="password" 
                                   name="password_confirmation" 
                                   placeholder="••••••••" 
                                   required 
                                   autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-400 px-1" />
                        </div>
                    </div>

                    <button class="btn-glow w-full h-14 bg-primary-container text-on-primary font-bold text-title-md rounded-lg mt-4 flex items-center justify-center gap-2" type="submit">
                        Create Account
                        <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                    </button>
                </form>

                <div class="relative my-8 z-10">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-white/10"></div>
                    </div>
                    <div class="relative flex justify-center text-label-sm font-label-sm">
                        <span class="bg-[#1a1a1a]/40 backdrop-blur-md px-4 text-on-surface/40">OR CONTINUE WITH</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-10 z-10 relative">
                    <button class="social-btn h-14 rounded-lg flex items-center justify-center gap-3 font-label-sm text-on-surface">
                        <svg class="w-5 h-5" viewbox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="currentColor"></path>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="currentColor"></path>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="currentColor"></path>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.66l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 12-4.53z" fill="currentColor"></path>
                        </svg>
                        Google
                    </button>
                    <button class="social-btn h-14 rounded-lg flex items-center justify-center gap-3 font-label-sm text-on-surface">
                        <svg class="w-5 h-5" viewbox="0 0 24 24">
                            <path d="M17.05 20.28c-.98.95-2.05.88-3.08.4c-1.09-.5-2.08-.48-3.24 0-1.44.62-2.2.44-3.06-.4C4.18 16.63 4.25 9.4 8.7 9.17c1.3.07 2.13.78 2.86.78.75 0 2.05-.9 3.52-.75 1.63.15 2.85.8 3.52 1.9-3.4 1.83-2.86 6.35.5 7.68-.65 1.55-1.38 3.03-2.05 3.5zm-4.32-12.75c-.15-2.58 2.22-4.7 4.54-4.53.25 2.58-2.34 4.83-4.54 4.53z" fill="currentColor"></path>
                        </svg>
                        Apple
                    </button>
                </div>

                @if (Route::has('login'))
                    <div class="text-center z-10 relative">
                        <p class="font-body-lg text-on-surface/50">
                            Already have an account? 
                            <a class="text-primary-container font-bold hover:underline decoration-primary-container/30 underline-offset-4" href="{{ route('login') }}">Sign In</a>
                        </p>
                    </div>
                @endif
            </div>
        </main>

        <footer class="w-full py-8 bg-surface-container-lowest border-t border-white/5 opacity-80 hover:opacity-100 transition-opacity">
            <div class="flex flex-col md:flex-row justify-between items-center px-container-padding-mobile gap-4">
                <div class="font-title-md text-title-md text-primary">CourtYK</div>
                <div class="flex gap-6">
                    <a class="text-on-tertiary-container hover:text-primary transition-opacity font-label-sm text-label-sm" href="#">Privacy Policy</a>
                    <a class="text-on-tertiary-container hover:text-primary transition-opacity font-label-sm text-label-sm" href="#">Terms of Service</a>
                    <a class="text-on-tertiary-container hover:text-primary transition-opacity font-label-sm text-label-sm" href="#">Support</a>
                </div>
                <div class="font-label-sm text-label-sm text-on-tertiary-container">
                    © 2026 CourtYK. Precision in every play.
                </div>
            </div>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const inputs = document.querySelectorAll('input.input-glass');
                
                inputs.forEach(input => {
                    input.addEventListener('focus', () => {
                        const card = input.closest('.glass-card');
                        if (card) card.style.borderColor = 'rgba(202, 243, 0, 0.2)';
                    });
                    
                    input.addEventListener('blur', () => {
                        const card = input.closest('.glass-card');
                        if (card) card.style.borderColor = 'rgba(255, 255, 255, 0.15)';
                    });
                });

                // Smooth parallax effect for background
                window.addEventListener('mousemove', (e) => {
                    const bg = document.querySelector('.liquid-bg');
                    if (bg) {
                        const x = (e.clientX - window.innerWidth / 2) / 100;
                        const y = (e.clientY - window.innerHeight / 2) / 100;
                        bg.style.transform = `scale(1.1) translate(${x}px, ${y}px)`;
                    }
                });
            });
        </script>
    </body>
    </html>