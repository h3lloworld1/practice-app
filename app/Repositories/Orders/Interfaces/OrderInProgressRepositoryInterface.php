<?php

namespace App\Repositories\Orders\Interfaces;

use App\Models\OrderInProgress;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderInProgressRepositoryInterface
{
    public function store(ParameterBag $id): ?OrderInProgress;
    public function list(?ParameterBag $filters): ?Collection;
    public function update(int $id): Bool;
}
