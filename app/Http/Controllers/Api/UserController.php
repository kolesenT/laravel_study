<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SignUpRequest;
use App\Http\Resources\UserResource;
use App\Service\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function signUp(SignUpRequest $request): UserResource
    {
        $data = $request->validated();
        $user = $this->userService->register($data);

        return new UserResource($user);
    }
}
