<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderSent extends Order
{
    use HasFactory;

    protected $table = 'orders_sent';

}
