<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;


class TaskCollection extends ResourceCollection
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'category' => $item->category->name,
                    'due_date' => Carbon::parse($item->due_date)->format('Y-m-d H:i:s'),
                    'sub_tasks' => new SubTaskCollection($item->subTasks),
                    'created_at' => Carbon::parse($item->created_at)->format('Y-m-d H:i:s'),
                ];
            }),
            'total' => $this->resource->total(),
            'count' => $this->resource->count(),
            'per_page' => $this->resource->perPage(),
            'current_page' => $this->resource->currentPage(),
            'last_page' => $this->resource->lastPage()
        ];

    }
}
