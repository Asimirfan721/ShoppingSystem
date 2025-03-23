<?php

namespace App\Http\Controllers;  // Ensure you have this namespace

use Illuminate\Http\Request; // Ensure you have this namespace
use Illuminate\Support\Facades\Auth; // Ensure you have this namespace here
use App\Models\User; // Ensure you have this namespace here

class ProfileController extends Controller
{
    // Display user profile
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user')); // return view  prfile is in the index folder or vice versa  
    }    

    // Show profile edit form
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update user profile
    public function update(Request $request)    // update method to update the user profile
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
