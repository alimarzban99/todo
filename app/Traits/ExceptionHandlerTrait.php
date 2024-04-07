<?php

namespace App\Traits;

use App\Exceptions\CustomException;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Routing\Exceptions\BackedEnumCaseNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Illuminate\View\ViewException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;
use TypeError;

trait ExceptionHandlerTrait
{
    /**
     * @param Throwable $handler
     * @return Response
     * @throws Exception
     */
    protected function reportException(Throwable $handler): Response
    {
        if ($handler instanceof CustomException) {
            return $this->reportError($handler, $handler->getMessage(), $handler->getCode());
        }

        if ($handler instanceof ValidationException) {
            return $this->validationError($handler);
        }

        if ($handler instanceof TokenMismatchException) {
            return $this->reportError($handler, trans('base::exception.token.mismatch.exception'), Response::HTTP_BAD_REQUEST);
        }

        if ($handler instanceof QueryException) {
            return $this->reportError($handler, trans('base::exception.query.exception'), Response::HTTP_BAD_REQUEST);
        }

        if ($handler instanceof InternalErrorException || $handler instanceof FatalError) {
            return $this->reportError($handler, trans('base::exception.internal.server.exception'));
        }

        if ($handler instanceof ModelNotFoundException) {
            return $this->reportError($handler, trans('base::exception.model.not.found.exception'), Response::HTTP_NOT_FOUND);
        }

        if ($handler instanceof AuthorizationException) {
            return $this->reportError($handler, trans('base::exception.authorization.exception'), Response::HTTP_FORBIDDEN);
        }

        if ($handler instanceof AuthenticationException) {
            return $this->reportError($handler, trans('base::exception.authentication.exception'), Response::HTTP_UNAUTHORIZED);
        }

        if ($handler instanceof MethodNotAllowedHttpException) {
            return $this->reportError($handler, trans('base::exception.method.not.allowed.http.exception'), Response::HTTP_METHOD_NOT_ALLOWED);
        }

        if ($handler instanceof NotFoundHttpException || $handler instanceof RouteNotFoundException) {
            return $this->reportError($handler, trans('base::exception.not.found.http.exception'), Response::HTTP_NOT_FOUND);
        }

        if ($handler instanceof ViewException) {
            return $this->reportError($handler, trans('base::exception.view.exception'), Response::HTTP_BAD_REQUEST);
        }

        if ($handler instanceof TypeError) {
            return $this->reportError($handler, trans('base::exception.type.error.exception'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($handler instanceof ThrottleRequestsException) {
            return $this->reportError($handler, trans('base::exception.throttle.request.exception'), Response::HTTP_TOO_MANY_REQUESTS);
        }

        if ($handler instanceof BackedEnumCaseNotFoundException) {
            return $this->reportError($handler, trans('base::exception.backed.enum_case.not_found.exception'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($handler instanceof NotAcceptableHttpException) {
            return $this->reportError($handler, trans('base::exception.backed.enum_case.not_acceptable.exception'), Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->reportError($handler, $handler->getMessage(), Response::HTTP_BAD_REQUEST);

    }

    /**
     * @param Throwable $handler
     * @param string $message
     * @param int $statusCode
     * @return Response
     * @throws Exception
     */
    private function reportError(Throwable $handler, string $message = "There was an internal server error in your application", int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): Response
    {
        if (App::environment('local') && !empty($handler->getMessage())) {
            return $this->jsonResponse($handler->getMessage(), $statusCode);
        }

        return $this->jsonResponse($message, $statusCode);
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @return Response
     */
    private function jsonResponse(string $message, int $statusCode): Response
    {
        $payload = ['error' => $message, 'code' => $this->getStatusAbb($statusCode)];
        return $this->apiException($payload, $statusCode);
    }


    /**
     * @param int $statusCode
     * @return string
     */
    private function getStatusAbb(int $statusCode): string
    {
        $statusTexts = array_flip(Response::$statusTexts);

        if (in_array($statusCode, $statusTexts)) {
            $statusAbb = array_search($statusCode, $statusTexts);
        } else {
            $statusAbb = array_search(Response::HTTP_BAD_REQUEST, $statusTexts);
        }

        return str_replace(' ', '_', strtoupper($statusAbb));
    }

    /**
     * @param ValidationException $exception
     * @return Response
     * @throws Exception
     */
    private function validationError(ValidationException $exception): Response
    {
        $validationErrors = $exception->validator->errors()->getMessages();

        if (is_array($validationErrors)) {
            $validationErrors = reset($validationErrors);
            return $this->reportError($exception, $validationErrors[0], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->reportError($exception, $exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function isJsonApi(Request $request): bool
    {
        if (str_contains($request->getUri(), '/payment/redirect') || str_contains($request->getUri(), '/payment/verify')) {
            return false;
        }

        return str_contains($request->getUri(), '/oauth/token') || str_contains($request->getUri(), '/api/') ||
            $request->expectsJson() || $request->wantsJson() || ($request->ajax() && !$request->pjax() && $request->acceptsAnyContentType());
    }
}
