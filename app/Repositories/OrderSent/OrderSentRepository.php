<?php

namespace App\Repositories\OrderSent;

use App\Models\OrderSent;
use App\Repositories\OrderSent\Interfaces\OrderSentRepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderSentRepository implements OrderSentRepositoryInterface
{
    public function __construct(private OrderSent $orderSent) {
        $this->model = $orderSent;
    }
    public function create(ParameterBag $data): ?OrderSent {
        $orderSent = new $this->model($data->all());
        $orderSent->save();

        return $orderSent;
    }
}
