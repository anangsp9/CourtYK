<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4">
        
        {{-- STEP 5: Tambahkan Flash Message Sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-200 text-green-800 p-4 rounded-lg mb-6 shadow-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        {{-- STEP 3: Tambahkan Flash Message Error --}}
        @if(session('error'))
            <div class="bg-red-100 border border-red-200 text-red-800 p-4 rounded-lg mb-6 shadow-sm font-medium">
                {{ session('error') }}
            </div>
        @endif
        
        <h1 class="text-3xl font-bold text-gray-900 mb-6">
            Riwayat Booking Saya
        </h1>

        <div class="space-y-4">
            @forelse($bookings as $booking)
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col gap-4">
                    
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
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
                                @elseif($booking->status === 'completed')
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

                    {{-- STEP 4 — Sembunyikan Form Upload jika Payment sudah ada --}}
                    @if($booking->status === 'pending')
                        <div class="mt-2 pt-4 border-t border-gray-100">
                            @if(!$booking->payment)
                                <form
                                    action="{{ route('payments.store', $booking) }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                    class="flex flex-col sm:flex-row items-start sm:items-center gap-3"
                                >
                                    @csrf
                                    <div class="w-full sm:w-auto">
                                        <input
                                            type="file"
                                            name="proof_image"
                                            required
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                        >
                                    </div>
                                    <button 
                                        type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded-md shadow-sm transition"
                                    >
                                        Upload Bukti
                                    </button>
                                </form>
                            @else
                                <p class="text-sm font-medium text-yellow-600 flex items-center gap-1.5">
                                    <span>⏳</span> Bukti pembayaran sudah diupload. Menunggu verifikasi admin.
                                </p>
                            @endif
                        </div>
                    @endif

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