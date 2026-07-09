<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap">

<x-app-layout>
    @php
        $facilities = config('facilities');
    @endphp

    <div class="max-w-5xl mx-auto py-8 px-4">

        {{-- Foto Venue --}}
        @if ($venue->image)
            <img src="{{ asset('storage/' . $venue->image) }}" alt="{{ $venue->name }}"
                class="w-full h-80 object-fit rounded-lg mb-6 shadow-sm">
        @else
            <div class="w-full h-80 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500 mb-6">
                No Image
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            {{-- Nama Venue --}}
            <h1 class="text-3xl font-bold text-gray-900">
                {{ $venue->name }}
            </h1>

            {{-- Alamat --}}
            <p class="mt-2 text-gray-600 flex items-center">
                📍 {{ $venue->address }}
            </p>

            {{-- Deskripsi --}}
            @if ($venue->description)
                <p class="mt-4 text-gray-700 bg-gray-50 p-4 rounded-lg italic">
                    "{{ $venue->description }}"
                </p>
            @endif

            {{-- Jam Operasional --}}
            <p class="mt-4 font-medium text-gray-800">
                🕒 Jam Operasional:
                {{ \Carbon\Carbon::parse($venue->open_time)->format('H:i') }}
                -
                {{ \Carbon\Carbon::parse($venue->close_time)->format('H:i') }}
            </p>
        </div>

        {{-- Fasilitas --}}
        @if (filled($venue->featured_facilities))

            <div class="mt-8 bg-white p-6 rounded-lg shadow-sm border border-gray-100">

                <h2 class="text-2xl font-semibold text-gray-900 mb-6">
                    Fasilitas Unggulan
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                    @foreach ($venue->featured_facilities as $key)
                        @php
                            $facility = $facilities[$key] ?? null;
                        @endphp

                        @if ($facility)
                            <div
                                class="rounded-xl border border-gray-200 bg-white p-5 flex flex-col items-center text-center hover:border-blue-500 hover:shadow-md transition-all duration-200">

                                <span class="material-symbols-outlined text-4xl text-blue-600">
                                    {{ $facility['icon'] }}
                                </span>

                                <span class="mt-3 text-sm font-medium text-gray-700">
                                    {{ $facility['label'] }}
                                </span>

                            </div>
                        @endif
                    @endforeach

                </div>

            </div>

        @endif

        {{-- Daftar Court --}}
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                Daftar Court Tersedia
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($venue->courts as $court)
                    <div
                        class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                🏸 {{ $court->name }}
                            </h3>

                            @php
                                $floor = config('courts.floor_types.' . $court->floor_type);
                                $type = config('courts.court_types.' . $court->court_type);
                            @endphp

                            @if ($floor || $type)
                                <p class="mt-1 text-sm text-gray-500">
                                    @if ($floor)
                                        {{ $floor['label'] }}
                                    @endif

                                    @if ($floor && $type)
                                        &bull;
                                    @endif

                                    @if ($type)
                                        {{ $type['label'] }}
                                    @endif
                                </p>
                            @endif

                            <p class="text-blue-600 font-medium mt-1">
                                Rp {{ number_format($court->price_per_hour, 0, ',', '.') }} <span
                                    class="text-gray-500 text-sm">/ jam</span>
                            </p>
                        </div>

                        <a href="{{ route('bookings.create', $court) }}"
                            class="inline-block mt-3 px-4 py-2 bg-blue-600 text-white rounded font-medium text-sm hover:bg-blue-700 transition-colors">
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