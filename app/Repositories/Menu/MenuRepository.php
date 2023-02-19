<?php

namespace App\Repositories\Menu;


use App\Models\Menu;
use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

class MenuRepository implements MenuRepositoryInterface
{
    public function create(ParameterBag $data): ?Menu {
        return Menu::create($data->all());
    }

    public function list(): Collection {
        return Menu::all();
    }

    public function get(int $id): ?Menu {
        return Menu::where('id', $id)->firstOrFail();
    }

    public function destroy(int $id): String {
        Menu::where('id', $id)->firstOrFail()->delete();

        return 'Menu deleted successfully';
    }
}
