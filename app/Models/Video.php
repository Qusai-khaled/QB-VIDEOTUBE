<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name',
        'meta_keywords',
        'meta_des',
        'des',
        'youtube',
        'published',
        'user_id',
        'cat_id',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function cat()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill', 'skills_videos');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tags_videos');
    }
    public function scopePublished(){
        return $this->where('published' , 1);
    }
}
