<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\DTO\TaskIndexDTO;
use App\Http\DTO\TaskUpsertDTO;
use App\Http\Requests\TaskUpsertRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * @param TaskService $service
     */
    public function __construct(private readonly TaskService $service)
    {
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function index(Request $request)
    {
        try {
            $tasks = $this->service->index(TaskIndexDTO::fromRequest($request));

            return $this->successResponse(new TaskCollection($tasks));
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param Task $task
     * @return Response
     * @throws Exception
     */
    public function show(Task $task)
    {
        try {
            return $this->successResponse(new TaskResource($task));
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param TaskUpsertRequest $request
     * @return Response
     * @throws Exception
     */
    public function store(TaskUpsertRequest $request)
    {
        try {
            $tasks = $this->service->store(TaskUpsertDTO::fromRequest($request));
            return $this->createdResponse(new TaskResource($tasks));
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }


    /**
     * @param TaskUpsertRequest $request
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function update(TaskUpsertRequest $request, int $id)
    {
        try {
            $task = $this->service->update($id, TaskUpsertDTO::fromRequest($request));
            return $this->updatedResponse(new TaskResource($task));
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy(int $id)
    {
        try {
            $this->service->destroy($id, request()->input('type', 'normal'));
            return $this->deletedResponse();
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function done(int $id)
    {
        try {
            $this->service->done($id);
            return $this->successResponse();
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }
}
