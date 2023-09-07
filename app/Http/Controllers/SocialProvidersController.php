<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialProvidersController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse | RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): mixed
    {
        return redirect($social->loginAndGetRedirectUrl(Socialite::driver($driver)->user()));
    }
}
