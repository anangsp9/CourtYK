@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-8">
            Dashboard Admin
        </h1>

        {{-- 1. GRID UTAMA (Summary Card yang sudah ada sebelumnya) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Total Venue --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 transition hover:shadow-md">
                <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Total Venue
                </h2>
                <p class="text-3xl font-bold text-gray-900">
                    {{ $totalVenues }}
                </p>
            </div>

            {{-- Total Court --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 transition hover:shadow-md">
                <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Total Court
                </h2>
                <p class="text-3xl font-bold text-gray-900">
                    {{ $totalCourts }}
                </p>
            </div>

            {{-- Total Booking --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 transition hover:shadow-md">
                <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Total Booking
                </h2>
                <p class="text-3xl font-bold text-gray-900">
                    {{ $totalBookings }}
                </p>
            </div>

            {{-- Total Revenue --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 transition hover:shadow-md">
                <h2 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Total Revenue
                </h2>
                <p class="text-3xl font-bold text-green-600">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </p>
            </div>

        </div>


        {{-- 2. GRID STATISTIK STATUS BOOKING --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

            {{-- Pending --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 border-l-4 border-l-yellow-500">
                <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                    Pending
                </span>
                <div class="text-2xl font-bold text-gray-900 mt-1">
                    {{ $pendingBookings }}
                </div>
            </div>

            {{-- Paid --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 border-l-4 border-l-blue-500">
                <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                    Paid
                </span>
                <div class="text-2xl font-bold text-gray-900 mt-1">
                    {{ $paidBookings }}
                </div>
            </div>

            {{-- Completed --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 border-l-4 border-l-green-500">
                <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                    Completed
                </span>
                <div class="text-2xl font-bold text-gray-900 mt-1">
                    {{ $completedBookings }}
                </div>
            </div>

            {{-- Cancelled --}}
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 border-l-4 border-l-red-500">
                <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                    Cancelled
                </span>
                <div class="text-2xl font-bold text-gray-900 mt-1">
                    {{ $cancelledBookings }}
                </div>
            </div>

        </div>


        {{-- 3. IMPLEMENTASI PHASE 10.3 — RECENT BOOKINGS --}}
        <div class="mt-10">
            <h2 class="text-xl font-bold text-gray-900 mb-4">
                Recent Bookings
            </h2>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-4">User</th>
                                <th class="px-6 py-4">Venue</th>
                                <th class="px-6 py-4">Court</th>
                                <th class="px-6 py-4">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
                            @foreach($recentBookings as $booking)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $booking->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $booking->court->venue->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $booking->court->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full uppercase tracking-wider
                                            {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                               ($booking->status === 'paid' ? 'bg-blue-100 text-blue-800' : 
                                               ($booking->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')) }}">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- 4. IMPLEMENTASI PHASE 11.2 — COURT TERLARIS --}}
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                Court Terlaris
            </h2>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-4">Court</th>
                                <th class="px-6 py-4">Total Booking</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
                            @foreach($topCourts as $court)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $court->name }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-emerald-600">
                                        {{ $court->bookings_count }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- 5. IMPLEMENTASI PHASE 11.3 — VENUE TERLARIS --}}
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                Venue Terlaris
            </h2>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-4">Venue</th>
                                <th class="px-6 py-4">Total Booking</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
                            @foreach($topVenues as $venue)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $venue->name }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-blue-600">
                                        {{ $venue->bookings_count }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection