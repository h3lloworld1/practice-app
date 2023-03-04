<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequests\OrderSent\OrderSentListingRequest;
use App\Http\Requests\OrderRequests\OrderSent\OrderSentRequest;
use App\Http\Resources\OrderResources\OrderSent\OrderSentResource;
use App\Services\Orders\Interfaces\OrderSentInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderSentController extends Controller
{
    public function __construct(private OrderSentInterface $orderSentService) {

    }

    public function index(OrderSentListingRequest $request): AnonymousResourceCollection {
        return OrderSentResource::collection($this->orderSentService->list(new ParameterBag($request->validated())));
    }

    public function store(OrderSentRequest $request): OrderSentResource {
        return new OrderSentResource($this->orderSentService->create(new ParameterBag($request->validated())));
    }

    public function update(int $id): Bool {
        return $this->orderSentService->update($id);
    }

    public function decline(int $id): Bool {
        return $this->orderSentService->decline($id);
    }
}
