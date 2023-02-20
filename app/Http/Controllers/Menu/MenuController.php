<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequests\CreateMenuRequest;
use App\Http\Requests\MenuRequests\UpdateMenuRequest;
use App\Http\Resources\MenuResources\MenuResource;
use App\Http\Resources\MenuResources\MenuResourceCollection;
use App\Services\Menu\Interfaces\MenuServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;

class MenuController extends Controller
{
    public function __construct(private MenuServiceInterface $menuService)
    {

    }

    public function store(CreateMenuRequest $request): MenuResource | JsonResponse {

        $menu = $this->menuService->create(new ParameterBag($request->validated()));

        if (!$menu) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }

        return new MenuResource($menu);
    }

    public function index(): MenuResourceCollection | JsonResponse {
        $menus = $this->menuService->list();

        if ($menus->isEmpty()) {
            return response()->json(['message' => 'No available menus'], 404);
        }

        return new MenuResourceCollection($menus);
    }

    public function get(int $id): MenuResource | JsonResponse {

        try {
            $menu = $this->menuService->get($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Menu not found'], 404);
        }

        return new MenuResource($menu);
    }

    public function destroy(int $id): JsonResponse {

        try {
            $message = $this->menuService->destroy($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Menu not found'], 404);
        }

        return response()->json(['message' => $message], 204);
    }

    public function update(int $id, UpdateMenuRequest $request) {

        $data = new ParameterBag($request->validated());
        $sauces = $data->get('sauces');

        if (empty($sauces)) {
            return response()->json(['message' => 'Sauces must not be empty.'], 400);
        }

        $menu = $this->menuService->update($id, $data);

        return new MenuResource($menu);
    }
}
