<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewsComment;

class News extends Model
{
    protected $fillable = [
        'title',
        'image',
        'content',
        'number_love',
        'view_count',
    ];

    protected $dates = ['created_at'];

    public function newsComments()
    {
        return $this->hasMany(NewsComment::class);
    }

    public function getNumberCommentAttribute()
    {
        return $this->newsComments()->where('status', true)->count();
    }
}
