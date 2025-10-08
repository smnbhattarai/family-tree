<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Mail\LoginLink;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

final class AuthController
{
    //
    public function loginPage(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $email = $request->validated('email');
        $url = URL::temporarySignedRoute('login:store', now()->addHour(), ['email' => $email]);
        $user = User::where('email', $email)->first();

        if (! $user) {
            return redirect()->route('home');
        }

        Mail::to($email)->send(new LoginLink($user, $url));

        return redirect()->back()->with('success', 'Please check your email for login link.');
    }

    public function processLogin(Request $request, string $email): RedirectResponse
    {
        if (! $request->hasValidSignature()) {
            abort(ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $user = User::query()->where('email', $email)->firstOrFail();

        Auth::login($user);

        return new RedirectResponse(
            url: route('page.family'),
        );
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
