<?php

namespace App\Services;

use App\Http\DTO\UserLoginDTO;
use App\Notifications\UserRegisterNotification;
use App\Repositories\UserRepository;

class UserAuthService
{
    /**
     * @param UserRepository $repository
     */
    public function __construct(private readonly UserRepository $repository)
    {
    }

    /**
     * @param UserLoginDTO $loginDTO
     * @return array
     */
    public function login(UserLoginDTO $loginDTO): array
    {
        $user = $this->repository->findByEmail($loginDTO->email);

        if (!empty($user) && !empty($user->email_verified_at)) {
            return $user->createToken();
        }

        $user = $this->repository->create((array)$loginDTO);

        $user->notify(new UserRegisterNotification());

        return trans('');

    }

    /**
     * @param UserVerifyDTO $verifyDTO
     * @return array
     */
    public function verify(UserVerifyDTO $verifyDTO):array
    {
        $user = $this->repository->update(1,['email_verified_at' => now()]);

        return $user->createToken();
    }
}
