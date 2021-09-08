<?php

namespace App\Repositories;

use App\Models\Pin;
use App\Models\PinStatus;
use App\Support\PinStatusCollection;

class IpfsPinStatusRepository extends IpfsRepository implements Contracts\PinStatusRepository
{
    public function get(): PinStatusCollection
    {
        $results = $this->ipfsClient->files()->ls('/', true);

        $pinStatuses = array_map(function ($entry) {
            return new PinStatus(
                new Pin(
                    $entry["Hash"],
                    $entry["Name"]
                )
            );
        }, $results["Entries"]);

        return new PinStatusCollection($pinStatuses);
    }
}
