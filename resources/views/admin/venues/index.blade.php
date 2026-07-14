@extends('layouts.admin')

@section('content')
<style>
    .liquid-glass {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        border-left: 0.5px solid rgba(255, 255, 255, 0.1);
        border-right: 0.5px solid rgba(255, 255, 255, 0.1);
        border-bottom: 0.5px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(30px);
    }
    .bloom-lime {
        box-shadow: 0 0 20px rgba(202, 243, 0, 0.4);
    }
</style>

<div class="max-w-7xl mx-auto">

    @if (session('success'))
        <div class="mb-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 p-4 text-sm flex items-center gap-2.5 backdrop-blur-[10px]">
            <span class="material-symbols-outlined text-lg">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 p-4 text-sm flex items-center gap-2.5 backdrop-blur-[10px]">
            <span class="material-symbols-outlined text-lg">error</span>
            {{ session('error') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-bold text-on-surface tracking-tight">Venue Management</h2>
            <p class="text-on-surface-variant mt-1 text-sm">Oversee {{ $venues->total() }} facilities across regions.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-5 py-2.5 rounded-xl bg-white/5 border border-white/10 text-on-surface-variant text-sm font-medium hover:bg-white/10 transition-all flex items-center gap-2 backdrop-blur-[10px]">
                <span class="material-symbols-outlined text-lg">filter_list</span>
                Filters
            </button>
            <a href="{{ route('admin.venues.create') }}"
               class="px-5 py-2.5 rounded-xl bg-primary-container text-on-primary-fixed font-bold flex items-center gap-2 hover:scale-[1.02] active:scale-95 transition-all bloom-lime">
                <span class="material-symbols-outlined text-lg">add</span>
                Add New Venue
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @forelse($venues as $venue)
            <div class="liquid-glass rounded-2xl overflow-hidden flex flex-col group hover:shadow-[0_20px_40px_rgba(0,0,0,0.5)] transition-all duration-500">
                <div class="h-48 relative overflow-hidden">
                    @if($venue->image)
                        <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                             style="background-image: url('{{ asset('storage/' . $venue->image) }}')"></div>
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-surface-container-high to-surface-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30">location_on</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60 pointer-events-none"></div>
                    <div class="absolute top-3 right-3 flex gap-2">
                        <a href="{{ route('admin.venues.edit', $venue) }}"
                           class="w-8 h-8 rounded-full bg-black/40 backdrop-blur-md border border-white/10 flex items-center justify-center text-white hover:bg-primary-container hover:text-black transition-all">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                        </a>
                        <form action="{{ route('admin.venues.destroy', $venue) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus venue ini?')"
                                    class="w-8 h-8 rounded-full bg-black/40 backdrop-blur-md border border-white/10 flex items-center justify-center text-white hover:bg-red-500 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-start justify-between gap-2">
                        <h3 class="text-lg font-bold text-on-surface leading-snug">{{ $venue->name }}</h3>
                        @if($venue->open_time)
                            <span class="shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold text-primary-fixed bg-primary-container/15 px-2.5 py-1 rounded-full border border-primary-fixed/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary-fixed"></span>
                                {{ \Carbon\Carbon::parse($venue->open_time)->format('H:i') }}
                            </span>
                        @endif
                    </div>

                    <p class="text-sm text-on-surface-variant flex items-center gap-1.5 mt-2 mb-4">
                        <span class="material-symbols-outlined text-[16px] text-primary-fixed/70">location_on</span>
                        {{ $venue->address }}
                    </p>

                    @if($venue->featured_facilities)
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            @foreach(array_slice($venue->featured_facilities, 0, 3) as $facility)
                                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-white/5 border border-white/10 text-on-surface-variant/80">{{ $facility }}</span>
                            @endforeach
                            @if(count($venue->featured_facilities) > 3)
                                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-white/5 border border-white/10 text-on-surface-variant/80">+{{ count($venue->featured_facilities) - 3 }}</span>
                            @endif
                        </div>
                    @endif

                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/5">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary-fixed text-lg">sports_tennis</span>
                            <span class="text-sm font-medium text-on-surface">{{ $venue->courts_count }} Courts</span>
                        </div>
                        <a href="{{ route('admin.venues.edit', $venue) }}"
                           class="text-xs font-medium text-primary-fixed hover:underline opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            Manage Courts &rarr;
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full border-2 border-dashed border-white/10 rounded-2xl flex flex-col items-center justify-center py-20 px-8">
                <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-3xl text-on-surface-variant/50">location_off</span>
                </div>
                <p class="text-lg font-semibold text-on-surface-variant mb-1">Belum ada venue</p>
                <p class="text-sm text-on-surface-variant/60 mb-6">Mulai dengan menambahkan venue pertama Anda.</p>
                <a href="{{ route('admin.venues.create') }}"
                   class="px-6 py-2.5 bg-primary-container text-on-primary-fixed font-bold rounded-xl bloom-lime hover:scale-[1.02] active:scale-95 transition-all inline-flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">add</span>
                    Tambah Venue
                </a>
            </div>
        @endforelse

        <a href="{{ route('admin.venues.create') }}"
           class="border-2 border-dashed border-white/10 rounded-2xl flex flex-col items-center justify-center p-10 group hover:border-primary-fixed/40 transition-all cursor-pointer min-h-[320px]">
            <div class="w-14 h-14 rounded-full bg-white/5 flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-primary-container/20 transition-all duration-300">
                <span class="material-symbols-outlined text-3xl text-on-surface-variant group-hover:text-primary-fixed">add_location</span>
            </div>
            <p class="text-base font-semibold text-on-surface-variant group-hover:text-primary transition-colors">Register New Facility</p>
            <p class="text-sm text-on-surface-variant/40 mt-1.5 text-center">Onboard your venue to the network</p>
        </a>
    </div>

    <div class="mt-8">
        {{ $venues->links() }}
    </div>

</div>

<script>
    document.querySelectorAll('.liquid-glass').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', x + 'px');
            card.style.setProperty('--mouse-y', y + 'px');
        });
    });
</script>
@endsection
