<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialiteController extends Controller
{
    public function index ()
    {
        return view('login');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function login()
    {
        session()->regenerate();
        session()->put('auth', true);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->forget("auth", false);

        return redirect('/login');
    }
}
