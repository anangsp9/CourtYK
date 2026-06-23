<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class ReportController extends Controller
{
    public function index()
    {
        $todayRevenue = Booking::query()
            ->where('status', 'completed')
            ->whereDate('booking_date', today())
            ->sum('total_price');

        $weeklyRevenue = Booking::query()
            ->where('status', 'completed')
            ->whereBetween('booking_date', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ])
            ->sum('total_price');

        $monthlyRevenue = Booking::query()
            ->where('status', 'completed')
            ->whereMonth(
                'booking_date',
                now()->month
            )
            ->whereYear(
                'booking_date',
                now()->year
            )
            ->sum('total_price');

        // --- IMPLEMENTASI PHASE 11.4: Penelusuran Detail Booking Selesai ---
        $completedBookings = Booking::query()
            ->with([
                'user',
                'court.venue',
            ])
            ->where('status', 'completed')
            ->latest()
            ->paginate(10);

        return view(
            'admin.reports.index',
            compact(
                'todayRevenue',
                'weeklyRevenue',
                'monthlyRevenue',
                'completedBookings' // <-- Ditambahkan ke compact
            )
        );
    }
}