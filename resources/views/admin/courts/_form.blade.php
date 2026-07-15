{{-- Venue --}}
<div>
    <label class="text-[11px] text-on-surface-variant uppercase tracking-wider mb-2 block">Venue</label>
    <x-custom-select name="venue_id" :options="$venues" value-field="id" label-field="name"
        :selected="old('venue_id', $court->venue_id ?? '')" placeholder="-- Pilih Venue --" />
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
    <x-custom-select name="floor_type" :options="config('courts.floor_types')" value-field="key" label-field="label"
        :selected="old('floor_type', $court->floor_type ?? '')" placeholder="-- Pilih Tipe Lantai --" />
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
    <x-custom-select name="court_type" :options="config('courts.court_types')" value-field="key" label-field="label"
        :selected="old('court_type', $court->court_type ?? '')" placeholder="-- Pilih Tipe Court --" />
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
    <x-custom-number name="price_per_hour"
        :value="old('price_per_hour', $court->price_per_hour ?? '')"
        placeholder="50000" :min="0" :step="1000" prefix="Rp" />
</div>