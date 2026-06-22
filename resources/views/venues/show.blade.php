<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4">

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-900">
                {{ $venue->name }}
            </h1>

            <p class="mt-2 text-gray-600 flex items-center">
                📍 {{ $venue->address }}
            </p>

            @if($venue->description)
                <p class="mt-4 text-gray-700 bg-gray-50 p-4 rounded-lg italic">
                    "{{ $venue->description }}"
                </p>
            @endif
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                Daftar Court Tersedia
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($venue->courts as $court)
                    <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                🏸 {{ $court->name }}
                            </h3>
                            <p class="text-blue-600 font-medium mt-1">
                                Rp {{ number_format($court->price_per_hour, 0, ',', '.') }} <span class="text-gray-500 text-sm">/ jam</span>
                            </p>
                        </div>
                        
                        <a
                            href="{{ route('bookings.create', $court) }}"
                            class="inline-block mt-3 px-4 py-2 bg-blue-600 text-white rounded font-medium text-sm hover:bg-blue-700 transition-colors"
                        >
                            Booking Sekarang
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 bg-white rounded-lg border text-gray-500">
                        Belum ada lapangan yang terdaftar di venue ini.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</x-app-layout>