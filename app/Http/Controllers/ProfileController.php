<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'user' => User::find(1)
        ]);
    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id()
        ]);

        // Find the authenticated user
        $user = auth()->user();

        // Update the user's name and email
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Redirect back to the profile page with a success message
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
