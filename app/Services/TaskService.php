<?php

namespace App\Services;

use App\Http\DTO\TaskIndexDTO;
use App\Http\DTO\TaskUpsertDTO;
use App\Infrastructure\Exceptions\CustomException;
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
     * @param int $id
     * @param TaskUpsertDTO $upsertDTO
     * @return object
     */
    public function update(int $id, TaskUpsertDTO $upsertDTO): object
    {
        $attr = (array)$upsertDTO;
        unset($attr['user_id']);
        return $this->repository->update($id, $attr);
    }

    /**
     * @param int $id
     * @param string $type
     * @return void
     */
    public function destroy(int $id, string $type = 'normal'): void
    {
        $task = $this->repository->findOne($id);

        if ($type === 'purge') {
            $task->forceDelete();
        } else {
            $task->delete();
        }
    }

    /**
     * @param int $id
     * @return void
     * @throws CustomException
     */
    public function done(int $id): void
    {
        $task = $this->repository->findOne($id);

        if ($task->is_done) {
            throw new CustomException('این کار قبلا به اتمام رسیده است');
        }

        $task->update(['is_done' => true]);

    }
}
