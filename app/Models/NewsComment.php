<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class NewsComment extends Model
{
    protected $fillable = [
        'news_id',
        'name',
        'email',
        'content',
        'status',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
