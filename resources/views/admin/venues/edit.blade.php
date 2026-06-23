@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-8">
            Edit Venue: {{ $venue->name }}
        </h1>

        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
            <form action="{{ route('admin.venues.update', $venue) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Venue --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Venue</label>
                    <input type="text" name="name" value="{{ old('name', $venue->name) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', $venue->address) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $venue->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Jam Operasional --}}
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Buka</label>
                        <input type="time" name="open_time" value="{{ old('open_time', \Carbon\Carbon::parse($venue->open_time)->format('H:i')) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Tutup</label>
                        <input type="time" name="close_time" value="{{ old('close_time', \Carbon\Carbon::parse($venue->close_time)->format('H:i')) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-sm transition">
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