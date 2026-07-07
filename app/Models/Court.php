<?php

namespace App\Models;

use App\Models\Venue;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $casts = [
        'price_per_hour' => 'integer',
    ];

    protected $fillable = [
        'venue_id',
        'name',
        'floor_type',
        'court_type',
        'price_per_hour',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
