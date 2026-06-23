<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'user',
            'court.venue',
            'payment',
        ])
            ->latest()
            ->paginate(10);

        return view(
            'admin.bookings.index',
            compact('bookings')
        );
    }

    public function complete(Booking $booking)
    {
        $booking->update([
            'status' => 'completed',
        ]);

        return back()
            ->with(
                'success',
                'Booking selesai.'
            );
    }

    public function cancel(Booking $booking)
    {
        $booking->update([
            'status' => 'cancelled',
        ]);

        return back()
            ->with(
                'success',
                'Booking dibatalkan.'
            );
    }
}
