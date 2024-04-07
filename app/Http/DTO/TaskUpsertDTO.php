<?php

namespace App\Http\DTO;


use App\Http\Requests\TaskUpsertRequest;

class TaskUpsertDTO
{
    /**
     * @param int $user_id
     * @param string $title
     * @param string $due_date
     * @param int|null $parent_id
     * @param int $category_id
     */
    public function __construct(
        public readonly int $user_id,
        public readonly string $title,
        public readonly string $due_date,
        public readonly ?int $parent_id,
        public readonly int $category_id,
    )
    {
    }

    /**
     * @param TaskUpsertRequest $request
     * @return self
     */
    public static function fromRequest(TaskUpsertRequest $request): self
    {
        return new static(
            $request->user()->id,
            $request->input('title'),
            $request->input('due_date'),
            $request->input('parent_id'),
            $request->input('category_id'),
        );
    }

}
