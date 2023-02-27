<?php

namespace App\Repositories\Orders\Interfaces;

use App\Models\OrderSent;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderSentRepositoryInterface
{
    public function create(ParameterBag $data): ?OrderSent;
    public function list(): Collection;
    public function update(int $id): Bool;
    public function decline(int $id): Bool;
}
