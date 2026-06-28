<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VenueController extends Controller
{
    public function index(Request $request)
    {
        // Validasi query parameter untuk keamanan
        $request->validate([
            'search' => ['nullable', 'string', 'max:255'],
            'facilities' => ['nullable', 'array'],
            'facilities.*' => [
                Rule::in(array_keys(config('facilities'))),
            ],
        ]);

        $query = Venue::withCount('courts');

        if ($request->filled('search')) {
            $keyword = trim($request->search);

            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%")
                    ->orWhere('address', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('facilities')) {

            foreach ($request->facilities as $facility) {

                $query->whereJsonContains(
                    'featured_facilities',
                    $facility
                );
            }
        }

        $venues = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('venues.index', compact('venues'));
    }

    public function show(Venue $venue)
    {
        $venue->load('courts');

        return view('venues.show', compact('venue'));
    }
}
