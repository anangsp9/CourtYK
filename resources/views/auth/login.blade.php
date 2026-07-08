    <!DOCTYPE html>
    <html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>{{ config('app.name', 'CourtYK') }} - Sign In</title>
        
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
        
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
                            "title-md": ["20px", {"lineHeight": "1.4", "fontWeight": "500"}],
                            "label-sm": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
                            "body-lg": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                            "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                            "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600"}],
                            "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "700"}]
                        }
                    }
                }
            }
        </script>
        
        <style>
            body {
                background-color: #0e0e0e;
                overflow-x: hidden;
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

            .court-pattern {
                background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0);
                background-size: 40px 40px;
            }

            @keyframes pulse-slow {
                0%, 100% { opacity: 0.5; transform: scale(1); }
                50% { opacity: 0.8; transform: scale(1.05); }
            }

            .pulse-element {
                animation: pulse-slow 8s infinite ease-in-out;
            }
        </style>
    </head>
    <body class="font-body-lg text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
        
        <header class="fixed top-0 w-full z-50 bg-surface/30 backdrop-blur-[30px] border-b border-white/15 shadow-[0px_20px_40px_rgba(0,0,0,0.5)] h-20 flex justify-between items-center px-container-padding-mobile md:px-container-padding-desktop">
            <div class="font-display-lg text-display-lg-mobile md:text-display-lg tracking-tighter text-primary-fixed">
                CourtYK
            </div>
            <div class="hidden md:flex items-center gap-8">
                <a class="text-on-surface/70 hover:text-primary-container transition-colors font-title-md text-title-md" href="/">Explore</a>
                <a class="text-on-surface/70 hover:text-primary-container transition-colors font-title-md text-title-md" href="#">Venues</a>
            </div>
            @if (Route::has('register'))
                <a class="bg-primary-fixed text-on-primary-fixed px-6 py-2 rounded-full font-label-sm text-label-sm electric-glow" href="{{ route('register') }}">
                    Register
                </a>
            @endif
        </header>

        <main class="relative min-h-screen pt-20 flex items-center justify-center overflow-hidden">
            <div class="liquid-bg court-pattern"></div>
            <div class="absolute -top-[10%] -left-[10%] w-[50%] h-[50%] rounded-full bg-[#d4ff00]/5 blur-[120px] pulse-element"></div>
            <div class="absolute -bottom-[10%] -right-[10%] w-[40%] h-[40%] rounded-full bg-white/5 blur-[100px] pulse-element" style="animation-delay: -4s"></div>
            
            <div class="absolute inset-0 z-[-2] opacity-20 grayscale brightness-50">
                <div class="w-full h-full bg-cover bg-center scale-110 blur-xl" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBa94tWPo-5O_F1MdJuhm3HGPYHOfkWJUv64h5hBUYsOmtkXQOaNvoPCEIOZm524oXDAMt1u8RbhRTagG4Te9BzWGHRpjjwH5H9M_gSYLPuKIKREw8ci56moPEEOuuKDwhJUSh4PROHcNX4gVv3KvCevfs6TC2CAitxdkBcPRe1bN3Xxr6Tz7acrcKVplbqXztz1IGVrfMMfmnMNbP7rvVgivunwctuVySAj3eoWhS5EUho1oj6boBU6zsn6JNUJUhencLSbyqiSQ')"></div>
            </div>

            <div class="relative z-10 w-full max-w-[480px] px-container-padding-mobile">
                
                <x-auth-session-status class="mb-6 text-center" :status="session('status')" />

                <div class="glass-card inner-glow rounded-lg p-8 md:p-12 transition-all duration-500">
                    <div class="text-center mb-10">
                        <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-2">Welcome Back</h1>
                        <p class="text-on-surface/60 font-body-lg text-body-lg">Precision in every play starts here.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface/80 mb-2 ml-1" for="email">EMAIL ADDRESS</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface/40">mail</span>
                                <input class="input-glass bg-transparent w-full pl-12 pr-4 py-4 rounded-full text-primary placeholder:text-on-surface/30 focus:ring-0 focus:ring-offset-0" 
                                       id="email" 
                                       type="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="name@domain.com" 
                                       required 
                                       autofocus 
                                       autocomplete="username"/>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400 px-2" />
                        </div>

                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface/80 mb-2 ml-1" for="password">PASSWORD</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface/40">lock</span>
                                <input class="input-glass bg-transparent w-full pl-12 pr-4 py-4 rounded-full text-primary placeholder:text-on-surface/30 focus:ring-0 focus:ring-offset-0" 
                                       id="password" 
                                       type="password" 
                                       name="password" 
                                       placeholder="••••••••" 
                                       required 
                                       autocomplete="current-password"/>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400 px-2" />
                        </div>

                        <div class="flex items-center justify-between text-on-surface/70 font-label-sm text-label-sm">
                            <label for="remember_me" class="flex items-center gap-2 cursor-pointer group">
                                <div class="relative flex items-center">
                                    <input id="remember_me" 
                                           type="checkbox" 
                                           name="remember" 
                                           class="peer h-5 w-5 rounded bg-white/5 border-white/10 checked:bg-primary-fixed checked:border-primary-fixed focus:ring-offset-0 focus:ring-0 transition-all cursor-pointer"/>
                                    <span class="material-symbols-outlined absolute inset-0 text-on-primary-fixed text-[14px] opacity-0 peer-checked:opacity-100 flex items-center justify-center pointer-events-none">check</span>
                                </div>
                                <span class="group-hover:text-primary transition-colors">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="hover:text-primary-fixed transition-colors" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>

                        <button class="w-full bg-primary-fixed text-on-primary-fixed font-title-md text-title-md py-4 rounded-full electric-glow mt-4" type="submit">
                            Sign In
                        </button>
                    </form>

                    <div class="flex items-center gap-4 my-8">
                        <div class="h-px flex-1 bg-white/10"></div>
                        <span class="font-label-sm text-label-sm text-on-surface/30">OR CONTINUE WITH</span>
                        <div class="h-px flex-1 bg-white/10"></div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button class="input-glass flex items-center justify-center gap-2 py-3 rounded-full hover:bg-white/10 transition-all font-label-sm text-label-sm">
                            <svg class="w-5 h-5" viewbox="0 0 24 24">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="currentColor"></path>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="currentColor"></path>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="currentColor"></path>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 12-4.53z" fill="currentColor"></path>
                            </svg>
                            Google
                        </button>
                        <button class="input-glass flex items-center justify-center gap-2 py-3 rounded-full hover:bg-white/10 transition-all font-label-sm text-label-sm">
                            <svg class="w-5 h-5" viewbox="0 0 24 24">
                                <path d="M17.05 20.28c-.98.95-2.05.88-3.08.4c-1.09-.5-2.08-.48-3.24 0-1.44.62-2.2.44-3.06-.4C4.1 16.78 3.07 10.45 5.72 6.55c1.32-1.95 3.35-3.08 5.26-3.04 1.44.03 2.5 1.02 3.38 1.02.83 0 2.28-1.2 3.94-1.02 1.72.18 3.06.84 3.9 2.13-3.4 2.02-2.86 6.36.43 7.73-.72 1.83-1.68 3.63-3.58 6.91zM14.53 3.16c-.08-2.22 1.82-4.14 3.92-4.16.24 2.4-2.13 4.45-3.92 4.16z" fill="currentColor"></path>
                            </svg>
                            Apple
                        </button>
                    </div>

                    @if (Route::has('register'))
                        <div class="mt-10 text-center">
                            <p class="font-body-lg text-body-lg text-on-surface/50">
                                Don't have an account? 
                                <a class="text-primary-fixed font-bold hover:underline underline-offset-4 ml-1" href="{{ route('register') }}">Sign Up</a>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </main>

        <footer class="w-full py-8 bg-surface-container-lowest border-t border-white/5 flex flex-col md:flex-row justify-between items-center px-container-padding-mobile gap-4">
            <div class="font-title-md text-title-md text-primary opacity-80">CourtYK</div>
            <div class="flex gap-6 opacity-60">
                <a class="font-label-sm text-label-sm text-on-tertiary-container hover:text-primary transition-opacity" href="#">Privacy Policy</a>
                <a class="font-label-sm text-label-sm text-on-tertiary-container hover:text-primary transition-opacity" href="#">Terms of Service</a>
                <a class="font-label-sm text-label-sm text-on-tertiary-container hover:text-primary transition-opacity" href="#">Support</a>
            </div>
            <div class="font-label-sm text-label-sm text-on-tertiary-container opacity-40">
                © 2026 CourtYK. Precision in every play.
            </div>
        </footer>

        <script>
            // Input glass icons visual states focus trigger
            const inputs = document.querySelectorAll('.input-glass');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    const icon = input.parentElement.querySelector('.material-symbols-outlined');
                    if(icon) {
                        icon.style.color = '#d4ff00';
                        icon.style.opacity = '1';
                    }
                });
                input.addEventListener('blur', () => {
                    const icon = input.parentElement.querySelector('.material-symbols-outlined');
                    if(icon) {
                        icon.style.color = '';
                        icon.style.opacity = '0.4';
                    }
                });
            });

            // Parallax mouse effect for desktop layout
            const card = document.querySelector('.glass-card');
            document.addEventListener('mousemove', (e) => {
                if (window.innerWidth > 768 && card) {
                    const xAxis = (window.innerWidth / 2 - e.pageX) / 50;
                    const yAxis = (window.innerHeight / 2 - e.pageY) / 50;
                    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
                }
            });

            document.addEventListener('mouseleave', () => {
                if(card) card.style.transform = `rotateY(0deg) rotateX(0deg)`;
            });
        </script>
    </body>
    </html>