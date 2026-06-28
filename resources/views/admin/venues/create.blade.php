<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Venue | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap">
</head>

<body class="bg-gray-50 text-gray-800 font-sans min-h-screen p-6">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-200 mt-10">

        <div class="mb-6 border-b border-gray-200 pb-4">
            <h1 class="text-2xl font-bold text-gray-900">Tambah Venue</h1>
            <p class="text-sm text-gray-500 mt-1">Lengkapi formulir di bawah ini untuk menambahkan data aset fasilitas
                olahraga baru.</p>
        </div>

        <form action="{{ route('admin.venues.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Nama Venue -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Venue</label>
                <input type="text" name="name" required
                    class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="Contoh: Skyline Padel Arena" />
            </div>

            <!-- Alamat Lapangan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lapangan</label>
                <input type="text" name="address" required
                    class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="Jalan, kota, atau wilayah lokasi lapangan" />
            </div>

            <!-- Gambar Venue -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar Venue</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg p-2 text-sm bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" />
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"
                    placeholder="Tuliskan detail keunggulan atau fasilitas yang tersedia..."></textarea>
            </div>

            <!-- Fasilitas Unggulan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Fasilitas Unggulan
                </label>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                    @foreach (config('facilities') as $key => $facility)
                        <label
                            class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition">

                            <input type="checkbox" name="featured_facilities[]" value="{{ $key }}"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                {{ in_array($key, old('featured_facilities', [])) ? 'checked' : '' }}>

                            <span class="material-symbols-outlined text-gray-600">
                                {{ $facility['icon'] }}
                            </span>

                            <span class="text-sm text-gray-700">
                                {{ $facility['label'] }}
                            </span>

                        </label>
                    @endforeach

                </div>

                @error('featured_facilities')
                    <p class="text-sm text-red-500 mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Jam Operasional -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jam Buka</label>
                    <input type="time" name="open_time" required
                        class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jam Tutup</label>
                    <input type="time" name="close_time" required
                        class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" />
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100 mt-6">
                <button type="button" onclick="window.history.back()"
                    class="px-5 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-6 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition">
                    Simpan Venue
                </button>
            </div>
        </form>

    </div>

</body>

</html>
