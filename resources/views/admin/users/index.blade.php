@extends('layouts.admin')

@section('content')
    <div class="space-y-layer-gap">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                    <span class="material-symbols-outlined text-lg">group</span>
                </div>
                <div>
                    <h4 class="font-title-md text-title-md text-primary">User Management</h4>
                    <p class="text-on-surface-variant font-label-sm text-sm">{{ $users->total() }} users registered</p>
                </div>
            </div>
        </div>

        {{-- Filter Bar --}}
        <div class="glass-card rounded-lg p-4 lg:p-5 relative z-10">
            <form method="GET" class="flex flex-wrap items-end gap-3">
                <div class="flex-1 min-w-[200px]">
                    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-1.5 block">Search</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/50 text-sm">search</span>
                        <input type="text" name="search" placeholder="Cari nama atau email..." value="{{ request('search') }}"
                            class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 pl-9 pr-3 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all">
                    </div>
                </div>
                <div x-data="{
                    open: false,
                    selected: '{{ request('role', '') }}',
                    options: [
                        { value: '', label: 'Semua Role', icon: 'group' },
                        { value: 'admin', label: 'Admin', icon: 'shield' },
                        { value: 'user', label: 'User', icon: 'person' },
                    ],
                    select(val) {
                        this.selected = val
                        this.open = false
                        this.$nextTick(() => this.$el.closest('form').submit())
                    }
                }" class="relative">
                    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-1.5 block">Role</label>
                    <button type="button" @click="open = !open"
                        class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 px-3 text-sm text-on-surface focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all flex items-center justify-between gap-2 min-w-[140px]">
                        <span class="flex items-center gap-2" x-text="options.find(o => o.value === selected)?.label || 'Semua Role'"></span>
                        <span class="material-symbols-outlined text-sm text-on-surface-variant/60 transition-transform duration-200" :class="open && 'rotate-180'">expand_more</span>
                    </button>
                    <div x-show="open" @click.away="open = false" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                        class="absolute left-0 right-0 mt-1.5 z-[100] glass-card rounded-lg overflow-hidden">
                        <div class="py-1">
                            <template x-for="opt in options" :key="opt.value">
                                <button type="button" @click="select(opt.value)"
                                    class="w-full flex items-center gap-3 px-3.5 py-2.5 text-sm transition-all duration-150"
                                    :class="selected === opt.value
                                        ? 'bg-primary-container/10 text-primary-fixed'
                                        : 'text-on-surface-variant hover:bg-white/[0.04] hover:text-on-surface'">
                                    <span class="material-symbols-outlined text-[16px]" x-text="opt.icon"></span>
                                    <span class="flex-1 text-left" x-text="opt.label"></span>
                                    <span x-show="selected === opt.value" class="w-1.5 h-1.5 rounded-full bg-primary-fixed shadow-[0_0_6px_rgba(202,243,0,0.6)]"></span>
                                </button>
                            </template>
                        </div>
                    </div>
                    <input type="hidden" name="role" x-model="selected">
                </div>
                <button class="bg-primary-fixed text-on-primary-fixed px-5 py-2.5 rounded-lg text-sm font-bold hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">search</span>
                    Cari
                </button>
                <a href="{{ route('admin.users.index') }}"
                   class="px-5 py-2.5 rounded-lg text-sm border border-white/10 text-on-surface-variant hover:bg-white/5 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">close</span>
                    Reset
                </a>
            </form>
        </div>

        {{-- Users Table --}}
        <section class="glass-card rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-on-surface-variant font-label-sm uppercase tracking-widest bg-white/[0.03] text-xs">
                            <th class="px-4 lg:px-6 py-3.5 w-12">ID</th>
                            <th class="px-4 lg:px-6 py-3.5">User</th>
                            <th class="px-4 lg:px-6 py-3.5 hidden sm:table-cell">Email</th>
                            <th class="px-4 lg:px-6 py-3.5">Role</th>
                            <th class="px-4 lg:px-6 py-3.5 hidden md:table-cell">Joined</th>
                            <th class="px-4 lg:px-6 py-3.5">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.04]">
                        @foreach ($users as $user)
                            <tr class="group hover:bg-white/[0.04] transition-all duration-300">
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <span class="text-on-surface-variant/50 text-xs font-mono">#{{ $user->id }}</span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-container/30 to-primary-container/5 flex items-center justify-center border border-primary-fixed/20 font-bold text-xs text-primary-fixed shrink-0 group-hover:border-primary-fixed/40 transition-colors">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                        <span class="font-medium text-sm text-on-surface group-hover:text-primary-fixed transition-colors">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5 text-on-surface-variant text-sm hidden sm:table-cell">{{ $user->email }}</td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    @if ($user->role === 'admin')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold border tracking-wider uppercase bg-purple-500/10 text-purple-400 border-purple-400/25">
                                            <span class="material-symbols-outlined text-[12px]">shield</span>
                                            Admin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold border tracking-wider uppercase bg-blue-500/10 text-blue-400 border-blue-400/25">
                                            <span class="material-symbols-outlined text-[12px]">person</span>
                                            User
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5 text-on-surface-variant text-sm hidden md:table-cell">
                                    <span class="inline-flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-[14px] text-on-surface-variant/50">calendar_today</span>
                                        {{ $user->created_at->format('d M Y') }}
                                    </span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 lg:py-5">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="p-2 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 transition-all">
                                            <span class="material-symbols-outlined text-sm">edit</span>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus user ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-2 rounded-lg text-on-surface-variant hover:text-red-400 hover:bg-red-500/10 transition-all">
                                                <span class="material-symbols-outlined text-sm">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($users->hasPages())
                <div class="px-4 lg:px-6 py-4 border-t border-white/[0.06]">
                    {{ $users->links() }}
                </div>
            @endif
        </section>

    </div>
@endsection
