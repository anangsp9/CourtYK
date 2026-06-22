<!DOCTYPE html>
<html>
<head>
    <title>Edit Venue</title>
</head>
<body>

    <h1>Edit Venue: {{ $venue->name }}</h1>

    <form action="{{ route('admin.venues.update', $venue) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama Venue</label>
            <br>
            <input type="text" name="name" value="{{ old('name', $venue->name) }}">
        </div>

        <br>

        <div>
            <label>Alamat</label>
            <br>
            <input type="text" name="address" value="{{ old('address', $venue->address) }}">
        </div>

        <br>

        <div>
            <label>Deskripsi</label>
            <br>
            <textarea name="description">{{ old('description', $venue->description) }}</textarea>
        </div>

        <br>

        <div>
            <label>Jam Buka</label>
            <br>
            <input type="time" name="open_time" value="{{ old('open_time', \Carbon\Carbon::parse($venue->open_time)->format('H:i')) }}">
        </div>

        <br>

        <div>
            <label>Jam Tutup</label>
            <br>
            <input type="time" name="close_time" value="{{ old('close_time', \Carbon\Carbon::parse($venue->close_time)->format('H:i')) }}">
        </div>

        <br>

        <button type="submit">
            Perbarui Venue
        </button>

    </form>

</body>
</html>