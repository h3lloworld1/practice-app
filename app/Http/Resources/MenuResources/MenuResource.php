<?php

namespace App\Http\Resources\MenuResources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\LoadSelectedColumnsTrait;

class MenuResource extends JsonResource
{
    use LoadSelectedColumnsTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {

        $this->loadWithSelectedColumns('sauces', ['id', 'menu_id', 'name', 'status']);
        $this->loadWithSelectedColumns('sections', ['id', 'menu_id', 'description', 'name', 'status']);

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
                'sections' => $this->sections
        ];
    }
}
