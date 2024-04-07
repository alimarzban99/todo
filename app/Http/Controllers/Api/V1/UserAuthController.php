<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\DTO\UserLoginDTO;
use App\Http\Requests\UserLoginRequest;
use App\Services\UserAuthService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Throwable;


class UserAuthController extends Controller
{
    /**
     * @param UserAuthService $service
     */
    public function __construct(private readonly UserAuthService $service)
    {
    }


    /**
     * @param UserLoginRequest $request
     * @return Response
     * @throws Exception
     */
    public function login(UserLoginRequest $request): Response
    {
        try {
            $data = $this->service->login(UserLoginDTO::fromRequest($request));
            return $this->successResponse($data);
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param $user
     * @return Response
     * @throws Exception
     */
    public function verify($user): Response
    {
        try {
            $token = $this->service->verify($user);
            return $this->successResponse($token);
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function logout(): Response
    {
        try {
            Auth::logout();
            return $this->successResponse(trans('users::users.commons.messages.verified'));
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }
}
