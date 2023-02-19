<?php

namespace App\Services\Menu;


use App\Models\Menu;
use App\Models\Sauce;
use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use App\Services\Menu\Contracts\MenuServiceContract;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

class MenuService implements MenuServiceContract {

    public function __construct(public MenuRepositoryInterface $menuRepository)
    {

    }

    public function create(ParameterBag $data): ?Menu {

        $menu = $this->menuRepository->create($data);

        $sauces = $data->get('sauces');

        foreach ($sauces as $sauce) {
            $newSauce = new Sauce;
            $newSauce->name = $sauce['name'];
            $newSauce->status = $sauce['status'];
            $newSauce->menu_id = $menu->id;
            $newSauce->save();
        }

        return $menu;
    }

    public function list(): Collection {
       return $this->menuRepository->list();
    }

    public function get(int $id): ?Menu {
        return $this->menuRepository->get($id);
    }

    public function destroy(int $id): String {
        return $this->menuRepository->destroy($id);
    }

}
