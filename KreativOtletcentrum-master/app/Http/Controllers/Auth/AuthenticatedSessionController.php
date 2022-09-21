<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }
    public function profil()
    {
        return view('profil');
    }
    public function kosaram()
    {
        return view('kosaram');
    }
    public function adat_modositas(Request $request)
    {
        $nev_modosit = $request->get("nev_modosit");
        $email_modosit = $request->get("email_modosit");
        $jelszo_modosit = $request->get("jelszo_modosit");
        $jelszo_modosit = Crypt::encrypt('secret');
        if ($nev_modosit != "") {
            User::where('id', Auth::user()->id)->update(['name' => $nev_modosit]);
        }
        else if($email_modosit != ""){
            User::where('id', Auth::user()->id)->update(['email' => $email_modosit]);
        }
        else if($jelszo_modosit != ""){
            User::where('id', Auth::user()->id)->update(['password' => $jelszo_modosit]);
        }
        return view('adat_modositas');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
