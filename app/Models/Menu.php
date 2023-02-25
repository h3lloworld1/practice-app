<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'double_meat',
        'category',
        'additional_info',
        'ingredients',
        'allergens',
        'thumbnail',
        'price',
        'discount_price',
    ];

    public function sauces()
    {
        return $this->hasMany(Sauce::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
