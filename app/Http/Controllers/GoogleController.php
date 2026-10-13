<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Failed to authenticate with Google');
        }

        // Find or create the user
        $user = User::where('google_id', $googleUser->getId())->first();

        if ($user) {
            // User exists, update info and login
            $user->update([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
            ]);
        } else {
            // Create new user if doesn't exist
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // User exists with this email but no google_id, link the account
                $user->update(['google_id' => $googleUser->getId()]);
            } else {
                // Create completely new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(''), // No password for social login
                ]);
            }
        }

        // Log the user in
        Auth::login($user, remember: true);

        return redirect('/dashboard')->with('success', 'Logged in successfully with Google!');
    }
}
