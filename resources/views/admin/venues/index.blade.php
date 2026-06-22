<!DOCTYPE html>
<html>
<head>
    <title>Venue Management</title>
</head>
<body>

    <h1>Venue Management</h1>

    <a href="{{ route('admin.venues.create') }}">
        Tambah Venue
    </a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Venue</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($venues as $venue)
                <tr>
                    <td>{{ $venue->id }}</td>
                    <td>{{ $venue->name }}</td>
                    <td>{{ $venue->address }}</td>
                    <td>
                        <a href="{{ route('admin.venues.edit', $venue) }}">
                            Edit
                        </a>
                        
                        | 

                        <form action="{{ route('admin.venues.destroy', $venue) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus venue ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        Belum ada venue
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>