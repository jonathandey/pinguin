<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PinResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "cid" => $this->getCid(),
            "name" => $this->getName(),
            "origins" => $this->getOrigins(),
            "meta" => (object) $this->getMeta(),
        ];
    }
}
