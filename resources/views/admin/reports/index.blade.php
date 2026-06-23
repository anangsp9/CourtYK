<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-8">
            Revenue Report
        </h1>

        {{-- Grid Laporan Pendapatan --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Hari Ini --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 transition hover:shadow-md border-t-4 border-t-emerald-500">
                <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Hari Ini
                </h2>
                <p class="text-2xl font-bold text-gray-900">
                    Rp {{ number_format($todayRevenue, 0, ',', '.') }}
                </p>
            </div>

            {{-- Minggu Ini --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 transition hover:shadow-md border-t-4 border-t-teal-500">
                <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Minggu Ini
                </h2>
                <p class="text-2xl font-bold text-gray-900">
                    Rp {{ number_format($weeklyRevenue, 0, ',', '.') }}
                </p>
            </div>

            {{-- Bulan Ini --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 transition hover:shadow-md border-t-4 border-t-cyan-500">
                <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Bulan Ini
                </h2>
                <p class="text-2xl font-bold text-gray-900">
                    Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}
                </p>
            </div>

        </div>

        {{-- TABEL PENELUSURAN REVENUE (Phase 11.4) --}}
        <div class="mt-12">
            <div class="mb-4">
                <h2 class="text-xl font-bold text-gray-900">
                    Penelusuran Transaksi Selesai
                </h2>
                <p class="text-sm text-gray-500">
                    Daftar detail booking sukses yang membentuk total pendapatan di atas.
                </p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-4">Pelanggan</th>
                                <th class="px-6 py-4">Venue</th>
                                <th class="px-6 py-4">Lapangan</th>
                                <th class="px-6 py-4">Tanggal Main</th>
                                <th class="px-6 py-4 text-right">Nominal</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
                            @forelse($completedBookings as $booking)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $booking->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $booking->court->venue->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $booking->court->name }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">
                                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right font-semibold text-emerald-600">
                                        Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                        Belum ada data transaksi dengan status selesai.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    {{ $completedBookings->links() }}
                </div>
            </div>
        </div>

    </div>
</x-app-layout>