<?php
namespace App\Interfaces;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

interface UserRepositoryInterface{
    public function login(LoginRequest $credentials);
    public function create(RegisterRequest $credentials);
}
