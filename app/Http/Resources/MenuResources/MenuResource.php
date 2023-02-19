<?php

namespace App\Http\Resources\MenuResources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {

        $this->loadSaucesWithSelectedColumns();

        return [
                'id' => $this->id,
                'status' => $this->status,
                'double_meat' => $this->double_meat,
                'name' => $this->name,
                'category' => $this->category,
                'additional_info' => $this->additional_info,
                'ingredients' => $this->ingredients,
                'allergens' => $this->allergens,
                'thumbnail' => $this->thumbnail,
                'price' => $this->price,
                'discount_price' => $this->discount_price,
                'sauces' => $this->sauces,
        ];
    }

    private function loadSaucesWithSelectedColumns()
    {
        return $this->load(['sauces' => function ($query) {
            $query->select('id', 'menu_id', 'name', 'status');
        }]);
    }
}
