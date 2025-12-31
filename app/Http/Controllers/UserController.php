<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,staff',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'nullable|in:male,female',
            'status' => 'nullable|in:active,inactive',
            'place' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'status' => $request->status ?? 'active',
            'place' => $request->place,
        ]);

        return redirect()->route('users.index')->with('success', 'Staff created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('pages.staff.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,staff',
            'password' => 'nullable|string|min:6|confirmed',
            'gender' => 'nullable|in:male,female',
            'status' => 'nullable|in:active,inactive',
            'place' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->gender = $request->gender;
        $user->status = $request->status ?? $user->status;
        $user->place = $request->place;

        $user->save();

        return redirect()->route('users.index')->with('success', 'Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Staff deleted successfully');
    }
}
