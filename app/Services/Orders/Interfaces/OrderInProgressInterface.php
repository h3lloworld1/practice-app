<?php

namespace App\Services\Orders\Interfaces;

use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderInProgressInterface
{
    public function store(ParameterBag $data);
    public function list();
}
