<?php

namespace App\Repositories;

use App\Http\DTO\TaskIndexDTO;
use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Task::class;
    }

    /**
     * @param TaskIndexDTO $indexDTO
     * @return LengthAwarePaginator
     */
    public function index(TaskIndexDTO $indexDTO): LengthAwarePaginator
    {
        return $this->model->query()
            ->with('subTasks')
            ->where('user_id', '=', $indexDTO->user_id)
            ->whereNull('parent_id')
            ->orderByDesc('created_at')
            ->paginate($indexDTO->limit);
    }

    /**
     * @return Collection
     */
    public function getTomorrowTasks(): Collection
    {
        return $this->model->query()
            ->with('user')
            ->where('is_done', '=', false)
            ->whereDate('due_date', '=', now()->addDay()->format('Y-m-d'))
            ->get();
    }
}
