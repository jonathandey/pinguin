<?php

namespace App\Repositories;

use App\Http\Requests\CreatePinRequest;
use App\Models\Pin;

class IpfsPinRepository extends IpfsRepository implements Contracts\PinRepository
{

    public function store(CreatePinRequest $request) : Pin
    {
        $data = $request->validated();

        // @todo queue this
        $result = $this->ipfsClient->pin()->add(
            $request->get("cid")
        );

        $pins = data_get($result, "Pins");

        return new Pin(
            $pins[0]
        );
    }
}
