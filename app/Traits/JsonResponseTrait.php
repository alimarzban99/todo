<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait JsonResponseTrait
{
    public string $key = 'data';

    /**
     * @param $data
     * @param string $message
     * @return Response
     */
    protected function successResponse($data = null, string $message = 'Ok'): Response
    {
        return response()->json([
            'status' => true,
            'code' => Response::HTTP_OK,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function createdResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base::modules.message.created');

        return response()->json([
            'status' => true,
            'code' => Response::HTTP_CREATED,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_CREATED);
    }

    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function updatedResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base::modules.message.updated');

        return response()->json([
            'status' => true,
            'code' => Response::HTTP_ACCEPTED,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function acceptedResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base::modules.message.accepted');

        return response()->json([
            'status' => true,
            'code' => Response::HTTP_ACCEPTED,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function deletedResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base::modules.message.deleted');
        return response()->json([
            'status' => true,
            'code' => Response::HTTP_ACCEPTED,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function failedResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base::modules.message.failed');
        return response()->json([
            'status' => true,
            'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param $data
     * @param $statusCode
     * @return Response
     */
    protected function apiException($data, $statusCode): Response
    {
        $message = !empty($message) ? $message : trans('base::modules.message.failed');

        return response()->json([
            'status' => true,
            'code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

}
