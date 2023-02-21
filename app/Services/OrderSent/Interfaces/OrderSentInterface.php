<?php

namespace App\Services\OrderSent\Interfaces;

use App\Models\OrderSent;
use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderSentInterface
{
    public function create(ParameterBag $data): ?OrderSent;
}
