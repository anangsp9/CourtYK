<!DOCTYPE html>
<html>
<head>
    <title>Tambah Venue</title>
</head>
<body>

    <h1>Tambah Venue</h1>

    <form action="{{ route('admin.venues.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama Venue</label>
            <br>
            <input type="text" name="name">
        </div>

        <br>

        <div>
            <label>Alamat</label>
            <br>
            <input type="text" name="address">
        </div>

        <br>

        <div>
            <label>Deskripsi</label>
            <br>
            <textarea name="description"></textarea>
        </div>

        <br>

        <div>
            <label>Jam Buka</label>
            <br>
            <input type="time" name="open_time">
        </div>

        <br>

        <div>
            <label>Jam Tutup</label>
            <br>
            <input type="time" name="close_time">
        </div>

        <br>

        <button type="submit">
            Simpan
        </button>

    </form>

</body>
</html>