<?php

namespace App\Services;

use App\Repositories\TODORepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TODOService
{
    /**
     * @param TODORepository $repository
     */
    public function __construct(private readonly TODORepository $repository)
    {
    }

    /**
     * @param TODOIndexDTO $indexDTO
     * @return LengthAwarePaginator
     */
    public function index(TODOIndexDTO $indexDTO): LengthAwarePaginator
    {
        return $this->repository->index($indexDTO);
    }

    /**
     * @param TODOStoreDTO $storeDTO
     * @return object
     */
    public function store(TODOStoreDTO $storeDTO): object
    {
        return $this->repository->create((array)$storeDTO);
    }

    /**
     * @param int $id
     * @param TODOUpdateDTO $updateDTO
     * @return object
     */
    public function update(int $id, TODOUpdateDTO $updateDTO): object
    {
        return $this->repository->update($id, (array)$updateDTO);
    }

    /**
     * @param int $id
     * @param string $type
     * @return void
     */
    public function destroy(int $id, string $type = 'normal'): void
    {
        $todo = $this->repository->findOne($id);

        if ($type === 'purge') {
            $todo->forceDelete();
        } else {
            $todo->delete();
        }
    }
}
