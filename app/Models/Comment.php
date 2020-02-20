<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'video_id',
        'user_id',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function video()
    {
        return $this->belongsTo('App\Models\Video');
    }
}
