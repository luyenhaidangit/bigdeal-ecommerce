<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'flat_plot',
        'company_name',
        'address',
        'zip_code',
        'country',
        'city',
        'region_state',
        'password',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            $customer->password = Hash::make($customer->password);
        });

        static::updating(function ($customer) {
            if ($customer->isDirty('password')) {
                $customer->password = Hash::make($customer->password);
            }
        });
    }
}
