<?php

namespace App\Services\Orders\OrderSent;

use App\Models\OrderSent;
use App\Repositories\Orders\Interfaces\OrderInProgressRepositoryInterface;
use App\Repositories\Orders\Interfaces\OrderSentRepositoryInterface;
use App\Services\Orders\Interfaces\OrderSentInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderSentService implements OrderSentInterface {
    public function __construct(private OrderSentRepositoryInterface $orderSentRepository) {

    }
    public function create(ParameterBag $data): ?OrderSent {

        $store = $this->orderSentRepository->create($data);

        if (!$store) {
             throw new HttpException(500, 'Creating error');
        }

        return $store;
    }
    public function list(ParameterBag $filters): Collection {
        return $this->orderSentRepository->list($filters);
    }

    public function update(int $id): Bool {
        $update = $this->orderSentRepository->update($id);

        if (!$update) {
            throw new HttpException(500, 'Something went wrong');
        }

        return $update;
    }

    public function decline(int $id): Bool {
        $decline = $this->orderSentRepository->decline($id);

        if (!$decline) {
            throw new HttpException(500, 'Something went wrong');
        }

        return $decline;
    }
}
