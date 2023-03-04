<?php

namespace App\Repositories\Orders\Interfaces;

use Symfony\Component\HttpFoundation\ParameterBag;

interface OrderInProgressRepositoryInterface
{
    public function store(ParameterBag $id);
    public function list(?ParameterBag $filters);
}
