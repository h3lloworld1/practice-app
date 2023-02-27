<?php

namespace App\Services\Orders\OrderInProgress;

use App\Repositories\Orders\Interfaces\OrderInProgressRepositoryInterface;
use App\Services\Orders\Interfaces\OrderInProgressInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderInProgressService implements OrderInProgressInterface
{
    public function __construct(private OrderInProgressRepositoryInterface $inProgressRepository) {

    }
    public function store(ParameterBag $data) {
        $store = $this->inProgressRepository->store($data);

        if (!$store) {
            throw new HttpException(500, 'Something went wrong');
        }

        return $store;
    }

    public function list() {
        $ordersInProgress = $this->inProgressRepository->list();

        if (!$ordersInProgress) {
            throw new HttpException(404, 'Orders in progress not found');
        }

        return $ordersInProgress;
    }
}
