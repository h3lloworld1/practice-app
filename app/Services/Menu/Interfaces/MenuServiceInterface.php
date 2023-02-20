<?php

namespace App\Services\Menu\Interfaces;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

interface MenuServiceInterface
{
    public function create(ParameterBag $data): ?Menu;
    public function list(): Collection;

    public function get(int $id): ?Menu;

    public function destroy(int $id): ? String;

    public function update(int $id, ParameterBag $data): ?Menu;
}
