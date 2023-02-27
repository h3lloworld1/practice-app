<?php

namespace App\Repositories\Menu;


use App\Models\Menu;
use App\Models\Sauce;
use App\Models\Section;
use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

class MenuRepository implements MenuRepositoryInterface
{
    public function create(ParameterBag $data): ?Menu {

        $menu = Menu::create($data->all());

        if ($data->has('sauces')) {
            $sauces = $data->get('sauces');

            foreach ($sauces as $sauce) {
                $newSauce = new Sauce;
                $newSauce->name = $sauce['name'];
                $newSauce->status = $sauce['status'];
                $newSauce->menu_id = $menu->id;
                $newSauce->save();
            }
        }

        if ($data->has('sections')) {
            $sections = $data->get('sections');

            foreach ($sections as $section) {
                $newSection = new Section;
                $newSection->name = $section['name'];
                $newSection->description = $section['description'];
                $newSection->status = $section['status'];
                $newSection->menu_id = $menu->id;
                $newSection->save();
            }
        }

        return $menu;
    }

    public function list(): Collection {
        return Menu::all()->sortDesc();
    }

    public function get(int $id): ?Menu {
        return Menu::where('id', $id)->firstOrFail();
    }

    public function destroy(int $id): String {
        Menu::where('id', $id)->firstOrFail()->delete();

        return 'Menu deleted';
    }

    public function update(int $id, ParameterBag $data): ?Menu
    {
        $menu = $this->get($id);

        $menu->update($data->all());

        $updatedSauceIds = [];
        $updatedSectionIds = [];

        collect($data->get('sauces', []))->each(function ($sauce) use ($menu, &$updatedSauceIds) {
            if (isset($sauce['id'])) {
                $menu->sauces()->where('id', $sauce['id'])->update($sauce);
                $updatedSauceIds[] = $sauce['id'];
            } else {
                $newSauce = new Sauce($sauce);
                $menu->sauces()->save($newSauce);
                $updatedSauceIds[] = $newSauce->id;
            }
        });

        collect($data->get('sections', []))->each(function ($section) use ($menu, &$updatedSectionIds) {
            if (isset($section['id'])) {
                $menu->sections()->where('id', $section['id'])->update($section);
                $updatedSectionIds[] = $section['id'];
            } else {
                $newSection = new Section($section);
                $menu->sections()->save($newSection);
                $updatedSectionIds[] = $newSection->id;
            }
        });

        $menu->sauces()->whereNotIn('id', $updatedSauceIds)->delete();
        $menu->sections()->whereNotIn('id', $updatedSectionIds)->delete();

        return $menu;
    }


}
