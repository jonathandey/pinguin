<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PinResultsCollection extends ResourceCollection
{

    public function toArray($request)
    {
        $count = $this->count();

        if ($request->has("limit")) {
            $this->collection = $this->collection->take($request->get("limit", 1));
        }

        return [
            'count' => $count,
            'results' => $this->collection->toArray()
        ];
    }

    protected function collects()
    {
        return PinStatusResource::class;
    }
}
