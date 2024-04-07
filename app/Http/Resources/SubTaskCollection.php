<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;


class SubTaskCollection extends ResourceCollection
{
    /**
     * @param $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'category' => $item->category->name,
                'due_date' => Carbon::parse($item->due_date)->format('Y-m-d H:i:s'),
                'is_done' => $item->is_done ? 'انجام شده' : 'انجام نشده',
                'created_at' => Carbon::parse($item->created_at)->format('Y-m-d H:i:s'),
            ];
        });

    }
}
