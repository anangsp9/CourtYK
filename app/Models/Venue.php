<?php

namespace App\Models;

use App\Models\Court;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'open_time',
        'close_time',
        'image',
    ];

    public function courts()
    {
        return $this->hasMany(Court::class);
    }
}