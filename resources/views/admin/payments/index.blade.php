@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-6">
            Payment Management
        </h1>

        <div class="space-y-4">
            @forelse($payments as $payment)
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col md:flex-row gap-6 justify-between items-start transition hover:border-gray-300">
                    
                    {{-- Detail Informasi --}}
                    <div class="space-y-2 flex-1">
                        <p class="text-sm text-gray-500 font-semibold uppercase tracking-wider">
                            Booking ID: #{{ $payment->booking_id }}
                        </p>
                        <p class="text-gray-700">
                            <strong class="text-gray-950">User:</strong> {{ $payment->booking->user->name }}
                        </p>
                        <p class="text-gray-700">
                            <strong class="text-gray-950">Venue:</strong> {{ $payment->booking->court->venue->name }}
                        </p>
                        <p class="text-gray-700">
                            <strong class="text-gray-950">Court:</strong> {{ $payment->booking->court->name }}
                        </p>
                        <p class="text-gray-700 flex items-center gap-1.5">
                            <strong class="text-gray-950">Status:</strong> 
                            <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full uppercase tracking-wider
                                {{ $payment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                   ($payment->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                {{ $payment->status }}
                            </span>
                        </p>

                        {{-- Tombol Approve & Reject (Hanya muncul jika status pending) --}}
                        @if($payment->status === 'pending')
                            <div class="mt-4 flex gap-2">
                                <form action="{{ route('admin.payments.approve', $payment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold text-sm rounded-lg shadow-sm transition">
                                        Approve
                                    </button>
                                </form>

                                <form action="{{ route('admin.payments.reject', $payment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold text-sm rounded-lg shadow-sm transition">
                                        Reject
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    {{-- Gambar Bukti Transfer --}}
                    <div class="w-full md:w-auto">
                        <p class="text-sm font-medium text-gray-900 mb-2">Bukti Pembayaran:</p>
                        <a href="{{ asset('storage/' . $payment->proof_image) }}" target="_blank" class="block group relative overflow-hidden rounded-lg border border-gray-200 max-w-xs shadow-sm">
                            <img
                                src="{{ asset('storage/' . $payment->proof_image) }}"
                                class="w-64 h-auto object-cover transition duration-500 group-hover:scale-110"
                                alt="Proof of Payment"
                            >
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-medium">
                                Klik untuk Memperbesar 🔍
                            </div>
                        </a>
                    </div>

                </div>
            @empty
                <div class="bg-white p-8 border border-gray-200 rounded-xl text-center text-gray-500">
                    Tidak ada pembayaran yang perlu diproses.
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="mt-8">
            {{ $payments->links() }}
        </div>

    </div>
@endsection