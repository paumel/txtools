<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Inertia\Inertia;
use Inertia\Response;

class EmailVerificationPromptController extends Controller
{
    /**
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        $user = $request->user();

        if (!$user) {
            throw new UnauthorizedException();
        }

        return $user->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::HOME)
            : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
}
