<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;

class PaymentController extends Controller
{
    public function store(
        StorePaymentRequest $request,
        Booking $booking
    ) {
        if ($booking->payment) {

            return back()->with(
                'error',
                'Bukti pembayaran sudah pernah diupload.'
            );
        }

        $path = $request
            ->file('proof_image')
            ->store(
                'payments',
                'public'
            );

        Payment::create([
            'booking_id' => $booking->id,
            'proof_image' => $path,
            'status' => 'pending',
        ]);

        return back()->with(
            'success',
            'Bukti pembayaran berhasil diupload.'
        );
    }
}
