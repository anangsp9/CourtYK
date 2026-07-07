<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Court;
use App\Models\Venue;
use App\Http\Requests\StoreCourtRequest;
use App\Http\Requests\UpdateCourtRequest;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courts = Court::with('venue')
            ->latest()
            ->paginate(10);

        return view('admin.courts.index', compact('courts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $venues = Venue::orderBy('name')->get();

        return view('admin.courts.create', compact('venues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourtRequest $request)
    {
        Court::create(
            $request->validated()
        );

        return redirect()
            ->route('admin.courts.index')
            ->with('success', 'Court berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Court $court)
    {
        $venues = Venue::orderBy('name')->get();

        return view(
            'admin.courts.edit',
            compact('court', 'venues')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateCourtRequest $request,
        Court $court
    ) {
        $court->update(
            $request->validated()
        );

        return redirect()
            ->route('admin.courts.index')
            ->with(
                'success',
                'Court berhasil diperbarui.'
            );
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        $court->delete();

        return redirect()
            ->route('admin.courts.index')
            ->with('success', 'Court berhasil dihapus.');
    }
}
