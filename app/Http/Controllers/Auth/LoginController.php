<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credenciales, $request->boolean('recuerdame'))) {
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros',
            ])->onlyInput('email', 'recuerdame');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('eventos.index'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('eventos.index');
    }
}
