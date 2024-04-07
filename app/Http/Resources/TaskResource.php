<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;


class TaskResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'category' => $this->resource->category->name,
            'due_date' => Carbon::parse($this->resource->due_date)->format('Y-m-d H:i:s'),
            'sub_tasks' => new SubTaskCollection($this->resource->subTasks),
            'created_at' => Carbon::parse($this->resource->created_at)->format('Y-m-d H:i:s'),
        ];

    }
}
