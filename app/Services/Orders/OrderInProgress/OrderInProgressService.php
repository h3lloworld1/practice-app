<?php

namespace App\Services\Orders\OrderInProgress;

use App\Repositories\Orders\Interfaces\OrderInProgressRepositoryInterface;
use App\Services\Orders\Interfaces\OrderInProgressInterface;
use PhpParser\Node\Param;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderInProgressService implements OrderInProgressInterface
{
    public function __construct(private OrderInProgressRepositoryInterface $inProgressRepository) {

    }
    public function store(ParameterBag $id) {
        $store = $this->inProgressRepository->store($id);

        if (!$store) {
            throw new HttpException(500, 'Something went wrong');
        }

        return $store;
    }

    public function list(ParameterBag $filters) {
        $ordersInProgress = $this->inProgressRepository->list($filters);

        if (!$ordersInProgress) {
            throw new HttpException(404, 'Orders in progress not found');
        }

        return $ordersInProgress;
    }
}
