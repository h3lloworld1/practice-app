<?php

namespace App\Repositories\Menu;


use App\Models\Menu;
use App\Models\Sauce;
use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

class MenuRepository implements MenuRepositoryInterface
{
    public function create(ParameterBag $data): ?Menu {

        $menu = Menu::create($data->all());
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
        return Menu::all();
    }

    public function get(int $id): ?Menu {
        return Menu::where('id', $id)->firstOrFail();
    }

    public function destroy(int $id): String {
        Menu::where('id', $id)->firstOrFail()->delete();

        return 'Menu deleted';
    }

    public function update(int $id, ParameterBag $data): ?Menu {
        $menu = $this->get($id);

        $dataWithoutSauces = collect($data)->except(['sauces'])->toArray();

        $menu->update($dataWithoutSauces);

        $sauces = $data->get('sauces');

        $updatedSauceIds = [];

        $existingSauceIds = $menu->sauces()->pluck('id')->toArray();

        foreach ($sauces as $sauce) {
            if (isset($sauce['id'])) {
                $sauceId = $sauce['id'];
                $existingSauce = Sauce::find($sauceId);

                if ($existingSauce) {
                    $existingSauce->update($sauce);
                    $updatedSauceIds[] = $sauceId;
                }
            } else {
                $newSauce = new Sauce;
                $newSauce->name = $sauce['name'];
                $newSauce->status = $sauce['status'];
                $newSauce->menu_id = $menu->id;
                $newSauce->save();
                $updatedSauceIds[] = $newSauce->id;
            }
        }

        $saucesToDelete = array_diff($existingSauceIds, $updatedSauceIds);
        $menu->sauces()->whereIn('id', $saucesToDelete)->delete();

        return $menu;
    }

}
