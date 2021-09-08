<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PinStatusResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "requestid" => $this->getRequestid(),
            "status" => $this->getStatus(),
            "created" => $this->getCreated(),
            "pin" => new PinResource($this->getPin()),
            "delegates" => $this->getDelegates(),
            "info" => (object) $this->getInfo()
        ];
    }
}
