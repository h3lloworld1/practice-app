<?php

namespace App\Services\Orders\OrderFinished;

use App\Models\OrderFinished;
use App\Repositories\Orders\Interfaces\OrderFinishedRepositoryInterface;
use App\Services\Orders\Interfaces\OrderFinishedInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderFinishedService implements OrderFinishedInterface
{
    public function __construct(private OrderFinishedRepositoryInterface $orderFinishedRepository) {

    }
    public function store(ParameterBag $data): ?OrderFinished {
        $store = $this->orderFinishedRepository->store($data);

        if (!$store) {
            throw new HttpException(500, 'Something went wrong while creating');
        }

        return $store;
    }

    public function list(ParameterBag $filters): ?Collection {
        $finishedOrders = $this->orderFinishedRepository->list($filters);

        if (!$finishedOrders->count()) {
            throw new HttpException(404, 'Finished orders not found');
        }

        return $finishedOrders;
    }

    public function update(int $id): Bool {
        $updatedOrder = $this->orderFinishedRepository->update($id);

        if (!$updatedOrder) {
            throw new HttpException(500, 'Updating error');

        }

        return $updatedOrder;
    }

    public function decline(int $id): Bool {
        $declinedOrder = $this->orderFinishedRepository->decline($id);

        if (!$declinedOrder) {
            throw new HttpException(500, 'Declining error');
        }

        return $declinedOrder;
    }

}
