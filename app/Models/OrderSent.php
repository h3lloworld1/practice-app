<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSent extends Model
{
    use HasFactory;

    protected $table = 'orders_sent';

    protected $fillable = [
        'name',
        'sauce',
        'double_meat',
        'additional_info',
        'quantity',
        'price',
        'accepted',
        'total_price'
    ];

}
