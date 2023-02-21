<?php

namespace App\Services\OrderSent;

use App\Models\OrderSent;
use App\Repositories\OrderSent\Interfaces\OrderSentRepositoryInterface;
use App\Services\OrderSent\Interfaces\OrderSentInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderSentService implements OrderSentInterface {
    public function __construct(private OrderSentRepositoryInterface $orderSentRepository) {

    }
    public function create(ParameterBag $data): ?OrderSent {

        $price = $data->get('price');
        $quantity = $data->get('quantity');
        $totalPrice = $price * $quantity;
        $data->add([
            'total_price' => $totalPrice
        ]);
        return $this->orderSentRepository->create($data);
    }
}
