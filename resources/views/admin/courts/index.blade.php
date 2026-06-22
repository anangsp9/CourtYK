<!DOCTYPE html>
<html>
<head>
    <title>Court Management</title>
</head>
<body>

    <h1>Court Management</h1>

    <a href="{{ route('admin.courts.create') }}">
        Tambah Court
    </a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Venue</th>
                <th>Nama Court</th>
                <th>Harga/Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($courts as $court)
                <tr>
                    <td>{{ $court->id }}</td>
                    <td>{{ $court->venue->name }}</td>
                    <td>{{ $court->name }}</td>
                    <td>Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.courts.edit', $court) }}">
                            Edit
                        </a>
                        
                        | 

                        <form action="{{ route('admin.courts.destroy', $court) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus court ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        Belum ada data court.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>