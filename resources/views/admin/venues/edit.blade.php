@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-8">
            Edit Venue: {{ $venue->name }}
        </h1>

        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
            <form action="{{ route('admin.venues.update', $venue) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Venue --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Venue</label>
                    <input type="text" name="name" value="{{ old('name', $venue->name) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', $venue->address) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        required>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $venue->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @php
                    $facilities = config('facilities');
                @endphp

                <div class="mb-6">

                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Fasilitas Unggulan
                    </label>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                        @foreach ($facilities as $key => $facility)
                            <label
                                class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition">

                                <input type="checkbox" name="featured_facilities[]" value="{{ $key }}"
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    @checked(in_array($key, old('featured_facilities', $venue->featured_facilities ?? [])))>

                                <span class="material-symbols-outlined text-gray-600">
                                    {{ $facility['icon'] }}
                                </span>

                                <span class="text-sm text-gray-700">
                                    {{ $facility['label'] }}
                                </span>

                            </label>
                        @endforeach

                    </div>

                    @error('featured_facilities')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Jam Operasional --}}
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Buka</label>
                        <input type="time" name="open_time"
                            value="{{ old('open_time', \Carbon\Carbon::parse($venue->open_time)->format('H:i')) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Tutup</label>
                        <input type="time" name="close_time"
                            value="{{ old('close_time', \Carbon\Carbon::parse($venue->close_time)->format('H:i')) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>
                </div>

                {{-- STEP 8.3 — Tampilkan Gambar Lama --}}
                @if ($venue->image)
                    <div class="mb-4">
                        <label class="block font-medium mb-2">Gambar Saat Ini</label>
                        <img src="{{ asset('storage/' . $venue->image) }}" alt="{{ $venue->name }}"
                            class="w-40 h-40 object-cover rounded-lg border">
                    </div>
                @endif

                {{-- STEP 8.4 — Tambahkan Input Upload Baru --}}
                <div class="mt-4 mb-6">
                    <label class="block font-medium mb-2">Ganti Gambar</label>
                    <input type="file" name="image" accept="image/*" class="block w-full border rounded p-2">
                    <p class="text-sm text-gray-500 mt-1">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-sm transition">
                        Perbarui Venue
                    </button>
                    <a href="{{ route('admin.venues.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
@endsection
