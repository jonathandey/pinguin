<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\CreatePinRequest;
use App\Models\Pin;

interface PinRepository
{
    public function store(CreatePinRequest $request) : Pin;
}
