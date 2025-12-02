<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityPost extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'category',
        'likes',
        'comments_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
