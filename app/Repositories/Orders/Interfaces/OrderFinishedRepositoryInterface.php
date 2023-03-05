<?php

namespace App\Repositories\Orders\Interfaces;

use App\Models\OrderFinished;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderFinishedRepositoryInterface
{
    public function store(ParameterBag $data): ?OrderFinished;
    public function list(ParameterBag $filters): ?Collection;
    public function update(int $id): Bool;
    public function decline(int $id): Bool;
}
