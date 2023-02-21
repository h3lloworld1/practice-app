<?php

namespace App\Services\Menu;


use App\Models\Menu;
use App\Models\Sauce;
use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use App\Services\Menu\Interfaces\MenuServiceInterface;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

class MenuService implements MenuServiceInterface {

    public function __construct(public MenuRepositoryInterface $menuRepository)
    {

    }

    public function create(ParameterBag $data): ?Menu {

        return $this->menuRepository->create($data);
    }

    public function list(): Collection {
       return $this->menuRepository->list();
    }

    public function get(int $id): ?Menu {
        return $this->menuRepository->get($id);
    }

    public function update(int $id, ParameterBag $data): ?Menu {

        return $this->menuRepository->update($id, $data);
    }

    public function destroy(int $id): String {
        return $this->menuRepository->destroy($id);
    }

}
