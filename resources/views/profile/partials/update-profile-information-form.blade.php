<section>
    <div class="glass-card rounded-2xl p-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-full icon-glass flex items-center justify-center text-primary-fixed">
                <span class="material-symbols-outlined text-[24px]">person</span>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white tracking-tight">Profile Information</h2>
                <p class="text-sm text-white/50 font-light">Update informasi profil dan email Anda.</p>
            </div>
        </div>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <div>
                <label for="name" class="block text-sm font-medium text-white/70 mb-2">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                    class="w-full px-4 py-3 rounded-xl input-glass text-white bg-black/10 focus:ring-0" />
                @error('name')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-white/70 mb-2">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                    class="w-full px-4 py-3 rounded-xl input-glass text-white bg-black/10 focus:ring-0" />
                @error('email')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 p-4 rounded-xl bg-yellow-500/10 border border-yellow-500/20">
                        <p class="text-sm text-yellow-400">
                            Email Anda belum diverifikasi.
                            <button form="send-verification" class="underline font-medium hover:text-yellow-300 transition-colors">
                                Klik di sini untuk kirim ulang email verifikasi.
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm font-medium text-green-400">
                                Link verifikasi baru telah dikirim ke email Anda.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4 pt-2">
                <button type="submit" class="btn-lime px-8 py-3 rounded-xl text-sm tracking-wide">
                    Simpan
                </button>
                @if (session('status') === 'profile-updated')
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
