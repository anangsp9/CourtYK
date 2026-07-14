@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto space-y-layer-gap">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                    <span class="material-symbols-outlined text-lg">edit</span>
                </div>
                <div>
                    <h4 class="font-title-md text-title-md text-primary">Edit User</h4>
                    <p class="text-on-surface-variant font-label-sm text-sm">{{ $user->name }}</p>
                </div>
            </div>
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-1.5 text-sm text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Back
            </a>
        </div>

        {{-- Form Card --}}
        <section class="glass-card rounded-lg p-6 lg:p-8">
            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 px-3.5 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all @error('name') border-red-400/50 @enderror">
                    @error('name')
                        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[12px]">error</span>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 px-3.5 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all @error('email') border-red-400/50 @enderror">
                    @error('email')
                        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[12px]">error</span>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Role</label>
                    <select name="role"
                        class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 px-3.5 text-sm text-on-surface focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all @error('role') border-red-400/50 @enderror">
                        <option value="user" @selected(old('role', $user->role) == 'user') class="bg-surface">User</option>
                        <option value="admin" @selected(old('role', $user->role) == 'admin') class="bg-surface">Admin</option>
                    </select>
                    @error('role')
                        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[12px]">error</span>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button class="bg-primary-fixed text-on-primary-fixed px-6 py-2.5 rounded-lg text-sm font-bold hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">save</span>
                        Update User
                    </button>
                    <a href="{{ route('admin.users.index') }}"
                       class="px-6 py-2.5 rounded-lg text-sm border border-white/10 text-on-surface-variant hover:bg-white/5 transition-all">
                        Cancel
                    </a>
                </div>
            </form>
        </section>

    </div>
@endsection
