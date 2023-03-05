<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFinished extends Order
{
    use HasFactory;

    protected $table = 'orders_finished';

}
