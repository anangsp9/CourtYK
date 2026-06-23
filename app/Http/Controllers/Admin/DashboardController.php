<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\Court;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Statistik Utama
        $totalVenues = Venue::count();
        $totalCourts = Court::count();
        $totalBookings = Booking::count();
        $totalRevenue = Booking::whereIn('status', [
            'paid',
            'completed',
        ])->sum('total_price');

        // 2. Statistik Status Booking (Phase 10.2)
        $pendingBookings = Booking::where(
            'status',
            'pending'
        )->count();

        $paidBookings = Booking::where(
            'status',
            'paid'
        )->count();

        $completedBookings = Booking::where(
            'status',
            'completed'
        )->count();

        $cancelledBookings = Booking::where(
            'status',
            'cancelled'
        )->count();

        // 3. Recent Bookings (Phase 10.3)
        $recentBookings = Booking::with([
            'user',
            'court.venue'
        ])
        ->latest()
        ->take(5)
        ->get();

        // 4. Court Terlaris (Phase 11.2)
        $topCourts = Court::query()
            ->withCount('bookings')
            ->orderByDesc('bookings_count')
            ->take(5)
            ->get();

        // --- IMPLEMENTASI PHASE 11.3: Venue Terlaris ---
        $topVenues = Venue::query()
            ->withCount([
                'courts as bookings_count' => function ($query) {
                    $query->join(
                        'bookings',
                        'courts.id',
                        '=',
                        'bookings.court_id'
                    );
                }
            ])
            ->orderByDesc('bookings_count')
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalVenues',
                'totalCourts',
                'totalBookings',
                'totalRevenue',
                'pendingBookings',
                'paidBookings',
                'completedBookings',
                'cancelledBookings',
                'recentBookings',
                'topCourts',
                'topVenues' // <-- Sukses Ditambahkan ke compact
            )
        );
    }
}