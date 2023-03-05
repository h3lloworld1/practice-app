<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequests\OrderFinished\CreateOrderFinishedRequest;
use App\Http\Requests\OrderRequests\OrderFinished\OrderFinishedListingRequest;
use App\Http\Resources\OrderResources\OrderFinished\OrderFinishedResource;
use App\Services\Orders\Interfaces\OrderFinishedInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderFinishedController extends Controller
{
    public function __construct(private OrderFinishedInterface $orderFinished) {

    }
    public function store(CreateOrderFinishedRequest $request): OrderFinishedResource {
        return new OrderFinishedResource($this->orderFinished->store(new ParameterBag($request->validated())));
    }

    public function index(OrderFinishedListingRequest $request): AnonymousResourceCollection {
        return OrderFinishedResource::collection($this->orderFinished->list(new ParameterBag($request->validated())));
    }

//    public function update(int $id) {
//
//    }
}
