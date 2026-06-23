@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-8">
            Tambah Court Baru
        </h1>

        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
            <form action="{{ route('admin.courts.store') }}" method="POST">
                @csrf

                {{-- Pilih Venue --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Venue</label>
                    <select name="venue_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">-- Pilih Venue --</option>
                        @foreach($venues as $venue)
                            <option value="{{ $venue->id }}" {{ old('venue_id') == $venue->id ? 'selected' : '' }}>
                                {{ $venue->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('venue_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Court --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Court (Lapangan)</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Contoh: Lapangan A">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga Per Jam --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga Per Jam</label>
                    <input type="number" name="price_per_hour" value="{{ old('price_per_hour') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Contoh: 100000">
                    @error('price_per_hour')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-sm transition">
                        Simpan Court
                    </button>
                    <a href="{{ route('admin.courts.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
@endsection