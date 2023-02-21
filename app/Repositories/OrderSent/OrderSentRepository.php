<?php

namespace App\Repositories\OrderSent;

use App\Models\OrderSent;
use App\Repositories\OrderSent\Interfaces\OrderSentRepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderSentRepository implements OrderSentRepositoryInterface
{
    public function create(ParameterBag $data): ?OrderSent {

        $orderSent = new OrderSent();
        $orderSent->name = $data->get('name');
        $orderSent->sauce = $data->get('sauce');
        $orderSent->double_meat = $data->get('double_meat');
        $orderSent->additional_info = $data->get('additional_info');
        $orderSent->quantity = $data->get('quantity');
        $orderSent->price = $data->get('price');
        $orderSent->total_price = $data->get('total_price');
        $orderSent->accepted = $data->get('accepted');
        $orderSent->save();

        return $orderSent;
    }
}
