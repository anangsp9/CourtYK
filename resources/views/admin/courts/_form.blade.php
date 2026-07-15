@php
    $selectedFloorType = old('floor_type', $court->floor_type ?? '');
    $selectedCourtType = old('court_type', $court->court_type ?? '');
@endphp

{{-- Venue --}}
<div>
    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Venue</label>
    <select name="venue_id"
        class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 px-3.5 text-sm text-on-surface focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all @error('venue_id') border-red-400/50 @enderror">
        <option value="" class="bg-surface">-- Pilih Venue --</option>
        @foreach($venues as $venue)
            <option value="{{ $venue->id }}" @selected(old('venue_id', $court->venue_id ?? '') == $venue->id) class="bg-surface">
                {{ $venue->name }}
            </option>
        @endforeach
    </select>
    @error('venue_id')
        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
            <span class="material-symbols-outlined text-[12px]">error</span>
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Nama Court --}}
<div>
    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Nama Court</label>
    <input type="text" name="name" value="{{ old('name', $court->name ?? '') }}"
        class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 px-3.5 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all @error('name') border-red-400/50 @enderror"
        placeholder="Contoh: Court A">
    @error('name')
        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
            <span class="material-symbols-outlined text-[12px]">error</span>
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Tipe Lantai --}}
<div>
    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Tipe Lantai</label>
    <select name="floor_type"
        class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 px-3.5 text-sm text-on-surface focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all @error('floor_type') border-red-400/50 @enderror">
        <option value="" class="bg-surface">-- Pilih Tipe Lantai --</option>
        @foreach(config('courts.floor_types') as $key => $floor)
            <option value="{{ $key }}" @selected($selectedFloorType == $key) class="bg-surface">
                {{ $floor['label'] }}
            </option>
        @endforeach
    </select>
    @error('floor_type')
        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
            <span class="material-symbols-outlined text-[12px]">error</span>
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Tipe Court --}}
<div>
    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Tipe Court</label>
    <select name="court_type"
        class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 px-3.5 text-sm text-on-surface focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all @error('court_type') border-red-400/50 @enderror">
        <option value="" class="bg-surface">-- Pilih Tipe Court --</option>
        @foreach(config('courts.court_types') as $key => $type)
            <option value="{{ $key }}" @selected($selectedCourtType == $key) class="bg-surface">
                {{ $type['label'] }}
            </option>
        @endforeach
    </select>
    @error('court_type')
        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
            <span class="material-symbols-outlined text-[12px]">error</span>
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Harga --}}
<div>
    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Harga / Jam</label>
    <div class="relative">
        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant/40 text-sm font-medium">Rp</span>
        <input type="number" name="price_per_hour" value="{{ old('price_per_hour', $court->price_per_hour ?? '') }}"
            class="w-full bg-white/5 border border-white/10 rounded-lg py-2.5 pl-10 pr-3.5 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all @error('price_per_hour') border-red-400/50 @enderror"
            placeholder="50000">
    </div>
    @error('price_per_hour')
        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
            <span class="material-symbols-outlined text-[12px]">error</span>
            {{ $message }}
        </p>
    @enderror
</div>