<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    // Display user profile
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    // Show profile edit form
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update user profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

       // $user->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }

    // Delete user account
    public function destroy()
    {
        $user = Auth::user();
      //  $user->delete();

        Auth::logout();

        return redirect()->route('home')->with('success', 'Account deleted successfully!');
    }
}
