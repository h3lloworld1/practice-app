<?php

namespace App\Services\Orders\Interfaces;

use App\Models\OrderFinished;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderFinishedInterface
{
    public function store(ParameterBag $data): ?OrderFinished;
    public function list(ParameterBag $filters): ?Collection;
    public function update(int $id): Bool;

}
