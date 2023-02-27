<?php

namespace App\Repositories\Orders\OrderInProgress;

use App\Models\OrderInProgress;
use App\Repositories\Orders\Interfaces\OrderInProgressRepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderInProgressRepository implements OrderInProgressRepositoryInterface
{
    public function __construct(private OrderInProgress $orderInProgress) {
        $this->model = $this->orderInProgress;
    }

    public function store(ParameterBag $data) {
        return $this->model->create($data->all());
    }

    public function list() {
        return $this->model->all();
    }
}
