<section>
    <div class="glass-card rounded-2xl p-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-full icon-glass flex items-center justify-center text-primary-fixed">
                <span class="material-symbols-outlined text-[24px]">lock</span>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white tracking-tight">Update Password</h2>
                <p class="text-sm text-white/50 font-light">Pastikan akun Anda menggunakan password yang kuat.</p>
            </div>
        </div>

        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <div>
                <label for="update_password_current_password" class="block text-sm font-medium text-white/70 mb-2">Current Password</label>
                <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                    class="w-full px-4 py-3 rounded-xl input-glass text-white bg-black/10 focus:ring-0" />
                @error('current_password', 'updatePassword')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="update_password_password" class="block text-sm font-medium text-white/70 mb-2">New Password</label>
                <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl input-glass text-white bg-black/10 focus:ring-0" />
                @error('password', 'updatePassword')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="update_password_password_confirmation" class="block text-sm font-medium text-white/70 mb-2">Confirm Password</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl input-glass text-white bg-black/10 focus:ring-0" />
                @error('password_confirmation', 'updatePassword')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4 pt-2">
                <button type="submit" class="btn-lime px-8 py-3 rounded-xl text-sm tracking-wide">
                    Simpan
                </button>
                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-primary-fixed font-medium flex items-center gap-2">
                        <span class="material-symbols-outlined text-[16px]">check_circle</span>
                        Tersimpan.
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>
