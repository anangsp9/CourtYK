<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-6">
            Booking Management
        </h1>

        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">User</th>
                            <th class="px-6 py-4">Venue</th>
                            <th class="px-6 py-4">Court</th>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Jam</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Aksi</th> {{-- Ditambahkan agar kolom sinkron --}}
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
                        @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    #{{ $booking->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->court->venue->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->court->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    📅 {{ $booking->booking_date->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    🕒 {{ substr($booking->start_time, 0, 5) }} - {{ substr($booking->end_time, 0, 5) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full uppercase tracking-wider
                                        {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           ($booking->status === 'paid' ? 'bg-blue-100 text-blue-800' : 
                                           ($booking->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')) }}">
                                        {{ $booking->status }}
                                    </span>
                                </td>

                                {{-- IMPLEMENTASI PHASE 9.4 — Tombol Aksi Admin --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        
                                        @if($booking->status === 'paid')
                                            <form
                                                action="{{ route('admin.bookings.complete', $booking) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('PATCH')
                                                <button
                                                    type="submit"
                                                    class="px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-xs font-semibold rounded shadow-sm transition"
                                                >
                                                    Complete
                                                </button>
                                            </form>
                                        @endif

                                        @if(in_array($booking->status, ['pending', 'paid']))
                                            <form
                                                action="{{ route('admin.bookings.cancel', $booking) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('PATCH')
                                                <button
                                                    type="submit"
                                                    class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded shadow-sm transition"
                                                >
                                                    Cancel
                                                </button>
                                            </form>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination Links --}}
        <div class="mt-6">
            {{ $bookings->links() }}
        </div>

    </div>
</x-app-layout>