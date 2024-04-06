<?php

namespace App\Repositories;

use App\Models\TODO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TODORepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return TODO::class;
    }

    /**
     * @param TODOIndexDTO $indexDTO
     * @return LengthAwarePaginator
     */
    public function index(TODOIndexDTO $indexDTO): LengthAwarePaginator
    {
        return $this->model->query()
            ->where('user_id', '=', $indexDTO->user_id)
            ->orderByDesc('created_at')
            ->paginate($indexDTO->limit);
    }
}
