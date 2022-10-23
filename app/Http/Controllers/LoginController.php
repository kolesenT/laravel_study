<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Service\UserService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function loginForm()
    {
        return view('login');
    }

    public function loginIn(LoginRequest $request)
    {
        $data = $request->validated();

        $user = $this->userService->signIn($data, 'web', $request);
        if ($user) {
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
