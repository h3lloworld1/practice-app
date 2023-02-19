<?php

namespace App\Services\Menu\Contracts;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

interface MenuServiceContract
{
    public function create(ParameterBag $data): ?Menu;
    public function list(): Collection;

    public function get(int $id): ?Menu;

    public function destroy(int $id): ? String;
}
