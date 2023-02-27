<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sauce',
        'double_meat',
        'additional_info',
        'quantity',
        'price',
        'current_status',
        'phone_number',
        'total_price',
        'sections'
    ];
    protected $casts = [
        'sections' => 'json',
    ];

    protected function sections(): Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}
