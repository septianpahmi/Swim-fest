<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $regisUser = User::where('google_id', $googleUser->id)->first();
        if (!$regisUser) {
            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make('4123543564'),
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
                'role_id' => 2,
            ]);

            Auth::login($user);

            // return redirect('/');


            return redirect()->intended('/registrasi-kategori/swimfest-2025');
        }
        Auth::login($regisUser);

        return redirect()->intended('/registrasi-kategori/swimfest-2025');
        return redirect('/');
    }
}
