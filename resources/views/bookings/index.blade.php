<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4">
        
        <h1 class="text-3xl font-bold text-gray-900 mb-6">
            Riwayat Booking Saya
        </h1>

        <div class="space-y-4">
            @forelse($bookings as $booking)
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                    
                    {{-- Detail Lapangan dan Venue --}}
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">
                            {{ $booking->court->name }}
                        </h2>
                        <p class="text-gray-500 font-medium text-sm">
                            {{ $booking->court->venue->name }}
                        </p>
                        
                        <div class="mt-2 flex flex-wrap gap-x-4 gap-y-1 text-sm text-gray-600">
                            <span class="flex items-center">
                                📅 {{ $booking->booking_date->format('d M Y') }}
                            </span>
                            <span class="flex items-center">
                                🕒 {{ substr($booking->start_time, 0, 5) }} - {{ substr($booking->end_time, 0, 5) }} ({{ $booking->duration }} Jam)
                            </span>
                        </div>
                    </div>

                    {{-- Harga dan Status --}}
                    <div class="flex flex-row md:flex-col justify-between md:items-end gap-2 border-t md:border-t-0 pt-3 md:pt-0">
                        <div class="text-lg font-bold text-blue-600">
                            Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                        </div>
                        
                        <div>
                            @if($booking->status === 'pending')
                                <span class="px-2.5 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full uppercase tracking-wider">
                                    Pending
                                </span>
                            @elseif($booking->status === 'paid')
                                <span class="px-2.5 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full uppercase tracking-wider">
                                    Paid
                                </span>
                            <@elseif($booking->status === 'completed')
                                <span class="px-2.5 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full uppercase tracking-wider">
                                    Completed
                                </span>
                            @else
                                <span class="px-2.5 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full uppercase tracking-wider">
                                    {{ $booking->status }}
                                </span>
                            @endif
                        </div>
                    </div>

                </div>
            @empty
                <div class="bg-white text-center py-12 rounded-lg border border-gray-100 shadow-sm">
                    <p class="text-gray-500 text-lg font-medium">
                        Kamu belum memiliki riwayat booking lapangan.
                    </p>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="mt-6">
            {{ $bookings->links() }}
        </div>

    </div>
</x-app-layout>