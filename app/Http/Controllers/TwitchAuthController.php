<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Socialite;
use App\User;

class TwitchAuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Redirect the user to the Twitch authentication page.
     *
     * @return Response
     */
    public function redirectToAuth()
    {
        return Socialite::with('twitch')->scopes(['user_read'])->redirect();
    }

    /**
     * Obtains the user information from Twitch.
     *
     * @return Response
     */
    public function handleCallback()
    {
        try {
            $user = Socialite::with('twitch')->user();
        } catch (Exception $e) {
            return redirect()->route('home');
        }

        $auth = User::findOrCreateUser($user);
        $auth->save();
        Auth::login($auth, true);
        return redirect()->route('home');
    }

    /**
     * Logs out the user
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
