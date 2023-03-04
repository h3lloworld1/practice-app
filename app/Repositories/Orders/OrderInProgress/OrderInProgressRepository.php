<?php

namespace App\Repositories\Orders\OrderInProgress;

use App\Models\OrderInProgress;
use App\Models\OrderSent;
use App\Repositories\BaseRepository;
use App\Repositories\Orders\Interfaces\OrderInProgressRepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderInProgressRepository extends BaseRepository implements OrderInProgressRepositoryInterface
{
    public function __construct(private OrderInProgress $orderInProgress, private OrderSent $orderSent) {
        $this->model = $this->orderInProgress;
    }

    public function store(ParameterBag $id) {
        $orderSent = $this->orderSent->where('id', $id->get('order_id'))
            ->where('current_status', 'accepted_by_restaurant')
            ->firstOrFail();

        $orderSentData = $orderSent->toArray();
        unset($orderSentData['id'], $orderSentData['created_at'], $orderSentData['updated_at']);
        $orderSentData['current_status'] = 'in_progress';

        return $this->model->create($orderSentData);
    }

    public function list(?ParameterBag $filters) {

        $queryBuilder = $this->model
            ->where('current_status', 'in_progress');

        $queryBuilder = $this->orderByFilters($filters, $queryBuilder);

        return $queryBuilder->get();
    }
}
