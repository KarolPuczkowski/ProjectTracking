<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes([
                'openid',
                'profile',
                'email',
                'https://www.googleapis.com/auth/calendar.readonly'
            ])
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    // public function handleGoogleCallback()
    // {
    //     $googleUser = Socialite::driver('google')->stateless()->user();

    //     $user = User::updateOrCreate(
    //         ['email' => $googleUser->getEmail()],
    //         [
    //             'name' => $googleUser->getName(),
    //             'google_token' => $googleUser->token,
    //             'google_refresh_token' => $googleUser->refreshToken,
    //         ]
    //     );

    //     Auth::login($user, true);

    //     return redirect()->route('dashboard');
    // }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (! $user) {
            return redirect()->route('login')
                ->with('error', 'This Google account is not authorized. Contact admin.');
        }

        // Update tokens if needed
        $user->update([
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
            'name' => $googleUser->getName(), // optional, keep name in sync
        ]);

        \Illuminate\Support\Facades\Auth::login($user, true);

        return redirect()->route('dashboard');
    }

}