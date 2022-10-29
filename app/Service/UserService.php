<?php

namespace App\Service;

use App\Events\UserLoggedIn;
use App\Mail\EmailConfirm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserService
{
    public function register(array $data): User
    {
        $user = new User($data);
        $user->save();

        Mail::to($user->email)->send(new EmailConfirm($user));

        return $user;
    }

    public function signIn(array $credentials, string $guard, Request $request): ?User
    {
        if (Auth::guard($guard)->attemptWhen($credentials)) {
            $user = auth($guard)->user();
            $event = new UserLoggedIn($user, $request);
            event($event);

            return $user;
        }

        return null;
    }
}
