<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
use App\Models\Venue;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::latest()->paginate(10);

        return view('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store(StoreVenueRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('venues', 'public');
        }

        Venue::create($data);

        return redirect()
            ->route('admin.venues.index')
            ->with('success', 'Venue berhasil ditambahkan.');
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
    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVenueRequest $request, Venue $venue)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            // Hapus gambar lama jika ada
            if ($venue->image && Storage::disk('public')->exists($venue->image)) {
                Storage::disk('public')->delete($venue->image);
            }

            // Simpan gambar baru
            $data['image'] = $request
                ->file('image')
                ->store('venues', 'public');
        }

        $venue->update($data);

        return redirect()
            ->route('admin.venues.index')
            ->with('success', 'Venue berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        if ($venue->courts()->exists()) {
            return back()->with(
                'error',
                'Venue tidak dapat dihapus karena masih memiliki court.'
            );
        }

        if ($venue->image && Storage::disk('public')->exists($venue->image)) {
            Storage::disk('public')->delete($venue->image);
        }

        $venue->delete();

        return redirect()
            ->route('admin.venues.index')
            ->with('success', 'Venue berhasil dihapus.');
    }
}
