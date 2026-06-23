@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">
                Court Management
            </h1>
            
            <a 
                href="{{ route('admin.courts.create') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm transition"
            >
                ➕ Tambah Court
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
                            <th class="px-6 py-4">Venue</th>
                            <th class="px-6 py-4">Nama Court</th>
                            <th class="px-6 py-4">Harga/Jam</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
                        @forelse($courts as $court)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    #{{ $court->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $court->venue->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $court->name }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-emerald-600 whitespace-nowrap">
                                    Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-3">
                                        <a 
                                            href="{{ route('admin.courts.edit', $court) }}"
                                            class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-semibold rounded shadow-sm transition"
                                        >
                                            Edit
                                        </a>
                                        
                                        <form 
                                            action="{{ route('admin.courts.destroy', $court) }}" 
                                            method="POST" 
                                            class="inline"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus court ini?')"
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
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500 italic">
                                    Belum ada data court.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection