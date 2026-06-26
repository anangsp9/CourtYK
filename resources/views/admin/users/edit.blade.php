@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Edit User
</h1>

<form
    action="{{ route('admin.users.update', $user) }}"
    method="POST"
    class="space-y-5"
>

    @csrf
    @method('PUT')

    <div>

        <label class="block mb-1">
            Nama
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            class="border rounded w-full p-2"
        >

        @error('name')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
        @enderror

    </div>

    <div>

        <label class="block mb-1">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            class="border rounded w-full p-2"
        >

        @error('email')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
        @enderror

    </div>

    <div>

        <label class="block mb-1">
            Role
        </label>

        <select
            name="role"
            class="border rounded w-full p-2"
        >

            <option
                value="user"
                @selected(old('role', $user->role) == 'user')
            >
                User
            </option>

            <option
                value="admin"
                @selected(old('role', $user->role) == 'admin')
            >
                Admin
            </option>

        </select>

        @error('role')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
        @enderror

    </div>

    <button
        class="bg-blue-600 text-white px-5 py-2 rounded"
    >
        Update User
    </button>

</form>

@endsection