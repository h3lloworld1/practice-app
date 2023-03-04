<?php

namespace App\Services\Orders\Interfaces;

use App\Models\OrderSent;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderSentInterface
{
    public function create(ParameterBag $data): ?OrderSent;
    public function list(ParameterBag $filters): Collection;
    public function update(int $id): Bool;
    public function decline(int $id): Bool;
}
