<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SingUpRequest;
use App\Models\User;
use App\Service\UserService;
use DateTime;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function singUpForm()
    {
        return view('sing-up');
    }

    public function singUp(SingUpRequest $request)
    {
        $data = $request->validated();

        $this->userService->register($data);

        session()->flash('success', 'Success!');

        return redirect()->route('home');
    }

    public function verifyEmail(string $id, string $hash, Request $request)
    {
        //если подпись не валидна
        if (! $request->hasValidSignature()) {
            abort(403);
        }

        //проверяем есть ли такой пользователь
        $user = User::query()->findOrFail($id);

        //сравниваем хэши
        if (! hash_equals($hash, sha1($user->email))) {
            abort(403);
        }

        //выставляем время действия ссылки
        $user->email_verified_at = new DateTime();
        $user->save();

        session()->flash('success', 'Success!');

        return redirect()->route('home');
    }
}
