<?php

namespace App\Repositories;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param LoginRequest $credentials
     * @return bool
     */
    public function login(LoginRequest $credentials)
    {
        return auth()->attempt($credentials->validated());
    }

    /**
     * @param RegisterRequest $credentials
     * @return mixed
     */
    public function create(RegisterRequest $credentials)
    {
        return User::create(
            $credentials->safe()->except(['password']) +
            ['password' => bcrypt($credentials->password)]
        );
    }
}
