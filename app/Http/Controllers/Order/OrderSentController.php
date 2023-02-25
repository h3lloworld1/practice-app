<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequests\OrderSentRequest;
use App\Http\Resources\OrderResources\OrderSentResource;
use App\Services\OrderSent\Interfaces\OrderSentInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderSentController extends Controller
{
    public function __construct(private OrderSentInterface $orderSentService) {

    }

    public function store(OrderSentRequest $request) {
        return new OrderSentResource($this->orderSentService->create(new ParameterBag($request->validated())));
    }
}
