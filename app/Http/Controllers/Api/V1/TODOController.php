<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TODO;
use App\Services\TODOService;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class TODOController extends Controller
{

    /**
     * @param TODOService $service
     */
    public function __construct(private readonly TODOService $service)
    {
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function index()
    {
        try {
            $todos = $this->service->index();
            return $this->successResponse(new TODOResource($todos));
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param TODOStoreRequest $request
     * @return Response
     * @throws Exception
     */
    public function store(TODOStoreRequest $request)
    {
        try {
            $todos = $this->service->store(TODOStoreDTO::fromRequest($request));
            return $this->createdResponse(new TODOStoreResource($todos));
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param TODO $TODO
     * @return Response
     * @throws Exception
     */
    public function show(TODO $TODO)
    {
        try {
            return $this->successResponse(new TODOResource($TODO));
        } catch (Exception $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param TODOUpdateRequest $request
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function update(TODOUpdateRequest $request, int $id)
    {
        try {
            $todo = $this->service->update($id, TODOUpdateDTO::fromRequest($request));
            return $this->updatedResponse(new TODOResource($todo));
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
}
