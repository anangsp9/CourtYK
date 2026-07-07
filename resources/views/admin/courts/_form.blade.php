@php
    $selectedFloorType = old('floor_type', $court->floor_type ?? '');
    $selectedCourtType = old('court_type', $court->court_type ?? '');
@endphp

{{-- Venue --}}
<div class="mb-5">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Venue
    </label>

    <select
        name="venue_id"
        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
    >
        <option value="">-- Pilih Venue --</option>

        @foreach($venues as $venue)
            <option
                value="{{ $venue->id }}"
                @selected(old('venue_id', $court->venue_id ?? '') == $venue->id)
            >
                {{ $venue->name }}
            </option>
        @endforeach
    </select>

    @error('venue_id')
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Nama Court --}}
<div class="mb-5">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Nama Court
    </label>

    <input
        type="text"
        name="name"
        value="{{ old('name', $court->name ?? '') }}"
        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
        placeholder="Contoh: Court A"
    >

    @error('name')
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Tipe Lantai --}}
<div class="mb-5">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Tipe Lantai
    </label>

    <select
        name="floor_type"
        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
    >
        <option value="">-- Pilih Tipe Lantai --</option>

        @foreach(config('courts.floor_types') as $key => $floor)
            <option
                value="{{ $key }}"
                @selected($selectedFloorType == $key)
            >
                {{ $floor['label'] }}
            </option>
        @endforeach
    </select>

    @error('floor_type')
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Tipe Court --}}
<div class="mb-5">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Tipe Court
    </label>

    <select
        name="court_type"
        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
    >
        <option value="">-- Pilih Tipe Court --</option>

        @foreach(config('courts.court_types') as $key => $type)
            <option
                value="{{ $key }}"
                @selected($selectedCourtType == $key)
            >
                {{ $type['label'] }}
            </option>
        @endforeach
    </select>

    @error('court_type')
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Harga --}}
<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Harga / Jam
    </label>

    <input
        type="number"
        name="price_per_hour"
        value="{{ old('price_per_hour', $court->price_per_hour ?? '') }}"
        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
        placeholder="Contoh: 50000"
    >

    @error('price_per_hour')
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    @enderror
</div>