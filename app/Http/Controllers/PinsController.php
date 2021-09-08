<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePinRequest;
use App\Http\Resources\PinResultsCollection as PinStatusResourceCollection;
use App\Http\Resources\PinStatusResource;
use App\Models\Pin;
use App\Models\PinStatus;
use App\Repositories\Contracts\PinRepository;
use App\Repositories\Contracts\PinStatusRepository;
use Illuminate\Http\Request;

class PinsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PinStatusRepository $pinStatusRepository)
    {
        $collection = $pinStatusRepository->get();

        return new PinStatusResourceCollection(
            $collection
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePinRequest $request, PinRepository $pinRepository)
    {
        $pin = $pinRepository->store($request);

        return new PinStatusResource(
            new PinStatus($pin, 0)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $requestid)
    {
        // @todo
        return new PinStatusResource(
            new PinStatus(
                new Pin("XXX"),
                $requestid
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // @todo
        return "todo";
    }
}
