<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\ParameterBag;

class BaseRepository
{
    public function orderByFilters(ParameterBag $filters, Builder $queryBuilder): Builder
    {
        if ($filters->has('order_by')) {
            $orderDirection = $filters->get('order_by') === 'asc' ? 'asc' : 'desc';
            $queryBuilder->orderBy('id', $orderDirection);
        }

        return $queryBuilder;
    }

}
