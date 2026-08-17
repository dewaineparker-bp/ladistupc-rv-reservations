<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RvReservation extends Model
{
    protected $guarded = [];

    protected $casts = [
        'arrival_date' => 'date',
        'departure_date' => 'date',
    ];

    public function site() { return $this->belongsTo(RvSite::class, 'site_id'); }
    public function customer() { return $this->belongsTo(RvCustomer::class, 'customer_id'); }
    public function periods() { return $this->hasMany(RvReservationPeriod::class, 'reservation_id'); }
    public function payments() { return $this->hasMany(RvPayment::class, 'reservation_id'); }
}
