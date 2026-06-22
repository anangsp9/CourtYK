<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VenueController as AdminVenueController;
use App\Http\Controllers\Admin\CourtController;
use App\Http\Controllers\VenueController; // Controller publik
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
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
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', function () {
        return 'Admin Panel CourtYK';
    });

    Route::resource('admin/venues', AdminVenueController::class)
        ->names('admin.venues');
    Route::resource('admin/courts', CourtController::class)
        ->names('admin.courts');
});

require __DIR__ . '/auth.php';
