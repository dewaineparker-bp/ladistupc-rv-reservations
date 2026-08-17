<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RvPayment extends Model
{
    protected $guarded = [];
    protected $casts = ['gateway_response' => 'array', 'processed_at' => 'datetime'];
}
