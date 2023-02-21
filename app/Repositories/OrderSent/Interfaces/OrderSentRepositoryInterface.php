<?php

namespace App\Repositories\OrderSent\Interfaces;

use App\Models\OrderSent;
use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderSentRepositoryInterface
{
    public function create(ParameterBag $data): ?OrderSent;
}
