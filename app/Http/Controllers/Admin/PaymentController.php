<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with([
            'booking.user',
            'booking.court.venue',
        ])
            ->latest()
            ->paginate(10);

        return view(
            'admin.payments.index',
            compact('payments')
        );
    }

    public function approve(Payment $payment)
    {
        $payment->update([
            'status' => 'approved',
            'approved_at' => Carbon::now(),
        ]);

        $payment->booking->update([
            'status' => 'paid',
        ]);

        return back()
            ->with(
                'success',
                'Payment berhasil diapprove.'
            );
    }

    public function reject(Payment $payment)
    {
        $payment->update([
            'status' => 'rejected',
        ]);

        return back()
            ->with(
                'success',
                'Payment ditolak.'
            );
    }
}
