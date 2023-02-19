<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sauce extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'menu_id'
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

}
