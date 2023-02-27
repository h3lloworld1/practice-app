<?php

namespace App\Repositories\Orders\OrderSent;

use App\Models\OrderSent;
use App\Repositories\Orders\Interfaces\OrderSentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
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

    public function list(): Collection {
        return $this->model
            ->where('current_status', 'in_queue')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function update(int $id): Bool {
        return $this->model->find($id)->update([
            'current_status' => 'accepted_by_restaurant'
        ]);
    }

    public function decline(int $id): Bool {
        return $this->model->find($id)->update([
            'current_status' => 'declined',
        ]);
    }
}
