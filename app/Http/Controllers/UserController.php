<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Http\Requests\User\SingUpRequest;
use App\Mail\EmailConfirm;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function singUpForm()
    {
        return view('sing-up');
    }

    public function singUp(SingUpRequest $request)
    {
        $data = $request->validated();
        $user = new User($data);

        $user->save();

        $event = new UserRegistered($user);
        event($event);

        //Mail::to($user->email)->send(new EmailConfirm($user));

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
