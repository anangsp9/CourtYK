<?php

namespace App\Http\Controllers;

use App\Models\Venue;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::withCount('courts')
            ->latest()
            ->paginate(12);

        return view('venues.index', compact('venues'));
    }

    public function show(Venue $venue)
    {
        $venue->load('courts');

        return view('venues.show', compact('venue'));
    }
}