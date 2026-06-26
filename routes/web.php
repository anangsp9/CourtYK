<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VenueController as AdminVenueController;
use App\Http\Controllers\Admin\CourtController;
use App\Http\Controllers\VenueController; // Controller publik
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController; // <-- FIX: Ditambahkan alias agar tidak bentrok
use App\Http\Controllers\Admin\BookingController as AdminBookingController; // <-- STEP 2: Tambah Import Admin BookingController dengan Alias
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;

Route::get('/', function () {
    return view('landing');
});

// --- ROUTE PUBLIK UNTUK USER SIDE ---
Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');
Route::get('/venues/{venue}', [VenueController::class, 'show'])->name('venues.show');
// ------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Halaman form booking (GET)
    Route::get(
        '/courts/{court}/booking',
        [BookingController::class, 'create']
    )->name('bookings.create');

    // Tempat menaruh route baru: Proses simpan data booking (POST)
    Route::post(
        '/courts/{court}/booking',
        [BookingController::class, 'store']
    )->name('bookings.store');

    Route::get(
        '/my-bookings',
        [BookingController::class, 'index']
    )->name('bookings.index');

    // Route Store Payment di dalam Group Auth (Menggunakan PaymentController milik User)
    Route::post(
        '/bookings/{booking}/payment',
        [PaymentController::class, 'store']
    )->name('payments.store');

    Route::get('/venues/{venue}', [VenueController::class, 'show'])->name('venues.show');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get(
        '/admin',
        [DashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::resource('admin/venues', AdminVenueController::class)
        ->names('admin.venues');
    Route::resource('admin/courts', CourtController::class)
        ->names('admin.courts');

    // FIX: Menggunakan AdminPaymentController (milik Admin) agar mengarah ke controller yang benar
    Route::get(
        '/admin/payments',
        [AdminPaymentController::class, 'index']
    )->name('admin.payments.index');

    Route::patch(
        '/admin/payments/{payment}/approve',
        [AdminPaymentController::class, 'approve']
    )->name('admin.payments.approve');

    Route::patch(
        '/admin/payments/{payment}/reject',
        [AdminPaymentController::class, 'reject']
    )->name('admin.payments.reject');

    // STEP 2: Tambahkan rute management booking dalam group admin (Menggunakan AdminBookingController)
    Route::get(
        '/admin/bookings',
        [AdminBookingController::class, 'index']
    )->name('admin.bookings.index');

    Route::patch(
        '/admin/bookings/{booking}/complete',
        [AdminBookingController::class, 'complete']
    )->name('admin.bookings.complete');

    Route::patch(
        '/admin/bookings/{booking}/cancel',
        [AdminBookingController::class, 'cancel']
    )->name('admin.bookings.cancel');

    Route::get(
        '/admin/reports',
        [ReportController::class, 'index']
    )->name('admin.reports.index');
});

require __DIR__ . '/auth.php';
