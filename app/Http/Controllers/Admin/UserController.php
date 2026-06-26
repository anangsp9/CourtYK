<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Search nama atau email
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter role
        if ($request->filled('role')) {

            $query->where('role', $request->role);
        }

        $users = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            compact('user')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        // Admin tidak boleh mengubah role dirinya sendiri
        if (
            Auth::id() === $user->id &&
            $data['role'] !== 'admin'
        ) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Anda tidak dapat mengubah role akun Anda sendiri.'
                );
        }

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {

            return back()->with(
                'error',
                'Anda tidak dapat menghapus akun Anda sendiri.'
            );
        }

        if ($user->bookings()->exists()) {

            return back()->with(
                'error',
                'User masih memiliki booking sehingga tidak dapat dihapus.'
            );
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User berhasil dihapus.'
            );
    }
}
