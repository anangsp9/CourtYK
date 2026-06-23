@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">
                Venue Management
            </h1>
            
            <a 
                href="{{ route('admin.venues.create') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm transition"
            >
                ➕ Tambah Venue
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-800 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Nama Venue</th>
                            <th class="px-6 py-4">Alamat</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
                        @forelse($venues as $venue)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    #{{ $venue->id }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $venue->name }}
                                </td>
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $venue->address }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-3">
                                        <a 
                                            href="{{ route('admin.venues.edit', $venue) }}"
                                            class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-semibold rounded shadow-sm transition"
                                        >
                                            Edit
                                        </a>
                                        
                                        <form 
                                            action="{{ route('admin.venues.destroy', $venue) }}" 
                                            method="POST" 
                                            class="inline"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus venue ini?')"
                                                class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded shadow-sm transition"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500 italic">
                                    Belum ada data venue.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection