<?php

namespace App\Http\DTO;

use Illuminate\Http\Request;

class TaskIndexDTO
{
    /**
     * @param int $user_id
     * @param int $limit
     */
    public function __construct(
        public readonly int $user_id,
        public readonly int $limit,
    )
    {
    }

    /**
     * @param Request $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return new static(
            $request->user()->id,
            $request->input('limit', 10),
        );
    }

}
