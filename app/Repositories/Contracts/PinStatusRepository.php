<?php

namespace App\Repositories\Contracts;

use App\Support\PinStatusCollection;

interface PinStatusRepository
{
    public function get() : PinStatusCollection;
}
