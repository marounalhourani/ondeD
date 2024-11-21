<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request to make sure the username and password are provided
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate using the provided credentials
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Authentication passed, redirect to the intended page
            return redirect()->intended('/admin/dashboard');
        }

        // If authentication fails, redirect back with error message
        return back()->withErrors([
            'username' => 'These credentials do not match our records.',
        ]);
    }
}
