<header
    class="fixed top-0 w-full z-50 bg-surface/60 backdrop-blur-3xl border-b border-white/10 shadow-[0px_20px_40px_rgba(0,0,0,0.5)]">
    <nav class="flex items-center justify-between px-gutter h-16 w-full max-w-7xl mx-auto">
        <div class="flex items-center gap-2">
            <span class="text-2xl font-black italic tracking-tighter text-white">
                Court<span class="text-primary-fixed">YK</span>
            </span>
        </div>
        <div class="hidden md:flex items-center gap-8">
            <a class="text-primary-fixed font-title-md text-title-md transition-colors" href="/">Home</a>
            <a class="text-on-surface-variant font-title-md text-title-md hover:bg-white/5 transition-colors px-3 py-1 rounded"
                href="/venues">Venues</a>
            <a class="text-on-surface-variant font-title-md text-title-md hover:bg-white/5 transition-colors px-3 py-1 rounded"
                href="/my-bookings">Bookings</a>
        </div>

        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <div class="flex items-center">
                        <div
                            class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/5 bg-white/[0.03] inner-glow m-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#d4ff00] animate-pulse"></span>
                            <span class="text-on-surface text-xs font-semibold tracking-wide">
                                {{ Auth::user()->name }}
                            </span>
                        </div>
                        <div class="relative" x-data="{ open: false }">
                            <div @click="open = !open">
                                <button
                                    class="bg-primary-fixed text-on-primary p-2 rounded-full electric-glow hover:scale-105 active:scale-95 transition-all flex items-center justify-center focus:outline-none"
                                    title="{{ Auth::user()->name }}">
                                    <span class="material-symbols-outlined">person</span>
                                </button>
                            </div>

                            <div x-show="open" @click.away="open = false" x-cloak
                                class="absolute right-0 top-full mt-5 w-56 glass-card rounded-2xl p-2 z-50"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95">
                                <div class="block px-4 py-2 text-xs text-white/50 border-b border-white/10">
                                    Hi, <strong class="text-white/90">{{ Auth::user()->name }}</strong> 👋
                                </div>

                                <a href="{{ route('dashboard') }}" @click="open = false"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/5 hover:text-white transition-all text-sm">
                                    <span class="material-symbols-outlined text-[18px]">dashboard</span>
                                    Dashboard
                                </a>

                                <a href="{{ route('profile.edit') }}" @click="open = false"
                                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/5 hover:text-white transition-all text-sm">
                                    <span class="material-symbols-outlined text-[18px]">account_circle</span>
                                    Profile
                                </a>

                                <hr class="border-white/10 my-1">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" @click="open = false"
                                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition-all text-sm mt-1">
                                        <span class="material-symbols-outlined text-[18px]">logout</span>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white font-title-md text-sm px-5 py-2 rounded-full border border-white/20 hover:bg-white/10 hover:border-primary-fixed/50 hover:text-primary-fixed active:scale-95 transition-all max-md:hidden">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-primary-fixed/90 text-black font-title-md text-sm px-5 py-2 rounded-full hover:bg-primary-fixed active:scale-95 transition-all max-md:hidden">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
</header>

<footer
    class="md:hidden fixed bottom-0 w-full z-50 rounded-t-xl bg-surface-container-lowest/40 backdrop-blur-3xl border-t border-white/15 shadow-[0px_-10px_30px_rgba(0,0,0,0.3)]">
    <div class="flex justify-around items-center pt-3 pb-6 px-4 w-full">
        <a href="#"
            class="flex flex-col items-center gap-1 text-primary-fixed drop-shadow-[0_0_8px_rgba(202,243,0,0.5)] animate-pulse-subtle">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">stadium</span>
            <span class="font-label-sm text-label-sm">Home</span>
        </a>
        <a href="{{ route('venues.index') }}"
            class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 hover:text-primary-fixed/80">
            <span class="material-symbols-outlined">grid_view</span>
            <span class="font-label-sm text-label-sm">Venues</span>
        </a>
        <a href="{{ route('bookings.index') }}"
            class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 hover:text-primary-fixed/80">
            <span class="material-symbols-outlined">confirmation_number</span>
            <span class="font-label-sm text-label-sm">Bookings</span>
        </a>
        @auth
            <a href="{{ route('dashboard') }}"
                class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 hover:text-primary-fixed/80">
                <span class="material-symbols-outlined">account_circle</span>
                <span class="font-label-sm text-label-sm">Profile</span>
            </a>
        @else
            <a href="{{ route('login') }}"
                class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60 hover:text-primary-fixed/80">
                <span class="material-symbols-outlined">login</span>
                <span class="font-label-sm text-label-sm">Login</span>
            </a>
        @endauth
    </div>
</footer>
