<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title_1',
        'title_2',
        'title_3',
        'child_image_1',
        'child_image_2',
        'link_url',
        'order',
    ];

    public $timestamps = false;
}
