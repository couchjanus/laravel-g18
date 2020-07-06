<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'title', 'content', 'category_id', 'user_id', 'published', 'cover_path'
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public function tags() {
		return $this->belongsToMany(Tag::class);	
    }
    
    public function getDescriptionAttribute()
    {
        return substr($this->content, 0, 70) . "...";
    }

    public function getShortTitleAttribute()
    {
        return substr($this->title, 0, 30);
    }

    public function getCoverAttribute()
    {
        $parts = explode("/", $this->cover_path);

        return end($parts);
    }
}
