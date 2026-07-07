<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Booking; // Pastikan ini di-import agar tidak error Undefined Class
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingRequest;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'court.venue',
            'payment'
        ])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view(
            'bookings.index',
            compact('bookings')
        );
    }

    public function create(Court $court, Request $request)
    {
        // 1. Ambil tanggal dari query string (?date=...), jika kosong default ke hari ini
        $date = $request->query('date', now()->format('Y-m-d'));

        // 2. Step 4 — Ambil data booking yang sudah ada di tanggal dan lapangan ini
        $bookings = Booking::query()
            ->where('court_id', $court->id)
            ->where('booking_date', $date)
            ->whereIn('status', [
                'pending',
                'paid',
                'completed',
            ])
            ->get();

        $bookedSlots = [];
        foreach ($bookings as $booking) {

            $start = \Carbon\Carbon::createFromTimeString(
                $booking->start_time
            );

            $end = \Carbon\Carbon::createFromTimeString(
                $booking->end_time
            );

            while ($start < $end) {

                $bookedSlots[] = $start->format('H:i');

                $start->addHour();
            }
        }

        // 3. Eager load relasi venue
        $court->load('venue');

        // 4. Proses generate semua slot jam operasional venue
        $slots = [];

        $start = Carbon::createFromTimeString(
            $court->venue->open_time
        );

        $end = Carbon::createFromTimeString(
            $court->venue->close_time
        );

        while ($start < $end) {
            $slots[] = $start->format('H:i');
            $start->addHour();
        }

        // 5. Kirim semua variabel ke view bookings.create
        return view(
            'bookings.create',
            compact('court', 'slots', 'date', 'bookedSlots')
        );
    }

    public function store(StoreBookingRequest $request, Court $court)
    {
        $data = $request->validated();

        $startTime = Carbon::createFromTimeString(
            $data['start_time']
        );

        // Tambahkan (int) di depan data duration agar dikonversi menjadi angka bulat
        $endTime = $startTime
            ->copy()
            ->addHours((int) $data['duration']);

        $hasConflict = \App\Models\Booking::query()
            ->where('court_id', $court->id)
            ->where('booking_date', $data['booking_date'])
            ->whereIn('status', [
                'pending',
                'paid',
                'completed',
            ])
            ->where(function ($query) use ($startTime, $endTime) {

                $query
                    ->where(
                        'start_time',
                        '<',
                        $endTime->format('H:i:s')
                    )
                    ->where(
                        'end_time',
                        '>',
                        $startTime->format('H:i:s')
                    );
            })
            ->exists();

        if ($hasConflict) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Slot waktu sudah dibooking.'
                );
        }

        Booking::create([
            'user_id' => Auth::id(),
            'court_id' => $court->id,

            'booking_date' => $data['booking_date'],

            'start_time' => $startTime->format('H:i:s'),

            'end_time' => $endTime->format('H:i:s'),

            'duration' => $data['duration'],

            'total_price' =>
            $court->price_per_hour
                * $data['duration'],

            'status' => 'pending',
        ]);

        return redirect()
            ->route('bookings.index')
            ->with(
                'success',
                'Booking berhasil dibuat.'
            );
    }
}
