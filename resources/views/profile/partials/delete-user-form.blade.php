<section class="space-y-6">
    <div class="glass-card rounded-2xl p-8 border border-red-500/10">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-full icon-glass flex items-center justify-center text-red-400">
                <span class="material-symbols-outlined text-[24px]">delete_forever</span>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white tracking-tight">Delete Account</h2>
                <p class="text-sm text-white/50 font-light">Setelah akun dihapus, semua data akan dihapus permanen.</p>
            </div>
        </div>

        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-6 py-3 rounded-xl bg-red-500/10 text-red-400 border border-red-500/20 font-bold text-sm hover:bg-red-500/20 hover:border-red-500/40 transition-all flex items-center gap-2"
        >
            <span class="material-symbols-outlined text-[18px]">warning</span>
            Delete Account
        </button>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div
        x-data="{
            show: false,
            focusables() {
                let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
                return [...$el.querySelectorAll(selector)].filter(el => !el.hasAttribute('disabled'))
            },
            firstFocusable() { return this.focusables()[0] },
            lastFocusable() { return this.focusables().slice(-1)[0] },
            nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
            prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
            nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
            prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
        }"
        x-init="$watch('show', value => {
            if (value) {
                document.body.classList.add('overflow-y-hidden');
                setTimeout(() => firstFocusable().focus(), 100)
            } else {
                document.body.classList.remove('overflow-y-hidden');
            }
        })"
        x-on:open-modal.window="$event.detail == 'confirm-user-deletion' ? show = true : null"
        x-on:close-modal.window="$event.detail == 'confirm-user-deletion' ? show = false : null"
        x-on:close.stop="show = false"
        x-on:keydown.escape.window="show = false"
        x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
        x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
        x-show="show"
        class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
        style="display: none;"
    >
        {{-- Overlay --}}
        <div
            x-show="show"
            class="fixed inset-0 glass-overlay transform transition-all"
            x-on:click="show = false"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        ></div>

        {{-- Modal Content --}}
        <div
            x-show="show"
            class="glass-modal rounded-2xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto mt-20"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
                @csrf
                @method('delete')

                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 rounded-full bg-red-500/10 flex items-center justify-center text-red-400">
                        <span class="material-symbols-outlined text-[32px]">delete_forever</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white tracking-tight">Hapus Akun?</h2>
                        <p class="text-sm text-white/50 font-light">Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                </div>

                <p class="text-white/60 text-sm leading-relaxed mb-6">
                    Setelah akun Anda dihapus, semua data dan resource akan dihapus secara permanen.
                    Masukkan password Anda untuk konfirmasi penghapusan akun.
                </p>

                <div class="mb-6">
                    <label for="password" class="sr-only">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Masukkan password Anda"
                        class="w-full px-4 py-3 rounded-xl input-glass text-white placeholder-white/30 focus:ring-0"
                    />
                    @error('password', 'userDeletion')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4">
                    <button type="button" x-on:click="show = false"
                        class="px-6 py-3 rounded-xl icon-glass text-white/70 hover:text-white hover:bg-white/10 text-sm font-medium transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-3 rounded-xl bg-red-500/10 text-red-400 border border-red-500/20 font-bold text-sm hover:bg-red-500/20 hover:border-red-500/40 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">delete_forever</span>
                        Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
