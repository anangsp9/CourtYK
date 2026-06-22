<!DOCTYPE html>
<html>
<head>
    <title>Tambah Court</title>
</head>
<body>

    <h1>Tambah Court</h1>

    <form action="{{ route('admin.courts.store') }}" method="POST">
        @csrf

        <div>
            <label>Pilih Venue</label>
            <br>
            <select name="venue_id">
                <option value="">-- Pilih Venue --</option>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" {{ old('venue_id') == $venue->id ? 'selected' : '' }}>
                        {{ $venue->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label>Nama Court (Lapangan)</label>
            <br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <br>

        <div>
            <label>Harga Per Jam</label>
            <br>
            <input type="number" name="price_per_hour" value="{{ old('price_per_hour') }}">
        </div>

        <br>

        <button type="submit">
            Simpan Court
        </button>

    </form>

</body>
</html>