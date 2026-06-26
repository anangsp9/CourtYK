<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <title>Daftar Venue - CourtYK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Daftar Venue</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($venues as $venue)
                {{-- Menambahkan overflow-hidden agar gambar yang rounded-t-lg tidak meluber keluar --}}
                <div
                    class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden">

                    {{-- Gambar Venue --}}
                    @if ($venue->image)
                        <img src="{{ asset('storage/' . $venue->image) }}" alt="{{ $venue->name }}"
                            class="w-full h-52 object-fill rounded-t-lg">
                    @else
                        <div
                            class="w-full h-52 bg-gray-200 rounded-t-lg flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    {{-- Konten Card --}}
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">
                            {{ $venue->name }}
                        </h2>

                        <p class="text-gray-600 mb-4">
                            📍 {{ $venue->address }}
                        </p>

                        <div
                            class="flex justify-between items-center text-sm text-gray-500 mb-4 bg-gray-50 p-2 rounded">
                            <span>
                                🏸 <strong>Court:</strong> {{ $venue->courts_count }} Lapangan
                            </span>
                            <span>
                                🕒 {{ \Carbon\Carbon::parse($venue->open_time)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($venue->close_time)->format('H:i') }}
                            </span>
                        </div>

                        <a href="{{ route('venues.show', $venue) }}"
                            class="inline-block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition-colors">
                            Lihat Detail & Booking
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-lg border">
                    <p class="text-gray-500 text-lg">Belum ada venue yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $venues->links() }}
        </div>
    </div>

</body>

</html>
