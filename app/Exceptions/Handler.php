<?php

namespace App\Exceptions;

use App\Traits\JsonExceptionHandlerTrait;
use App\Traits\JsonResponseTrait;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    use JsonResponseTrait;
    use JsonExceptionHandlerTrait;

    /**
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * @return void
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param $request
     * @param Throwable $e
     * @return Response
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($this->isJsonApi($request)) {
            return $this->reportException($e);
        }
        return parent::render($request, $e);
    }
}
