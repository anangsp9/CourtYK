@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-6">
        User Management
    </h1>

    <form method="GET" class="flex gap-3 mb-6">

        <input type="text" name="search" placeholder="Cari nama atau email..." value="{{ request('search') }}"
            class="border rounded p-2 w-80">

        <button class="bg-blue-600 text-white px-4 rounded">
            Cari
        </button>

        <select name="role" class="border rounded p-2" onchange="this.form.submit()">

            <option value="">
                Semua Role
            </option>

            <option value="admin" @selected(request('role') == 'admin')>
                Admin
            </option>

            <option value="user" @selected(request('role') == 'user')>
                User
            </option>

        </select>

        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">
            Reset
        </a>

    </form>

    <table class="w-full border">

        <thead>

            <tr>

                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Bergabung</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($users as $user)
                <tr>

                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        @if ($user->role === 'admin')
                            <span class="px-2 py-1 text-xs rounded bg-purple-100 text-purple-700">
                                Admin
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-700">
                                User
                            </span>
                        @endif
                    </td>

                    <td>

                        {{ $user->created_at->format('d M Y') }}

                    </td>

                    <td class="space-x-3">

                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 hover:underline">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    {{ $users->links() }}
@endsection
