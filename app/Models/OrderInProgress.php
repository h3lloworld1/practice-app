<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderInProgress extends Order
{
    use HasFactory;

    protected $table = 'orders_in_progress';

}
