<?php

namespace App\Repositories\Orders\OrderFinished;

use App\Models\OrderFinished;
use App\Models\OrderInProgress;
use App\Repositories\BaseRepository;
use App\Repositories\Orders\Interfaces\OrderFinishedRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderFinishedRepository extends BaseRepository implements OrderFinishedRepositoryInterface
{
    public function __construct(private OrderFinished $orderFinished, private OrderInProgress $orderInProgress) {
        $this->model = $orderFinished;
    }
    public function store(ParameterBag $data): ?OrderFinished {
        $orderInProgress = $this->orderInProgress->where('id', $data->get('order_id'))
            ->where('current_status', 'finished')
            ->firstOrFail();

        $orderInProgressData = $orderInProgress->toArray();
        unset($orderInProgress['id'], $orderInProgress['created_at'], $orderInProgress['updated_at']);
        $orderInProgressData['current_status'] = 'not_taken';

        return $this->model->create($orderInProgressData);
    }

    public function list(ParameterBag $filters): ?Collection {
        $finishedOrders = $this->model->
            where('current_status', 'not_taken');

        $queryBuilder = $this->orderByFilters($filters, $finishedOrders);

        return $queryBuilder->get();
    }

    public function update(int $id): Bool {
        $finishedOrder = $this->model->findOrFail($id);

        return $finishedOrder->update([
            'current_status' => 'taken'
        ]);
    }

    public function decline(int $id): Bool {
        $declinedOrder = $this->model->findOrFail($id);

        return $declinedOrder->update([
            'current_status' => 'declined_by_customer'
        ]);
    }

}
