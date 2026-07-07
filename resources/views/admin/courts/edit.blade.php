@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto py-8 px-4">

    <h1 class="text-3xl font-bold mb-8">
        Edit Court
    </h1>

    <div class="bg-white rounded-lg border p-6 shadow-sm">

        <form
            action="{{ route('admin.courts.update', $court) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            @include('admin.courts._form')

            <div class="flex gap-4">

                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                >
                    Perbarui Court
                </button>

                <a
                    href="{{ route('admin.courts.index') }}"
                    class="text-gray-600"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection