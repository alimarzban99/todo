<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    /**
     * @param UserLoginRequest $request
     * @return Response
     * @throws Exception
     */
    public function profile(Request $request): Response
    {
        try {
            return $this->successResponse(new UserResource($request->user()));
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

}
