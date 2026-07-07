<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4">

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">
                Booking {{ $court->name }}

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
            </h1>

            <p class="text-lg text-gray-700">
                Harga: <span class="text-blue-600 font-semibold">Rp
                    {{ number_format($court->price_per_hour, 0, ',', '.') }}</span> / jam
            </p>
        </div>

        {{-- TEMPAT FLASH MESSAGE --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-200 text-green-800 p-3 rounded mb-6 font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-200 text-red-800 p-3 rounded mb-6 font-medium">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 space-y-6">

            {{-- 1. FORM GET: Untuk Filter & Cek Tanggal --}}
            <form method="GET" id="date-form">
                <div class="mt-2">
                    <label class="block mb-2 font-medium text-gray-700">
                        Pilih Tanggal Booking
                    </label>

                    <input type="date" name="date" value="{{ $date }}" min="{{ now()->format('Y-m-d') }}"
                        onchange="this.form.submit()"
                        class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm px-3 py-2">
                </div>
            </form>

            {{-- INDIKATOR VISUAL: Grid Slot Jam Operasional --}}
            <div>
                <h2 class="text-xl font-semibold mb-4 text-gray-800">
                    Status Slot Jam (Tanggal: {{ \Carbon\Carbon::parse($date)->format('d M Y') }})
                </h2>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @foreach ($slots as $slot)
                        @if (in_array($slot, $bookedSlots))
                            <div
                                class="bg-red-100 border border-red-200 p-3 rounded-lg text-center font-medium text-red-700 opacity-60 cursor-not-allowed">
                                {{ $slot }}
                                <br>
                                <span class="text-xs font-bold uppercase tracking-wider">Booked</span>
                            </div>
                        @else
                            <div
                                class="bg-green-100 border border-green-200 p-3 rounded-lg text-center font-medium text-green-700">
                                {{ $slot }}
                                <br>
                                <span class="text-xs font-bold uppercase tracking-wider">Available</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <hr class="border-gray-100">

            {{-- 2. FORM POST: Proses Kirim Data Booking Ke Controller --}}
            <form action="{{ route('bookings.store', $court) }}" method="POST" class="space-y-4">
                @csrf

                {{-- Lempar data tanggal yang sedang dipilih secara hidden --}}
                <input type="hidden" name="booking_date" value="{{ $date }}">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Input Pilih Jam Mulai --}}
                    <div>
                        <label class="block mb-2 font-medium text-gray-700">Jam Mulai</label>
                        <select name="start_time"
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm px-3 py-2">
                            <option value="">-- Pilih Jam Mulai --</option>
                            @foreach ($slots as $slot)
                                {{-- Hanya memunculkan jam yang belum di-book --}}
                                @if (!in_array($slot, $bookedSlots))
                                    <option value="{{ $slot }}">{{ $slot }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Input Pilih Durasi --}}
                    <div>
                        <label class="block mb-2 font-medium text-gray-700">Durasi Main</label>
                        <select name="duration"
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm px-3 py-2">
                            <option value="1">1 Jam</option>
                            <option value="2">2 Jam</option>
                            <option value="3">3 Jam</option>
                            <option value="4">4 Jam</option>
                        </select>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm transition-colors duration-150">
                        Konfirmasi Booking
                    </button>
                </div>
            </form>

        </div>

    </div>
</x-app-layout>
