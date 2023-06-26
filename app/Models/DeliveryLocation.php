<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryLocation extends Model
{
    protected $fillable = [
        'address',
        'code',
        'max_delivery_time'
    ];

    protected $dates = [
        'max_delivery_time',
    ];
}
