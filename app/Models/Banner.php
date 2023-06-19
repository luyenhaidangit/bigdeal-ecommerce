<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'image',
        'title_1',
        'title_2',
        'title_3',
        'link_url',
        'order',
        'type'
    ];

    public $timestamps = false;
}
