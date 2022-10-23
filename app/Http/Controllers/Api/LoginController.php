<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\UserResource;
use App\Service\UserService;

class LoginController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function signIn(LoginRequest $request)
    {
        $credentials = $request->validated();

        $user = $this->userService->signIn($credentials, 'api', $request);
        if ($user) {
            session()->flash('success', 'Signed In');

            return new UserResource($user);
        }

        $data = [
            'message' => 'The provided credentials are incorrect',
        ];

        return response($data, 401);
    }
}
