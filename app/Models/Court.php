<?php

namespace App\Models;

use App\Models\Venue;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = [
        'venue_id',
        'name',
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