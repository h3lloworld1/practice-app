<?php

namespace App\Services\Menu;


use App\Models\Menu;
use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use App\Services\Menu\Interfaces\MenuServiceInterface;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MenuService implements MenuServiceInterface {

    public function __construct(private MenuRepositoryInterface $menuRepository)
    {

    }

    public function create(ParameterBag $data): ?Menu {
        $menu = $this->menuRepository->create($data);

        if (!$menu) {
            throw new HttpException(500, 'Creating error');
        }

        return $menu;
    }

    public function list(): Collection {
        $menus = $this->menuRepository->list();

        if ($menus->isEmpty()) {
            throw new HttpException(404, 'No available menus');
        }

       return $menus;
    }

    public function get(int $id): ?Menu {
        return $this->menuRepository->get($id);
    }

    public function update(int $id, ParameterBag $data): ?Menu {

        $sauces = $data->get('sauces');

        if (empty($sauces)) {
            throw new HttpException(404, 'Sauces must not be empty');
        }

        return $this->menuRepository->update($id, $data);
    }

    public function destroy(int $id): String {
        return $this->menuRepository->destroy($id);
    }

}
