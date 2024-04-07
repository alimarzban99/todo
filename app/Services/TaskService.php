<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Http\DTO\TaskIndexDTO;
use App\Http\DTO\TaskUpsertDTO;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskService
{
    /**
     * @param TaskRepository $repository
     */
    public function __construct(private readonly TaskRepository $repository)
    {
    }

    /**
     * @param TaskIndexDTO $indexDTO
     * @return LengthAwarePaginator
     */
    public function index(TaskIndexDTO $indexDTO): LengthAwarePaginator
    {
        return $this->repository->index($indexDTO);
    }

    /**
     * @param TaskUpsertDTO $upsertDTO
     * @return object
     */
    public function store(TaskUpsertDTO $upsertDTO): object
    {
        return $this->repository->create((array)$upsertDTO);
    }

    /**
     * @param object $task
     * @param TaskUpsertDTO $upsertDTO
     * @return object
     */
    public function update(object $task, TaskUpsertDTO $upsertDTO): object
    {
        $attr = (array)$upsertDTO;
        unset($attr['user_id']);
        return $task->update($attr);
    }

    /**
     * @param object $task
     * @param string $type
     * @return void
     */
    public function destroy(object $task, string $type = 'normal'): void
    {
        if ($type === 'purge') {
            $task->forceDelete();
        } else {
            $task->delete();
        }
    }

    /**
     * @param object $task
     * @return void
     * @throws CustomException
     */
    public function done(object $task): void
    {
        if ($task->is_done) {
            throw new CustomException('این کار قبلا به اتمام رسیده است');
        }

        $task->update(['is_done' => true]);

    }
}
