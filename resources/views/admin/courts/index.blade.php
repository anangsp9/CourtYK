@extends('layouts.admin')

@section('content')
<style>
    .bloom-lime {
        box-shadow: 0 0 20px rgba(202, 243, 0, 0.4);
    }
</style>

<div class="max-w-7xl mx-auto">

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="mb-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 p-4 text-sm flex items-center gap-2.5 backdrop-blur-[10px]">
            <span class="material-symbols-outlined text-lg">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-8">
        <div class="flex items-center gap-3">
            <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                <span class="material-symbols-outlined text-lg">sports_tennis</span>
            </div>
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-on-surface tracking-tight">Court Management</h2>
                <p class="text-on-surface-variant mt-1 text-sm">{{ $courts->total() }} total courts</p>
            </div>
        </div>
        <a href="{{ route('admin.courts.create') }}"
           class="px-5 py-2.5 rounded-xl bg-primary-container text-on-primary-fixed font-bold flex items-center gap-2 hover:scale-[1.02] active:scale-95 transition-all bloom-lime">
            <span class="material-symbols-outlined text-lg">add</span>
            Tambah Court
        </a>
    </div>

    {{-- Courts Table --}}
    <section class="glass-card rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-on-surface-variant font-label-sm uppercase tracking-widest bg-white/[0.03] text-xs">
                        <th class="px-4 lg:px-6 py-3.5 w-16">ID</th>
                        <th class="px-4 lg:px-6 py-3.5">Venue</th>
                        <th class="px-4 lg:px-6 py-3.5">Nama Court</th>
                        <th class="px-4 lg:px-6 py-3.5">Harga/Jam</th>
                        <th class="px-4 lg:px-6 py-3.5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.04]">
                    @forelse($courts as $court)
                        <tr class="group hover:bg-white/[0.04] transition-all duration-300">
                            <td class="px-4 lg:px-6 py-4 lg:py-5">
                                <span class="text-on-surface-variant/50 text-xs font-mono">#{{ $court->id }}</span>
                            </td>
                            <td class="px-4 lg:px-6 py-4 lg:py-5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary-container/30 to-primary-container/5 flex items-center justify-center border border-primary-fixed/20 shrink-0">
                                        <span class="material-symbols-outlined text-[16px] text-primary-fixed">location_on</span>
                                    </div>
                                    <span class="text-sm text-on-surface">{{ $court->venue->name }}</span>
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-4 lg:py-5">
                                <div class="flex flex-col gap-1.5">
                                    <span class="font-medium text-sm text-on-surface group-hover:text-primary-fixed transition-colors">
                                        {{ $court->name }}
                                    </span>
                                    <div class="flex items-center gap-1.5">
                                        @php
                                            $floor = config('courts.floor_types.' . $court->floor_type);
                                            $type = config('courts.court_types.' . $court->court_type);
                                        @endphp
                                        @if ($floor)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-medium border bg-primary-container/10 text-primary-fixed border-primary-fixed/20">
                                                {{ $floor['label'] }}
                                            </span>
                                        @endif
                                        @if ($type)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-medium border @if($type['label'] === 'Indoor') bg-blue-500/10 text-blue-400 border-blue-400/25 @else bg-amber-500/10 text-amber-400 border-amber-400/25 @endif">
                                                {{ $type['label'] }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-4 lg:py-5">
                                <span class="font-semibold text-sm text-emerald-400 tabular-nums">Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-4 lg:px-6 py-4 lg:py-5">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.courts.edit', $court) }}"
                                       class="p-2 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 transition-all">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </a>
                                    <form action="{{ route('admin.courts.destroy', $court) }}" method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus court ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-2 rounded-lg text-on-surface-variant hover:text-red-400 hover:bg-red-500/10 transition-all cursor-pointer">
                                            <span class="material-symbols-outlined text-sm">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="flex flex-col items-center justify-center py-20 px-8">
                                    <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-4">
                                        <span class="material-symbols-outlined text-3xl text-on-surface-variant/50">sports_tennis</span>
                                    </div>
                                    <p class="text-lg font-semibold text-on-surface-variant mb-1">Belum ada data court</p>
                                    <p class="text-sm text-on-surface-variant/60 mb-6">Mulai dengan menambahkan court pertama Anda.</p>
                                    <a href="{{ route('admin.courts.create') }}"
                                       class="px-6 py-2.5 bg-primary-container text-on-primary-fixed font-bold rounded-xl bloom-lime hover:scale-[1.02] active:scale-95 transition-all inline-flex items-center gap-2">
                                        <span class="material-symbols-outlined text-lg">add</span>
                                        Tambah Court
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($courts->hasPages())
            <div class="px-4 lg:px-6 py-4 border-t border-white/[0.06]">
                {{ $courts->links() }}
            </div>
        @endif
    </section>

</div>
@endsection
