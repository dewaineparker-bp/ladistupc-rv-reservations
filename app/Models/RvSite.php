<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RvSite extends Model
{
    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
        'handicap' => 'boolean',
        'map_x' => 'float',
        'map_y' => 'float',
        'map_w' => 'float',
        'map_h' => 'float',
    ];
}
