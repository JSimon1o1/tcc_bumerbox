<?php

namespace App\Traits;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

trait AutenticacaoTrait
{
    public function autenticar(Request $request): RedirectResponse
    {
        $this->validateLogin($request);

        $request->merge(['password' => $request->get('senha'), 'deleted_at' => null]);

        if (Auth::attempt($request->except(['_token', 'senha']))) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()
            ->withErrors(['cpfcnpj' => 'The provided credentials do not match our records.',])
            ->onlyInput('cpfcnpj');
    }

    protected function validateLogin(Request $request): void
    {
        $request->validate(['cpfcnpj' => 'required', 'senha' => 'required']);
    }

    public function logout(Request $request): Application|Redirector|RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login')->withScucess('Logout efetuado com sucesso!');
    }
}
