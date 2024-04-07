<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Http\DTO\UserLoginDTO;
use App\Notifications\UserRegisterNotification;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

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
     * @throws CustomException
     */
    public function login(UserLoginDTO $loginDTO): array
    {
        $user = $this->repository->findByEmail($loginDTO->email);

        if (!empty($user) && !empty($user->email_verified_at)) {

            if (!Hash::check($loginDTO->password, $user->password)) {
                throw new CustomException(trans('auth.failed'));
            }
            return [
                'token' => $user->createToken('LOGIN_TOKEN')->plainTextToken,
                'message' => trans('auth.login')
            ];
        }

        $attr = (array)$loginDTO;
        $attr['password'] = Hash::make($attr['password']);
        $user = $this->repository->create($attr);

        $user->notify(new UserRegisterNotification());

        return [
            'token' => $user->createToken('REGISTER_TOKEN')->plainTextToken,
            'message' => trans('auth.registered')
        ];

    }

    /**
     * @param int $user
     * @return mixed
     * @throws CustomException
     */
    public function verify(int $user): mixed
    {
        $user = $this->repository->findOne($user);

        if (!empty($user->email_verified_at)) {
            throw  new CustomException(trans('auth.verified'));
        }

        $user->update(['email_verified_at' => now()]);

        return $user->createToken('REGISTER_TOKEN')->plainTextToken;
    }

    /**
     * @param object $user
     * @return void
     */
    public function logout(object $user): void
    {
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
    }
}
