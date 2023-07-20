<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSessionExpiration
{
    public function handle($request, Closure $next)
    {
        // Check if the staff member is logged in and has a session_token
        if (Auth::check() && Auth::user() instanceof Staff && $request->session()->has('session_token')) {
            // Check if the session_token in the database matches the one in the current session
            if (Auth::user()->session_token !== $request->session()->get('session_token')) {
                // Log out the staff member from the current session
                Auth::logout();

                // Clear the session_token in the staff table
                Auth::user()->update(['session_token' => null]);

                // Redirect to the login page with a message indicating the session logout
                return redirect()->route('login')->withErrors('You have been logged out from other devices.');
            }
        }

        return $next($request);
    }
}