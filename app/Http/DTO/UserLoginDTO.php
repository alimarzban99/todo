<?php

namespace App\Http\DTO;

use App\Http\Requests\UserLoginRequest;

class UserLoginDTO
{
    /**
     * @param string $email
     * @param string $password
     * @param string $name
     */
    public function __construct(
        public readonly string    $email,
        public readonly string $password,
        public readonly string $name,
    )
    {
    }

    /**
     * @param UserLoginRequest $request
     * @return self
     */
    public static function fromRequest(UserLoginRequest $request): self
    {
        return new static(
            $request->input('email'),
            $request->input('password'),
            $request->input('name'),

        );
    }

}
