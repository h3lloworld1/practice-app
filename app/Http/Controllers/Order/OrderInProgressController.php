<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequests\OrderInProgress\CreateOrderInProgressRequest;
use App\Http\Requests\OrderRequests\OrderInProgress\OrderInProgressListingRequest;
use App\Http\Resources\OrderResources\OrderInProgress\OrderInProgressResource;
use App\Services\Orders\Interfaces\OrderInProgressInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderInProgressController extends Controller
{
    public function __construct(private OrderInProgressInterface $inProgressService) {

    }

    public function store(CreateOrderInProgressRequest $request): OrderInProgressResource {
        return new OrderInProgressResource($this->inProgressService->store(new ParameterBag($request->validated())));
    }

    public function index(OrderInProgressListingRequest $request): AnonymousResourceCollection {
        return OrderInProgressResource::collection($this->inProgressService->list(new ParameterBag($request->validated())));
    }

    public function update(int $id): Bool {
        return $this->inProgressService->update($id);
    }

    public function decline(int $id): Bool {
        return $this->inProgressService->decline($id);
    }
}
