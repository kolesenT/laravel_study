<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function loginIn(LoginRequest $request)
    {
        $data = $request->validated();

        $check = function ($user) {
            return $user->email_verified_at !== null;
        };
        //attemptWhen - проверяем верификацию email
        if (Auth::attemptWhen($data, $check)) {
            session()->flash('success', 'Signed In');

            return redirect()->route('home');
        }

        session()->flash('error', 'The provided credentials are incorrect');

        return redirect()->route('login');
    }

    public function logout()
    {

        // удаляем куку для текущего пользователя
        Auth::logout();

        return redirect()->route('login');
    }
}
