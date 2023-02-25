<?php

namespace App\Services\OrderSent;

use App\Models\OrderSent;
use App\Repositories\OrderSent\Interfaces\OrderSentRepositoryInterface;
use App\Services\OrderSent\Interfaces\OrderSentInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderSentService implements OrderSentInterface {
    public function __construct(private OrderSentRepositoryInterface $orderSentRepository) {

    }
    public function create(ParameterBag $data): ?OrderSent {

        $price = $data->get('price');
        $quantity = $data->get('quantity');
        $data->add([
            'total_price' => $price * $quantity
        ]);

        $store = $this->orderSentRepository->create($data);

        if (!$store) {
             throw new HttpException(500, 'Creating error');
        }

        return $store;
    }
}
